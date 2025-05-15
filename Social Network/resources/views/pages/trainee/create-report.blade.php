@extends('layouts.afterLogin')
@section('content')
    <header style="background-color: #2e3e4e !important;" class="header-bar mb-3" >
        <div class="container d-flex flex-column flex-md-row align-items-center p-3">
            <h4 class="my-0 mr-md-auto font-weight-normal"><a href="/" class="text-white">Test</a></h4>
            <div class="flex-row my-3 my-md-0">
                <a href="#" class="text-white mr-2 header-search-icon" title="Search" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-search"></i></a>
                <span class="text-white mr-2 header-chat-icon" title="Chat" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-comment"></i></span>
                <a href="#" class="mr-2"><img title="My Profile" data-toggle="tooltip" data-placement="bottom" style="width: 32px; height: 32px; border-radius: 16px" src="https://gravatar.com/avatar/f64fc44c03a8a7eb1d52502950879659?s=128" /></a>
                <a class="btn btn-sm btn-success mr-2" href="{{route('Create-post-trainee')}}">Create post</a>
                <form action="{{route('Sign-out')}}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-sm btn-secondary">Sign Out</button>
                </form>
            </div>
        </div>
    </header>
    <div class="container py-md-5 container--narrow">
    <form action="{{route('Reports-store-trainee',$Post->id)}}" method="POST" >
        @csrf

        <label for="reason">Reason:</label>
        <select name="reason" id="reason" required>
            <option value="spam">Spam</option>
            <option value="Illegal or regulated goods or services">Illegal or regulated goods or services</option>
            <option value="Copyright Violation">Copyright Violation</option>
            <option value="Commercial or self-promotion">Commercial or self-promotion</option>
            <option value="Others">Others</option>
        </select>

        <br>
        <button class="btn btn-primary"> Report Post</button>
    </form>
    </div>

@endsection
