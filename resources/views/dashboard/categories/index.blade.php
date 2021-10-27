@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tipe Helm, {{ auth()->user()->username }}</h1>
  </div>

  @if (session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
      {{ session('success') }}
    </div>
  @endif

  <div class="table-responsive col-lg-12">
    <a href="/dashboard/categories/create" class="btn btn-secondary mb-3" type="button"> Tambah Tipe Helm</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Gambar</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($categories as $category)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->name }}</td>
            <td>
              @if ($category->image)
                <div style="max-height: 350px; overflow:hidden;"> 
                  <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="img-fluid">
                </div>
              @else
                <img src="https://source.unsplash.com/user/erondu/1200x400?{{ $category->name }}" alt="{{ $category->name }}" class="img-fluid">
              @endif
            </td>
            <td>
                <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action=" /dashboard/categories/{{ $category->slug }}" method="POST" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure?')"><span data-feather="x-circle"></span></button>
                </form>
            </td> 
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>
@endsection