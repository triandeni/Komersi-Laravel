@extends('layouts.frontend')
@section('title')
    My Order
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <a href="/order" class="btn btn-warning float-start">Back</a>
                        <h4>Order View</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-detail">
                                <h4 class="text-center">Shiiping Detail</h4>
                                <hr>
                                <label for="">First Name</label>
                                <div class="border ">{{ $order->fname }}</div>
                                <label for="">Last Name</label>
                                <div class="border">{{ $order->lname }}</div>
                                <label for="">Email</label>
                                <div class="border ">{{ $order->email }}</div>
                                <label for="">Phone</label>
                                <div class="border ">{{ $order->phone }}</div>
                                <label for="">Shipping Address</label>
                                <div class="border ">
                                 {{ $order->address1 }}, <br>
                                 {{ $order->address2 }}, <br>
                                 {{ $order->city }}, <br>   
                                 {{ $order->state }}, <br>   
                                 {{ $order->county }}, <br>   
                                </div>
                                <label for="">Zip Code</label>
                                <div class="border px-2">{{ $order->pincode }}</div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-center">Order detail</h4>
                                <hr>
                                <table class="table table-bordered">
                                    <thead>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->orderitems as $item )
                                        <tr class="text-center ">
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>Rp. {{ $item->price }}</td>
                                            <td>
                                                <img width="70px" src="{{ asset('image/product/'.$item->product->image) }}" alt="product Image" />
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h5 class="border p-3"><b>Total:</b> <span class="float-end"> Rp. {{ $order->total_price }}</span></h5>
                               
                                <label for="" class="mt-1 p-1">Order Status</label>
                                <form action="/update-order/{{ $order->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                <select class="form-select" name="order_status">
                                    <option {{ $order->status == '0'? 'selected':'' }} value="0">Pending</option>
                                    <option {{ $order->status == '1'? 'selected':'' }} value="1">Completed</option>
                                </select>
                                <button type="submit" class="btn btn-primary mt-2 float-end">Update</button>
                                </form>  
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection