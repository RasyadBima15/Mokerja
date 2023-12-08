@extends('pelamar.homepage')

@section('content')
    <div class="flex flex-row justify-center mt-5">
        <form action="{{route('search')}}" method="POST" class="mt-2 sm:w-[80%] md:w-[50%] w-[90%]">   
        @csrf
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" name="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Jobs..." required>
            <div class="absolute end-2.5 bottom-2.5">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                <a href="{{route('pelamarHomepage')}}" class="text-white bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-sm ml-1 my-4 px-4 py-2 dark:bg-cyan-600 dark:hover:bg-cyan-700 dark:focus:ring-cyan-800">Show All</a>
            </div>     
        </div>
        </form>
    </div>
    @if($jobs->isEmpty() && auth()->check())
        <div class="mt-36 flex justify-center">
            <p class="font-bold text-lg bg-gradient-to-r from-cyan-500 to-blue-500 text-transparent bg-clip-text">Tidak ada hasil pekerjaan yang sesuai dengan pencarian Anda.</p>
        </div>
    @else
    <div class="mt-10 flex w-full flex-wrap justify-stretch gap-3 sm:pl-36 pl-2">
        @foreach ($jobs as $job)
            <div class="w-[350px] ml-5 mr-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <img class="rounded-t-lg w-full h-[226px]" src="{{asset('storage/photos/'. $job->companyPhoto)}}" alt="" />
                <div class="p-7 pt-3 pr-0">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$job->posisi}}</h5>
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">{{$job->companyName}}</span>
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">{{$job->lokasi}}</span>
                    <p><i class="fa-solid fa-suitcase ml-1 mt-5 mr-3 mb-3"></i>{{$job->type}}</p>
                    <p>
                        <i class="fa-solid fa-money-bill ml-1 mr-1 mb-3"></i>
                        Rp.{{ number_format($job->gaji, 0, ',', '.') }}
                    </p>
                    <div class="flex flex-wrap sm:flex-row">
                        <a href="{{route('getDetailJobtoPelamar', ['id'=>$job->id])}}" class="sm:mt-2 mt-2 mb-3 mr-3 inline-flex sm:w-[35%] w-[120px] items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-400 rounded-lg hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                            Get Detail
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>    
                </div>
            </div>
        @endforeach
    </div>
    @endif
@endsection