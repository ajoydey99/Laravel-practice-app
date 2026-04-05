@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card shadow p-3">
            <h4 class="mb-2">Create Customer</h4>
            <!-- Form -->
            <div class="form-section">
                <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Image upload section -->
                    @include('customer.image-upload')

                    <!-- First / Last Name -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control shadow-none" name="first_name"
                                placeholder="Enter your first name" value="{{ old('first_name') }}">
                            @error('first_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control shadow-none" name="last_name"
                                placeholder="Enter your last name" value="{{ old('last_name') }}">
                            @error('last_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Email / Phone -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control shadow-none" name="email"
                                placeholder="Enter your email address" value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control shadow-none" name="phone"
                                placeholder="Enter your phone number" value="{{ old('phone') }}">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Bank Account -->
                    <div class="mb-4">
                        <label for="account_no">Bank Account Number</label>
                        <input type="number" class="form-control shadow-none" name="account_no"
                            placeholder="Enter your account number" value="{{ old('account_no') }}">
                        @error('account_no')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- About -->
                    <div class="mb-4">
                        <label for="about">About</label>
                        <textarea name="about" rows="3" class="form-control shadow-none" placeholder="(Optional)">{{ old('about') }}</textarea>
                    </div>

                    <!-- Create Button -->
                    <button type="submit" class="btn btn-create py-2 px-3 confirm-save" data-action="create">
                        <i class="bi bi-floppy me-2"></i> Create
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
