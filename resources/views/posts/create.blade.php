@extends('layouts.app')

@section('content')
<div class="container mt-5">
<form action="{{route('posts.store')}}" method="POST">
@csrf
  <div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" class="form-control" name="title">
    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
   
  <div class="mb-3">
    <label class="form-label">Description</label>
    <textarea class="form-control" name="description"></textarea>
    @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <select class="form-select" >
    @foreach ($users as $user)
    <option selected id="$user->id" name="user_name">{{$user->name}} </option>
    @endforeach
    </select>
  </div>
 
  <button type="submit" class="btn btn-primary">Create Post</button>
</form>
</div>

@endsection
