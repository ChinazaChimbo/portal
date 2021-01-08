@extends('layouts.app')
@section('page')
    Add Student
@endsection

@section('content')
<p><h1>Add Student</h1></p>
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
    {{ Form::open(['url' => 'student/add', 'files'=>'true']) }}
        {{ Form::file('pro_pic') }}
        <p>
            <label for="">Firstname</label>
            <input type="text" name="fname" required>
        </p>
        <p>
            <label for="">Middle Name</label>
            <input type="text" name="mname" required>
        </p>
        <p>
            <label for="">Surname</label>
            <input type="text" name="sname" required>
        </p>
        <p>
            <label for="">Username</label>
            <input type="text" name="username" required>
        </p>
        
        <p>
            <label for="">Password</label>
            <input type="password" name="password" required>
        </p>
        
        <p>
            <label for="">Confirm Password</label>
            <input type="password" name="password_confirmation" required>
        </p>
        <p>
            <select name="class" id="">
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
        </p>
        <p>
            <select name="gender" id="">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </p>
        <p>
            <label for="">Date of Birth</label>
            <input type="date" name="dob" required>
        </p>
        <p>
            <label for="">Email</label>
            <input type="email" name="email">
        </p>
        <p>
            <label for="">Phone Number</label>
            <input type="number" name="pnumber" maxlength="11">
        </p>
        <p>
            <label for="">Name of Guardian</label>
            <input type="text" name="guardian" required>
        </p>
        <p>
            <label for="">Guardian phone number</label>
            <input type="number" name="gnumber" required>
        </p>
        <p>
            <label for="">Address</label><br>
            <textarea name="address" id="" cols="20" rows="5" required></textarea>
        </p>
        <p>
            <label for="">State of Origin</label>
            <input type="text" name="state" required>
        </p>
        <p>
            <label for="">L.G.A</label>
            <input type="text" name="lga" required>
        </p>
        <p>
            <button type="submit">Submit</button>
        </p>
    {{ Form::close() }}
@endif
@endsection