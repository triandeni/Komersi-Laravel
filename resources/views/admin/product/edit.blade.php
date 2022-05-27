@extends('layouts.admin')
@section('title')
Edit Product
@endsection
@section('content')
<div class="card">
    <div class="card-header">
    <h5>Update Product</h5>
</div>
       <div class="card-body">
           <form action="/product/{{ $product->id }} " method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
               <div class="row">
                <div class="col-md-8 mb-3">
                    <label>Select Category</label>
                    <select class="form-select" >
                          <option value="">{{ $product->category->name }}</option>
                    </select>   
                </div>
                   <div class="col-md-6 mb-3">
                       <label for="">Name</label>
                       <input type="text" value="{{ $product->name }}" class="form-control" name="name">
                   </div>
                   <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" value="{{ $product->slug }}" class="form-control" name="slug">
                </div>
                   <div class="col-md-9 mb-3">
                    <label for="">Small Deskripsi</label>
                    <textarea name="small_deskripsi" rows="3" class="form-control">{{ $product->small_deskripsi }}</textarea>
                </div>
                
                   <div class="col-md-9 mb-3">
                    <label for="">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" class="form-control">{{ $product->deskripsi }}</textarea>
                </div>
                   <div class="col-md-6 mb-3">
                    <label for="">Original Price</label>
                    <input type="number" value="{{ $product->original_price }}" class="form-control" name="original_price">
                </div>
                   <div class="col-md-6 mb-3">
                    <label for="">Selling Price</label>
                    <input type="number" value="{{ $product->selling_price }}" class="form-control" name="selling_price">
                </div>
                   <div class="col-md-6 mb-3">
                    <label for="">Tax</label>
                    <input type="number" value="{{ $product->tax }}" class="form-control"  name="tax">
                </div>
                   <div class="col-md-6 mb-3">
                    <label for="">Quantity</label>
                    <input type="number" value="{{ $product->qty }}" class="form-control" name="qty">
                </div>
                   <div class="col-md-6 mb-3">
                    <input type="checkbox" {{ $product->status == "1" ? 'checked':'' }}   name="status">
                    <label for="">Status</label>
                   <div>
                    
                    <input type="checkbox" {{ $product->trending == "1" ? 'checked':'' }}   name="trending">
                    <label for="">Trending</label>
                   </div>
                   </div>

                   <div class="col-md-12 mb-3">
                    <label for="">meta_title</label>
                    <input type="text" value="{{ $product->meta_title }}" class="form-control" name="meta_title">
                   </div> 
                   <div class="col-md-12 mb-3">
                    <label for="">meta_deskripsi</label>
                    <textarea rows="3" class="form-control" name="meta_deskripsi">{{ $product->meta_deskripsi }}</textarea>
                </div>
                   <div class="col-md-12 mb-3">
                    <label for="">meta_keyword</label>
                    <textarea rows="3" class="form-control" name="meta_keyword">{{ $product->meta_keyword }}</textarea>
                </div>
                @if($product->image)
                <img class=" mb-3" style="max-width: 20%" src="{{ asset('image/product/'.$product->image) }}" alt="" />
                @endif
                <div class="col-md-12 mb-3">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
               </div>

           </form>
       </div>
   </div>
    
@endsection