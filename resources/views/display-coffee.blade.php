<x-layout>
    <div class="relative bg-gray-900 h-screen">

        <!-- drawer component -->
        <div id="drawer-navigation"
            class="fixed top-0 left-0 z-40 w-80 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-800"
            tabindex="-1" aria-labelledby="drawer-navigation-label">
            <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">
                Notification</h5>
            <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div class="py-4 overflow-y-auto">
                <div id="item-list">
                    <p>Loading</p>
                </div>
            </div>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

            @foreach($coffee as $ce)

            <div
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <div class="relative">
                    <img class="rounded-t-lg w-full h-50" src="{{ asset('storage/' . $ce->image) }}" alt="" />

                    <div class="absolute top-3 left-3">
                        @if($ce->stock > 1 && $ce->stock <= 10) <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium uppercase tracking-wide bg-yellow-100 text-yelllow-800">
                            Low Stocks
                            </span>
                            @elseif($ce->stock === 0)
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium uppercase tracking-wide bg-red-100 text-red-800">
                                No Stocks
                            </span>
                            @else
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium uppercase tracking-wide bg-green-100 text-green-800">
                                Order Now
                            </span>
                            @endif
                    </div>
                </div>
                <div class="p-5">
                    <div class="flex justify-between mb-2">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $ce->coffee
                            }}
                        </h5>

                        <span
                            class="inline-flex items-center px-10 py-0 m-0 rounded-full text-xs font-medium uppercase bg-green-100 text-green-800">
                            ${{ $ce->price }}
                        </span>
                    </div>



                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $ce->description }}</p>

                    <div class="flex flex-col mb-5">
                        <div class="flex justify-between">
                            <p class="font-default text-white">Stock Available:</p>
                            <span class="text-white font-bold">{{ $ce->stock }} Cups</span>
                        </div>
                    </div>
                    <div>
                        <form action="/order-post" method="POST" enctype="multipart/form-data">
                            @csrf
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach

                            @if($ce->stock === 0)

                            <button disabled
                                class="inline-flex justify-center items-center px-3 py-2 text-sm font-medium text-center text-gray-300 bg-blue-700 rounded-lg focus:-4 focus:outline-none focus:-red-300 dark:bg-gray-600 dark:focus:-r-800 w-full mt-10 cursor-not-allowed">
                                <svg class="w-6 h-6 text-gray-300 dark:text-gray-300" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-3 5h3m-6 0h.01M12 16h3m-6 0h.01M10 3v4h4V3h-4Z" />
                                </svg>

                                No Stocks
                            </button>


                            @else
                            <input type="hidden" name="coffee_id" value="{{ $ce->id}}">
                             <input type="hidden" name="image" value="{{ $ce->image}}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="table" value="{{ Auth::user()->table}}">
                            <input type="hidden" name="coffee" value="{{ $ce->coffee}}">
                            <input type="hidden" name="price" value="{{ $ce->price}}">
                            <div class="flex flex-col gap-3">
                                <div class="flex flex-row gap-2 items-center">
                                    <label for="Quantity" class="text-white">Quantity: </label>
                                    <input type="number" name="quantity"
                                        class="flex-1 inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-gray-700 rounded-lg focus:-4 focus:outline-none focus:-gray-300 transition-colors duration-200 w-full"
                                        min="1" max="{{ $ce->stock }}" value="1">
                                </div>


                                <button type="submit"
                                    class="inline-flex justify-center items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:-4 focus:outline-none focus:-red-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:-r-800">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                                    </svg>
                                    Order
                                </button>
                            </div>
                            @endif
                        </form>
                    </div>

                </div>

            </div>
            @endforeach
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function loadItems() {
        $.get('/coffeeDone', function(coffeeDone) {
            let html = '';

               if (coffeeDone.length === 0) {
                html = `
                    <div class="p-4 mb-4 text-gray-800 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-white dark:border-gray-700 select-none">
                        <h3 class="text-lg font-medium">No orders yet.</h3>
                        <p class="text-sm mt-2">Please wait for new coffee orders to appear here.</p>
                    </div>
                `;
                   }   else {
            coffeeDone.forEach(item => {
                html += `
                
                <div id="alert-additional-content-3" class="p-4 mb-4 text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-white dark:border-green-800"  role="alert">
                  
                     
  <div class="flex items-center select-none">
    <svg class="shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <span class="sr-only">Info</span>
    <h3 class="text-lg font-medium">Order Done!</h3>
  </div>
  <div class="mt-2 mb-4 text-sm select-none">
    Coffee: <span class="uppercase">${item.coffee}</span>
     Quantity: <span class="uppercase">${item.quantity}</span>
      Price: <span class="uppercase">$${item.price}</span>
  </div>
  <span class="select-none"> ${item.time_ago}</soan>
 
</div>    `;
            });
        }
            $('#item-list').html(html);
        }).fail(() => {
            $('#item-list').html('<p style="color:red;">Failed to load items.</p>');
        });
    }

    loadItems();

    
     setInterval(loadItems, 500);

   

    </script>
</x-layout>