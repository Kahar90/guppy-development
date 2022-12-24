<html>

<head>
    <title>Complaints</title>

    <!-- tailwind -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="flex flex-col items-center justify-center mt-4">
        <button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded mt-10" onclick="window.location.href='/dashboard'">Dashboard</button>
        <h1 class="text-4xl text-center font-bold text-gray-800">File a Complain</h1>
        <form action="/complaints" method="POST">
            @csrf
            <div class="flex flex-col items-center justify-center mt-4">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="border-2 border-gray-300 p-2 rounded-lg">
                <label for="house_no_block">House Number/Block</label>
                <input type="text" name="house_no_block" id="house_no" class="border-2 border-gray-300 p-2 rounded-lg">
                <label for="complaint_text">Complaint</label>
                <textarea name="complaint_text" id="complaint" cols="30" rows="10" class="border-2 border-gray-300 p-2 rounded-lg"></textarea>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded mt-10" >Submit</button>
            </div>
        </form>


        <div id="complaints-lists">

            <h1 class="text-4xl text-center font-bold text-gray-800">Complaints</h1>
            <div class="flex flex-col items-center justify-center mt-4 max-w-md min-w-md">
                @foreach ($complaints as $complaint)
                <div class="border-2 border-gray-300 p-2 rounded-lg mt-5">
                    <p class="text-2xl font-bold text-gray-800">Name: {{ $complaint->name }}</p>
                    <p class="text-2xl font-bold text-gray-800">House Number/Block: {{ $complaint->house_no_block }}</p>
                    <p class="text-2xl font-bold text-gray-800">Complaint: {{ $complaint->complaint_text }}</p>
                </div>
                @endforeach
            </div>

        </div>
    </div>



</body>

</html>