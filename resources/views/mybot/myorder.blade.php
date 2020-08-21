@extends('layouts.app')
@section('content')

{{ csrf_field() }}

<div class="container">

    <h1 align="center">แสดงรายการออเดอร์</h1>
    <br><table class="table"><br>
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">line_id</th>
            <th scope="col">Line_name</th>
            <th scope="col">address</th>
            
            <th scope="col">view</th>

        </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
            <tr>
            <th scope="row">{{$row->id}}</th>
                <td>{{$row->line_id}}</td>
                <td>{{$row->Line_name}}</td>
                <td>{{$row->address}}</td>



            <td>
                @csrf @method('UPDATE')
                <a href="{{route('mybot.edit',$row->id)}}" class="btn btn-warning">view</a>
            </td>


            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</form>


@endsection
