@extends('layouts.app')

@section('content')
<div class="container mt-5 ">
<div class="container mb-3"><h1>Posts Page</h1></div>
<a href="{{route('posts.create')}}" class="btn btn-primary mb-5">Create Post</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Posted By</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      @if($post->user)
      <td>{{$post->user->name}} </td>
      @else
         <td>  no users </td>
      
      @endif
      <td>{{$post->created_at}}</td>
      <td>
        <a href="{{route('posts.show', [$post->id])}}" class="btn btn-primary">Show</a>
        <a href="{{route('posts.edit', [$post->id])}}" class="btn btn-success">Edit</a>
        <form style="display:inline;" action="{{route('posts.destroy', [$post->id])}}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

@endsection
