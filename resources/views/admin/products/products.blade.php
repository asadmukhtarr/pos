@extends('layouts.admin')
@section('title','Products')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-list"></i> All Products
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Thumbnail</th>
                    <th>Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
                @foreach($products as $product)
                <tr>
                    <td>
                        <img src="{{ asset('images') }}/{{ $product->image }}" height="30px" />
                    </td>
                    <td>
                        {{ $product->title }}
                    </td>
                    <td>
                        {{ $product->quantity }}
                    </td>
                    <td>
                        {{ $product->price }} PKR
                    </td>
                    <td>
                        {{ $product->category->name }}
                    </td>
                    <td>
                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection