@extends('layouts.admin')
@section('title')
Edit Categories
@endsection
@section('content')
   <div class="container">
       <div class="row">
           <div class="col">
               <h5>edit Category</h5>
           </div>
       </div>
       
       <div class="card-body">
           <form action="{{ route('update.category', $category->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
               <div class="row">
                   <div class="col-md-6 mb-3">
                       <label for="">Name</label>
                       <input type="text" value="{{ $category->name }}" class="form-control" name="name">
                   </div>
                   <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" value="{{ $category->slug }}" class="form-control" name="slug">
                </div>
                   <div class="col-md-9 mb-3">
                    <label for="">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" class="form-control">{{ $category->deskripsi }}</textarea>
                </div>
                   <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" {{ $category->status == "1" ? 'checked':'' }}  name="status">
                </div>
                   <div class="col-md-6 mb-3">
                    <label for="">Popular</label>
                    <input type="checkbox" {{ $category->popular == "1" ? 'checked':'' }}  name="popular">
                   </div>

                   <div class="col-md-12 mb-3">
                    <label for="">meta_title</label>
                    <input type="text" value="{{ $category->meta_title }}" class="form-control" name="meta_title">
                   </div> 
                   <div class="col-md-12 mb-3">
                    <label for="">meta_deskripsi</label>
                    <textarea rows="3"  class="form-control" name="meta_deskripsi">{{ $category->meta_deskripsi }}</textarea>
                </div>
                   <div class="col-md-12 mb-3">
                    <label for="">meta_keyword</label>
                    <textarea rows="3" class="form-control"  name="meta_keyword">{{ $category->meta_keyword }}</textarea>
                </div>
                @if($category->image)
                <img src="{{ asset('image/category/'.$category->image) }}" width="10" alt="category image" />
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