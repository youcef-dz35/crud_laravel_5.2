@extends('layouts.admin')

@section('content')

<h1>Categories</h1>

<div class="col-sm-6">

    {!! Form::open(['method'=>'POST', 'action'=>'AdminCatrgoriesController@store'])  !!}

    <div class="form-group">

      {!! Form::label('name','Name:') !!}
      {!! Form::text('name', null, ['class'=>'form-control'] ) !!}

    </div>

    <div class="form-group">
      {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
</div>




<div class="col-sm-6">

  @if($categories)

  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Created Date</th>
      </tr>
    </thead>
    @foreach($categories as $category)
    <tbody>
      <tr>

      <td>{{$category->id}} </td>
      <td>{{$category->name}}</td>
      <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'Not Dated'}}</td>
      </tr>
    </tbody>
    @endforeach


  </table>
  @endif

</div>

@stop
