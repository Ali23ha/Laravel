@extends('layouts.master')
@section('content')
    <header class="header-bar mb-3" style="background-color: #2e3e4e !important;">
        <div class="container d-flex flex-column flex-md-row align-items-center p-3">
            <h4 class="my-0 mr-md-auto font-weight-normal"><a href="/" class="text-white">Test</a></h4>
            <form action="{{route('Sign-in')}}" method="POST" class="mb-0 pt-2 pt-md-0">
                @csrf
                <div class="row align-items-center">
                    <div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">
                        <input name="email" class="form-control form-control-sm input-dark" type="email" placeholder="Email" autocomplete="off" />
                    </div>
                    <div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">
                        <input name="password" class="form-control form-control-sm input-dark" type="password" placeholder="Password" />
                    </div>
                    <div class="col-md-auto">
                        <button class="btn btn-primary btn-sm">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </header>
    @if($errors->any())
        <h4  class="alert alert-danger text-center">{{$errors->first()}}</h4>
    @elseif(session()->has('success-logout'))
        <h4  class="alert alert-success text-center">{{session('success-logout')}}</h4>
    @endif
<div class="container py-md-5">
    <div class="row align-items-center">
        <div class="col-lg-7 py-3 py-md-5">
            <h1 class="display-3">Lorem ipsum dolor sit amet</h1>
            <p class="lead text-muted">Lorem ipsum dolor sit amet. Non sint totam non officia doloribus non impedit laboriosam et magnam iste. Non optio illo et dignissimos pariatur et consequatur corporis qui amet error est aliquam atque non provident quis. Ea assumenda modi et internos expedita id porro assumenda ut officia sunt. Qui veritatis mollitia et molestiae sapiente et quos fugiat et harum laborum id enim rerum qui amet odit.</p>
        </div>
        <div class="col-lg-5 pl-lg-5 pb-3 py-lg-5">
            <form action="{{route('Register')}}" method="POST" >
                @csrf
                <div class="form-group">
                    <label for="name-register" class="text-muted mb-1"><small>Username</small></label>
                    <input name="name" value="{{old('name')}}"  class="form-control" type="text" placeholder="Pick a username" autocomplete="off" />
                    @error('name')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="email-register" class="text-muted mb-1"><small>Email</small></label>
                    <input name="email" value="{{old('email')}}"  class="form-control" type="text" placeholder="you@example.com" autocomplete="off" />
                    @error('email')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-register" class="text-muted mb-1"><small>Password</small></label>
                    <input name="password"  class="form-control" type="password" placeholder="Create a password" />
                    @error('password')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-register-confirm" class="text-muted mb-1"><small>Confirm Password</small></label>
                    <input name="password_confirmation"  class="form-control" type="password" placeholder="Confirm password" />
                    @error('password_confirmation')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <a title="Login with Google" href="{{route('Google-redirection')}}" class="social-link inline-block  rounded-sm shadow">
                        <img style="width: 65.97px;" src="{{ asset('/icons/google.png') }}"/>
                    </a>
                </div>

                {{--                <div class="form-group">--}}
{{--                    <label for="Role" class="text-muted mb-1"><small>Role</small></label> --}}
{{--                    <select name="Role">--}}
{{--                        <option value="">Admin</option>--}}
{{--                        <option value="">Coach</option>--}}
{{--                        <option value="">User</option>--}}

{{--                    </select>--}}
{{--                </div>--}}

                <button type="submit" class="py-3 mt-4 btn btn-lg  btn-block" style="background-color: #2e3e4e; color: white">Sign up </button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
@endsection
