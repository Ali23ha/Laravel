@extends('layouts.master')
@section('content')
    <form method="post" action="{{route('Services-update',$services->id)}}">
        @csrf
        @method('PUT')
        <div class="padding">
            <div class="row" style=" display: inline-block!important; width: 1100px!important; height: fit-content">
                <div class="box">
                    <div class="box-header">
                        <h2>Create a New Service</h2>
                    </div>
                    <div class="box-divider m-0"></div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Service's Name</label>
                            <input type="text" value="{{$services->name}}" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Service's Name here">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Service's Detail</label>
                            <input type="text" class="form-control" value="{{$services->detail}}" name="detail" id="exampleInputEmail1" placeholder="Enter Service's Detail here">
                        </div>
                        <label for="exampleInputEmail1">Price</label>
                        <input type="number" class="form-control" value="{{$services->price}}" name="price" id="exampleInputEmail1" >
                    </div>
                    <button type="submit" class="btn btn-outline rounded b-primary text-primary">Save
                    </button>
                </div>
            </div>
        </div>
        </div>
    </form>

@endsection
