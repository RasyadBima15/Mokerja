<?php

namespace App\Http\Controllers\penyedia;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Job_pelamar;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PenyediaController extends Controller
{   
    public function viewHomepage(){
        $userId = Auth::user()->id;
        $jobs = Job::where('userId', $userId)->get();
        return view('penyedia.content.listJob', compact('jobs'));
    }
    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return view('login&Register.login');
    }
    public function viewCreate(){
        return view('penyedia.content.createJob');
    }
    public function editView($id){
        $jobs = Job::where('id', $id)->get();
        return view('penyedia.content.editJob', compact('jobs'));
    }
    public function postJob(Request $request){
        // dd(Auth::check());
        $userId = Auth::user()->id;
        $job = new Job();
        $job->companyName = $request->input('companyName');
        $job->posisi = $request->input('posisi');
        $job->companyPhoto = $request->file('companyPhoto')->getClientOriginalName();

        $companyPhoto = $request->file('companyPhoto');
        $fileName = $companyPhoto->getClientOriginalName();
        $filePath = 'photos/' . $fileName;
        // Memeriksa apakah file dengan nama yang sama sudah ada
        if (!Storage::disk('public')->exists($filePath)) {
            // Menyimpan file ke dalam direktori
            $companyPhoto->storeAs('photos', $fileName, 'public');
        }

        $job->lokasi = $request->input('kota');
        $job->type = $request->input('type');
        $job->email = $request->input('email');
        $job->noTelp = $request->input('noTelp');
        $job->jobDesc = $request->input('jobDesc');
        $job->gaji = $request->input('gaji');
        $job->userId = $userId;

        $job->save();
        return redirect(route('penyediaHomepage'))->with('success', 'Job Berhasil ditambahkan!');
    }
    public function editJob(Request $request, $id){
        $userId = Auth::user()->id;
        $job = Job::where('id', $id)->first();
        $job->companyName = $request->input('companyName');
        $job->posisi = $request->input('posisi');

        if($request->file('companyPhoto')){
            $job->companyPhoto = $request->file('companyPhoto')->getClientOriginalName();
            $companyPhoto = $request->file('companyPhoto');
            $fileName = $companyPhoto->getClientOriginalName();
            $filePath = 'photos/' . $fileName;
            // Memeriksa apakah file dengan nama yang sama sudah ada
            if (!Storage::disk('public')->exists($filePath)) {
                // Menyimpan file ke dalam direktori
                $companyPhoto->storeAs('photos', $fileName, 'public');
            }
        }

        $job->lokasi = $request->input('kota');
        $job->type = $request->input('type');
        $job->email = $request->input('email');
        $job->noTelp = $request->input('noTelp');
        $job->jobDesc = $request->input('jobDesc');
        $job->gaji = $request->input('gaji');
        $job->userId = $userId;

        $job->save();
        return redirect(route('penyediaHomepage'))->with('success', 'Job Berhasil di-edit!');
    }
    public function deleteJob($id)
    {
        // Hapus pengguna berdasarkan ID
        $deleted = Job::where('id', $id)->delete();
    
        // Pastikan pengguna ditemukan
        if (!$deleted) {
            return redirect()->back()->with('error', 'Job tidak ditemukan');
        }
    
        // Redirect kembali dengan pesan keberhasilan
        return redirect()->back()->with('success', 'Job berhasil dihapus');
    }
    public function getDetailJob($id)
    {
        $jobs = Job::where('id', $id)->get();
        return view('penyedia.content.getDetailJob', compact('jobs'));
    }
    public function getApplicants($id){
        $job_pelamar = Job_pelamar::where('jobId', $id)->first();

        if($job_pelamar){
            $profiles = Profile::where('id', $job_pelamar->profileId)->get();
            $job_pelamars = Job_pelamar::where('jobId', $id)->get();
            return view('penyedia.content.getApplicants', compact('job_pelamars', 'profiles'));
        }
        $profiles = null;
        $job_pelamars = Job_pelamar::where('jobId', $id)->get();
        return view('penyedia.content.getApplicants', compact('job_pelamars', 'profiles'));
    }
    public function getDetailApplicants($profileId, $job_pelamarId){
        $profiles = Profile::where('id', $profileId)->get();
        $job_pelamars = Job_pelamar::where('id', $job_pelamarId)->get();
        return view('penyedia.content.detailApplicant', compact('job_pelamars', 'profiles'));
    }
    public function deleteApplicants($id){
        // Hapus pengguna berdasarkan ID
        $deleted = Job_pelamar::where('id', $id)->delete();
    
        // Pastikan pengguna ditemukan
        if (!$deleted) {
            return redirect()->back()->with('error', 'Pelamar tidak ditemukan!');
        }
    
        // Redirect kembali dengan pesan keberhasilan
        return redirect()->back()->with('success', 'Pelamar berhasil dihapus!');
    }
    public function downloadPDF($id){
        $job_pelamar = Job_pelamar::where('id', $id)->first();
        $file = storage_path('app/public/photos/'. $job_pelamar->CV);
        // dd($file);
        return response()->download($file);
    }
    public function acceptApplicant($id){
        // dd($id);
        $job_pelamar = Job_pelamar::where('id', $id)->first();
        $job_pelamar->status = "Accepted";
        $job_pelamar->save();
        return redirect()->back()->with('success', 'Applicant sudah di-Acc.');
    }
    public function rejectApplicant($id){
        // dd($id);
        $job_pelamar = Job_pelamar::where('id', $id)->first();
        $job_pelamar->status = "Rejected";
        $job_pelamar->save();
        return redirect()->back()->with('success', 'Applicant sudah di-Reject.');
    }
}
