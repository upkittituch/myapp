@extends('layouts.app')
@section('content')


 {{ csrf_field() }}

    <div class="container">

        <h1 align="center">แสดงรายการสินค้า</h1>
        <a href ="/mybot/create" class="btn btn-primary" >Create</a>
        <a href ="/myorder" class="btn btn-primary" >Order</a>
        <br><table class="table"><br>
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">price</th>
                <th scope="col">img</th>
                <th scope="col">edit</th>
                <th scope="col">delete</th>
            </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
                <tr>
                <th scope="row">{{$row->id}}</th>
                    <td>{{$row->name}}</td>
                    <td>{{$row->price}}</td>
                    <td><img src="{{asset($row->img)}}"style="
                        width: 150px;
                        height: 150px;"
                    /></td>
                <td>
                    @csrf @method('UPDATE')
                    <a href="{{route('mybot.edit',$row->id)}}" class="btn btn-warning">edit</a>
                </td>
                    <td>
                        @csrf @method('DELETE')
                    <form action="{{route('mybot.destroy',$row->id)}}"method="post">
                        <input type="submit" value="delete"class="btn btn-danger" onclick=" return confirm('u want delete ? {{$row->name}}') ">

                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</form>


@endsection
