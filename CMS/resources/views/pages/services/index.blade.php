@extends('layouts.master')
@section('content')
    <!-- ############ PAGE START-->


        <div class="tab-content">
            <div class="tab-pane p-v-sm active" id="tab_1">
                <div class="box m-t p-a-sm">
                    <ul class="list">
                        @foreach($services as $service)
                        <li class="list-item">
                                @if (auth()->user() == true)
                                <button class="btn btn-outline rounded b-info  text-primary" style="margin-left: 931px;margin-bottom: -62px" type="submit">
                                    <a style="font-size: 23px;color: rgba(0,0,0,0.7)" href="{{route('Services-edit',$service->id)}}"> Edit </a>
                                </button>
                                <form method="post" action="{{route('Services-destroy',$service->id)}}">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-outline rounded b-danger text-danger" style="margin-top: -3px;margin-left: 783px; margin-bottom: -25px;font-size: 23px"  type="submit">
                                        Delete
                                    </button>
                                </form>
                                @endif
                                <!-- ############ PAGE END-->
                                <div class="clear">
                                    <h1 class="m-0 m-b-sm"> {{$service->name}} </h1>
                                    <h4 class="m-0 m-b-sm"> {{$service->detail}}</h4>
                                    <br>
                                    <h5 class="text-muted" style=" font-family:bold ">Price: {{$service->price}}$</h5>
                                </div>
                                    <button class="btn btn-fw black" style="margin-left: 900px;font-size: 25px" type="submit">
                                            <a href="{{route('Services-Index')}}"> Purchase Now </a>
                                    </button>
                                    <hr>

                                    @endforeach

                        </li>
                            @if (auth()->user() == true)
                            <button class="btn btn-fw black" style="margin-left: 500px;margin-right: 500px" type="submit">
                                <a href="{{route('Services-Create')}}"> Add </a>
                            </button>
                            @endif





    <!-- ############ PAGE END-->



@endsection
