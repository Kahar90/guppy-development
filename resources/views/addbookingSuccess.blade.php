<x-app-layout>



    {{-- --}}

    <script>
        // use qrserverapi to generate qr code

        var qr_image = document.getElementById("qr_image");
        var qr_code = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=Hello%20World";
        qr_image.innerHTML = "<img src='" + qr_code + "'/>";
        console.log(qr_image);

    </script>


    {{-- <script>
        alert("tes")

    </script> --}}


    <body>
        <div class="hero min-h-screen bg-base-200">
            <div class="hero-content flex-col lg:flex-row">



                <div id="qr_image">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{$generateQRemail}}" />
                </div>
                <div>
                    <h1 class="text-5xl font-bold">Booking Successful!</h1>
                    <p class="py-6">Here's a QR code that you can use to confirm your booking with a member of our staff. Please keep it a secret.</p>
                    <a href="/dashboard" class="btn btn-primary">Back to dashboard</a>
                </div>
            </div>
        </div>

    </body>

</x-app-layout>
