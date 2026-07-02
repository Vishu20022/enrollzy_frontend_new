@extends('layouts.master')

@section('content')
<section class="py-5 mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1 class="mb-4">Welcome, Mentor!</h1>
                <p class="lead">This is your dedicated mentor dashboard.</p>
                <form action="{{ route('mentor.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger mt-3">Logout</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
