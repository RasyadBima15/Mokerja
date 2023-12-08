<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Admin Login Page</title>
</head>
<body>
    <div class="flex flex-col items-center">
        <h1 class="mt-32 text-5xl flex items-center">
            <span class="select-none mr-3 font-extrabold bg-gradient-to-r from-cyan-500 to-blue-500 text-transparent bg-clip-text ml-2 h-14">Mokerja <i class="fa-solid fa-briefcase"></i></span>
        </h1>
        @if(session()->has('loginError'))   
            <div id="toast-danger" class="flex items-center w-full max-w-xs p-4 mt-5 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                    </svg>
                    <span class="sr-only">Error icon</span>
                </div>
                <div class="ms-3 text-sm font-normal text-black">{{session('loginError')}}</div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        @endif
        <div class="w-full max-w-sm p-4 mb-32 @if(session()->has('loginError')) mt-6 @else mt-5 @endif bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 mx-auto">
            <form class="space-y-6" action="{{route('authenticate')}}" method="POST" autocomplete="off">
                @csrf
                <h5 class="text-xl font-medium text-gray-900">Login sebagai Admin</h5>
                <div>
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                    <input type="text" name="username" id="username" value="" class="bg-gray-50 border border-gray-300text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-500 dark:placeholder-gray-400 dark:text-black" placeholder="Username" autofocus required>
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                    <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-500 dark:placeholder-gray-400 dark:text-black" placeholder="Password" required>
                </div>
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var closeButton = document.querySelector('#toast-danger button[data-dismiss-target="#toast-danger"]');
    
            closeButton.addEventListener('click', function () {
                // Remove the login error toast
                var toastDanger = document.getElementById('toast-danger');
                toastDanger.parentNode.removeChild(toastDanger);
    
                // Apply the correct margin-top
                var formContainer = document.querySelector('.mb-32');
                formContainer.classList.remove('mt-5');
                formContainer.classList.add('mt-36');
            });
        });
    </script>  
</body>
</html>