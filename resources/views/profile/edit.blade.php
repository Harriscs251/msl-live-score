@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <!-- Profile Edit Form Card -->
        <div class="col-md-8">
            <div class="card shadow-lg border-light rounded-3">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Edit Your Profile</h4>
                </div>
                <div class="card-body">
                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Profile Form -->
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Name Input -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" required>
                        </div>

                        <!-- Email Input -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}" required>
                        </div>

                        <!-- Password Input -->
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password (Optional)</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <!-- Password Confirmation Input -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password (Optional)</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <!-- Profile Image Upload -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Profile Image</label>
                            <input type="file" name="image" class="form-control">
                            @if(auth()->user()->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="Profile Image" class="img-fluid" style="max-width: 100px;">
                                </div>
                            @endif
                        </div>

                        <!-- Update Button -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success">Update Profile</button>
                            <!-- Back Button -->
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
