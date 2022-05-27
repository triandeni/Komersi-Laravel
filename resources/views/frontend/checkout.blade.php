@extends('layouts.frontend')
@section('title')
    CheckOut
@endsection


@section('content')
        <div class="container">
            <form action="{{ route('place.order') }}" method="POST">
                @csrf
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-center "><b>Basic Detail</b></h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6 mb-3">
                                    <label for="">First tName</label>
                                    <input type="text" required class="form-control firstname" value="{{ Auth::user()->name }}" name="fname" placeholder="Enter First Name">
                                    <span id="fname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Last Name</label>
                                    <input type="text" required class="form-control lastname" value="{{ Auth::user()->lname }}" name="lname" placeholder="Enter Last Name">
                                    <span id="lname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Email</label>
                                    <input type="text" required class="form-control email" value="{{ Auth::user()->email }}" name="email" placeholder="Enter Email">
                                    <span id="email_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Phone Number</label>
                                    <input type="text" required class="form-control phone" value="{{ Auth::user()->phone }}" name="phone" name="fname" placeholder="Enter FirstName">
                                    <span id="phone_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Address 1</label>
                                    <input type="text" required class="form-control address1" value="{{ Auth::user()->address1 }}" name="address1" placeholder="Enter Address 1">
                                    <span id="address1_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Address 2</label>
                                    <input type="text" required class="form-control address2" value="{{ Auth::user()->address2 }}" name="address2" placeholder="Enter Address 2">
                                    <span id="address2_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">City</label>
                                    <input type="text" required class="form-control city" value="{{ Auth::user()->city }}" name="city" placeholder="Enter City">
                                    <span id="city_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">State</label>
                                    <input type="text" required class="form-control state" value="{{ Auth::user()->state }}" name="state" placeholder="Enter State">
                                    <span id="state_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Country</label>
                                    <input type="text" required class="form-control county" value="{{ Auth::user()->county }}" name="county" placeholder="Enter Contry">
                                    <span id="county_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Pin Code</label>
                                    <input type="text" required class="form-control pincode" value="{{ Auth::user()->pincode }}" name="pincode" placeholder="Enter Pin Code ">
                                    <span id="pincode_error" class="text-danger"></span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-center"><b>Order Detail</b></h6>
                            <hr>
                            @if($cartItem ->count() > 0)
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                            <tbody>
                                @php $total = 0; @endphp
                                @foreach ($cartItem as $item)
                                <tr>
                                    @php $total += ($item->product->selling_price * $item->prod_qty) @endphp
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->prod_qty }}</td>
                                    <td>{{ $item->product->selling_price }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <h6 class="px-2">Grand Total <span class="float-end">Rp {{ $total }}</span></h6>
                        <hr>
                        <input type="hidden"`name="paymnet_mode" value="COD">
                        <button type="submit" class="btn btn-primary w-100">COD</button>
                        <br>
                        <button type="button" id="pay-button" class="btn btn-success mt-2 w-100 ">Pay</button>
                        @else
                        <h4 class="text-center">No Product in cart</h4>
                        @endif
                    </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
@endsection

@section('scripts')
<script type="text/javascript">
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
        window.snap.pay('{{ $snapToken }}', {
  onSuccess: function(result){
    /* You may add your own implementation here */
    alert("payment success!"); console.log(result);
  },
  onPending: function(result){
    /* You may add your own implementation here */
    alert("wating your payment!"); console.log(result);
  },
  onError: function(result){
    /* You may add your own implementation here */
    alert("payment failed!"); console.log(result);
  },
  onClose: function(){
    /* You may add your own implementation here */
    alert('you closed the popup without finishing the payment');
  }
})
    });
  </script>

      
@endsection


