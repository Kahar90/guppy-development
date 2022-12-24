<html>

<head>
    <title>Bookings</title>

    <!-- tailwind -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <!-- <div>
        <h1 class="text-4xl text-center font-bold text-gray-800">Bookings</h1>
        <table class="table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Date</th>
                    <th class="px-4 py-2">Item Booked</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                <tr>
                    <td class="border px-4 py-2">{{ $booking->name }}</td>
                    <td class="border px-4 py-2">{{ $booking->date }}</td>
                    <td class="border px-4 py-2">{{ $booking->booked_item }}</td>
                </tr>
                @endforeach
            </tbody>
    </div> -->


    <div class="
        flex flex-col items-center justify-center mt-4
    ">
        <h1 class="
            text-4xl text-center font-bold text-gray-800
        ">Book a facility</h1>

        <div id="item_available_list">
            <h2 class="
                text-2xl text-center font-bold text-gray-800
            ">Available Items</h2>
            <ul>
                @foreach ($items as $item)
                <li class="
                    flex flex-col items-center justify-center mt-4 text-3xl
                ">
                    <img src="{{ $item->picture_link }}" alt="item picture" width="200" height="200">

                    {{ $item->item_name }}

                </li>


                @endforeach
            </ul>
        </div>
    </div>

</body>

</html>