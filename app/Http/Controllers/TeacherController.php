<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use DataTables;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    // teachers
    public function teachers()
    {
        return view('teachers');
    }
    // get all teacher data
    public function getTeacherData(Request $request)
    {
        if ($request->ajax()) {
            $teachers = Teacher::select('teacher_id', 'name');
            return Datatables::of($teachers)
                ->addIndexColumn()
                ->make(true);
        }
    }
}
