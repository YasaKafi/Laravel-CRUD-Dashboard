<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Kelas;

use Illuminate\Http\Request;


class StudentsController extends Controller
{
    public function index()
    {

        return view('student.all', [
            "title"    => "students",
            "students" => Student::latest()->filter(request(['search']))->paginate(5)
        ]);
    }

    public function show($student)
    {
        return view('dashboard.student.detail', [
            "title" => "detail-student",
            "student" => Student::find($student)
        ]);
    }

    public function create()
    {
        return view('dashboard.student.create', [
            "title" => "create-student",
            "kelas" => Kelas::all()
        ]);
    }


    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nis'           => 'required',
            'nama'          => 'required',
            'tanggal_lahir' => 'required|date',
            'kelas_id'      => 'required',
            'alamat'        => 'required',
        ]);

        $result = Student::create($validateData);
        if ($result) {
            return redirect('/student/all')->with('success', 'Data siswa berhasil ditambahkan');
        }
    }


    public function destroy(Student $student)
    {
        $result = Student::destroy($student->id);
        if ($result) {
            return redirect('/dashboard/student')->with('success', 'Data siswa berhasil dihapus');
        }
    }

    public function edit(Student $student)
    {
        return view('dashboard.student.edit', [
            "title" => "edit-data",
            "student" => $student,
            "kelas" => Kelas::all()
        ]);
    }

    public function update(Request $request, Student $student)
    {
        $validateData = $request->validate([
            'nis'           => 'required',
            'nama'          => 'required',
            'tanggal_lahir' => 'required|date',
            'kelas_id'      => 'required',
            'alamat'        => 'required',
        ]);
        $result = Student::where('id', $student->id)->update($validateData);

        if ($result) {
            return redirect('/dashboard/student')->with('success', 'Data siswa berhasil diubah !');
        }
    }
}
