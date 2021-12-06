@extends('layouts.app')
@section('content')
    <div class="wrapper">
        @include('booking.sidebar')
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 70px;" >
                <div class="flex gap-6">
                    <button type="button" id="sidebarCollapse" class="cursor-pointer rounded-md">
                        <i class="fas fa-angle-double-left text-2xl font-normal text-gray-400"></i>
                    </button>
{{--                     <div class="relative flex w-full flex-wrap items-stretch">
                        <span
                          class="z-10 h-full leading-snug font-normal absolutetext-center text-gray-400 absolute bg-transparent rounded items-center justify-center pl-3 py-2">
                          <i class="fas fa-search"></i>
                        </span>
                        <input type="search" id="search" name="search" class="form-input placeholder-gray-400 w-72 pl-10" placeholder="Tìm kiếm..."
                                style="font-family: 'Font Awesome 5 Free', 'system-ui'; border: 1px solid #4f4f4f" >
                    </div>
                </div> --}}
            </nav>


            <div class="antialiased sans-serif bg-gray-100">
                <div class="m-auto w-full">
                    <div class="bg-white rounded-lg shadow overflow-hidden">

                        <div class="flex items-center justify-between py-2 px-6">
                            <div>
                                <span id="month-label" class="text-lg font-bold text-gray-800"></span>
                                <span id="year-label" class="ml-1 text-lg text-gray-600 font-normal"></span>
                            </div>
                            <div class="border rounded-lg px-1" style="padding-top: 2px;">
                                <button type="button"
                                    id="prev-month"
                                    class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 items-center">
                                    <svg class="h-6 w-6 text-gray-500 inline-flex leading-none" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                                <div class="border-r inline-flex h-6"></div>
                                <button type="button"
                                    id="next-month"
                                    class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex items-center cursor-pointer hover:bg-gray-200 p-1">
                                    <svg class="h-6 w-6 text-gray-500 inline-flex leading-none" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="-mx-1 -mb-1">
                            <div id="days-bar" class="flex flex-wrap" style="margin-bottom: -40px;">
                            </div>

                            <div id="day-list" class="flex flex-wrap border-t border-l">

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div id='calendar-modal' style=" background-color: rgba(0, 0, 0, 0.8); display: none" class="fixed z-40 top-0 right-0 left-0 bottom-0 h-full w-full">
                    <div class="p-4 max-w-xl mx-auto relative absolute left-0 right-0 overflow-hidden mt-24">
                        <div class="shadow absolute right-0 top-0 w-10 h-10 rounded-full bg-white text-gray-500 hover:text-gray-800 inline-flex items-center justify-center cursor-pointer"
                            onclick="calendarModal.style.display = 'none'">
                            <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M16.192 6.344L11.949 10.586 7.707 6.344 6.293 7.758 10.535 12 6.293 16.242 7.707 17.656 11.949 13.414 16.192 17.656 17.606 16.242 13.364 12 17.606 7.758z" />
                            </svg>
                        </div>

                        <div class="shadow w-full rounded-lg bg-white overflow-hidden w-full block p-8">

                            <h2 class="font-bold text-2xl mb-6 text-gray-800 border-b pb-2">Event Details</h2>

                            <div class="mt-8 text-right">
                                <button type="button"
                                    class="bg-white hover:bg-gray-100 text-gray-700 font-semibold py-2 px-4 border border-gray-300 rounded-lg shadow-sm mr-2"
                                    onclick="calendarModal.style.display = 'none'">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Modal -->
            </div>
        </div>
    </div>
    <script src="{{asset('js/calendar.js')}}"></script>
@endsection
