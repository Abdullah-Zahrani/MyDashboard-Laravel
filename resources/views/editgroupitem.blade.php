@extends('layouts.app')

@section('content')

<div class="container text-center">
    <div class="row text-center">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    
                    <h1 class="alert alert-success">تعديل بيانات مجموعات الاصناف</h1>
                    <form action="{{route('update')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$item->id}}">  
                        <input type="text" name="namegroup" value="{{$item->itemgroupname}}">
                           
           
                        <div class="row mt-3">
                           <div class="col text-center ">
                               <button type="submit" class="btn btn-success">حفظ</button>
                           </div>
                        </div>
           
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection