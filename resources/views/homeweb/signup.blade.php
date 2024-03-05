@extends('homeweb.layouts.master')
@section('content')
    <!-- sign in  -->
    <div class="container-main">
        <div class="row">
            <div class="col-lg-12">
                <div class="signin-main-dv">
                    <h3 class="text-center mb-0 signin-text">Sign Up</h3>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf

                        <div class="results">
                            @if (Session::get('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif

                            @if (Session::get('fail'))
                                <div class="alert alert-danger">
                                    {{ Session::get('fail') }}
                                </div>
                            @endif
                        </div>

                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Full Name" name="name" value="{{ old('name') }}">
                        </div>

                        <span class="text-danger">
                            @error('mobile')
                                {{ $message }}
                            @enderror
                        </span>
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Phone Number" name="mobile" value="{{ old('mobile') }}">
                        </div>
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Email" name="email" value="{{ old('email') }}">
                        </div>

                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                        <div class="form-group">
                            <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Password" name="password">
                        </div>

                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                        <div class="form-group">
                            <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Re-enter Password" name="password_confirmation">
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">I’ve read and agree to terms &
                                Conditions</label>
                        </div>
                        <a href="{{ route('register') }}"><button type="submit"
                                class="signin-btn-main primary-bg btn text-white text-center">Sign Up</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
