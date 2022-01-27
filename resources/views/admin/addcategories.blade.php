@extends('admin.dashboard')
    @section('sakshi')
    <h1 class="">Add categories</h1>
    @if(Session::has('success'))
    <div class="alert alert-success">
    {{Session::get('success')}}
    </div>
    @endif
    <form action="addcat" class="container bg-light" method="post" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label>Name</label>
            @error('name')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
            <input type="text" class="form-control" name="name" placeholder="Name">
        </div>
        <div class="form-group">
            <label>code</label>
            @error('code')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
            @php
            $code=rand(1000000000000000,9999999999999999);
            @endphp
            <input type="text" value="{{$code}}" class="form-control" name="code">
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
        <div class="form-group">
            <label>Image</label>
            @error('image')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
            <input type="file" class="form-control" name="image">
        </div>
        <div class="form-group">
            <input type="radio" name="status" value="1">
            <label>Active</label>
            <input type="radio" name="status" value="0">
            <label>Inactive</label><br>
            @error('status')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
        </div>
        <input type="submit" value="submit" class="btn btn-success">
    </form>
    @endsection
