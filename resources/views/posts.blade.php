
@extends('layouts.main')


@section('container')

<h1 class="mb-3 text-center">{{ $title }}</h1>
  <div class="row justify-content-center mb-3">
    <div class="col-md-6">
      <form action="/posts">
        @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
        @endif
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search...." aria-label="Recipient's username" name="search" value="{{ request('search') }}">
          <button class="btn btn-danger" type="submit">Button</button>
        </div>
      </form>
    </div>
  </div>

  @if ($posts->count())
    <div class="card mb-3">
      @if ($posts[0]->image)
          <div style="max-height:450px; overflow:hidden;">
            <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}">
          </div>
      @else
          <img src="https://source.usplash.com/user/enrondu/1200x400?{{ $posts[0]->category->name }}" alt="{{ $posts[0]->category->name }}" class="img-top" alt="{{ $posts[0]->category->name }}">
      @endif
      <div class="card-body text-center">
        <h5 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h5>
        <small>
          <a class="text-decoration-none" href="/posts?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a> -> 
          <a class="text-decoration-none" href="/posts?category={{ $posts[0]->category->slug }}"> {{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}<br><br>
        </small>
        <p class="card-text">{{ $posts[0]->excerpt }}</p>
        <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-primary btn-sm">Lihat Selengkapnya</a>
      </div>
    </div>


    <div class="container">
      <div class="row">
        @foreach ($posts->skip(1) as $post)
        <div class="col-md-4 mb-3">
          <div class="card" >
            <div class="card">
              <div class="potition-absolute bg-dark px-3  py-2" style="background-color: rgba(0, 0, 0, 0.7)"><a href="/posts?category={{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a></div>
            </div>
            @if ($post->image)
              <img src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
            @else  
              <img src="https://source.unsplash.com/user/erondu/500x300?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
            @endif

            <div class="card-body">
              <h5 class="card-title">{{ $post->title }}</h5>
              <small>
                <a class="text-decoration-none" href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a> 
                <a class="text-decoration-none" href="/categories/{{ $post->category->slug }}"></a> {{ $post->created_at->diffForHumans() }}<br><br>
              </small>
              <p class="card-text">{{ $post->excerpt }}</p>
              <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    
    @else
      <p class="text-center fs-4">Not Post Found</p>
    @endif
    
    <div class="d-flex justify-content-end">
      {{ $posts->links() }}
    </div>
@endsection
