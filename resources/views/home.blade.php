@extends('layout.layout')

@section('title')
    Home
@endsection
@section('styles')
    <style></style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mt-3 text-end mb-3">
                    <a href="{{ route('addStudent') }}" class="btn btn-primary btn-sm">
                        Add Student
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover data-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Class</th>
                                <th scope="col">Teacher Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                lengthChange: false,
                pageLength: 50,
                infoEmpty: "No student found to show",
                emptyTable: "No student available in table",
                zeroRecords: "No matching student records found",
                ajax: "{{ route('students.data') }}",
                columns: [{
                        data: 'student_id',
                        name: 'student_id'
                    },
                    {
                        data: 'student_name',
                        name: 'student_name'
                    },
                    {
                        data: 'class',
                        name: 'class'
                    },
                    {
                        data: 'teacher_name',
                        name: 'teacher_name'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>

    {{-- for delete a student --}}
    <script>
        $(document).on('click', 'button[data-confirm-delete]', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you really want to delete this student?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
