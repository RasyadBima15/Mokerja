@extends('pelamar.dashboard')

@section('content2')
    <form action="{{route('postProfile')}}" method="POST" class="max-w-7xl mx-auto sm:mx-28" enctype="multipart/form-data">
        @csrf
        <div class="mb-5">
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Foto Profil</label>
            <input name="fotoProfil" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" required>
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
            <input type="text" name="specialist" id="specialist" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="mb-5">
            <label for="place" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asal</label>
            <input type="text" name="place" id="place" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="mb-5">
            <label for="riwayatStudi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Riwayat Studi</label>
            <textarea name="riwayatStudi" id="riwayatStudi" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required></textarea>
        </div>
        <div class="mb-5">
            <label for="umur" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Umur</label>
            <input type="number" name="umur" id="umur" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="mb-5">
            <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
            <select name="gender" id="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option>Laki-Laki</option>
                <option>Perempuan</option>
            </select>
        </div>
        <div class="mb-5">
            <label for="descSelf" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Desc Self</label>
            <textarea name="descSelf" id="descSelf" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required></textarea>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Certificate</label>
            <input name="certificate" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" required>
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
            <textarea name="skill" id="skill" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required></textarea>
        </div>
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="mb-5">
            <label for="noTelp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Telp</label>
            <input type="number" name="noTelp" id="noTelp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <button type="submit" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save  <i class="ml-1 fa-solid fa-floppy-disk"></i></button>
    </form>
@endsection