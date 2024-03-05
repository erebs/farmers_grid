@extends('homeweb.layouts.master')
@section('content')
    <!-- sign in  -->
    <div class="container-main">
        <div class="row">
            <div class="col-lg-12">
                <div class="signin-main-dv">
                    <h3 class="text-center mb-0 signin-text">Sign In</h3>
                    <form action="{{ route('dosignin') }}" class="button-hover-none" method="post">
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

                            <span class="text-danger">
                                @error('mobile')
                                    {{ $message }}
                                @enderror
                            </span>
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Phone Number" name="mobile"
                                    value="{{ old('mobile') }}">
                            </div>
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                            <div class="form-group">
                                <input type="password" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Password" name="password">
                            </div>

                            <p class="account-text text-center">Don’t have account? <a href="{{ route('signup') }}"><span
                                        class="primary-color" style="text-decoration: none !important;">Sign Up here</span> </a></p>
                            <a href="{{ route('dosignin') }}"><button type="submit" style="text-decoration: none;"
                                    class="signin-btn-main primary-bg btn text-white text-center" >Sign In</button></a>
                            <p class="forget-text text-center">Forget Password?</p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
