<x-admin-layout>
     <div class="relative bg-gray-900 h-screen">
    <div id="item-list">
    Loading.....
    </div>
     </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function loadItems() {
        $.get('/queueOrders', function(queueOrders) {
            let html = '';

               if (queueOrders.length === 0) {
                html = `
                    <div class="p-4 mb-4 text-gray-800 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-white dark:border-gray-700 select-none">
                        <h3 class="text-lg font-medium">No orders yet.</h3>
                        <p class="text-sm mt-2">Please wait for new coffee orders to appear here.</p>
                    </div>
                `;
                   }   else {
            queueOrders.forEach(order=> {
                html += `
                
               

<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img class="rounded-t-lg w-full h-70" src="${order.image}" alt="${order.image}" />
    </a>
    <div class="p-5">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">${order.coffee}</h5>
        </a>
            <div class="flex justify-between">
             <p class="mb-3 font-normal text-gray-700 dark:text-white">Table:</p>
              <p class="mb-3 font-bold text-white dark:text-white capitalize">${order.table}</p>
             </div>
        <div class="flex justify-between">
             <p class="mb-3 font-normal text-gray-700 dark:text-white">Quantity:</p>
              <p class="mb-3 font-bold text-white dark:text-white">${order.quantity} cups</p>
             </div>
                <div class="flex justify-between">
             <p class="mb-3 font-normal text-gray-700 dark:text-white">Price:</p>
              <p class="mb-3 font-bold text-white dark:text-green-500 capitalize">$${order.price}</p>
             </div>
       
        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Mark as Done
        </a>
    </div>
</div>
`;
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
</x-admin-layout>