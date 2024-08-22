@extends('layout.layout')

@section('title')
    Update Student
@endsection
@section('styles')
    <style></style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 col-xxl-6 mx-auto">
                <div class="mt-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('student.updateStudent') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $student->student_id }}">
                                <div class="mb-3">
                                    <label for="" class="form-label">Student Name</label>
                                    <input type="text" name="student_name" class="form-control" id=""
                                        value="{{ $student->student_name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Class</label>
                                    <input type="text" name="class" class="form-control" id=""
                                        value="{{ $student->class }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Admision Date</label>
                                    <input type="date" name="admission_date" class="form-control" id=""
                                        value="{{ $student->admission_date }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Yearly Fees</label>
                                    <input type="text" name="yearly_fees" class="form-control" id=""
                                        value="{{ $student->yearly_fees }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Class Teacher</label>
                                    <select name="name" class="form-select" aria-label="Default select example">
                                        <option selected value="{{ $student->class_teacher_id }}">{{ $student->name }}
                                        </option>
                                        @if (count($teachers) > 0)
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->teacher_id }}">{{ $teacher->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Update Student</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script></script>
@endsection
