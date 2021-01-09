@extends('layouts.app')
@section('page')
    Edit Student
@endsection
@section('content')
<p><h1>Edit Student</h1></p>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{ Form::open(['url' => 'student/edit', 'files'=>'true']) }}
<img src="{{ asset('images/profile_pictures/'.$student->profile_pic) }}" alt=""><br>
        {{ Form::file('pro_pic') }}
        <p>
            <label for="">Firstname</label>
            <input type="text" name="fname" required value="{{ $student->fname }}">
            <input type="hidden" name="id" value="{{ $student->id }}">
        </p>
        <p>
            <label for="">Middle Name</label>
            <input type="text" name="mname" required value="{{ $student->mname }}">
        </p>
        <p>
            <label for="">Surname</label>
            <input type="text" name="sname" required value="{{ $student->sname }}">
        </p>
        <p>
            <label for="">Username</label>
            <input type="text" name="username" required value="{{ $student->username }}">
        </p>
        
        <p>
            <label for="">Password</label>
            <input type="password" name="password" required value="{{ $student->password }}">
        </p>
        
        <p>
            <label for="">Confirm Password</label>
            <input type="password" name="password_confirmation" required value="{{ $student->password }}">
        </p>
        <p>
            <select name="class" id="">
                @foreach ($classes as $class)
                    @if ($class->id == $student->sclass)
                        <option value="{{ $class->id }}" selected>{{ $class->name }}</option>
                    @else
                        <option value="{{ $class->id }}">{{ $class->name }}</option>   
                    @endif
                @endforeach
            </select>
        </p>
        <p>
            <select name="gender" id="">
                @if ($student->gender == "Male")
                    <option value="Male" selected>Male</option>
                    <option value="Female">Female</option>
                @else
                    <option value="Male">Male</option>
                    <option value="Female" selected>Female</option>
                @endif
            </select>
        </p>
        <p>
            <label for="">Date of Birth</label>
            <input type="date" name="dob" required value="{{ $student->dob }}">
        </p>
        <p>
            <label for="">Email</label>
            <input type="email" name="email" value="{{ $student->email }}">
        </p>
        <p>
            <label for="">Phone Number</label>
            <input type="number" name="pnumber" maxlength="11"  value="{{ $student->phone }}">
        </p>
        <p>
            <label for="">Name of Guardian</label>
            <input type="text" name="guardian" required value="{{ $student->guardian->name }}">
        </p>
        <p>
            <label for="">Guardian phone number</label>
            <input type="number" name="gnumber" required value="{{ $student->guardian->phone }}">
        </p>
        <p>
            <label for="">Address</label><br>
            <textarea name="address" id="" cols="20" rows="5" required>{{ $student->address }}</textarea>
        </p>
        <p>
            <label for="">State of Origin</label>
            <input type="text" name="state" required value="{{ $student->state }}">
        </p>
        <p>
            <label for="">L.G.A</label>
            <input type="text" name="lga" required value="{{ $student->lga }}">
        </p>
        <p>
            <button type="submit">Submit</button>
        </p>
    {{ Form::close() }}
@endsection