@extends('dashboard.main')
@section('content')
<div class="row justify-content-end mt-3">
  <div class="col-md-3">
  <form action="/dashboard/student">
    <div class="input-group  mb-3">
      <input type="text" class="form-control " placeholder="Search" name="search" value="{{request('search')}}">
      <button class="btn btn-info  bg-success" type="submit" id="button-addon2">Search</button>
    </div>
  </form>
  </div>
  </div>

  <a href="/student/create" class="btn btn-primary bg-success">Add</a>

<table class="table table-sm mt-3">
  <thead class="table-dark">
    <tr>
      <th scope="col">Nis</th>
      <th scope="col">Name</th>
      <th scope="col">Birthdate</th>
      <th scope="col">Class</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($student as $students)
      <tr>
      <td>{{ $students->nis }}</td>
      <td>{{ $students->nama }}</td>
      <td>{{ $students->tanggal_lahir }}</td>
      <td>{{ $students->kelas->nama}}</td>
      <td>{{ $students->alamat }}</td>
      <td>

        <div class="d-flex gap-2">

          <a href="/student/edit/{{ $students->id }}" class="btn btn-primary"> Edit</a>
        <form action="/student/delete/{{ $students->id }}" method="post" onsubmit="return confirm('Are you sure you want to delete this student?');">
          @csrf
          @method('DELETE')
          <button type="submit">
              <ion-icon name="trash-outline"></ion-icon>
          </button>
      </form>
        </div>


      </td>
    </tr>
      @endforeach
  </tbody>
</table>

<div class="d-flex justify-content-center">
  {{ $student->links() }}
</div>

@endsection
