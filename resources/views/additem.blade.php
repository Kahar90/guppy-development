<html>

<head>
    <title>Add Item</title>

    <!-- tailwind -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>
    <div class="flex flex-col items-center justify-center mt-4">
        <a class="
            mb-3 hover:bg-blue-200 text-black font-bold py-2 px-4 rounded mt-10
        " href="/dashboard">Back to Dashboard</a>
        <h1 class="text-4xl text-center font-bold text-gray-800">Add Item</h1>
        <form action="/additem" method="POST">
            @csrf
            <div class="flex flex-col items-center justify-center mt-4">
                <label for="item_name">Name</label>
                <input type="text" name="item_name" id="name" class="border-2 border-gray-300 p-2 rounded-lg">
                <label for="picture_link">Picture</label>
                <input type="text" name="picture_link" id="picture" class="border-2 border-gray-300 p-2 rounded-lg" placeholder="insert image link">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded mt-10">Submit</button>
            </div>
        </form>

        <div class="flex flex-col items-center justify-center mt-4">
            <h1 class="text-4xl text-center font-bold text-gray-800">Items</h1>
            <table class="table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Picture</th>
                    </tr>
                </thead>
                <tbody>
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
</body>

</html>