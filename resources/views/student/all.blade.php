@extends('layouts.main')

@section('container')
  <h3>Data Siswa</h3>
  <div class="col-md-3">
    <form action="/student/all">
      <div class="input-group  mb-3">
        <input type="text" class="form-control " placeholder="Search" name="search" value="{{request('search')}}">
        <button class="btn btn-info  bg-danger" type="submit" id="button-addon2">Search</button>
      </div>
    </form>
    </div>
  @if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ session('success') }}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

  <table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nis</th>
        <th scope="col">Nama</th>
        <th scope="col">Kelas</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @php
        $no = ($students->currentPage() - 1) * $students->perPage() + 1;

      @endphp

      @foreach ($students as $student)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$student->nis}}</td>
        <td>{{$student->nama}}</td>
        <td>{{$student->kelas->nama}}</td>
        <td>
          <a href="/student/detail/{{$student->id}}" class="btn btn-primary">Detail</a>

          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="d-flex justify-content-center">
    {{ $students->links()}}
  </div>


@endsection
