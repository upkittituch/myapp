@extends('layouts.app')
@section('content')


<div class="container">
    <h1 align="center">แก้ไขข้อมูล</h1>
{!! Form::open(['action' => ['StoreController@update',$data->id],'method'=>'put','files'=>true])!!}
{!! csrf_field() !!}
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Name') !!}
            {!! Form::text('name',$data->name,["class"=>"form-control"])!!}
        </div>
        <div class="form-group">
            {!! Form::label('Price') !!}
            {!! Form::number('price',$data->price,["class"=>"form-control"])!!}
        </div>
        <div class="form-group">
            {!! Form::label('image upload') !!}
            @php
                echo Form::file('img');
            @endphp
        </div>
        <input type="submit" value="update" class="btn btn-primary">
        <a href="/mybot" class="btn btn-success">back</a>
    </div>
{!! Form::close() !!}

</div>
@endsection
