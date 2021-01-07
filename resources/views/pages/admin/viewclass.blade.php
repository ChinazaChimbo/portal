@extends('layouts.app')
@section('page')
    View and Edit Classes
@endsection
<p><h1> View and Edit Classes</h1></p>
@if (count($classes) == 0)
    Please <a href="class/add">create classes first</a>
@else
    <div class="alert alert-info">
        Please be careful while deleting classes. Rather rename the class or create a new class and move the students to the new class. 
    </div>
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
            <th>Current Name</th>
            <th>Change Name</th>
            <th>Delete</th>
        </tr>
        @php
            $i = 1;        
        @endphp
        @foreach ($classes as $class)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $class->name }}</td>
                <td>
                    {{ Form::open(['url' => 'class/show/edit']) }}
                        <input type="text" name="name" id="" placeholder="Enter new name" required>
                        <input type="hidden" value="{{ $class->id }}" name="id">
                        <input type="submit" value="change" id="">
                    {{ Form::close() }}
                </td>
                <td>
                    <a href="{{ url('class/show/delete/'.$class->id) }}">Delete</a>
                </td>
            </tr>
            @php
                $i++
            @endphp
        @endforeach
    </table>
@endif
@section('content')

@endsection