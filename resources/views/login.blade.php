@extends('layouts.app')
@section('title','Login Here')
@section('faisal')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
          <div class="d-flex flex-column justify-content-between">  
            <div class="row justify-content-center">
              <div class="col-lg-6 col-md-10">
                @include('messages.flash')
                <div class="card card-default mb-0">
                  <div class="card-header pb-0">
                    <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                      <a class="w-auto pl-0" href="/index.html">
                        <img src="{{ asset('admin/images/logo.png')}}" alt="Mono">
                        <span class="brand-name text-dark">MONO</span>
                      </a>
                    </div>
                  </div>
                  <div class="card-body px-5 pb-5 pt-0">

                    <h4 class="text-dark mb-6 text-center">Sign in for free</h4>

                    <form action="{{ route('login.here') }}" method="post">
                        @csrf
                      <div class="row">
                        <div class="form-group col-md-12 mb-4">
                          <input type="email" class="form-control input-lg" name="email" aria-describedby="emailHelp"
                            placeholder="email">
                            @error('email')
                            <font color="red">
                                <b>
                                    {{ $message }}
                                </b>
                            </font>
                            @enderror
                        </div>
                        <div class="form-group col-md-12 ">
                          <input type="password" class="form-control input-lg" name="password" placeholder="Password">
                            @error('password')
                                <font color="red">
                                    <b>
                                        {{ $message }}
                                    </b>
                                </font>
                            @enderror
                        </div>
                        <div class="col-md-12">

                          <div class="d-flex justify-content-between mb-3">

                            <div class="custom-control custom-checkbox mr-3 mb-3">
                              <input type="checkbox" class="custom-control-input" id="customCheck2">
                              <label class="custom-control-label" for="customCheck2">Remember me</label>
                            </div>

                            <a class="text-color" href="#"> Forgot password? </a>

                          </div>

                          <button type="submit" class="btn btn-primary btn-pill mb-4">Sign In</button>

                          <p>Don't have an account yet ?
                            <a class="text-blue" href="{{ route('register') }}">Sign Up</a>
                          </p>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection