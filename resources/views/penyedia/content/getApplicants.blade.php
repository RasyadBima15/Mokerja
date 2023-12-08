<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>List of Applicants</title>
</head>
<body>
    <nav class="fixed top-0 left-0 w-full bg-blue-100 border-gray-200 dark:bg-gray-900 z-50">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <h1 class="text-[20px] sm:text-3xl sm:ml-2 md:ml-20 flex items-center">
                <span class="select-none font-extrabold bg-gradient-to-r from-cyan-500 to-blue-500 text-transparent bg-clip-text">Mokerja <i class="fa-solid fa-briefcase"></i></span>
            </h1>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <div class="flex flex-row gap-2">
                    <a href="{{route('penyediaHomepage')}}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Back
                    </a>
                    <button data-modal-target="small-modal" data-modal-toggle="small-modal" type="button" id="logout" class="text-white w-18 h-9 bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-4 py-2 text-center">Logout</button>
                </div>
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
                                <a href="{{route('penyediaLogout')}}" data-modal-hide="small-modal" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Logout</a>
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
            <h1 class="bg-gradient-to-r from-cyan-500 to-blue-500 bg-clip-text text-transparent text-2xl font-semibold py-2 px-3 md:p-0 rounded dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">List of Applicants</h1>
        </div>
  </nav>
  @if (session('success'))
    <div class="flex justify-center items-center mb-5">
        <div id="toast-success" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{session('success')}}</div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    </div>
    @endif
    @if (session('error'))
    <div class="flex justify-center items-center mb-5">
        <div id="toast-success" class="flex items-center w-full max-w-xs p-4 mb-4 text-red-500 bg-white rounded-lg shadow dark:text-red-400 dark:bg-red-800" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{session('error')}}</div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    </div>
    @endif
    @if ($job_pelamars->count() > 0)
    <div class="ml-10 mt-24 flex flex-wrap justify-start">
        @foreach ($job_pelamars as $job_pelamar)
        <div class="w-full max-w-xs bg-gradient-to-r from-blue-100 to-gray-100 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            @foreach ($profiles as $profile)
            <div class="flex flex-col items-center pb-10 mt-10">
                <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{asset('storage/photos/'.$profile->fotoProfil)}}" alt="Bonnie image"/>
                <h5 class="mb-1 text-xl font-medium text-black-900 dark:text-white">{{$profile->nama}}</h5>
                <span class="text-sm font-semibold text-black dark:text-gray-400">{{$profile->Specialist}}</span>
                <div class="flex mt-4 md:mt-6">
                    <form action="{{route('deleteApplicants', ['id'=>$job_pelamar->id])}}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?')">
                        @csrf
                        <a href="{{route('getDetailApplicants', ['profileId'=>$profile->id, 'job_pelamarId'=>$job_pelamar->id])}}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get Detail <i class="pl-2 fa-solid fa-arrow-up-right-from-square"></i></a>
                        <button href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-red-600 border border-red-600 rounded-lg hover:bg-red-700 dark:bg-red-800 dark:text-red dark:border-red-600 dark:hover:bg-red-700 dark:hover:border-red-700 dark:focus:ring-red-700 ms-3">Delete <i class="pl-2 fa-solid fa-trash"></i></button>
                    </form>     
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
    @else
        <div class="ml-10 mt-24 flex flex-wrap justify-center">
            <p class="font-bold mt-56 text-2xl bg-gradient-to-r from-cyan-500 to-blue-500 text-transparent bg-clip-text">Belum ada Applicant yang melamar job ini.</p>
        </div>
    @endif
</body>
</html>