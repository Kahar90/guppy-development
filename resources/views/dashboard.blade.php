<x-app-layout>
    <!-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> -->


    <div class="min-h-screen bg-base-300 dark:text-black">
        <div class="max-h-screen overflow-y-auto mb-20">
            @if(Auth::user()->role == 'admin')

            <div id="admin_dashboard" class="mt-20">

                <div id="info_cards" class="flex flex-row gap-5 justify-center items-center w-4/5 m-auto">
                    <div class="card w-96 bg-base-100 shadow-xl">
                        <div class="card-body">
                            <h2 class="card-title">Total bookings: {{ $bookings_count }}</h2>
                            <p>
                                <span class="badge badge-primary">Bookings</span>
                            </p>

                        </div>
                    </div>

                    <div class="card w-96 bg-base-100 shadow-xl">
                        <div class="card-body">
                            <h2 class="card-title">Total complaints: {{ $complaints_count }}</h2>
                            <p>
                                <span class="badge badge-primary">Complaints</span>
                            </p>

                        </div>
                    </div>

                    <div class="card w-96 bg-base-100 shadow-xl">
                        <div class="card-body">
                            <h2 class="card-title">Total facilities bookable: {{ $items_count }}</h2>
                            <p>
                                <span class="badge badge-primary">Items bookable</span>
                            </p>

                        </div>
                    </div>

                    <div class="card w-96 bg-base-100 shadow-xl">
                        <div class="card-body">
                            <h2 class="card-title">Total users: {{ $users_count }}</h2>
                            <p>
                                <span class="badge badge-primary">Users</span>
                            </p>

                        </div>
                    </div>
                </div>

                <div id="table_latest_bookings" class="overflow-x-auto flex justify-center mt-10">
                    <div class="flex flex-col gap-5 w-4/5">
                        <h1 class="text-xl">Latest Bookings
                            <p class="text-sm">
                                Limited to 6 entries
                            </p>
                        </h1>
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

                <div id="grid_complaints_wrapper" class="overflow-x-auto flex justify-center items-center mt-10">
                    <div id="grid_complaints_cards" class="flex flex-col gap-5 w-4/5">
                        <h1 class="text-xl">Latest Complaints
                            <p class="text-sm">
                                Limited to 6 entries
                            </p>
                        </h1>
                        <div class="grid grid-cols-4 gap-20 w-full place-items-center ml-4">

                            @foreach($complaints as $complaint)
                            <div class="card w-96 bg-base-100 shadow-xl">
                                <div class="card-body">
                                    <h2 class="card-title">{{$complaint->name}}</h2>
                                    <p class="card-subtitle text-gray-500">{{$complaint->house_no_block}}</p>
                                    <p class="card-text">{{$complaint->complaint_text}}</p>
                                    <div class="card-actions">


                                        <form action="/dashboard/confirmcomplaint" method="POST" id="{{$complaint->id}}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$complaint->id}}">

                                            <button type="submit" form="{{$complaint->id}}" class="btn btn-primary">Confirm</button>

                                        </form>
                                    </div>

                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


            @else
            <div id="user_dashboard">

                <div id="info_cards" class="flex flex-row gap-5 justify-center items-center w-4/5 m-auto">
                    <div class="card w-96 bg-base-100 shadow-xl">
                        <div class="card-body">
                            <h2 class="card-title">Total bookings: {{ $bookings_count }}</h2>
                            <p>
                                <span class="badge badge-primary">Bookings</span>
                            </p>

                        </div>
                    </div>

                    <div class="card w-96 bg-base-100 shadow-xl">
                        <div class="card-body">
                            <h2 class="card-title">Total complaints: {{ $complaints_count }}</h2>
                            <p>
                                <span class="badge badge-primary">Complaints</span>
                            </p>

                        </div>
                    </div>

                    <div class="card w-96 bg-base-100 shadow-xl">
                        <div class="card-body">
                            <h2 class="card-title">Total facilities bookable: {{ $items_count }}</h2>
                            <p>
                                <span class="badge badge-primary">Items bookable</span>
                            </p>

                        </div>
                    </div>


                </div>

                <div id="table_latest_bookings" class="overflow-x-auto flex justify-center mt-10">
                    <div class="flex flex-col gap-5 w-4/5">
                        <h1 class="text-xl">Your Latest Bookings</h1>
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

                <div id="grid_complaints_wrapper" class="overflow-x-auto flex justify-center items-center mt-10">
                    <div id="grid_complaints_cards" class="flex flex-col gap-5 w-4/5">
                        <h1 class="text-xl">Your Latest Complaints</h1>
                        <div class="grid grid-cols-4 gap-20 w-full place-items-center ml-4">

                            @foreach($complaints as $complaint)
                            <div class="card w-96 bg-base-100 shadow-xl">
                                <div class="card-body">
                                    <h2 class="card-title">{{$complaint->name}}</h2>
                                    <p class="card-subtitle text-gray-500">{{$complaint->house_no_block}}</p>
                                    <p class="card-text">{{$complaint->complaint_text}}</p>
                                    <div class="card-actions">
                                        <form action="/dashboard/confirmcomplaint" method="POST" id="{{$complaint->id}}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$complaint->id}}">

                                            <button type="submit" form="{{$complaint->id}}" class="btn btn-primary">Confirm</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            @endif

</x-app-layout>