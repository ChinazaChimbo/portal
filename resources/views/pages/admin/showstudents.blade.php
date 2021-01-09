@extends('layouts.app')
@section('page')
    View and Edit Students
@endsection
@section('content')
<p><h1> View and Edit Students</h1></p>
@if (count($classes) == 0)
    Please <a href="class/add">create classes first</a>
@else
@if ($errors->any())

    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <table style="width:100%">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Class</th>
            <th>Action</th>
        </tr>
        @php
            $i = 1;        
        @endphp
        @foreach ($students as $student)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $student->fname }} {{ $student->mname }} {{ $student->sname }}</td>
                <td>{{ $student->class->name }}</td>
                <td><a href="{{ url('student/show/'.$student->id) }}">Edit</a> <a href="{{ url('student/delete/'.$student->id) }}">Delete</a></td>
            </tr>
            @php
                $i++
            @endphp
        @endforeach
    </table>
@endif
@endsection