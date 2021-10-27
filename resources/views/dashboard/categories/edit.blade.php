
@extends('dashboard.layouts.main')

@section('container')
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Ubah Tipe Helm</h1>
  </div>

  <div class="col-lg-8">
      <form action="/dashboard/categories/{{ $category->slug }}" method="POST" class="mb-5" enctype="multipart/form-data">
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
          <input type="text" name="slug" class="form-control @error('title') is-invalid @enderror" value="{{ old('slug',$category->slug) }}" id="slug" disable readonly required>
          @error('slug')
            <div class="invalid-feedback">
                 {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Upload Logo Kategori</label>
          <input type="hidden" name="oldImage" value="{{ $category->image }}">
          @if ($category->image)
            <img src="{{ asset('storage/' . $category->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
          @else
            <img class="img-preview img-fluid mb-3 col-sm-5">
          @endif
          <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
          @error('image')
          <div class="invalid-feedback">
               {{ $message }}
          </div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Tipe Helm</button>
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

      function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent){
          imgPreview.src = oFREvent.target.result;
        }
      }
  </script>
@endsection