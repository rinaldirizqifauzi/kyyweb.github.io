@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Merek Helm, {{ auth()->user()->username }}</h1>
  </div>

  @if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('success') }}
    </div>
  @endif

  <div class="table-responsive col-lg-12">
    <a href="/dashboard/types/create" class="btn btn-secondary mb-3" type="button"> Tambah Merek Helm</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Merek Helm</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($types as $type)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $type->jenis }}</td>
            <td>
                <a href="/dashboard/types/{{ $type->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/dashboard/types/{{ $type->slug }}" method="POST" class="d-inline">
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