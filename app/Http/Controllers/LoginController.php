<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function authenticateAdmin(Request $request): RedirectResponse{
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $users = User::where('username', $request->input('username'))->first();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if($users->role == 'admin'){
                return redirect(route('adminDashboard'));
            }
        }
        return back()->with('loginError', 'Login failed!');
    }
    public function authenticateUser(Request $request): RedirectResponse{
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $users = User::where('username', $request->input('username'))->first();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if($users->role == 'penyedia'){
                return redirect(route('penyediaHomepage'));
            } else if ($users->role == 'pelamar'){
                return redirect(route('pelamarHomepage'));
            }
        }
        // dd(Auth::attempt($credentials));
        return back()->with('loginError', 'Login failed!');
    }
    public function logout(){
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/admin/login');
    }
    public function register(Request $request){
        // Validasi request
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|unique:users,username',
            'role' => 'required|string',
            'password' => 'required|string',
            'repeatPassword' => 'required|string|same:password',
        ]);

        $password = $request->input('password');
        $repeatPassword = $request->input('repeatPassword');

        if ($validator->fails()) {
            if($password != $repeatPassword){
                return redirect()->back()->with('error', 'Proses Register Gagal! Pastikan Password dan Repeat Password cocok!');
            }
            return redirect()->back()->with('error', 'Proses Register Gagal! Username yang anda masukkan sudah ada!');
        }

        // Simpan data ke database
        $user = new User();
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->role = $request->input('role');
        $user->save();

        // Redirect atau lakukan tindakan lain setelah penyimpanan
        return redirect(route('login'))->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
