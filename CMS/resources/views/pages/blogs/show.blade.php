@extends('layouts.master')
@section('content')
    <div class="card mt-5">
        <div class="card-body">

                <button class="btn btn-fw black" style="margin-left: 1013px;margin-top: -77px" type="submit">
                <a href="{{route('Blogs-Index')}}"> Back</a>
                </button>
            <div class="row">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                    <div class="form-group">
                        <h4 style="font-family: bold">{{ $Blogs->content }}</h4>
                        <strong>To See Our Services <a style="color: rgba(18,18,117,0.84);" href="{{route('Services-Index')}}">Click here</a></strong>
                    </div>
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <img style="width: 900px;height: 400px;border-radius: 25px;" src="{{ asset($Blogs->image) }}" alt="{{ $Blogs->name }}">
            </div>

        </div>

        </div>
    </div>
@endsection
