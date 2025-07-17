<x-layout>
    <div class="relative bg-gray-900 h-screen">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

            @foreach($coffee as $ce)

            <div
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg w-full h-50" src="{{ asset('storage/' . $ce->image) }}" alt="" />
                </a>
                <div class="p-5">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $ce->coffee }}
                    </h5>
                    <div class="flex justify-between">
                        <p class="mb-3 font-normal text-green-700 dark:text-green-400">${{ $ce->price }}</p>
                        <p class="dark:text-white">Stock: {{ $ce->stock }}</p>
                    </div>

                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $ce->description }}</p>
                    <div class="flex justify-center space-x-6">
                        <form action="/order-post" method="POST" class="flex justify-center space-x-6">
                            @csrf
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                            <input type="hidden" name="coffee_id" value="{{ $ce->id}}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="table" value="{{ Auth::user()->table}}">
                            <input type="hidden" name="coffee" value="{{ $ce->coffee}}">
                            <input type="hidden" name="price" value="{{ $ce->price}}">
                            <input type="number" name="quantity"
                                class="flex-1 inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 transition-colors duration-200"
                                placeholder="Quantity">

                            <button type="submit"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-r-800">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                                </svg>


                            </button>
                        </form>
                    </div>

                </div>

            </div>
            @endforeach
        </div>
    </div>
</x-layout>