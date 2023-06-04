@extends('layouts.admin')
@section('title','Create Products')
@section('content')
<div class="container">
    @include('messages.flash')
    <div class="card card-primary">
        <div class="card-header">
            <i class="fa fa-plus-circle"></i> Create Product
        </div>
        <div class="card-body">
            <form action="{{ route('save.products') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for=""> Upload Product Image </label>
                    <div class="custom-file mb-1">
                        <input type="file" class="custom-file-input" name="image" id="coverImage" required>
                        <label class="custom-file-label" for="coverImage">Choose file...</label>
                        <div class="invalid-feedback">Upload Product Image</div>
                    </div>
                    <span class="d-block ">Upload a Product image, JPG 1200x300</span>
                    @error('image')
                    <font color="red"><b>{{ $message }}</b></font>
                    @enderror
                </div>
                <div class="form-group">
                    <label for=""> Product Title</label>
                    <input type="text" placeholder="Product Title" value="{{ old('title') }}" name="title" class="form-control" />
                    @error('title')
                    <font color="red"><b>{{ $message }}</b></font>
                    @enderror
                </div>
                <div class="form-group">
                    <label for=""> Quantity</label>
                    <input type="number" placeholder="Product Quantity" value="{{ old('quanity') }}" name="quantity" class="form-control" />
                    @error('quantity')
                    <font color="red"><b>{{ $message }}</b></font>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Description</label> <br />
                    <textarea name="description" class="form-control" id="" cols="30" rows="10" style="resize:none;">
                        {{ old('description') }}
                    </textarea>
                    @error('description')
                    <font color="red"><b>{{ $message }}</b></font>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Price</label> <br />
                    <input type="number" placeholder="Product Price" value="{{ old('price') }}" name="price" class="form-control" />
                    @error('price')
                    <font color="red"><b>{{ $message }}</b></font>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Select Category</label> <br />
                    <select name="category" class="form-control">
                        <option>Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <font color="red"><b>{{ $message }}</b></font>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-info pull-right"> <i class="fa fa-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection