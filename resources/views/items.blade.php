@extends('layouts.app')



@section('content')

<style>
    tr:nth-child(even) {
   background-color: rgba(150, 212, 212, 0.4);
}

th:nth-child(even),td:nth-child(even) {
background-color: rgba(150, 212, 212, 0.4);
}
      body{
          direction: rtl;
          
      }
      *{
          font-family: cairo;
      }
  </style>  

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                
                    <form action="{{route('saveitem')}}" method="post">
                        
                        @csrf
                        <div class="row">
                        <div class="col-sm-4">
                        <label for="itemname" class="p-2"> أدخل أسم الصنف: </label>
                        <input type="text" class="form-control form-control-sm" name="itemname">
                        </div>

                        <div class="col-sm-4">
                        <label for="price" class="p-2">أدخل سعر الصنف:</label>
                        <input type="text" class="form-control form-control-sm" name="price">
                        </div>
                    
                        <div class="col-sm-4">
                        <label for="qty" class="p-2">أدخل عدد الصنف:</label>
                        <input type="text" class="form-control form-control-sm" name="qty">
                        </div>

                        <div class="col-sm-4">
                        <label for="color" class="p-2">أدخل لون الصنف:</label>
                        <input type="text" class="form-control form-control-sm" name="color">
                        </div>
                    
                        <div class="col-sm-4">
                        <label for="itemgroupno" class="p-2">أدخل رقم مجموعة الصنف:</label>
                        <input type="text" class="form-control form-control-sm" name="itemgroupno">
                        </div>
                        
                        <div class="col-sm-4">
                            <label for="itemgroupno" class="p-2">أدخل صورة الصنف:</label>
                            <input type="file" class="form-control form-control-sm" name="image">
                            </div>
                        
                        
                        <div class="text-center">
                            <button class="btn btn-primary mt-3"> حفظ</button>
                        </div>
                    </div>
                    </form>
                
            </div>
        </div>
    </div>


<div class="container mt-3">
    <div class="card-body">
        <table class="table table-bordered text-center">
            
            <thead>
                <th>رقم الصنف</th>
                <th>اسم الصنف</th>
                <th>سعر الصنف</th>
                <th>عدد الصنف</th>
                <th>لون الصنف</th>
                <th>رقم الصنف</th>
                <th colspan="2"> تعديل</th>
            </thead>

            <tbody>
                @foreach($data as $row)
                <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->itemname}}</td>
                <td>{{$row->price}}</td>
                <td>{{$row->qty}}</td>
                <td>{{$row->color}}</td>
                <td>{{$row->itemgroupno}}</td>
                <td><a href="{{route('editItem', ['x'=>$row->id])}}"><i class="bi bi-pencil-square"></i></a></td>
                <td><a href="{{route('deleteitems', ['x'=>$row->id])}}"><i class="bi bi-trash3-fill text-danger"></i></a></td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
</div>

@endsection