@extends('layouts.afterLogin')
@section('content')

    <header style="background-color: #2e3e4e !important;" class="header-bar mb-3" >
        <div class="container d-flex flex-column flex-md-row align-items-center p-3">
            <h4 class="my-0 mr-md-auto font-weight-normal"><a href="{{route('Index-post-trainee')}}" class="text-white">Test</a></h4>
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
    <form action="{{route('Store-post-trainee')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="post-title" class="text-muted mb-1"><small>Title</small></label>
            <input  name="title"  class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
        </div>

        <div class="form-group">
            <label for="post-body" class="text-muted mb-1"><small> Content</small></label>
            <textarea  name="content"  class="body-content tall-textarea form-control" type="text"></textarea>
        </div>

        <div class="form-group">
            <label for="post-tag" class="text-muted mb-1"><h5> Tags <small>(optional)</small></h5></label><br>
            <select class="js-example-tokenizer" id="tags" name="tags[]" multiple="multiple">
                @foreach($tags as $tag)
                <option  value="{{$tag->id}}" >{{$tag->name}}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Save New Post</button>
    </form>
    <script src=" https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $('select').select2({
            createTag: function (params) {
                var term = $.trim(params.term);

                if (term === '') {
                    return null;
                }

                return {
                    id: term,
                    text: term,
                    newTag: true // add additional parameters
                }
            }
        });
        $(".js-example-tokenizer").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        })
    </script>
</div>
@endsection
