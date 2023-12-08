<?php

namespace App\Http\Controllers\pelamar;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Job_pelamar;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PelamarController extends Controller
{
    public function viewHomepage(Request $request){
        if(Auth::check()){
            $userId = Auth::user()->id;
            $users = User::where('id', $userId)->get();
        }
        $jobs = Job::all();

        $query = Job::query();

        // Lakukan pencarian jika parameter 'search' ada dalam request
        if ($request->has('search')) {
            $searchTerm = strtolower($request->input('search'));
            $query->whereRaw('LOWER(posisi) LIKE ?', ["%{$searchTerm}%"]);
        }
    
        $jobs = $query->get();

        if(Auth::check()){
            $profiles = Profile::where('userId', $userId)->get();
            return view('pelamar.jobList', compact('users', 'jobs', 'profiles'));
        } else {
            return view('pelamar.jobList', compact('jobs'));
        }
    }
    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return view('login&Register.login');
    }
    public function getDetailJobtoPelamar($id){
        $userId = Auth::user()->id;
        $profiles = Profile::where('userId', $userId)->get();
        $users = User::where('id', $userId)->get();
        $jobs = Job::where('id', $id)->get();
        return view('pelamar.detailJob', compact('jobs', 'users', 'profiles'));
    }
    public function pelamarDashboard($id){
        $profile = Profile::where('userId', $id)->get();
        if($profile->count() > 0){
            $profiles = Profile::where('userId', $id)->get();

            $profileNew = Profile::where('userId', $id)->first();
            $job_pelamarsOld = Job_pelamar::where('profileId', $profileNew->id)->first();

            if(!$job_pelamarsOld){
                // dd('bisbef');
                return view('pelamar.editProfile')->with(['profiles' => $profiles, 'error' => 'Your error message']);
            }

            $jobs = Job::where('id', $job_pelamarsOld->jobId)->get();
            $job = Job::where('id', $job_pelamarsOld->jobId)->first();

            $error = 0;
            
            $job_pelamars = Job_pelamar::where('profileId', $profileNew->id)->where('jobId', $job->id)->get();
            return view('pelamar.editProfile', compact('profiles', 'job_pelamars', 'jobs', 'error'));
        } else {
            $profiles = Profile::where('userId', $id)->get();
            return view('pelamar.addProfile', compact('profiles'));
        }
    }
    public function postProfile(Request $request){
        // dd(Auth::check());
        $userId = Auth::user()->id;
        $profileEdit = Profile::where('userId', $userId)->first();
        if(!$profileEdit){
            $profiles = new Profile();
            $profiles->nama = $request->input('nama');
            $profiles->Specialist = $request->input('specialist');

            if($request->file('fotoProfil') && $request->file('certificate')){
                $profiles->fotoProfil = $request->file('fotoProfil')->getClientOriginalName();
                $fotoProfil = $request->file('fotoProfil');
                $fileName = $fotoProfil->getClientOriginalName();
                $filePath = 'photos/' . $fileName;
                // Memeriksa apakah file dengan nama yang sama sudah ada
                if (!Storage::disk('public')->exists($filePath)) {
                    // Menyimpan file ke dalam direktori
                    $fotoProfil->storeAs('photos', $fileName, 'public');
                }
                $profiles->certificate = $request->file('certificate')->getClientOriginalName(); 
            }

            $certificate = $request->file('certificate');
            $fileName = $certificate->getClientOriginalName();
            $filePath = 'photos/' . $fileName;
            // Memeriksa apakah file dengan nama yang sama sudah ada
            if (!Storage::disk('public')->exists($filePath)) {
                // Menyimpan file ke dalam direktori
                $certificate->storeAs('photos', $fileName, 'public');
            }

            $profiles->Place = $request->input('place');
            $profiles->gender = $request->input('gender');
            $profiles->umur = $request->input('umur');
            $profiles->email = $request->input('email');
            $profiles->noTelp = $request->input('noTelp');
            $profiles->descSelf = $request->input('descSelf');
            $profiles->skill = $request->input('skill');
            $profiles->riwayatStudi = $request->input('riwayatStudi'); 
            $profiles->userId = $userId;

            $profiles->save();
            return redirect(route('pelamarDashboard', ['id'=>$profiles->userId]))->with('success', 'Data Berhasil Tersimpan!');
        }
        $profileEdit->nama = $request->input('nama');
        $profileEdit->Specialist = $request->input('specialist');

        if($request->file('fotoProfil') && $request->file('certificate')){
            $profileEdit->fotoProfil = $request->file('fotoProfil')->getClientOriginalName();
            $fotoProfil = $request->file('fotoProfil');
            $fileName = $fotoProfil->getClientOriginalName();
            $filePath = 'photos/' . $fileName;
            // Memeriksa apakah file dengan nama yang sama sudah ada
            if (!Storage::disk('public')->exists($filePath)) {
                // Menyimpan file ke dalam direktori
                $fotoProfil->storeAs('photos', $fileName, 'public');
            }
            $profileEdit->certificate = $request->file('certificate')->getClientOriginalName(); 
        }

        $profileEdit->Place = $request->input('place');
        $profileEdit->gender = $request->input('gender');
        $profileEdit->umur = $request->input('umur');
        $profileEdit->email = $request->input('email');
        $profileEdit->noTelp = $request->input('noTelp');
        $profileEdit->descSelf = $request->input('descSelf');
        $profileEdit->skill = $request->input('skill');
        $profileEdit->riwayatStudi = $request->input('riwayatStudi'); 
        $profileEdit->userId = $userId;

        $profileEdit->save();
        return redirect(route('pelamarDashboard', ['id'=>$profileEdit->userId]))->with('success', 'Data Berhasil Tersimpan!');
    }
    public function apply(Request $request, $jobId){
        $job_pelamar = new Job_pelamar();
        $userId = Auth::user()->id;
        $profile = Profile::where('userId', $userId)->first();

        // Memeriksa apakah pengguna sudah mengajukan lamaran untuk pekerjaan ini
        $existingApplication = Job_pelamar::where('jobId', $jobId)
            ->where('profileId', $profile->id)
            ->exists();

        if ($existingApplication) {
            return redirect(route('getDetailJobtoPelamar', ['id' => $jobId]))
                ->with('error', 'Anda sudah mengajukan lamaran untuk pekerjaan ini!');
        }

        $job_pelamar->jobId = $jobId;
        $job_pelamar->profileId = $profile->id;
        $job_pelamar->status = "Waiting";
        $job_pelamar->CV = $request->file('cv')->getClientOriginalName();

        $cv = $request->file('cv');
        $fileName = $cv->getClientOriginalName();
        $filePath = 'photos/' . $fileName;
        // Memeriksa apakah file dengan nama yang sama sudah ada
        if (!Storage::disk('public')->exists($filePath)) {
            // Menyimpan file ke dalam direktori
            $cv->storeAs('photos', $fileName, 'public');
        }
        $job_pelamar->save();
        return redirect(route('getDetailJobtoPelamar', ['id'=>$jobId]))->with('success', 'Pengajuan Apply berhasil! Mohon tunggu pengumuman dari Penyedia lowongan!');
    }
}
