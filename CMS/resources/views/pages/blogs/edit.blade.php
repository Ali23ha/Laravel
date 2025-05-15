@extends('layouts.master')
@section('content')
    <form method="post" action="{{route('Blogs-update',$blogs->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="padding">
            <div class="row" style=" display: inline-block!important; width: 1100px!important; height: fit-content">
                <div class="box">
                    <div class="box-header">
                        <h2>Create a New Blog</h2>
                    </div>
                    <div class="box-divider m-0"></div>
                    <div class="box-body">
                        <form role="form">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Blog's Name</label>
                                <input type="text" value="{{$blogs->name}}" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter blog's name here">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Content</label>
                                <input class="form-control" value="{{$blogs->content}}" name="content" id="exampleInputPassword1"  rows="5" cols="50">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Published By  </label>
                                <select class="form-select" name="publisher" aria-label="Default select example">
                                    <option value="X_team SUPPORT">  X_team SUPPORT </option>
                                </select>
                            </div>
                            <label for="image">Image:</label>
                            <input type="file" name="image" id="image">


                            <button type="submit" class="btn btn-outline rounded b-primary text-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </form>
@endsection
