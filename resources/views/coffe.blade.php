@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>type</th>
                        <th>logo</th>
                    </tr>
                    </thead>
                    <tbody>

                    
                        @foreach($data['response'] as $row)
                        <tr>
                        <td>{{$row['name']}}</td>
                        <td>{{$row['type']}}</td>
                        

                        </tr>

                        @endforeach

                    </tbody>

            </table>
        </div>
    </div>
</div>



@endsection