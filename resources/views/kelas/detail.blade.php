@extends('layouts.main')

@section('container')
<a href="/kelas/all"><button><ion-icon name="arrow-back-outline"></ion-icon></button></a><br><br>
<h2>Detail Siswa {{$kelas->nama_kelas}} </h2>

<table class="table table-sm">
    <thead class="table-dark">
      <tr>
        <th scope="col">Nis Siswa</th>
        <th scope="col">Nama Siswa</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($kelas->students as $student)
        <tr>
          <td>{{ $student->nis }}</td>
          <td>{{ $student->nama }}</td>
        </tr>
      @endforeach

    </tbody>
  </table>

@endsection
