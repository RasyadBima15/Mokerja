@extends('pelamar.dashboard')

@section('content2')
    @foreach ($profiles as $profile)
    <form action="{{route('postProfile')}}" method="POST" class="max-w-7xl mx-auto sm:mx-28" enctype="multipart/form-data">
        @csrf
        <div class="mb-5">
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
            <input type="text" value="{{$profile->nama}}" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Foto Profil</label>
            <input name="fotoProfil" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" @if($profile->fotoProfil) @else required @endif>
            <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Please upload an image file (JPG, JPEG, PNG).</div>
            @foreach ($profiles as $profile)
                @if($profile->fotoProfil)
                    <div id="imagePreview" class="mt-2">
                        <img src="{{ asset('storage/photos/' . $profile->fotoProfil) }}" alt="fotoProfil" class="max-w-[30%] mt-5 rounded h-auto">    
                    </div>
                @endif
            @endforeach   
        </div>
        <div class="mb-5">
            <label for="specialist" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Specialist</label>
            <input type="text" value="{{$profile->Specialist}}" name="specialist" id="specialist" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="mb-5">
            <label for="place" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asal</label>
            <input type="text" value="{{$profile->Place}}" name="place" id="place" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="mb-5">
            <label for="riwayatStudi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Riwayat Studi</label>
            <textarea name="riwayatStudi" id="riwayatStudi" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>{{$profile->riwayatStudi}}</textarea>
        </div>
        <div class="mb-5">
            <label for="umur" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Umur</label>
            <input value="{{$profile->umur}}" type="number" name="umur" id="umur" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="mb-5">
            <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
            <select name="gender" id="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="Laki-Laki" {{ $profile->gender === 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                <option value="Perempuan" {{ $profile->gender === 'Perempuan' ? 'selected' : '' }} >Perempuan</option>
            </select>
        </div>
        <div class="mb-5">
            <label for="descSelf" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Desc Self</label>
            <textarea name="descSelf" id="descSelf" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>{{$profile->descSelf}}</textarea>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Certificate</label>
            <input name="certificate" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" @if($profile->fotoProfil) @else required @endif>
            <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Please upload an image file (JPG, JPEG, PNG).</div>
            @foreach ($profiles as $profile)
                @if($profile->certificate)
                    <div id="imagePreview" class="mt-2">
                        <img src="{{ asset('storage/photos/' . $profile->certificate) }}" alt="fotoProfil" class="max-w-[30%] mt-5 rounded h-auto">    
                    </div>
                @endif
            @endforeach   
        </div>
        <div class="mb-5">
            <label for="skill" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Skills</label>
            <textarea name="skill" id="skill" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>{{$profile->skill}}</textarea>
        </div>
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input value="{{$profile->email}}" type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="mb-5">
            <label for="noTelp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Telp</label>
            <input value="{{$profile->noTelp}}" type="number" name="noTelp" id="noTelp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <button type="submit" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save  <i class="ml-1 fa-solid fa-floppy-disk"></i></button>
    </form>
    @endforeach
@endsection

@if (!$error)
    @section('content3')
    @if ($job_pelamars->count() > 0)
    <div class="flex justify-center">
        <div class="w-full max-w-5xl p-4 mt-8 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-col justify-start">
                <h1 class="m-5 text-[20px] sm:text-xl font-semibold bg-gradient-to-r from-cyan-500 to-blue-500 text-transparent bg-clip-text">Applied Job Lists</h1>
                <div class="flex w-full mx-auto">
                    @foreach ($jobs as $job)
                        <div class="w-[350px] ml-5 mr-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <img class="rounded-t-lg w-full h-[226px]" src="{{asset('storage/photos/'. $job->companyPhoto)}}" alt="" />
                            <div class="p-7 pb-5 pt-3 pr-0">
                                <h5 class="mb-3 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$job->posisi}}</h5>
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">{{$job->lokasi}}</span>
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">{{$job->companyName}}</span>
                                @foreach ($job_pelamars as $job_pelamar)
                                @if ($job_pelamar->status == "Waiting")
                                    <span class="inline-flex items-center bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">
                                        <span class="w-2 h-2 me-1 bg-yellow-500 rounded-full"></span>
                                        {{$job_pelamar->status}}
                                    </span>                                    
                                @endif
                                @if ($job_pelamar->status == "Accepted")
                                    <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                        <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                                        {{$job_pelamar->status}}
                                    </span>                                    
                                @endif
                                @if ($job_pelamar->status == "Rejected")
                                    <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                        <span class="w-2 h-2 me-1 bg-red-500 rounded-full"></span>
                                        {{$job_pelamar->status}}
                                    </span>                                    
                                @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
    @endsection
@endif