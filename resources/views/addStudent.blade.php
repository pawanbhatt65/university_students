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
                            <form action="{{ route('student.storeStudent') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Student Name</label>
                                    <input type="text" name="student_name" class="form-control" id=""
                                        value="{{ old('student_name') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Class</label>
                                    <input type="text" name="class" class="form-control" id=""
                                        value="{{ old('class') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Admision Date</label>
                                    <input type="date" name="admission_date" class="form-control" id=""
                                        value="{{ old('admission_date') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Yearly Fees</label>
                                    <input type="text" name="yearly_fees" class="form-control" id=""
                                        value="{{ old('yearly_fees') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Class Teacher</label>
                                    <select name="name" class="form-select" aria-label="Default select example"
                                        value="{{ old('name') }}" required>
                                        <option value="" selected>Class Teacher</option>
                                        @if (count($teachers) > 0)
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->teacher_id }}">{{ $teacher->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Student</button>
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
