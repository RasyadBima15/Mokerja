<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Homepage</title>
</head>
<body class="bg-white">
    <nav class="fixed top-0 left-0 w-full bg-blue-100 border-gray-200 dark:bg-gray-900 z-50">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <h1 class="text-[20px] sm:text-3xl sm:ml-2 md:ml-20 flex items-center">
                <span class="select-none font-extrabold bg-gradient-to-r from-cyan-500 to-blue-500 text-transparent bg-clip-text">Mokerja <i class="fa-solid fa-briefcase"></i></span>
            </h1>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button data-modal-target="small-modal" data-modal-toggle="small-modal" type="button" id="logout" class="text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-4 py-2 text-center">Logout</button>
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
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                <ul class="flex flex-col font-medium text-xl p-4 md:p-0 mt-4 border border-blue-500 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="{{route('penyediaHomepage')}}" id="list-jobs" class="block text-blue-500 py-2 px-3 md:p-0 rounded dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">List Jobs</a>
                    </li>
                    <li>
                        <a href="{{route('viewCreate')}}" id="create-jobs" class="block py-2 px-3 md:p-0 text-blue-500 rounded dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Create Job</a>
                    </li>
                </ul>
            </div>
        </div>
  </nav>
  <div class="mt-24 w-full">
    @yield('content')
  </div>
</body>
</html>