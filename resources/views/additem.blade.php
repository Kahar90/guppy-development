<html>

<head>
    <title>Add Item</title>

    <!-- tailwind -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>
    <div class="flex flex-col items-center justify-center mt-4">
        <h1 class="text-4xl text-center font-bold text-gray-800">Add Item</h1>
        <form action="/additem" method="POST">
            @csrf
            <div class="flex flex-col items-center justify-center mt-4">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="border-2 border-gray-300 p-2 rounded-lg">
                <label for="picture">Picture</label>
                <input type="text" name="picture" id="picture" class="border-2 border-gray-300 p-2 rounded-lg" placeholder="insert image link">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded mt-10">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>