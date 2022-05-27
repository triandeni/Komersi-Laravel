@extends('layouts.frontend')
@section('title')
Category
@endsection

@section('content')
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <h2 class="text-center mb-2 text-danger">All category</h2>
                    <hr>
                    <div class="row">
                
                        @foreach ($category as $ctg)
                        <div class="col-md-3 mb-3">
                            <a class="text-decoration-none" href="{{ route('category.view', $ctg->slug) }}">
                            <div class="card">
                                <img height="200px" src="{{ asset('image/category/'.$ctg->image) }}" alt="catgeory image" />
                                <div class="card-body text-dark">
                                    <h5 class="text-center ">{{ $ctg->name }}</h5>
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
