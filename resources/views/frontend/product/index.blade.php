@extends('layouts.frontend')
@section('title')
    {{ $category->name }}
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top mt-3">
    <div class="container">
        <h6 class="mb-0">
            Collection -> {{ $category->name }}
        </h6>
    </div>
</div>
        <div class="py-3">
            <div class="container">
                <div class="row">
                    <h2 class="text-center mb-2 text-danger">{{ $category->name }}</h2>
                    <hr>
                    @foreach ($product as $prod)
                    <div class="col-md-3 mb-3">
                            <div class="card">
                                <a class="text-decoration-none text-dark" href="{{ url('category/'. $category->slug.'/'.$prod->slug) }}">
                                {{-- <a href="{{ route('product.view', $category->slug.'/'.$prod->slug) }}"> --}}
                                <img height="200px" width="100%" src="{{ asset('image/product/'.$prod->image) }}" alt="product image" />
                                <div class="card-body">
                                    <h5>{{ $prod->name }}</h5>
                                    <span class="float-start">Rp.{{ $prod->selling_price }}</span>
                                    <br>
                                    <span class="float-end"><s>Rp.{{ $prod->original_price }}</s></span>
                                </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
    

        @endsection
