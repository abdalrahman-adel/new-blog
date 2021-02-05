@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            ID : {{$post->id}}
        </div>
        <div class="card-body">
            Title : {{$post->title}}
        </div>
        <div class="card-body">
            Description : {{$post->description}}
        </div>
    </div>

</div>



@endsection
