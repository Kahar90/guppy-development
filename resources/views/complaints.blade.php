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
                                <textarea placeholder="Write your complaint here..." name="complaint_text" id="complaint" cols="30" rows="10" required="true" class="textarea textarea-bordered"></textarea>
                            </div>

                            <div class="form-control mt-6">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                    </div>

                    @endif

                    @if (Auth::user()->role == 'admin')
                    <div id="complaints_show" class="grid grid-cols-3 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($complaints as $complaint)
                        <div class="card w-96 bg-neutral text-neutral-content mb-10">
                            <div class="card-body items-center text-center">
                                <h2 class="card-title">
                                    {{ $complaint->name }}

                                </h2>
                                <p>
                                    {{ $complaint->house_no_block }}
                                </p>

                                <p>
                                    {{ $complaint->complaint_text }}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endif


</x-app-layout>
