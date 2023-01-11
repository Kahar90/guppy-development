<x-app-layout>
    <div>
        <div class="hero min-h-screen bg-base-200  m-auto">
            <div class="hero-content flex-col lg:flex-row-reverse">



                @if (Auth::user()->role !== 'admin')
                <div class="text-center lg:text-left">
                    <h1 class="text-3xl font-bold">Having an unsatisfactory experience?</h1>
                    <p class="py-6">File a complaint, so that our staff can help you with it!</p>
                </div>
                <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
                    <div class="card-body">
                        <form action="/complaints" method="POST">
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
                text-gray-600">Complaint</span>
                                </label>
                                <textarea maxlength="250" placeholder="Write your complaint here..." name="complaint_text" id="complaint" cols="30" rows="7" required="true" class="textarea textarea-bordered"></textarea>
                            </div>

                            <div class="form-control mt-6">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                    @endif



                    @if (Auth::user()->role == 'admin')
                    <div id="grid_complaints_wrapper" class="overflow-x-auto flex justify-center items-center mt-10 w-full mb-40">
                        @if (count($complaints) > 0)
                        <div id="grid_complaints_cards" class="flex flex-col gap-5 w-full">
                            <h1 class="text-xl">Latest Complaints </h1>
                            <div class="grid grid-cols-3 gap-4 w-full">

                                @foreach($complaints as $complaint)
                                <div class="card w-96  bg-base-100 shadow-xl">
                                    <div class="card-body">
                                        <h2 class="card-title">{{$complaint->name}}</h2>
                                        <p class="card-subtitle text-gray-500">{{$complaint->house_no_block}}</p>
                                        <p class="card-text">{{$complaint->complaint_text}}</p>
                                        <div class="card-actions">
                                            <form action="/complaints/confirm" method="POST" id="{{$complaint->id}}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$complaint->id}}">

                                                <button type="submit" form="{{$complaint->id}}" class="btn btn-primary mt-5">Confirm</button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

</x-app-layout>