@extends('layouts.frontend')
@section('title')
    My Cart
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top my-3">
    <div class="container">
        <h6 class="mb-0 ">
            <a class="text-decoration-none" class="" href="/">
            Home 
            </a> ->
            <a class="text-decoration-none" href="/frontend/cart">
            Cart
            </a> 
        </h6>
    </div>
</div>
<div class="container my-5">
    <div class="card shadow cartitem">
        @if($cartItems->count() > 0)
        <div class="card-body">
            @php $total = 0; @endphp
            @foreach ($cartItems as $item)
     
            <div class="row product_data">
                <div class="col-md-2">
                    <img src="{{ asset('image/product/'. $item->product->image) }}" height="70px" width="100px" alt="image here" />
                </div>
                <div class="col-md-3 my-auto">
                    <h4>{{ $item->product->name }}</h4>
                </div>
                <div class="col-md-2 my-auto">
                        <h6>Rp. {{ $item->product->selling_price }}</h6>
                </div>
                <div class="col-md-3 my-auto">
                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}" >
                    @if($item->product->qty >= $item->prod_qty)
                    <label for="quantity">Quantity</label>
                    <div class="input-group text-center mb-3" style="width: 130px">
                        <button class="input-group-text changedQuantity decriment-btn">-</button>
                        <input type="text" name="quantity " value="{{ $item->prod_qty }}" class="form-control qty-input text-center" />
                        <button class="input-group-text changedQuantity increment-btn">+</button>
                    </div>
                    @php $total += $item->product->selling_price * $item->prod_qty @endphp
                    @else
                    <h6>out the stock</h6>
                    @endif
                </div>
                <div class="col-md-2">
                    <h6 class="btn btn-danger my-4 delete-cart"><i class="fa fa-trash"></i> Remove</h6>
                </div>
                <hr>
            </div>
            @endforeach
       <div class="col-12 ">
            <h6>Total Price : Rp. {{ $total }}
            <a href="/frontend/checkout" class="btn btn-outline-success float-end">Checkout</a>`
        </h6>
       </div>
       @else
       <div class="card-body text-center">
           <h2>Your <i class="fa fa-shopping-cart"></i> Cart is empty</h2>
           <a href="/frontend/category" class="btn btn-outline-primary float-end">Continue Shopping</a>
       </div>

       @endif
      
        </div>
        
    
        
    </div>
</div>

@endsection