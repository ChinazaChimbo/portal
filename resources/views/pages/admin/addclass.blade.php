@extends('layouts.app')
@section('page')
    Add Class
@endsection
@section('content')
<p><h1>Add Class</h1></p>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{ Form::open(['url' => 'class/add']) }}
    <p>
        <label for="">Class name</label>
        <input type="text" name="name" required>
    </p>
    <input type="submit" value="Submit">
{{ Form::close() }}
@endsection