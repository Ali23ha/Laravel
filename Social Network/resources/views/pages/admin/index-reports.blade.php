@extends('layouts.afterLogin')
@section('content')
    <header style="background-color: #2e3e4e !important;" class="header-bar mb-3" >
        <div class="container d-flex flex-column flex-md-row align-items-center p-3">
            <h4 class="my-0 mr-md-auto font-weight-normal"><a href="/" class="text-white">Test</a></h4>
            <div class="flex-row my-3 my-md-0">
                <a href="#" class="text-white mr-2 header-search-icon" title="Search" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-search"></i></a>
                <span class="text-white mr-2 header-chat-icon" title="Chat" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-comment"></i></span>
                <a href="#" class="mr-2"><img title="My Profile" data-toggle="tooltip" data-placement="bottom" style="width: 32px; height: 32px; border-radius: 16px" src="https://gravatar.com/avatar/f64fc44c03a8a7eb1d52502950879659?s=128" /></a>
                <a class="btn btn-sm btn-success mr-2" href="{{route('Reports-index-admin')}}">Post Panel</a>
                <a class="btn btn-sm btn-success mr-2" href="{{route('Settings')}}">Settings</a>
                <form action="{{route('Sign-out')}}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-sm btn-secondary">Sign Out</button>
                </form>
            </div>
        </div>
    </header>
    {{--flash masseges--}}
    @if(session()->has('success'))
        <h4  class="alert alert-success text-center">{{session('success')}}</h4>
    @endif

    <div class="container py-md-5 container--narrow">
        <h1 STYLE="text-align: center" >Reported Posts</h1>

        <table class="table">
            <a href="" class="btn btn-primary" type="submit"> Archived Reports </a>

            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Post</th>
                <th scope="col">Reported by</th>
                <th scope="col">Reason</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($reports as $report)
                <tr>
                    <td >{{ $report->id }}</td>
                    <td><a href="{{ route('Show-post-admin', $report->post->id) }}">{{ $report->post->title }}</a></td>
                    <td>{{ $report->user->name }}</td>
                    <td>{{ $report->reason }}</td>
                    <td>{{ $report->status }}</td>
                    <td>
                        <form action="{{ route('Reports-action-admin', $report->id) }}" method="POST">
                            @csrf
                            <select name="action" required>
                                <option value="reviewed">Delete</option>
                                <option value="ignored">Ignore</option>
                            </select>
                            <button type="submit"  class="btn btn-primary">Apply</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
