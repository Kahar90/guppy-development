<x-app-layout>

    <head>
        <!-- <script type="text/javascript" src="/assets/js/instascan.min.js"></script> -->
        <script type="text/javascript" src="/assets/js/html5-qrcode.min.js"></script>
    </head>

    <div id="qr_confirm" class="min-h-screen ">

        <div class="flex flex-col justify-center items-center">


            @if (!$doneStatus )
            <div id="qr_stuffs" class="flex flex-col justify-center items-center">
                <script>
                    function initQR() {
                        var resultContainer = document.getElementById('qr-reader-results');
                        var lastResult, countResults = 0;

                        function onScanSuccess(decodedText, decodedResult) {
                            // alert(decodedText);
                            if (decodedText !== lastResult) {
                                ++countResults;
                                lastResult = decodedText;
                                // Handle on success condition with the decoded message.
                                console.log(`Scan result ${decodedText}`, decodedResult);
                                // change qr-reader-results
                                resultContainer.innerHTML = `<div class="text-xl">Scan result ${decodedText}</div>`;
                                // change user_id
                                document.getElementById('user_id').value = decodedText;
                            }
                        }

                        var html5QrcodeScanner = new Html5QrcodeScanner(
                            "qr-reader", {
                                fps: 10,
                                qrbox: 250
                            });
                        html5QrcodeScanner.render(onScanSuccess);
                    }
                    window.addEventListener('load', initQR);
                </script>

                <h1 class="text-xl mt-5 mb-5">Scan the user's QR code</h1>
                <div id="qr-reader" style="width:500px"></div>
                <div id="qr-reader-results" class="m-auto"></div>

                <form action="/qrconfirmbooking" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id" value="">
                    <button type="submit" class="btn btn-primary m-auto mt-10">Search</button>
                </form>

            </div>
            @endif

            @if ($doneStatus )
            <div id="user_bookings" class="w-full">
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
                                    <th class="border">Action</th>
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
                                    <td class="border">
                                        <form action="/booking/confirm" method="POST">
                                            @csrf
                                            <input type="hidden" name="booking_id" value="{{$booking->id}}">
                                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Confirm</button>
                                        </form>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @endif
        </div>


    </div>
</x-app-layout>