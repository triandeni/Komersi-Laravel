@extends('layouts.admin')
@section('title')
Create Product
@endsection
@section('content')
   <div class="card">
       <div class="card-header">
               <h5>Create Product</h5>
           </div>
       
       
       <div class="card-body">
           <form action="{{ route('create.product') }}" method="POST" enctype="multipart/form-data">
            
            @csrf
               <div class="row">
                <div class="col-md-8 mb-3">
                    <select class="form-select" name="category_id">
                        <option value="">Select Category</option>
                        @foreach ($category as $categories)
                        <option value="{{  $loop->iteration }}"> {{ $categories->name }}</option>   
                        @endforeach
                    </select>   
                </div>
                   <div class="col-md-6 mb-3">
                       <label for="">Name</label>
                       <input type="text" class="form-control" name="name">
                   </div>
                   <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" name="slug">
                </div>
                   <div class="col-md-9 mb-3">
                    <label for="">Small Deskripsi</label>
                    <textarea name="small_deskripsi" rows="3" class="form-control"></textarea>
                </div>
                
                   <div class="col-md-9 mb-3">
                    <label for="">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" class="form-control"></textarea>
                </div>
                   <div class="col-md-6 mb-3">
                    <label for="">Original Price</label>
                    <input type="number" class="form-control" name="original_price">
                </div>
                   <div class="col-md-6 mb-3">
                    <label for="">Selling Price</label>
                    <input type="number" class="form-control" name="selling_price">
                </div>
                   <div class="col-md-6 mb-3">
                    <label for="">Tax</label>
                    <input type="number" class="form-control"  name="tax">
                </div>
                   <div class="col-md-6 mb-3">
                    <label for="">Quantity</label>
                    <input type="number" class="form-control" name="qty">
                </div>
                   <div class="col-md-6 mb-3">
                    <input type="checkbox"  name="status">
                    <label for="">Status</label>
                
                   <div>
                    
                    <input type="checkbox"  name="trending">
                    <label for="">Trending</label>
                   </div>
                   </div>

                   <div class="col-md-12 mb-3">
                    <label for="">meta_title</label>
                    <input type="text" class="form-control" name="meta_title">
                   </div> 
                   <div class="col-md-12 mb-3">
                    <label for="">meta_deskripsi</label>
                    <textarea rows="3" class="form-control" name="meta_deskripsi"></textarea>
                </div>
                   <div class="col-md-12 mb-3">
                    <label for="">meta_keyword</label>
                    <textarea rows="3" class="form-control" name="meta_keyword"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
               </div>

           </form>
       </div>
   </div>
    
@endsection