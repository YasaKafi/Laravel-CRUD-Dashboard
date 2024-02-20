
@extends('layouts.main')

@section('container')
<a href="/kelas/all"><button><ion-icon name="arrow-back-outline"></ion-icon></button></a><br><br>
<h3>Edit Class</h3>

<form action="/kelas/update/{{$kelas->id}}" method="post" onsubmit="return alert('data berhasil diubah!');">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="kelas" class="form-label">Class</label>
        <input type="text" class="form-control" value="{{$kelas->nama_kelas}}" id="kelas" name="nama_kelas" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection



