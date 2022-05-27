@extends('layouts.frontend')
@section('title')
    {{ $product->name }}
@endsection

@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <form action="{{ route('add.rating') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Rating {{ $product->name }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            
            <div class="rating-css">
                <div class="star-icon">
                    @if($user_rating)

                    @for($i =1 ; $i <= $user_rating->star_rated; $i++)
                    <input type="radio" value="{{ $i }}" name="product_rating" checked id="rating{{ $i }}">
                    <label for="rating{{ $i }}" class="fa fa-star"></label>
                    @endfor
                    @for($j = $user_rating->star_rated+1 ; $j <= 5;$j++)
                    <input type="radio" value="{{ $j }}" name="product_rating" id="rating{{ $j }}">
                    <label for="rating{{ $j }}" class="fa fa-star"></label>
                    @endfor
                    @else
                    <input type="radio" value="1" name="product_rating" checked id="rating1">
                    <label for="rating1" class="fa fa-star"></label>
                    <input type="radio" value="2" name="product_rating" id="rating2">
                    <label for="rating2" class="fa fa-star"></label>
                    <input type="radio" value="3" name="product_rating" id="rating3">
                    <label for="rating3" class="fa fa-star"></label>
                    <input type="radio" value="4" name="product_rating" id="rating4">
                    <label for="rating4" class="fa fa-star"></label>
                    <input type="radio" value="5" name="product_rating" id="rating5">
                    <label for="rating5" class="fa fa-star"></label>
                    @endif
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
          </form>
      </div>
    </div>
  </div>

<div class="py-3 mb-4 shadow-sm bg-warning border-top my-3">
    <div class="container">
        <h6 class="mb-0 ">
            <a class="text-decoration-none" href="">
            Collection 
            </a> ->
            <a class="text-decoration-none" href="/frontend/category">
            {{ $product->category->name }} 
            </a> ->
            <a class="text-decoration-none" href="">
            {{ $product->name }}
            </a> 
        </h6>
    </div>
</div>
<div class="container py-3">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-rigt">
                   <img src="{{ asset('image/product/'. $product->image) }}" class="w-100" alt="" />
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        
                        {{ $product->name }}
                        @if ($product->trending == '1')
                            
                        <label style="font-size: 16px" class="float-end badge bg-danger trending_tag">Trending</label>
                        @endif
                       
                    </h2>

                    <hr>
                    <label class="me-3">Original Price : <s>Rp. {{ $product->original_price }}</s></label>
                    <label class="fw-bold">Seliing Price : Rp. {{ $product->selling_price }}</label>
                    @php $ratenum = number_format($rating_value) @endphp
                    <div class="rating">
                        @for ($i = 1 ; $i <= $ratenum ; $i++)
                        <i class="fa fa-star checked"></i>
                        @endfor
                        @for($j = $ratenum+1; $j <= 5; $j++)
                        <i class="fa fa-star"></i>
                        @endfor
                        <span>
                            @if($rating -> count() > 0)
                            {{ $rating->count() }} Ratings
                            @else
                            No Rating
                            @endif
                        </span>
                    </div>
                    <p class="mt-3">
                        {!! $product->small_deskripsi !!}
                    </p>
                    <hr>
                    @if ($product->qty > 0)
                    <label class="badge bg-success">In stock</label>
                    @else
                    <label class="badge bg-danger">Out of stock</label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-3">
                            <input type="hidden" value="{{ $product->id }}" class="prod_id" />
                            <label for="quantity">Quantity</label>
                            <div class="input-group text-center mb-3">
                                <button class="input-group-text decriment-btn">-</button>
                                <input type="text" name="quantity " value="1" class="form-control qty-input text-center" />
                                <button class="input-group-text increment-btn">+</button>
                        
                            </div>
                        </div>
                    </div>
                        <div class=" float-end ">
                            <br/>
                           @if($product->qty > 0)
                           <button type="button"  class="btn btn-primary addtocart me-3 float-start">Add to Cart <i class="fas fa-shopping-cart"></i></button>
                       
                           @endif
                            <button type="button" class="btn btn-success addwishlist me-3 float-start">Add to Whilist <i class="fas fa-heart"></i> </button>
                            
                        </div>
                        
                    </div>
                </div>
                <hr>
                <div>
                    <h3>Deskripsi</h3>
                    {{ $product->deskripsi }}
                </div>
        <hr>
        <button type="button" class="btn btn-primary  " data-bs-toggle="modal" data-bs-target="#exampleModal">
            Rating Product
          </button>
        <a href="/add-review/{{$product->slug}}/userview" class="btn btn-success  " >
           Write a review
          </a>
          <div class="col-md-12 mt-3">
              @foreach ($review as $item )
              <div class="user-review">
                  <label for="">{{ $item->user->name. '' . $item->user->lname }}</label>
                  @if($item->user_id == Auth::id())
                  <a href="/edit-review/{{$product->slug}}/userreview">edit</a>
                  @endif
                  <br>
                  @php

                  $rating = App\Models\Rating::where('prod_id', $product->id)->where('user_id', $item->user->id)->first();

                  @endphp
              @if ($rating)
              @php $user_rated = $rating->star_rated @endphp
              @for($i =1; $i<= $user_rated; $i++)
              <i class="fa fa-star checked"></i>
              @endfor
              @for($j = $user_rated+1; $j <= 5;$j++)
              <i class="fa fa-star"></i>
              @endfor
                @endif
                <small>Revieed on {{ $item->created_at->format('D M Y') }}</small>
                <p>
                    {{ $item->user_review }}
                </p>       
            </div>
            @endforeach
          </div>
    </div>
</div>

@endsection


