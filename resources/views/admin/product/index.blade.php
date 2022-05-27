@extends('layouts.admin')
@section('title')
product
@endsection
@section('content')
   <div class="container">
       <div class="row">
           <div class="col">
               <h5>Product Page</h5>
           </div>
       <div class="col-6">
       <a href="product/create" class="btn btn-warning" style="float: right">Create Product</a>
       </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Selling</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $prd)
                <tr class="text-center">
                    <td>{{  $loop->iteration }}</td>
                    <td>{{ $prd->category->name }}</td>
                    <td>{{ $prd->name }}</td>
                    <td>{{ $prd->selling_price }}</td>
                  
                    <td>
                        <img src=" {{ asset('image/product/'. $prd->image) }}" alt="image" width="100" />
                    </td>
                    <td>
                        <a href="product/{{ $prd->id }}/edit" class="btn btn-primary btn-sm">Edit</a>
       
                        <form action="product/{{ $prd->id }}" method="post" style="display: inline">
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