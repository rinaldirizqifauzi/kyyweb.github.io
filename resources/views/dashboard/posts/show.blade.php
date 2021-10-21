@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h2 class="mb-3"> {{ $post->title }} </h2>
            
            <a href="/dashboard/posts" class="btn btn-success btn-sm mb-3"><span data-feather="arrow-left"></span> Back To all My Posts</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning btn-sm mb-3"><span data-feather="edit"></span> Edit</a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger btn-sm mb-3" onclick="return confirm('Are You Sure?')"><span data-feather="x-circle"></span>Delete</button>
            </form>

            <img src="https://source.unsplash.com/user/erondu/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
            
            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>
        </div>
    </div>
</div>
@endsection