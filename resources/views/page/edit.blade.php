@extends('layout.layout')

@section('content')

<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{$err}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{url('update')}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$data->id}}">
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" value="{{$data->name}}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" value="{{$data->email}}">
        </div>
        <div class="form-group">
            <label for="phone">Tel</label>
            <input class="form-control" type="tel" name="phone" value="{{$data->phone}}">
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="date">Date of Birth</label>
                <input class="form-control" type="date" name="dob" value="{{$data->dob}}" >
        </div>
        <button class="btn btn-success" type="submit" name="submit">Update</button>
    </form>
</div>

@endsection
