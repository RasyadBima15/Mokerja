<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function viewDashboard(){
        $users = User::all();
        return view('admin.view.home', compact('users'));
    }
    public function viewPenyedia(){
        $users = User::where('role', 'penyedia')->get();
        return view('admin.view.penyedia', compact('users'));
    }
    public function viewPelamar(){
        $users = User::where('role', 'pelamar')->get();
        return view('admin.view.pelamar', compact('users'));
    }

    public function addPenyedia(Request $request){
        try {
            // Validasi request
            $validator = Validator::make($request->all(), [
                'username' => 'required|string|unique:users,username',
                'password' => 'required|string|',
                'repeatPassword' => 'required|string|same:password',
            ]); 
    
            // Cek apakah validasi berhasil
            if ($validator->fails()) {
                return redirect()->back()->with('error', 'Gagal menambahkan penyedia. Username sudah tersedia atau Password dan Repeat Password anda tidak cocok!');
            }
    
            // Buat instance User dan isi propertinya dari request
            $user = new User;
            $user->username = $request->input('username');
            $user->password = bcrypt($request->input('password'));
            $user->role = 'penyedia'; // Sesuaikan dengan nilai yang sesuai
            // Tambahkan pengisian properti lainnya sesuai kebutuhan
    
            // Simpan data ke database
            $user->save();
    
            // Redirect atau lakukan tindakan lain setelah penyimpanan
            return redirect(route('adminDashboardPenyedia'))->with('success', 'Penyedia berhasil ditambahkan!');
        } catch (\Exception $e) {
            // Tangkap kesalahan umum lainnya dan lakukan tindakan yang sesuai
            return redirect()->back()->with('error', 'Gagal menambahkan penyedia. Silakan coba lagi!');
        }
    }
    public function addPelamar(Request $request){
        try {
            // Validasi request
            $validator = Validator::make($request->all(), [
                'username' => 'required|string|unique:users,username',
                'password' => 'required|string|',
                'repeatPassword' => 'required|string|same:password',
            ]); 
    
            // Cek apakah validasi berhasil
            if ($validator->fails()) {
                return redirect()->back()->with('error', 'Gagal menambahkan penyedia. Username sudah tersedia atau Password dan Repeat Password anda tidak cocok!');
            }
    
            // Buat instance User dan isi propertinya dari request
            $user = new User;
            $user->username = $request->input('username');
            $user->password = bcrypt($request->input('password'));
            $user->role = 'pelamar'; // Sesuaikan dengan nilai yang sesuai
            // Tambahkan pengisian properti lainnya sesuai kebutuhan
    
            // Simpan data ke database
            $user->save();
    
            // Redirect atau lakukan tindakan lain setelah penyimpanan
            return redirect(route('adminDashboardPelamar'))->with('success', 'Penyedia berhasil ditambahkan!');
        } catch (\Exception $e) {
            // Tangkap kesalahan umum lainnya dan lakukan tindakan yang sesuai
            return redirect()->back()->with('error', 'Gagal menambahkan penyedia. Silakan coba lagi!');
        }
    }
    public function deleteUser($userId)
    {
        // Hapus pengguna berdasarkan ID
        $deleted = User::where('id', $userId)->delete();
    
        // Pastikan pengguna ditemukan
        if (!$deleted) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan');
        }
    
        // Redirect kembali dengan pesan keberhasilan
        return redirect()->back()->with('success', 'Pengguna berhasil dihapus');
    }
    public function viewEdit($id){
        $users = User::where('id', $id)->get();
        return view('admin.view.edit.editHome', compact('users'));
    }
    public function viewEditPelamar($id){
        $users = User::where('id', $id)->get();
        return view('admin.view.edit.editPelamar', compact('users'));
    }
    public function viewEditPenyedia($id){
        $users = User::where('id', $id)->get();
        return view('admin.view.edit.editPenyedia', compact('users'));
    }
    public function editUser(Request $request, $userId){
        $users = User::where('id', $userId)->first();
        // dd($users);
        try {
            // Validasi request
            $validator = Validator::make($request->all(), [
                'oldPassword' => 'required|string|',
                'newPassword' => 'required|string|',
                'repeatPassword' => 'required|string|same:newPassword',
            ]);
            $hashed = $users->password;

            if ($users && Hash::check($request->oldPassword, $hashed)) {
                // Password cocok
                // Cek apakah validasi berhasil
                if ($validator->fails()) {
                    return redirect()->back()->with('error', 'Gagal mengedit data user. Password dan Repeat Password anda tidak cocok!');
                }
        
                $users->username = $request->input('username');
                $users->password = bcrypt($request->input('newPassword'));
        
                // Simpan data ke database
                $users->save();
        
                // Redirect atau lakukan tindakan lain setelah penyimpanan
                return redirect(route('adminDashboard'))->with('success', 'Data user berhasil di-edit!');
            } else {
                return redirect()->back()->with('error', 'Gagal mengedit data user. Password lama yang anda masukkan tidak cocok!');
            }
        } catch (\Exception $e) {
            dd($e);
            // Tangkap kesalahan umum lainnya dan lakukan tindakan yang sesuai
            return redirect()->back()->with('error', 'Gagal mengedit data user. Silakan coba lagi!');
        }
    }
}
