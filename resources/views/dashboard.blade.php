@extends('layouts.app')
@section('page')
    Dashboard
@endsection

@section('content')
<p>Welcome {{ Auth::user()->name }}</p>
<p>
    What would you like to do?
    <h1>Classes</h1>
    <p>
        <ul>
            <li><a href="class/add">Add Class</a></li>
            <li><a href="class/show">Edit Class</a></li>
        </ul>
    </p>
    <h1>Students</h1>
    <p>
        <ul>    
           <li><a href="student/add">Add Students</a></li>
           <li><a href="student/show">Edit Students</a></li>
        </ul>
    </p>
</p>
<br><br>
<a href="logout">Logout</a>
@endsection