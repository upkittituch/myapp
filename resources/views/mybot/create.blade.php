@extends('layouts.app')
@section('content')


<div class="container">
    <h1 align="center">เพิ่มข้อมูลสินค้า</h1>
{!! Form::open(['action' => 'StoreController@store','method'=>'post','files'=>true] )!!}
{!! csrf_field() !!}
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('name') !!}
            {!! Form::text('name',null,["class"=>"form-control"])!!}
        </div>
        <div class="form-group">
            {!! Form::label('price') !!}
            {!! Form::number('price',null,["class"=>"form-control"])!!}
        </div>
        <div class="form-group">
            {!! Form::label('image upload') !!}
            {!! Form::file('img') !!}

        </div>
        <input type="submit" value="save" class="btn btn-primary">
        <a href="/mybot" class="btn btn-success">back</a>
    </div>
{!! Form::close() !!}

</div>
@endsection
