@extends('pelamar.homepage')

@section('content')
    @if (session('success'))
        <div class="flex justify-center items-center">
            <div id="toast-success" class="flex items-center w-full max-w-xs mt-8 p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
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
        <div class="flex justify-center items-center">
            <div id="toast-success" class="flex items-center w-full max-w-xs mt-8 p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                    </svg>
                    <span class="sr-only">Error icon</span>
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
    <div class="mt-9 w-full">
        @foreach ($jobs as $job)
        <div class="flex justify-center">
            <div class="max-w-[50%] bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <img class="rounded-t-lg w-full max-h-[400px]" src="{{asset('storage/photos/'. $job->companyPhoto)}}" alt="" />
                <div class="p-10">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$job->posisi}}</h5>
                    <p><i class="fa-regular fa-building mr-3 mb-3"></i> {{$job->companyName}}</p>
                    <p><i class="fa-solid fa-location-dot mr-3 mb-3"></i> {{$job->lokasi}}</p>
                    <p><i class="fa-solid fa-suitcase mr-3 mb-3"></i>{{$job->type}}</p>
                    <p>
                        <i class="fa-solid fa-money-bill mr-3 mb-3"></i>
                        Rp.{{ number_format($job->gaji, 0, ',', '.') }}
                    </p>
                    <p class="mb-3 mt-5 font-normal text-justify text-gray-700 dark:text-gray-400">{!! nl2br(e($job->jobDesc)) !!}</p>
            
                    <h5 class="mb-2 mt-5 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Contact</h5>
                    <p><i class="fa-solid fa-envelope mr-3 mb-2"></i>{{$job->email}}</p>
                    <p><i class="fa-solid fa-phone mr-3 mb-2"></i>{{$job->noTelp}}</p>
                    <a href="{{route('pelamarHomepage')}}" class="inline-flex mt-5 items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Back
                    </a>
                    <a data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="sm:mt-2 ml-2 mt-2 mb-3 mr-3 inline-flex sm:w-[12%] w-[120px] items-center px-3 text-sm py-2 font-medium text-center text-white bg-green-500 rounded-lg hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Apply
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25" />
                        </svg>                          
                    </a>
                    @if ($profiles->count()>0)
                        <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-start p-4 md:p-5 border-b-4 rounded-t dark:border-gray-600">
                                        <div class="flex flex-col items-start">
                                            <h3 class="text-lg mb-1 font-semibold text-gray-900 dark:text-white">
                                                Upload CV
                                            </h3>
                                            <p class="text-gray-500">Sebelum apply, Upload CV Terlebih dahulu!</p>
                                        </div>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <form action="{{route('apply', ['id'=>$job->id])}}" enctype="multipart/form-data" method="POST" class="p-4 md:p-5">
                                        @csrf
                                        <div class="relative z-0 w-full mb-5 group">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Curriculum Vitae</label>
                                            <input name="cv" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" required>
                                            <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Please upload PDF file.</div> 
                                        </div>
                                        <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Send CV <i class="ml-3 fa-solid fa-paper-plane"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>  
                    @else
                        <div id="crud-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5 space-y-4">
                                        <p class="text-base font-semibold leading-4 text-black dark:text-gray-400">
                                            Tampaknya anda belum mengisi Identity Form
                                        </p>
                                        <p class="text-base font-semibold leading-4 text-black dark:text-gray-400">
                                            Mohon mengisi Identity Form terlebih dahulu!
                                        </p>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                    <form action="{{route('pelamarDashboard', ['id', Auth::user()->id])}}" method="GET">
                                        @csrf
                                        <button type="submit" data-modal-hide="small-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Isi Form <i class="fa-solid fa-arrow-up-right-from-square"></i></button>
                                    </form>
                                    <button data-modal-hide="crud-modal" type="button" class="ms-3 text-white-500 bg-blue hover:bg-white-100 focus:ring-4 focus:outline-none focus:ring-white-200 rounded-lg border border-white-200 text-sm font-medium px-5 py-2.5 hover:text-white-900 focus:z-10 dark:bg-white-700 dark:text-white-300 dark:border-white-500 dark:hover:text-blue dark:hover:bg-white-600 dark:focus:ring-white-600">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <footer class="w-full mt-5 p-4 bg-blue-100 border-t border-gray-200 shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800 dark:border-gray-600">
        <span class="text-md text-cyan-800 sm:mx-auto sm:text-center dark:text-gray-400">© 2023 Mokerja™. All Rights Reserved.
        </span>
    </footer>
@endsection