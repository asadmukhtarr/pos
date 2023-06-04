@extends('layouts.admin')
@section('title','Categories')
@section('content')
@include('messages.flash')
  <div class="row">
    <div class="col-lg-5">
      <div class="card card-default">
          <div class="card-header">
            <h2> <i class="fa fa-plus-circle"></i> Add Categories</h2>
          </div>
          <div class="card-body">
            <form action="{{ route('category.save') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="exampleFormControlInput44">Name</label>
                <input type="text" class="form-control rounded-0" name="name" id="exampleFormControlInput4" placeholder="Enter Name of category">
                @error('name')
                <font color="red"><b>{{ $message }}</b></font>
                @enderror
              </div>
              <div class="form-footer">
                <button type="submit" class="btn btn-info btn-pill float-right"><i class="fa fa-save"></i> Save</button>
              </div>

            </form>

          </div>
      </div>
    </div>
    <div class="col-lg-7">
      <div class="card card-default">
        <div class="card-header">
          Categories
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <tr>
              <th>
                Name
              </th>
              <th>
                Actions
              </th>
            </tr>
            @foreach($categories as $category)
            <tr>
              <td>
                {{ $category->name }}
              </td>
              <td>
                <a href="{{ route('category.delete', $category->id) }}">
                  <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                </a>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection