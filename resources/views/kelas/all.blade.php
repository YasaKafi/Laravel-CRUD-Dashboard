@extends('layouts.main')

@section('container')

<table class="table table-sm">
    <thead class="table-dark">
      <tr>
        <th scope="col">Class</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($kelass as $kelas)
        <tr>
        <td>{{ $kelas->nama }}</td>
        <td>

          <div class="d-flex gap-2">
            <a href="/kelas/detail{{ $kelas->id }}"> <button><ion-icon name="information-outline"></ion-icon></button></a>
          </div>

          {{-- <div class="d-flex gap-2">
            <a href="/kelas/edit/{{ $kelas->id }}"> <button><ion-icon name="create-outline"></ion-icon></button></a>
          <form action="/kelas/delete/{{ $kelas->id }}" method="post" onsubmit="return confirm('Are you sure you want to delete this student?');">
            @csrf
            @method('DELETE')
            <button type="submit">
                <ion-icon name="trash-outline"></ion-icon>
            </button>
        </form> --}}
          </div>


        </td>
      </tr>
        @endforeach
    </tbody>
  </table>
  {{-- <a href="/kelas/create"><button><ion-icon name="add-outline"></ion-icon></button></a> --}}
@endsection
