@extends('layout.layout')

@section('title')
    Teachers
@endsection
@section('styles')
    <style></style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-hover data-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Teacher Name</th>
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
                ajax: "{{ route('teachers.data') }}",
                columns: [{
                        data: 'teacher_id',
                        name: 'teacher_id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    }
                ]
            });
        });
    </script>
@endsection
