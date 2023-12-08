<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Forgot Password</title>
</head>
<body>
    <div class="mt-48 flex justify-center items-center">
        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h1 class="text-3xl flex items-center">
                <span class="select-none font-extrabold bg-gradient-to-r from-cyan-500 to-blue-500 text-transparent bg-clip-text h-14">Mokerja <i class="fa-solid fa-briefcase"></i></span>
            </h1>
            <h5 class="mb-3 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Lupa Password?</h5>
            <p class="mb-5 font-normal text-gray-500 dark:text-gray-400">Silahkan Hubungi Admin di bawah ini 👇</p>
            <a href="{{route('login')}}" class="text-white mr-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Back</a>
            <a href="https://wa.me/+628871293167" class="inline-flex items-center text-blue-600 hover:underline">
                Contact Admin
                <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
                </svg>
            </a>
        </div>
    </div>
</body>
</html>