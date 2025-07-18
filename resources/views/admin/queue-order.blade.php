<x-admin-layout>
    <div class="relative bg-gray-900 h-screen">
        <div id="item-list">
            <span class="text-white">Loading.....</span>
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
        } else {
            html = `<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">`;

            queueOrders.forEach(order => {
                html += `
  <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
      <img class="rounded-t-lg w-full h-50 object-cover" src="${order.image}" alt="Coffee Image" />
    </a>
    <div class="p-5">
      <a href="#">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">${order.coffee}</h5>
      </a>

      <div class="flex justify-between mb-2">
        <p class="font-normal text-gray-700 dark:text-gray-300">Table:</p>
        <p class="font-bold text-gray-900 dark:text-white capitalize">${order.table}</p>
      </div>

      <div class="flex justify-between mb-2">
        <p class="font-normal text-gray-700 dark:text-gray-300">Quantity:</p>
        <p class="font-bold text-gray-900 dark:text-white">${order.quantity} cups</p>
      </div>

      <div class="flex justify-between mb-4">
        <p class="font-normal text-gray-700 dark:text-gray-300">Price:</p>
        <p class="font-bold text-green-600 dark:text-green-400">$${order.price}</p>
      </div>

     <button type="button"
  class="mark-as-done inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
  data-id="${order.coffee_id}" data-user="${order.user_id}" data-order="${order.id}" data-table="${order.table}" data-coffee="${order.coffee}" data-quantity="${order.quantity}" data-price="${order.price}">
  Mark as Done
</button>

    </div>
  </div>
                `;
            });

            html += `</div>`; // close grid container
        }

        $('#item-list').html(html);
    }).fail(() => {
        $('#item-list').html('<p style="color:red;">Failed to load items.</p>');
    });
}


    loadItems();

    
     setInterval(loadItems, 500);

        // Set CSRF token for all AJAX requests (you already have this)
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });

    // Event delegation: handle click on dynamically loaded buttons
    $(document).on('click', '.mark-as-done', function () {
        let button = $(this);

        // Get data from button
        let data = {
            user_id: button.data('user'),
            table: button.data('table'),
             order_id: button.data('order'),
            coffee_id: button.data('id'),
            coffee: button.data('coffee'),
            quantity: button.data('quantity'),
            price: button.data('price'),
            status: 'done'
        };

        // Send data via AJAX POST
        $.ajax({
            url: '/submit-done',
            type: 'POST',
            data: data,
            success: function (response) {
                alert(response.message);
                loadItems(); // refresh the list
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                alert('Failed to mark as done.');
            }
        });
    });



   

    </script>
</x-admin-layout>