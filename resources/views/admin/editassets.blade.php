<link rel="stylesheet" type="text/css" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins\tempusdominus-bootstrap-4\css\tempusdominus-bootstrap-4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins\jqvmap\jqvmap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css\app.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('js\app.js') }}">



@extends('admin.dashboard')
    @section('sakshi')
    <h1 class="text-success">Edit Assets</h1>
    @if(Session::has('success'))
    <div class="alert alert-success">
    {{Session::get('success')}}
    </div>
    @endif
    <form class="container bg-light" method="post" action="/update">
        @csrf
         <div class="form-group">
            <label>Type</label>
            @error('type')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
            <input type="text" class="form-control" value="{{$data->type}}" name="type" placeholder="Title" >
         </div>
         <div class="form-group">
            <label>description</label>
            @error('description')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
            <textarea  type="text" class="form-control"  name="description" placeholder="description">{{$data->description}}</textarea>
         </div>
         <input type="hidden" name="pid" value="{{$data->id}}">
         <input type="submit" value="submit" class="btn btn-success">
         
    </form>
    @endsection

