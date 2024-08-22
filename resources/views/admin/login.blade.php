@extends('layout.layout')

@section('title')
    Admin: Log-In
@endsection
@section('styles')
    <style></style>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-lg-10 col-xxl-6 mx-auto">
                <div class="">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('loginAdmin') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id=""
                                        value="{{ old('email') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id=""
                                        value="" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </form>
                        </div>
                        @if ($errors->any())
                            <div class="card-footer">
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script></script>
@endsection
