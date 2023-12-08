<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Edit Job</title>
</head>
<body>
    <nav class="fixed top-0 left-0 w-full bg-blue-100 border-gray-200 dark:bg-gray-900 z-50">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <h1 class="text-[20px] sm:text-3xl sm:ml-2 md:ml-20 flex items-center">
                <span class="select-none font-extrabold bg-gradient-to-r from-cyan-500 to-blue-500 text-transparent bg-clip-text">Mokerja <i class="fa-solid fa-briefcase"></i></span>
            </h1>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button data-modal-target="small-modal" data-modal-toggle="small-modal" type="button" id="logout" class="text-white bg-blue-500 hover:bg-blue-800 font-medium rounded-lg text-sm px-4 py-2 text-center">Logout</button>
                <!-- Small Modal -->
                <div id="small-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4">
                                <p class="text-base leading-relaxed text-black dark:text-gray-400">
                                    Apakah kamu yakin untuk logout?
                                </p>
                            </div>
                            <!-- Modal footer -->
                            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <a href="{{route('penyediaLogout')}}" data-modal-hide="small-modal" type="button" class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Logout</a>
                                <button data-modal-hide="small-modal" type="button" class="ms-3 text-white-500 bg-blue hover:bg-white-100 focus:ring-4 focus:outline-none focus:ring-white-200 rounded-lg border border-white-200 text-sm font-medium px-5 py-2.5 hover:text-white-900 focus:z-10 dark:bg-white-700 dark:text-white-300 dark:border-white-500 dark:hover:text-blue dark:hover:bg-white-600 dark:focus:ring-white-600">Kembali</button>
                            </div>
                        </div>
                    </div>
                </div>
                <button data-collapse-toggle="navbar-cta" id="cta" type="button" class="inline-flex items-center w-10 h-10 justify-center text-sm text-blue-500 rounded-lg md:hidden focus:outline-none dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-cta" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
                </button>
            </div>
            <h1 class="bg-gradient-to-r from-cyan-500 to-blue-500 bg-clip-text text-transparent text-2xl font-semibold py-2 px-3 md:p-0 rounded dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Edit Job</h1>
        </div>
  </nav>
<div class="flex flex-col mt-20">
    <h1 class="mx-auto sm:mx-28 my-3 text-blue-500 text-xl font-semibold">Form Job</h1>
    @foreach ($jobs as $job)
    <form action="{{route('editJob', ['id'=>$job->id])}}" method="POST" class="max-w-7xl mx-auto sm:mx-28" enctype="multipart/form-data">
        @csrf
        <div class="mb-5">
            <label for="companyName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company Name</label>
            <input value="{{$job->companyName}}" type="text" name="companyName" id="companyName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Company Photo</label>
            <input name="companyPhoto" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
            <div id="imagePreview" class="mt-2">
                @if($job->companyPhoto)
                    {{-- {{dd($job->companyPhoto)}} --}}
                    <img src="{{ asset('storage/photos/' . $job->companyPhoto) }}" alt="Company Photo" class="max-w-[30%] mt-5 rounded h-auto">
                @else
                    <p>No company photo available</p>
                @endif
            </div>
        </div>
        <div class="mb-5">
            <label for="posisi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Posisi</label>
            <input value="{{$job->posisi}}" type="text" name="posisi" id="posisi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="mb-5">
            <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type Job</label>
            <select name="type" id="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="Full-Time" {{ $job->type === 'Full-Time' ? 'selected' : '' }}>Full-Time</option>
                <option value="Part-Time" {{ $job->type === 'Part-Time' ? 'selected' : '' }}>Part-Time</option>
                <option value="Remote" {{ $job->type === 'Remote' ? 'selected' : '' }}>Remote</option>
                <option value="Shift Work" {{ $job->type === 'Shift Work' ? 'selected' : '' }}>Shift Work</option>
            </select>
        </div>
        <div class="mb-5">
            <label for="kota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota</label>
            <input value="{{$job->lokasi}}" type="text" name="kota" id="kota" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input value="{{$job->email}}" type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="mb-5">
            <label for="noTelp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Telp</label>
            <input value="{{$job->noTelp}}" type="number" name="noTelp" id="noTelp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="mb-5">
            <label for="jobDesc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job Desc</label>
            <textarea name="jobDesc" id="jobDesc" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>{{$job->jobDesc}}</textarea>
        </div>
        <div class="mb-5">
            <label for="gaji" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gaji</label>
            <input value="{{$job->gaji}}" type="number" name="gaji" id="gaji" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <a href="{{route('penyediaHomepage')}}" class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Back</a>
        <button type="submit" class="text-white mb-7 bg-cyan-500 hover:bg-cyan-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
    @endforeach
</div>
<footer class="w-full p-4 bg-blue-100 border-t border-gray-200 shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800 dark:border-gray-600">
    <span class="text-md text-cyan-800 sm:mx-auto sm:text-center dark:text-gray-400">© 2023 Mokerja™. All Rights Reserved.
    </span>
  </footer>
</body>
</html>