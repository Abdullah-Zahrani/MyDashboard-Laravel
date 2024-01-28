@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-4">
            <form action="{{route('save')}}" method="post">
                @csrf
                <label for="itemgroupname" class="p-2"> ادخل اسم المجموعة</label>
                <input type="text" class="form-control form-control-sm" name="itemgroupname">
                <div class="text-center">
                <button class="btn btn-primary mt-2" type="submit"> حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>


<div class="container mt-3">
    <div class="card-body">
    <table class="table table-bordered text-center">
        <thead>
            <th>رقم المجموعة</th>
            <th>اسم المجموعة</th>
            <th colspan="2">اسم المجموعة</th>
            

        </thead>
        <tbody>
            @foreach($data as $row)
            <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->itemgroupname}}</td>
                <td><a href="{{route('edit', ['x'=>$row->id])}}"><i class="bi bi-pencil-square"></i></a></td>
                <td><a href="{{route('del', ['x'=>$row->id])}}"><i class="bi bi-trash3-fill text-danger"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>

</div>

@endsection