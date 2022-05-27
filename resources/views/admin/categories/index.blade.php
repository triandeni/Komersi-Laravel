@extends('layouts.admin')
@section('title')
categories
@endsection
@section('content')
   <div class="container">
       <div class="row">
           <div class="col">
               <h5>Category Page</h5>
           </div>
       <div class="col-6">
       <a href="{{ route('category.create') }}" class="btn btn-warning" style="float: right">create Category</a>
       </div>
    </div>
    <div class="card-body">
        <table class="table table-border table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Deskripsi</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $categories)
                <tr>
                    <td>{{  $loop->iteration }}</td>
                    <td>{{ $categories->name }}</td>
                    <td>{{ $categories->deskripsi }}</td>
                    <td>
                        <img src=" {{ asset('image/category/'. $categories->image) }}" alt="image" width="100" />
                    </td>
                    <td>
                        <a href="/categories/{{ $categories->id }}/edit" class="btn btn-primary btn-sm">Edit</a>
       
                        <form action="category/{{ $categories->id }}/delete" method="post" style="display: inline">
                           @csrf
                           @method('delete')
                           <button type="submit" class="btn btn-danger btn-sm">delete</button>
                   
                       </form>
                    </td>
                </tr>
                    
                @endforeach
            </tbody>

        </table>
    </div>
</div>
    
@endsection