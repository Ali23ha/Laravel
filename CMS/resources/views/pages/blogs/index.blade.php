@extends('layouts.master')
@section('content')
    <div class="padding">
        <form action="{{ route('Blogs-search') }}" method="GET" class="m-b-md">
            <div class="input-group input-group-lg">
            <input style="width: 1017px" type="text" name="query" placeholder="Search for a Blog..." value="{{ request('query') }}" >
            <button type="submit" class="btn btn-fw black">Search</button>
            </div>
        </form>

<!-- ############ PAGE START-->
        <div class="tab-content">
            @foreach($blogs as $blog)
            <div class="tab-pane p-v-sm active" id="tab_1">
                <div class="box m-t p-a-sm">
                    <ul class="list">
                        <li class="list-item" >
                            @if (auth()->user() == true)
                                <button class="btn btn-outline rounded b-info text-primary" style="margin-left: 921px;margin-bottom: -68px" type="submit">
                                   <a style="font-size: 25px;color: rgba(0,0,0,0.7)" href="{{route('Blogs-edit',$blog->id)}}"> Edit </a>
                                </button>
                                <form method="post" style="margin-bottom: -39px;" action="{{route('Blogs-destroy',$blog->id)}}">
                                    @method('DELETE')
                                    @csrf
                                <button  class="btn btn-outline rounded b-danger text-danger" style="margin-left: 771px;font-size: 25px"  type="submit">
                                 Delete
                                </button>
                                </form>
                            @endif
                            <div class="clear">
                                <h2 class="m-0 m-b-sm">
                                    <a style="margin-left:10px " href ="{{route('Blogs-show',$blog->id)}}"> {{$blog->name}} </a>
                                    <span style="margin-right: 1rem !important;font-size: 20px;" class="label m-r"> Article </span>
                                </h2>
                                <h4 class="text-muted" style="margin-left: 10px; font-family: bold">{{$blog->content}}</h4>
                                <img src="{{ asset($blog->image) }}" style="padding: 10px;width: 900px;height: 400px;border-radius: 25px" alt="{{ $blog->name }}">
                                <h5 style="margin-left: 15px">
                                    <span class="label m-r">Published by:
                                    </span>
                                    <span class="m-r-sm" style="font-size: 16px;margin-left: -12px;font-family: bold">VPS_Hosting_Support Team  </span>

                                </h5>
                            </div>
                            <hr>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="mt-4">
                    <div style="margin-left: 300px;font-size: 20px">
                        {{$blogs->links()}}
                    </div>
                </div>
            </div>
            @if (auth()->user() == true)
            <p class="btn-groups">
                <button class="btn btn-fw black rounded" style="margin-left: 830px;font-size: 25px; " type="submit">
                    <a style="color: white" href="{{route('Blogs-Create')}}">Create New Blog</a>
                </button>
            </p>
            @endif

        </div>

    </div>

    <!-- ############ PAGE END-->


@endsection
