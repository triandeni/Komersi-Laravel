$(document).ready(function () {
    loadcart();
    loadwishlist();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function loadcart()
        {
        $.ajax({
            method: "GET",
            url: "/load-cart",
            success: function(response) {
                $('.cart-count').html('');
                $('.cart-count').html(response.count);
            }          
        });
    }

    function loadwishlist()
            {
            $.ajax({
                method: "GET",
                url: "/load-wishlist",
                success: function(response) {
                    $('.wishlist-count').html('');
                    $('.wishlist-count').html(response.count);
                }          
            });
        }
    

    $('.addtocart').click(function(e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var product_id = $(this).closest('.product_data').find('.prod_id').val();
            var product_qty = $(this).closest('.product_data').find('.qty-input').val();

            data = {
                'product_id': product_id,
                'product_qty': product_qty,
            }

            $.ajax({
                method: "POST",
                url: "/add-cart",
                data: data,
                success: function(response) {
                    swal(response.status)
                    loadcart();
                }          
            });
    });

    // $('.increment-btn').click(function(e) {
        $(document).on('click','.increment-btn', function (e) {
            e.preventDefault();

            var inc_value = $(this).closest('.product_data').find('.qty-input').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value < 20)
            {
                value++;
                 $(this).closest('.product_data').find('.qty-input').val(value);
            }
    });
             
    // $('.decriment-btn').click(function(e) {
        $(document).on('click','.decriment-btn', function (e) {
            e.preventDefault();

            var doc_value = $(this).closest('.product_data').find('.qty-input').val();
            var value = parseInt(doc_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value > 1)
            {
                value--;
                 $(this).closest('.product_data').find('.qty-input').val(value);
            }
    });
   

    // $('.delete-cart').click(function (e) {
        $(document).on('click','.delete-cart', function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });   

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajax({
            method:"POST",
            url:'/delete-cart',
            data: {
                'prod_id' : prod_id,
            },
            success: function (response) {
                loadcart();
                // window.location.reload();
                $('.cartitem').load(location.href + " .cartitem")
                swal("", response.status, "success");

            }
        });
    });

    // $('.remove-wishlist').click(function (e) {
        $(document).on('click','.remove-wishlist', function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });   

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajax({
            method:"POST",
            url:'/delete-wishlist',
            data: {
                'prod_id' : prod_id,
            },
            success: function (response) {
                // window.location.reload();
                loadwishlist();
                $('.wishlistitem').load(location.href + " .wishlistitem")
                swal("", response.status, "success");
                

            }
        });
    });
    // $('.changedQuantity').click(function (e) {
        $(document).on('click','.changedQuantity', function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });     

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qty-input').val();
        data = {
            'prod_id':prod_id,
            'prod_qty': qty,
        }
        $.ajax({
            method : "POST",
            url : "/update-cart",
            data : data,
            success: function (response) {
                $('.cartitem').load(location.href + " .cartitem");
                // window.location.reload();
            }
        });
    });

    $('.addwishlist').click(function (e) {
          e.preventDefault();

          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

          var product_id = $(this).closest('.product_data').find('.prod_id').val();
          
          data = {
              'product_id': product_id,
              
          }
          $.ajax({
            method: "POST",
            url: "/add-wishlist",
            data: data,
            success: function(response) {
                swal(response.status)
                loadwishlist();
            }          
        });
    });

});
      
