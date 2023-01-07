<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="hero min-h-screen bg-base-300">
        {{-- <div class="hero-content text-center"> --}}
        {{-- <div class="max-w-md">
                <h1 class="text-5xl font-bold mb-5">Welcome! {{ Auth::user()->name }}</h1>

        <div class="flex flex-row gap-5 
                justify-center items-start mt-5">
            <a class="btn btn-primary" href="/complaints">Make a Complaint</a>

            <a class="btn btn-primary" href="/booking">Make a Booking</a>
            @if (Auth::user()->role == 'admin')
            <a class="btn btn-primary" href="/additem">Add Items</a>
            @endif
        </div>
    </div> --}}


    <div class="
   max-h-screen overflow-y-auto
    mb-20
    ">



        @if(Auth::user()->role == 'admin')
        <h1 class="text-5xl font-bold mb-5 text-blue-800 ">Welcome! Admin, {{ Auth::user()->name }}</h1>
        {{-- <a class="btn btn-primary" href="/additem">Add Items</a>
        <a class="btn btn-primary" href="/complaints">Make a Complaint</a>
        <a class="btn btn-primary" href="/booking">Make a Booking</a> --}}

        @else

        <div class="
       grid grid-cols-2 gap-4 ">
            <div>
                <h1 class="text-3xl font-bold mb-5">Your past complaints </h1>
                @foreach($complaints as $complaint )
                <div class="card w-96 bg-base-100 shadow-xl mb-5">
                    <div class="card-body ">
                        <h2 class="card-title
                        text-2xl font-bold">{{$complaint->name}}</h2>
                        <p class="card-subtitle text-gray-500">{{$complaint->house_no_block}}</p>
                        <p class="card-text">{{$complaint->complaint_text}}</p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="pb-50">
                <h1 class="text-3xl font-bold mb-5">Your past bookings </h1>
                @foreach($bookings as $booking)
                <div class="card w-96 bg-base-100 shadow-xl mb-5">
                    <div class="card-body">
                        <h2 class="card-title
                text-2xl font-bold">{{$booking->name}}</h2>
                        <p class="card-subtitle text-gray-500">{{$booking->house_no_block}}</p>
                        <p class="card-text">{{$booking->booked_item}}</p>
                        <p class="card-text">{{$booking->booking_date}}</p>
                        <p class="card-text">{{$booking->time}}</p>
                    </div>

                </div>
                @endforeach
            </div>

        </div>


        @endif





    </div>


</x-app-layout>
