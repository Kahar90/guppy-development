<x-app-layout>

    <head>
        <title>Bookings</title>


    </head>

    <body class>
        <div class="min-h-screen">

            @if(Auth::user()->role == 'admin')
            @if (count($bookings) > 0)
            <div id="table_latest_bookings" class="overflow-x-auto flex justify-center mt-10">
                <div class="flex flex-col gap-5 w-4/5">
                    <h1 class="text-xl">Latest Bookings </h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="border">Name</th>
                                <th class="border">Phone</th>
                                <th class="border">Facility</th>
                                <th class="border">Date</th>
                                <th class="border">Time</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                            <tr>
                                <td class="border">{{$booking->name}}</td>
                                <td class="border">{{$booking->phone}}</td>
                                <td class="border">{{$booking->booked_item}}</td>
                                <td class="border">{{$booking->booking_date}}</td>
                                <td class="border">{{$booking->time}}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif



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