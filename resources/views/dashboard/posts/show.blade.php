@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h2 class="mb-3"> {{ $post->title }} </h2>
            
            <a href="/dashboard/posts" class="btn btn-success btn-sm mb-3"><span data-feather="arrow-left"></span> Back To all My Posts</a>
            <a href="" class="btn btn-warning btn-sm mb-3"><span data-feather="edit"></span> Edit</a>
            <a href="" class="btn btn-danger btn-sm mb-3"><span data-feather="x-circle"></span> Delete</a>

            <img src="https://source.unsplash.com/user/erondu/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
            
            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>
        
        <a class="d-block mt-3" href="/posts">Kembali</a>
        </div>
    </div>
</div>
@endsection