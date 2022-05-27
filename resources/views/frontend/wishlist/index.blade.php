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
            <a class="text-decoration-none" href="/frontend/wishlist">
            Wishlist
            </a> 
        </h6>
    </div>
</div>
<div class="container my-5">
    <div class="card shadow p-2 wishlistitem">
        <div class="card-body">
       @if ($wishlist->count() > 0)
       @foreach ($wishlist as $item)
           
       <div class="row product_data">
        <div class="col-md-2">
            <img src="{{ asset('image/product/'. $item->product->image) }}" height="70px" width="100px" alt="image here" />
        </div>
        <div class="col-md-2 my-auto">
            <h4>{{ $item->product->name }}</h4>
        </div>
        <div class="col-md-2 my-auto">
                <h6>Rp. {{ $item->product->selling_price }}</h6>
        </div>
        <div class="col-md-2 my-auto">
            <input type="hidden" class="prod_id" value="{{ $item->prod_id }}" >
            @if($item->product->qty >= $item->prod_qty)
            <label for="quantity">Quantity</label>
            <div class="input-group text-center mb-3" style="width: 130px">
                <button class="input-group-text  decriment-btn">-</button>
                <input type="text" name="quantity " value="1" class="form-control qty-input text-center" />
                <button class="input-group-text increment-btn">+</button>
            </div>
           
            @else
            <h6>out the stock</h6>
            @endif
        </div>
        <div class="col-md-2">
            <h6 class="btn btn-primary my-4 addtocart"><i class="fas fa-shopping-cart"></i> Add to Cart</h6>
        </div>
        <div class="col-md-2">
            <h6 class="btn btn-danger my-4 remove-wishlist"><i class="fa fa-trash"></i> Remove</h6>
        </div>
        <hr>
    </div>
    @endforeach

       @else
       <h4>There are no product in your wishlist</h4>
       @endif
                </div>
            </div>
</div>
      
        </div>
        
    
        
    </div>
</div>

@endsection