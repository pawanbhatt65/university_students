@extends('layout.layout')

@section('title')
    Admin: Dashboard
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
                        <div class="card-header">
                            <h1>Dashboard</h1>
                            <h3>Welcome, {{ Auth::user()->name }}</h3>
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
