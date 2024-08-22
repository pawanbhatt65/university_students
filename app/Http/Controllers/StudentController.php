<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use DataTables;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{
    // homepage
    public function homepage()
    {
        return view('home');
    }

    // show student list on homepage
    public function getStudentData(Request $request)
    {
        if ($request->ajax()) {
            $data = Student::with('teacher');

            if (!empty($request->input('search.value'))) {
                $search = $request->input('search.value');
                $data->where('student_name', 'LIKE', "%{$search}%");
            }

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('teacher_name', function ($row) {
                    return $row->teacher ? $row->teacher->name : 'N/A';
                })
                ->addColumn('action', function ($row) {
                    $editUrl = route('editStudent', ['id' => $row->student_id]);
                    $deleteUrl = route('deleteStudent', ['id' => $row->student_id]);

                    $title = 'Delete Student!';
                    $text = "Are you sure you want to delete?";
                    confirmDelete($title, $text);

                    $btn = '
                        <a href="' . $editUrl . '" class="edit btn btn-secondary btn-sm">Edit</a>
                            <form method="POST" action="' . route('deleteStudent') . '" style="display:inline;">
                                ' . csrf_field() . '
                                <input type="hidden" name="id" value="' . $row->student_id . '">
                                <button type="submit" class="delete btn btn-danger btn-sm" data-confirm-delete="true">Delete</button>
                            </form>
                    ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    // edit a student
    public function editStudent(Request $request)
    {
        $students = Student::select('students.student_id', 'students.student_name', 'students.class', 'students.admission_date', 'students.yearly_fees', 'students.class_teacher_id', 'teachers.name')
            ->join('teachers', 'students.class_teacher_id', '=', 'teachers.teacher_id')
            ->where('student_id', '=', $request->id)
            ->first();
        // dd($students);
        $teachers = Teacher::get();
        return view('edit_student', ['student' => $students, 'teachers' => $teachers]);
    }

    // update a student
    public function updateStudent(Request $request)
    {
        $rules = [
            'id' => 'required',
            'student_name' => 'required',
            'class' => 'required',
            'admission_date' => 'required',
            'yearly_fees' => 'required',
            'name' => 'required',
        ];
        $request->validate($rules);

        $student_id = $request->id;
        $student_name = $request->student_name;
        $class = $request->class;
        $admission_date = $request->admission_date;
        $yearly_fees = $request->yearly_fees;
        $name = $request->name;
        // dd($student_id, $student_name, $class, $admission_date, $yearly_fees, $name);
        $student = Student::where('student_id', '=', $student_id)->first();
        if ($student) {
            $student->update([
                'student_name' => $student_name,
                'class' => $class,
                'admission_date' => $admission_date,
                'yearly_fees' => $yearly_fees,
                'class_teacher_id' => $name,
            ]);
            Alert::success('Success', 'Student updated successfully!');
            return redirect()->route('homepage');
        } else {
            Alert::warning('Warning Title', 'Student not found!');
            return redirect()->back();
        }
    }
    // student softDelete()
    public function deleteStudent(Request $request)
    {
        $student_id = $request->id;
        $student = Student::where('student_id', '=', $student_id)->first();
        if ($student) {
            $student->delete();
            Alert::success('Success', 'Student deleted successfully!');
        } else {
            Alert::warning('Warning', 'Student not found!');
        }
        return redirect()->route('homepage');
    }
    // add student
    public function addStudent()
    {
        $teachers = Teacher::get();
        return view('addStudent', ['teachers' => $teachers]);
    }
    // store student
    public function storeStudent(Request $request)
    {
        $rules = [
            'student_name' => 'required',
            'class' => 'required',
            'admission_date' => 'required',
            'yearly_fees' => 'required',
            'name' => 'required',
        ];
        $request->validate($rules);
        // dd($request->all());
        $new_student = new Student;
        $new_student->student_name = $request->student_name;
        $new_student->class = $request->class;
        $new_student->admission_date = $request->admission_date;
        $new_student->yearly_fees = $request->yearly_fees;
        $new_student->class_teacher_id = $request->name;

        $new_student->save();
        Alert::success('Success', 'Student added successfully!');
        return redirect()->route('homepage');
    }
}
