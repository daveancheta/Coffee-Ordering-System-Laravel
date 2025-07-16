<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CafeVibe</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-900 dark:bg-gray-900">
    <form action="/session" method="POST" class="justify-center">
        @csrf
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <strong class="font-bold">Whoops!</strong>
            <ul class="list-disc list-inside mt-2">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="flex min-h-screen justify-center items-center">
            <input type="text" name="table" value="tableone">
            <input type="text" name="password" value="nigga">
        </div>

        <button type="submit">Order Now</button>
    </form>
</body>

</html>