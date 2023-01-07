<x-app-layout>


    <head>
        <title>Add Item</title>

        <!-- tailwind -->
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    </head>

    <body>
        <div class="min-h-screen">
            <div class="flex flex-row items-start justify-center gap-20">
                <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100 mt-20">
                    <div class="card-body">
                        <form action="/additem" method="POST">
                            @csrf
                            <div class="form-control">

                                <label class="label">
                                    <span class="label-text
                                text-gray-600">Item name</span>
                                </label>
                                <input required="true" type="text" name="item_name" id="item_name" placeholder="Item name" class="input input-bordered">
                            </div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text
                                text-gray-600">Picture Link</span>
                                </label>
                                <input required="true" type="text" name="picture_link" id="picture_link" placeholder="Picture link" class="input input-bordered">
                            </div>
                            <div class="form-control mt-6">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                    </div>
                </div>

                <div class="available_items">
                    <div class="overflow-x-auto w-full">
                        <table class="table w-half max-h-screen overflow-auto">
                            <!-- head -->
                            <thead>
                                <tr>

                                    <th>Item Name</th>
                                    <th>Image</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- row 1 -->
                                @foreach ($additems as $additem)
                                <tr>
                                    <td class="border px-4 py-2">{{ $additem->item_name }}</td>
                                    <td class="border px-4 py-2">
                                        <img src="{{ $additem->picture_link }}" alt="item picture" width="200" height="200">
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


    </body>
</x-app-layout>
