@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="alert alert-success">تعديل بيانات الأصناف</h1>
                    <form action="{{route('updateItem')}}" method="post">
                        @csrf
                        
                        <input type="hidden" name="id" value="{{$item->id}}">

                        <label for="itemname" class="p-2"> أدخل أسم الصنف: </label>
                        <input type="text" name="itemname" value="{{$item->itemname}}">

                        <label for="price" class="p-2">أدخل سعر الصنف:</label>
                        <input type="text" name="price" value="{{$item->price}}">

                        <label for="qty" class="p-2">أدخل عدد الصنف:</label>
                        <input type="text" name="qty" value="{{$item->qty}}">

                        <label for="color" class="p-2">أدخل لون الصنف:</label>
                        <input type="text" name="color" value="{{$item->color}}">

                        <label for="itemgroupno" class="p-2">أدخل رقم مجموعة الصنف:</label>
                        <input type="text" name="itemgroupno" value="{{$item->itemgroupno}}">


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

@endsection