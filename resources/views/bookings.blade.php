<x-app-layout>

    <head>
        <title>Bookings</title>


    </head>

    <body class>
        <div class="min-h-screen">

            @if(Auth::user()->role == 'admin')
            <div id="complaints_show" class="overflow-auto m-auto justify-center p-20 grid grid-cols-4 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($bookings as $booking)
                <div class="card w-96 bg-neutral text-neutral-content mb-10 ">
                    <div class="card-body items-center text-center">
                        <h2 class="card-title">
                            {{ $booking->name }} booked <span class="text-green-500">{{ $booking->booked_item }} </span>

                        </h2>
                        <p>
                            {{ $booking->house_no_block }}
                        </p>

                        <p>
                            {{ $booking->phone }}
                        </p>

                        <p>
                            {{ $booking->booking_date }}
                        </p>

                        <p>
                            {{ $booking->time }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="
        flex flex-col items-center mt-4 min-h-screen overflow-auto">
                <h1 class="text-4xl text-center font-bold text-gray-800">Book a facility</h1>
                <div id="item_available_list ">
                    <h2 class=" text-2xl text-center font-bold text-gray-800 mb-10">Available Items</h2>
                    <div class="grid grid-rows-2 grid-flow-col gap-4">
                        @foreach ($items as $item)
                        <div class="card w-96 bg-base-100 shadow-xl">
                            <figure class="w-full h-64 bg-gray-100 rounded-t-md"><img src="{{ $item->picture_link }}" alt="Shoes" /></figure>
                            <div class="card-body">
                                <h2 class="card-title">
                                    {{ $item->item_name }}
                                </h2>
                                <p>Book now!</p>
                                <div class="card-actions justify-end">
                                    <button onclick="window.location.href='/addbooking?item_name={{ $item->item_name }}&item_picture={{ $item->picture_link }}'" class="btn btn-primary">Book Now</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

        </div>

    </body>

</x-app-layout>
