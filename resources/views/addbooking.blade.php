<x-app-layout>


    <body>

        <div class="min-h-screen flex flex-row 
        max-w-4xl mx-auto sm:px-6 lg:px-8
        items-start justify-evenly mt-10
        ">
            <div id="form">
                <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
                    <div class="card-body">
                        <form action="/addbooking" method="POST">
                            @csrf
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text 
                                text-gray-600">Name</span>

                                </label>
                                <input required="true" type="text" name="name" id="name" placeholder="Name" class="input input-bordered">
                            </div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text
                                        text-gray-600">House Number/Block</span>
                                </label>
                                <input required="true" type="text" name="house_no_block" id="house_no" placeholder="House Number/Block" class="input input-bordered">
                            </div>

                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text
                                        text-gray-600">Phone Number</span>
                                </label>
                                <input required="true" type="text" name="phone" id="house_no" placeholder="Phone number" class="input input-bordered">
                            </div>

                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text
                                        text-gray-600">Booking Date</span>
                                </label>
                                <input required="true" type="date" name="booking_date" id="booking_date" placeholder="Booking Date" class="input input-bordered">
                            </div>

                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text
                                        text-gray-600">Booking Time</span>
                                </label>
                                <input required="true" type="time" name="time" id="time" placeholder="Booking Time" class="input input-bordered">
                            </div>



                            <div class="form-control">
                                {{-- hidden input for user id --}}
                                <input type="hidden" name="user_id" value="{{ Auth::user()->email }}">
                                {{-- hidden input for item name --}}
                                <input type="hidden" name="booked_item" value="
                                
                                <?php 

                                try {
                                    echo $_GET['item_name'];
                                } catch (\Throwable $th) {
                                    echo "";
                                }
                                
                                ?>">
                            </div>

                            <div class="form-control mt-6">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="card flex-shrink-0 w-full max-w-sm shadow-xl bg-base-100">

                <div class="
                    card-body
                ">
                    <h1 class="
                        text-4xl text-center font-bold text-gray-800
                    ">
                        <?php 
                            try {
                                echo "You are booking:  " . $_GET['item_name'];
                            } catch (\Throwable $th) {
                                echo "";
                            }
                    ?>
                    </h1>
                    <figure class="w-full h-64 bg-gray-100 rounded-t-md"><img src="<?php echo $_GET['item_picture']; ?>" alt="Shoes" class="w-full h-full object-cover" /></figure>

    </body>


</x-app-layout>
