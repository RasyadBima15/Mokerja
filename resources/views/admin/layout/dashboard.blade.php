<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Admin Dashboard</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main {
            text-align: center;
        }

        table {
            /* margin: 20px auto; Membuat margin atas dan bawah 20px, dan auto untuk menengahkan secara horizontal */
        }
        @media (max-width: 767px) {
            p#admin {
                display: none;
            }
            #content{
                font-size: 1.25rem;
            }
        }
        @media (max-width: 300px) {
            p.iniText span{
                font-size: 1.25rem;
            }
            #logout{
                font-size: 0.8rem;
            }
            #cta{
                margin: 0
            }
            #content{
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <nav class="fixed top-0 left-0 w-full bg-black border-gray-200 dark:bg-gray-900 z-50">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <p href="https://flowbite.com/" id="admin" class="iniText flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white text-white">Admin Dashboard Mokerja <i class="fa-solid fa-briefcase"></i></span>
            </p>
            <p href="https://flowbite.com/" class="iniText flex items-center space-x-3 rtl:space-x-reverse md:hidden">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white text-white">Mokerja <i class="fa-solid fa-briefcase"></i></span>
            </p>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button data-modal-target="small-modal" data-modal-toggle="small-modal" type="button" id="logout" class="text-white bg-red-600 hover:bg-red-800 font-medium rounded-lg text-sm px-4 py-2 text-center">Logout</button>
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
                                <a href="{{route('logout')}}" data-modal-hide="small-modal" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Logout</a>
                                <button data-modal-hide="small-modal" type="button" class="ms-3 text-white-500 bg-blue hover:bg-white-100 focus:ring-4 focus:outline-none focus:ring-white-200 rounded-lg border border-white-200 text-sm font-medium px-5 py-2.5 hover:text-white-900 focus:z-10 dark:bg-white-700 dark:text-white-300 dark:border-white-500 dark:hover:text-blue dark:hover:bg-white-600 dark:focus:ring-white-600">Kembali</button>
                            </div>
                        </div>
                    </div>
                </div>
                <button data-collapse-toggle="navbar-cta" id="cta" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden focus:outline-none dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-cta" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-black dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="{{route('adminDashboard')}}" class="block py-2 px-3 md:p-0 text-white rounded hover:bg-blue-500 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Home</a>
                    </li>
                    <li>
                        <a href="{{route('adminDashboardPenyedia')}}" class="block py-2 px-3 md:p-0 text-white rounded hover:bg-blue-500 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Penyedia</a>
                    </li>
                    <li>
                        <a href="{{route('adminDashboardPelamar')}}" class="block py-2 px-3 md:p-0 text-white  rounded hover:bg-blue-500 md:hover:bg-transparent md:hover:text-blue-700 d:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Pelamar</a>
                    </li>
                </ul>
            </div>
        </div>
  </nav>

    <main class="flex flex-col mt-16">
        @yield('content')
    </main>

<footer class="fixed bottom-0 left-0 z-20 w-full p-4 bg-black border-t border-gray-200 shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800 dark:border-gray-600">
    <span class="text-sm text-white sm:mx-auto sm:text-center dark:text-gray-400">© 2023 Mokerja™. All Rights Reserved.
    </span>
</footer>

</body>
</html>

{{-- @if(auth()->check())
    <p>Hello World</p>
@else
    <p>test</p>
@endif
@dd(auth()->user()) --}}