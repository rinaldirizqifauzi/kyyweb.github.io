@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Posts, {{ auth()->user()->username }}</h1>
  </div>

  @if (session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
      {{ session('success') }}
    </div>
  @endif
  
  <a href="/dashboard/posts/create" class="btn btn-secondary mb-3" type="button"> Create New Post</a>
  <div class="container">
    <div class="row">
      @foreach ($posts as $post)
      <div class="col-md-6 mb-3">
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            @if ($post->image)
                <div style="max-height: 450px; overflow:hidden;"> 
                  <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid">
                </div>
              @else
                <img src="https://source.unsplash.com/user/erondu/1200x400?{{ $post->title }}" alt="{{ $post->title }}" class="img-fluid">
              @endif
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{ $post->title }}</h5>
              <p class="card-text">{{ $post->category->name }}</p>
              <p class="card-text">{{ $post->type->jenis }}</p>
              <p class="card-text">{{ $post->excerpt }}</p>
              <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure?')"><span data-feather="x-circle"></span></button>
                </form>
              <p class="card-text"><small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p>
            </div>
          </div>
        </div>
      </div>
      </div>
      @endforeach
    </div>
  </div>
@endsection