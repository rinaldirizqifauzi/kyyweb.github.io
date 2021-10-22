
@extends('dashboard.layouts.main')

@section('container')
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Category</h1>
  </div>

  <div class="col-lg-8">
      <form action="/dashboard/categories/{{ $category->slug }}" method="POST" class="mb-5">
        @method('PUT')
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Nama</label>
          <input type="text" name="name" class="form-control @error('nama') is-invalid @enderror" value="{{ old('name', $category->name) }}" id="name"  required autofocus>
          @error('name')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" name="slug" class="form-control @error('title') is-invalid @enderror" value="{{ old('slug',$category->name) }}" id="slug" disable readonly required>
          @error('slug')
            <div class="invalid-feedback">
                 {{ $message }}
            </div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create Category</button>
      </form>
  </div>

  <script>
      const title = document.querySelector('#name');
      const slug = document.querySelector('#slug');

      title.addEventListener('change', function(){
        fetch('/dashboard/posts/checkSlug?title='+ title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
      });


      document.addEventListener('trix-file-accept', function(e){
          e.preventDefault();
      })
  </script>
@endsection