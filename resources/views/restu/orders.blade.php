@include('restu.include.header')
@include('restu.include.navbar')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Cart</h1>
    </div>
</div>
</div>

<div class="container-fluid px-4">
    <section class=" section-9 pt-4">
        <div class="container">
            <div class="row">
                @if (Session::has('success'))
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{Session::get('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif
                @if (Session::has('error'))
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{Session::get('error')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif
                <div class="col-md-8">
                    <div class="table-responsive">
                        <table class="table text-center" id="cart">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form >
                                    @csrf
                                    @if (!empty($cartContent))
                                    @foreach ($cartContent as $item)

                                    <input type="text" id="id[]_{{$item->rowId}}" name="id[]_{{$item->rowId}}" class="form-control-plaintext text-center" value="{{$item->rowId}}" hidden>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <img src="{{$item->options->productImage}}" width="100px" height="100px">
                                            
                                        </div>  
                                    </td>
                                    <td>
                                        <input type="text" id="name[]_{{$item->rowId}}" name="name[]_{{$item->rowId}}" class="form-control-plaintext text-center" value="{{$item->name}}" readonly>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control-plaintext  text-center" value="Rs{{$item->price}}" readonly>
                                    </td>
                                    <td>
                                        <div class="input-group quantity mx-auto" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-dark btn-minus p-2 pt-1 pb-1 sub" data-id="{{$item->rowId}}">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" id="quantity[]_{{$item->rowId}}" name="quantity[]_{{$item->rowId}}" class="form-control form-control-sm  border-0 text-center" value="{{$item->qty}}">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-dark btn-plus p-2 pt-1 pb-1 add" data-id="{{$item->rowId}}">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" id = "price_{{$item->rowId}}" name="price_{{$item->rowId}}" class="form-control-plaintext  text-center" value="Rs{{$item->price*$item->qty}}"readonly>
                                    </td>
                                    <td>
                                       <button class="btn btn-sm btn-danger text-center" data-id="{{$item->rowId}}"><i class="fa fa-times"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4">            
                    <div class="card cart-summery">
                        <div class="sub-title">
                            <h2 class="bg-white">Cart Summary</h3>
                        </div> 
                        <div class="card-body">
                            <div class="d-flex justify-content-between pb-2">
                                <div>Subtotal</div>
                                <div>Rs{{Cart::subtotal()}}</div>
                            </div>
                            
                            <div class="d-flex justify-content-between summery-end">
                                <div>Total</div>
                                <div><input type="text" id="total_price" name="total_price" class="form-control-plaintext text-end" value="Rs{{Cart::subtotal()}}"readonly></div>
                            </div>
                            <div class="pt-5">
                               <!-- <button type="submit" id="submit" class="btn-dark btn btn-block w-100 submit">Place Order</button> -->
                               <button id="razorpay-button" class="btn-dark btn btn-block w-100 submit">Pay with Razorpay</button>
                            </div>
                        </div>
                    </div>     
                    <div class="form-group mt-2">
                        <label class="col-sm-5 col-form-label-lg">Select Table</label>
                        <select name="table_number" class="form-select col-md-1">
                            @foreach ($allInfo->all() as $all)
                            <option value="{{$all->TableNumber}}">{{$all->TableNumber}}</option>
                            @endforeach
                        </select>
                        
                    </div>
    </form> 
                </div>
            </div>
        </div>
    </section>
    </div>
<script type="text/javascript">

$(document).ready(function() {
    $('.add').click(function(){
      var qtyElement = $(this).parent().prev(); // Qty Input
      var qtyValue = parseInt(qtyElement.val());
      if (qtyValue < 10) {
          qtyElement.val(qtyValue+1);
          var rowId = $(this).data('id');
          var newQty =qtyElement.val();
          console.log("Updating cart for rowId:", rowId, "New quantity:", qtyElement.val());
          updatecart(rowId,newQty)
      }            
  });

  $('.sub').click(function(){
      var qtyElement = $(this).parent().next(); 
      var qtyValue = parseInt(qtyElement.val());
      if (qtyValue > 1) {
          qtyElement.val(qtyValue-1);
          var rowId = $(this).data('id');
          var newQty =qtyElement.val();
          updatecart(rowId,newQty)
      }        
  });

//   $('form').on('submit', function(e) {
//     // Validate if a table is selected
//     if ($('select[name="table_number"]').val() === '') {
//         e.preventDefault();
//         alert('Please select a table.');
//     }
// });
function updatecart(rowId, qty) {
    $.ajax({
        url: '{{ url("/update-cart") }}',
        type: 'post',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            rowId: rowId,
            qty: qty
        },
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                window.location.href = '{{ url("/cart") }}'; // Refresh cart to show updated quantities
            }
        },
        error: function(xhr) {
            console.error(xhr.responseText); // Log the response for debugging
            alert("Error: " + xhr.status + " - " + xhr.statusText);
        }
    });
}

    $('button.btn-danger').click(function() {
        var rowId = $(this).data('id'); // Assuming you have data-id set in the button for rowId
        deleteItem(rowId);
    });

    function deleteItem(rowId) {
        if (confirm("Are you sure you want to remove this item?")) {
            $.ajax({
                url: '{{url("/delete-cart-item")}}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { rowId: rowId },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        window.location.href = '{{url("/cart")}}'; // Refresh the cart page
                    } 
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    alert("Error: " + xhr.status + " - " + xhr.statusText);
                }
            });
        }
    }
    document.getElementById('razorpay-button').onclick = function(e) {
        e.preventDefault();

        let options = {
            "key": "{{ env('RAZORPAY_KEY') }}", // Razorpay Key ID
            "amount": "{{ Cart::subtotal() * 100 }}", // Total amount in paise
            "currency": "INR",
            "name": "Restaurant Name",
            "description": "Order Payment",
            "handler": function(response) {
            $.post("{{ url('/verify-payment') }}", {
             _token: "{{ csrf_token() }}",
                razorpay_payment_id: response.razorpay_payment_id
            }, function(data) {
                if (data.success) {
                    // Payment verification succeeded
                    Swal.fire('Payment Successful', 'Your order is placed.', 'success')
                        .then(() => {
                            window.location.href = "{{ url('/') }}"; // Redirect on success
                        });
                } else if (data.error) {
                    // Payment verification failed
                    Swal.fire('Payment Failed', data.error || 'Verification failed.', 'error');
                }
            }).fail(function(xhr) {
                // Handle request failure
                Swal.fire('Error', 'Failed to verify payment. Please try again.', 'error');
                console.error(xhr.responseText); // Log error for debugging
            });
        },


            "prefill": {
                "email": "{{ Auth::guard('client')->check() ? Auth::guard('client')->user()->email : '' }}",
            },
            "theme": {
                "color": "#3399cc"
            }
        };

        let rzp = new Razorpay(options);
        rzp.open();   
        };
    
    $('.submit').click(function(e){
    e.preventDefault();
    var names = $("input[name^='name']").map(function() {
        return $(this).val();
    }).get();

    var id = $("input[name^='id']").map(function() {
        return $(this).val();
    }).get();

    var quantities = $("input[name^='quantity']").map(function() {
        return $(this).val();
    }).get();

    var total_price = $("#total_price").val();
    var table_number = $("select[name='table_number']").val(); // Adjusted to select the correct element

    $.ajax({
        url: '{{url("/placeOrder")}}',
        method: 'POST',
        data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            name: names,
            quantity: quantities,
            total_price: total_price,
            table_number: table_number,
            id: id
        },
        success: function(response) {
            if (response.success) {
                Swal.fire({
                    title: 'Order Placed',
                    text: 'Your order has been placed successfully!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                window.location.href = '{{url("/")}}';
            });
            }
        },
        error: function(xhr) {
            console.error(xhr.responseText); 
            alert("Error: " + xhr.status + " - " + xhr.statusText);
        }
    });
});

});
</script>



    
    

@extends('restu.include.footer')