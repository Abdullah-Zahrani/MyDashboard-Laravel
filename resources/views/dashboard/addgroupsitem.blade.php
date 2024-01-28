@extends('layouts.dashboard')

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
    <div class="row text-center">
        <div class="col-sm-12">            
        
            <div class="card">
                <div class="car-body mt-3">
                    <form action="{{route('save')}}" method="post">
                        @csrf
                        <label for="itemgroupname" class="mt-2">أسم المجموعة: </label>
                        <input type="text" name="itemgroupname" id="itemgroupname">
                        <div class="row mt-1 p-1">
                            <div class="col">
                                <button class="btn btn-primary" type="submit"> حفظ</button>
                            </div>
                        </div>
                        
                    </form>
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

</div>
</div>
</div>


@endsection