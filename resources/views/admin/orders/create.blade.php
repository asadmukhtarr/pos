@extends('layouts.admin')
@section('title','New Order')
@section('content')
<div class="container">
    @include('messages.flash')
    <form action="{{ route('place.order') }}" method="post">
        @csrf
        <div class="card">
            <div class="card-header">
            <i class="fa fa-plus-circle"></i> New Product
            </div>
            <div class="card-body">
                <div class="form-group">
                <table class="table table-bordered">
                    <tr>
                        <th>Select Producct</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>
                            <select class="form-control" name="product" id="product">
                                <option>Select Product</option>
                                @foreach($product as $product)
                                <option value="{{ $product->id }}">{{ $product->title }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <a role="button" href="#" class="btn btn-info" id="add_p"> <i class="fa fa-plus-circle"></i> Add</a>
                        </td>
                    </tr>
                </table>
                <table class="table table-bordered" id="innertable">
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Product Price</th>
                    </tr>
                </table>
                <table class="table table-bordered">
                        <tr>
                            <th colspan="2">Total</th>
                            <td id="total" style="color:red; font-weight:bold;">0</td>
                        </tr>
                </table>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                <i class="fa fa-user-circle"></i> Customer Details
            </div>
            <div class="card-body">
                    <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" value="{{ old('name') }}" class="form-control" name="name" />
                            @error('name')
                            <font color="red"><b>{{ $message }}</b></font>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" value="{{ old('email') }}" class="form-control" name="email" />
                            @error('email')
                            <font color="red"><b>{{ $message }}</b></font>
                            @enderror
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" value="{{ old('address') }}" class="form-control" name="address" />
                            @error('address')
                            <font color="red"><b>{{ $message }}</b></font>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" value="{{ old('phone') }}" class="form-control" name="phone" />
                            @error('phone')
                            <font color="red"><b>{{ $message }}</b></font>
                            @enderror
                        </div>
                    </div>
                    </div>
            </div>
        </div>
        <button type="submit" class="btn btn-danger pull-right m-3">Place Order</button>
    </form>
</div>
<script>
    $(document).ready(function(){
        var p = 0;
        $("#add_p").click(function(){
            var c = $("#product").val();
            if($.isNumeric(c)){
                $.get('http://localhost:8000/api/product/'+c,function(response){
                    $("#innertable").append("<tr><td>"+response.title+"<input type='hidden' value='"+response.id+"' name='product_id[]' /></td><td><input type='number' class='form-control' name='qty[]' /></td><td>"+response.price+"</td></tr>");
                    p = parseInt(p) + parseInt(response.price);
                    $("#total").text(p);
                });
            }
        });
    });
</script>
@endsection