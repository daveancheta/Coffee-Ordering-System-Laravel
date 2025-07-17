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
    <div class="flex flex min-h-screen justify-center items-center space-x-6">
        <form action="/session-table1" method="POST" class="justify-center ">
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

                <button type="submit" class="cursor-pointer">
                    <div class="dark:bg-white h-20 w-20">
                         <h1>Table 1</h1>
                        <input type="hidden" name="table" value="tableone">
                        <input type="hidden" name="password" value="nigga">
                    </div>
                </button>

    


        </form>

        <form action="/session-table2" method="POST" class="justify-center ">
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


                <button type="submit" class="cursor-pointer">
                    <div class="dark:bg-white h-20 w-20">
                         <h1>Table 2</h1>
                        <input type="hidden" name="table" value="tabletwo">
                        <input type="hidden" name="password" value="nigga">
                    </div>
                </button>



        </form>

          <form action="/session-table3" method="POST" class="justify-center ">
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


                <button type="submit" class="cursor-pointer">
                    <div class="dark:bg-white h-20 w-20">
                         <h1>Table 3</h1>
                        <input type="hidden" name="table" value="tablethree">
                        <input type="hidden" name="password" value="nigga">
                    </div>
                </button>



        </form>

          <form action="/session-table4" method="POST" class="justify-center ">
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


                <button type="submit" class="cursor-pointer">
                    <div class="dark:bg-white h-20 w-20">
                         <h1>Table 4</h1>
                        <input type="hidden" name="table" value="tablefour">
                        <input type="hidden" name="password" value="nigga">
                    </div>
                </button>



        </form>

          <form action="/session-table5" method="POST" class="justify-center ">
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


                <button type="submit" class="cursor-pointer">
                    <div class="dark:bg-white h-20 w-20">
                         <h1>Table 5</h1>
                        <input type="hidden" name="table" value="tablefive">
                        <input type="hidden" name="password" value="nigga">
                    </div>
                </button>



        </form>
    </div>

</body>

</html>