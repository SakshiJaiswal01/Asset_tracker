@extends('admin.dashboard')
    @section('sakshi')
    <h1 class="">edit categories</h1>
    @if(Session::has('success'))
    <div class="alert alert-success">
    {{Session::get('success')}}
    </div>
    @endif
    <form action="/updatecat" class="container bg-light" method="post" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label>Name</label>
            @error('name')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
            <input type="text" class="form-control" value="{{$data->name}}" name="name" placeholder="Name">
        </div>
        
        <div class="form-group">
            <label>Asset Type:</label>
            @error('product')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
            <select name="pro">
                @foreach($sel as $s)
                <option value="{{$s->id}}">{{$s->type}}</option>
                @endforeach
            </select>
        </div>
        <input type="hidden" name="uid" value="{{$data->id}}">
        
        <input type="submit" value="submit" class="btn btn-success">
    </form>
    @endsection
