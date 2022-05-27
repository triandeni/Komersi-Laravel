@extends('layouts.admin')
@section('title')
User
@endsection
@section('content')
   <div class="container">
       <div class="row">
           <div class="col">
               <h5>Registrated User</h5>
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                <tr class="text-center">
                    <td>{{  $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                  
                    <td>
                        <a href="view-user/{{ $item->id }}" class="btn btn-primary btn-sm">view</a>
                    </td>
                </tr>
                    
                @endforeach
            </tbody>

        </table>
    </div>
</div>
    
@endsection