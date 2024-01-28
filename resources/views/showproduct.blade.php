@extends('layouts.app')

@section('content')

<div class="container">

@foreach($data as $row)
    <div class="card mt-2">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <img src="/image/{{$row->image}}" width="200" height="200">
                </div>
                <div class="col-sm-9 text-start">
                <h3 class="alert alert-success text-dark">{{$row->itemname}}</h3>
                <h5>price: {{$row->price}}</h3>
                    <div class="row">
                        <div class="col text-center">
                            
                            <a href="{{route('AddtoCart', ['id'=>$row->id])}}" class="btn btn-success">Add To Card</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endforeach

</div>
@endsection