@extends('layouts.app')
@section('page')
    Confirm student removal
@endsection
@section('content')
    <p>Do you really want to remove {{ $student->fname }} {{ $student->mname }} {{ $student->sname }} from the school?</p>
    <p>
        {{ Form::open(['url' => 'delstudent']) }}
            <input type="hidden" name="id" value="{{ $student->id }}">
            <input type="submit" value="Yes">
        {{ Form::close() }}

        <a href="{{ url('student/show') }}">No</a>
    </p>
@endsection