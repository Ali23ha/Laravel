@extends('layouts.afterLogin')
@section('content')
    <header style="background-color: #2e3e4e !important;" class="header-bar mb-3" >
        <div class="container d-flex flex-column flex-md-row align-items-center p-3">
            <h4 class="my-0 mr-md-auto font-weight-normal"><a href="{{route('Index-post-trainee')}}" class="text-white">Test</a></h4>
            <div class="flex-row my-3 my-md-0">
                <a href="#" class="text-white mr-2 header-search-icon" title="Search" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-search"></i></a>
                <span class="text-white mr-2 header-chat-icon" title="Chat" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-comment"></i></span>
                <a href="{{route('Profile',auth()->user()->name)}}" class="mr-2"><img title="My Profile" data-toggle="tooltip" data-placement="bottom" style="width: 32px; height: 32px; border-radius: 16px" src="https://gravatar.com/avatar/f64fc44c03a8a7eb1d52502950879659?s=128" /></a>
                <a class="btn btn-sm btn-success mr-2" href="{{route('Create-post-trainee')}}">Create post</a>
                <form action="{{route('Sign-out')}}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-sm btn-secondary">Sign Out</button>
                </form>
            </div>
        </div>
    </header>
    <div class="container py-md-5 container--narrow">
        <h2>
            <img class="avatar-small" src="https://gravatar.com/avatar/f64fc44c03a8a7eb1d52502950879659?s=128" />{{$name}}
            <form class="ml-2 d-inline" action="#" method="POST">
                <button class="btn btn-primary btn-sm">Follow <i class="fas fa-user-plus"></i></button>
                <!-- <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button> -->
            </form>
        </h2>

        <div class="profile-nav nav nav-tabs pt-2 mb-4">
            <a href="#" class="profile-nav-link nav-item nav-link active">Posts: 3</a>
            <a href="#" class="profile-nav-link nav-item nav-link">Followers: 2</a>
            <a href="#" class="profile-nav-link nav-item nav-link">Following: 3</a>
        </div>

        <div class="list-group">
            @foreach($posts as $post)
                <a href="{{route('Show-post-trainee',$post->id)}}" class="list-group-item list-group-item-action">
                    <img class="avatar-tiny" src="https://gravatar.com/avatar/f64fc44c03a8a7eb1d52502950879659?s=128" />
                    <strong>{{$post->title}}</strong> on {{$post->created_at->format('n/j/Y')}}
                </a>
            @endforeach
        </div>
    </div>



@endsection
