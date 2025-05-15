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
        {{--flash masseges--}}
        @if(session()->has('success'))
            <h4  class="alert alert-success text-center">{{session('success')}}</h4>
        @elseif(session()->has('success-login'))
            <h4  class="alert alert-success text-center">{{session('success-login')}}</h4>
        @endif

        @foreach($Posts as $Post)

            <div class="container py-md-5 container--narrow" style="padding-bottom: 0rem !important;">
                <div class="d-flex justify-content-between">
                    <a href="{{route('Show-post-trainee',$Post->id)}}"><h2> {{$Post->title}} </h2></a>
                    <span class="pt-2">
                    </span>
                    @if($Post->user_id === auth()->id() )
                      <span class="pt-2">
                         <a href="{{route('Edit-post-trainee',$Post->id)}}" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
                          <form class="delete-post-form d-inline" action="{{route('Delete-post-trainee',$Post->id)}}" method="POST">
                               @method('DELETE')
                               @csrf
                              <button class="delete-post-button text-primary" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
                          </form>
                      </span>
                    @endif
                </div>


                <p class="text-muted font-small mb-6" >
                    <a href="#"><img class="avatar-small" src="https://gravatar.com/avatar/f64fc44c03a8a7eb1d52502950879659?s=128" /></a>
                    Posted by <a href="#">{{$Post->user->name}}</a> on {{$Post->created_at->format('n/j/Y')}}
                    @foreach($Post->tags as $tag)
                    <spans class="p-1 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
                        <a href="">{{$tag->name}} </a>
                    </spans>
                    @endforeach

                </p>



                <!-- Upvote POST Button -->

                <div class="flex items-center space-x-4 mt-2">
                    <form action="{{ route('Posts-upvote-trainee', $Post->id) }}" method="POST" >
                        @csrf
                        <button type="submit" class="btn btn-sm position-relative rounded" style="border-radius: 6.25rem !important;color: #ffffff;
                                        background-color: #0069d9;border-color: #0069d9;">
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                          {{ $Post->upvotes_count }}
                                         <span class="visually-hidden">unread messages</span>
                                        </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 14 14">
                                <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5"/>
                            </svg>
                        </button>
                    </form>
                </div>


                <div class="body-content">
                    <P style="font-family:'Bold Italic Art'">{{$Post->content}}</P>
                </div>


                <!-- downvote POST Button -->
                <div class="flex items-center space-x-4 mt-2">
                    <form action="{{ route('Posts-downvote-trainee', $Post->id) }}" method="POST" >
                        @csrf
                        <button type="submit" class="btn btn-sm position-relative rounded" style="border-radius: 6.25rem !important;color: #ffffff;
                                        background-color: #0069d9;border-color: #0069d9;">
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                          {{ $Post->downvotes_count }}
                                         <span class="visually-hidden">unread messages</span>
                                        </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1"/>
                            </svg>
                        </button>
                    </form>
                </div>
                {{--           COMMENTS VIEW + DELETING --}}

                <div class="mt-4" >
                    <button type="button" class="btn btn-primary position-relative">
                        Comments ({{ $Post->comments->count() }})
                    </button>
                    <button type="button" class="btn btn-danger position-relative">
                        <a style="color: white" href="{{route('Reports-create-trainee',$Post->id)}}">Report </a>
                    </button>
                    @foreach($Post->comments as $comment)

                        @if(auth()->id() === $comment->user_id)
                            <form action="{{ route('Comments-delete-trainee', $comment->id) }}" method="POST" class="mt-2" style="margin: 13px -9px -32px 19px !important;">
                                @csrf
                                @method('DELETE')
                                <button style="margin-left: 665px" class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <i class="fas fa-trash" style="margin-bottom: -70px;">
                                    </i>
                                </button>
                            </form>
                        @endif
                            <p class="text-muted " style="margin-top: 25px!important;font-size: smaller;margin-left: 6px;">
                                <a href="#"><img class="avatar-small" src="https://gravatar.com/avatar/f64fc44c03a8a7eb1d52502950879659?s=128" /></a>
                                Commented by <a href="#">{{ $comment->user->name }}</a> on {{ $comment->created_at->format('M d, Y') }}
                            </p>
                                  <!-- Upvote COMMENT Button -->
                            <div class="flex items-center space-x-4 mt-2">
                                <form action="{{ route('Comments-upvote-trainee', $comment->id) }}" method="POST" >
                                    @csrf
                                    <button type="submit" class="btn btn-sm position-relative rounded" style="border-radius: 6.25rem !important;color: #ffffff;
                                        background-color: #0069d9;border-color: #0069d9;">
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                          {{ $comment->upvotes_count }}
                                         <span class="visually-hidden">unread messages</span>
                                        </span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 14 14">
                                            <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>

                            <div class="border p-2 mt-2 rounded-md">
                            <p>{{ $comment->content }}</p>
                             </div>


                            <!-- Downvote Button -->
                            <div class="flex items-center space-x-4 mt-2">
                                <form action="{{ route('Comments-downvote-trainee', $comment->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm position-relative rounded" style="border-radius: 6.25rem !important;color: #ffffff;
                                        background-color: #0069d9;border-color: #0069d9;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1"/>
                                        </svg>
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                          {{ $comment->downvotes_count }}
                                         <span class="visually-hidden">unread messages</span>
                                        </span>
                                    </button>
                                </form>
                            </div>
                            <div style="border-bottom: #2e3e4e solid 1px; margin-top: 5px"></div>
                    @endforeach
                </div>
            </div>
        @endforeach






@endsection
