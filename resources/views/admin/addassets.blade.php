@extends('admin.dashboard')

    @section('sakshi')
    <h1 class="">Add Assets</h1>
    @if(Session::has('success'))
    <div class="alert alert-success">
    {{Session::get('success')}}
    </div>
    @endif
    <form class="container bg-light" method="post" action="/addasset_insert">
        @csrf
         <div class="form-group">
            <label>Type</label>
            @error('type')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
            <input type="text" class="form-control" name="type" placeholder="Title" >
         </div>
         <div class="form-group">
            <label>description</label>
            @error('description')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
            <textarea type="text" class="form-control" name="description" placeholder="description"></textarea>
         </div>
         <input type="submit" value="submit" class="btn btn-success">
    </form>
    @endsection
