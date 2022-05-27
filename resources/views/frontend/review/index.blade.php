@extends('layouts.frontend')
@section('title')
    Write a Review
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if ($verified_purchase->count() > 0)
                    <h5>You are writing a review for {{ $product->name }}</h5>
                    <form action="{{ route('review.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <textarea class="form-control" name="user_review" rows="7" placeholder="write a review"></textarea>
                        <button type="submit" class="btn btn-primary mt-3">Submit Review</button>
                    </form>
                    @else
                    <div class="alert alert-danger">
                        <h5>You are not eligible to review this product</h5>
                        <p>
                            For the trustwortiness of the review, only customer who purchased 
                            the product can write a review about the product.
                        </p>
                        <a href="/" class="btn btn-primary mt-3">Back to Home</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection