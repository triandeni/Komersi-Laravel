@extends('layouts.frontend')
@section('title')
    
@endsection

@section('content')
@include('layouts.inc.frontend.slider')
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <h2 class="text-center mb-2 text-danger">Featured Product</h2>
                    <hr>
                    <div class="owl-carousel featured-carousel owl-theme">
                        @foreach ($featured_product as $prod)
                        <div class="item">
                            <a class="text-decoration-none text-dark" href="{{ url('category/'. $prod->category->slug.'/'.$prod->slug) }}">
                            <div class="card">
                                <img height="200px" src="{{ asset('image/product/'.$prod->image) }}" alt="product image" />
                                <div class="card-body">
                                    <h5>{{ $prod->name }}</h5>
                                    <span class="float-start">Rp.{{ $prod->selling_price }}</span>
                                    <br>
                                    <span class="float-end"><s>Rp.{{ $prod->original_price }}</s></span>
                                </div>
                            </div>
                        </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="py-5">
            <div class="container">
                <div class="row">
                    <h2 class="text-center mb-2 text-primary">Trending Category</h2>
                    <hr>
                    <div class="owl-carousel featured-carousel owl-theme">
                        @foreach ($trending_category as $ctg)
                        <div class="item">
                            <a class="text-decoration-none" href="{{ route('category.view', $ctg->slug) }}">
                            <div class="card">
                                <img height="200px" src="{{ asset('image/category/'.$ctg->image) }}" alt="product image" />
                                <div class="card-body text-dark">
                                    <h5 class="text-center">{{ $ctg->name }}</h5>
                                    <p>{{ $ctg->deskripsi }}</p>
                                </div>
                            </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    
@endsection

@section('scripts')
<script>
    $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
    </script>
    
@endsection