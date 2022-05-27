@extends('layouts.admin')
@section('title')
User
@endsection
@section('content')
   <div class="container">
       <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">
                       <h5 class="mb-4" >Registrated User
                           <a href="/user" class="btn btn-primary float-right">Back</a>
                       </h5>
                       <hr>
                   </div>
                   <div class="card-body">
                       <div class="row">
                           <div class="col-md-4 mt-3">
                               <label for="">Role</label>
                               <div class="p-2 border">{{ $user->role_as == '0'? 'User':'Admin' }}</div>
                            </div>
                           <div class="col-md-4 mt-3">
                               <label for="">First Name</label>
                               <div class="p-2 border">{{ $user->name }}</div>
                            </div>
                           <div class="col-md-4 mt-3">
                               <label for="">Last Name</label>
                               <div class="p-2 border">{{ $user->lname }}</div>
                            </div>
                           <div class="col-md-4 mt-3">
                               <label for="">Email</label>
                               <div class="p-2 border">{{ $user->email }}</div>
                            </div>
                           <div class="col-md-4 mt-3">
                               <label for="">Phone</label>
                               <div class="p-2 border">{{ $user->phone }}</div>
                            </div>
                           <div class="col-md-4 mt-3">
                               <label for="">address1</label>
                               <div class="p-2 border">{{ $user->address1 }}</div>
                            </div>
                           <div class="col-md-4 mt-3">
                               <label for="">address2</label>
                               <div class="p-2 border">{{ $user->address2 }}</div>
                            </div>
                           <div class="col-md-4 mt-3">
                               <label for="">City</label>
                               <div class="p-2 border">{{ $user->state }}</div>
                            </div>
                           <div class="col-md-4 mt-3">
                               <label for="">State</label>
                               <div class="p-2 border">{{ $user->state }}</div>
                            </div>
                           <div class="col-md-4 mt-3">
                               <label for="">Country</label>
                               <div class="p-2 border">{{ $user->county }}</div>
                            </div>
                           <div class="col-md-4 mt-3">
                               <label for="">Pin Code</label>
                               <div class="p-2 border">{{ $user->pincode }}</div>
                            </div>
                       </div>
                   </div>
               </div>
           </div>
    </div>
    <div class="card-body">
        
    </div>
</div>
    
@endsection