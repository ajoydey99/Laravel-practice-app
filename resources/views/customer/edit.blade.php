@extends('layouts.app')

@section('content')
    {{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif --}}

    <div class="container">

        <div class="card shadow p-3">
            <h4 class="mb-2">Edit Customer</h4>
            <!-- Form -->
            <div class="form-section">
                <form action="{{ route('customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Image update section -->
                    <div class="text-center mb-4">

                        <!-- Clickable Image -->
                        <label for="imageUpload" style="cursor: pointer;">

                            <img id="previewImage"
                                src={{ asset($customer->image ?? config('constants.default_profile_image')) }}
                                class="edit-img shadow">

                        </label>

                        <!-- Hidden File Input -->
                        <input type="file" name="image" id="imageUpload" class="d-none">

                        @if ($errors->has('image'))
                            <div class="mt-2 text-danger">
                                {{ $errors->first('image') }}
                            </div>
                        @else
                            <div class="mt-2 text-muted small">
                                Click on image to upload
                            </div>
                        @endif

                    </div>


                    <!-- First / Last Name -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control shadow-none" name="first_name"
                                placeholder="Enter your first name" value="{{ old('first_name', $customer->first_name) }}">
                            @error('first_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control shadow-none" name="last_name"
                                placeholder="Enter your last name" value="{{ old('last_name', $customer->last_name) }}">
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
                                placeholder="Enter your email address" value="{{ old('email', $customer->email) }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control shadow-none" name="phone"
                                placeholder="Enter your phone number" value="{{ old('phone', $customer->phone) }}">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Bank Account -->
                    <div class="mb-4">
                        <label for="account_no">Bank Account Number</label>
                        <input type="number" class="form-control shadow-none" name="account_no"
                            placeholder="Enter your account number" value="{{ old('account_no', $customer->account_no) }}">
                        @error('account_no')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- About -->
                    <div class="mb-4">
                        <label for="about">About</label>
                        <textarea name="about" rows="3" class="form-control shadow-none" placeholder="(Optional)">{{ old('about', $customer->about) }}</textarea>
                    </div>

                    <!-- Create Button -->
                    <button type="submit" class="btn btn-create py-2 px-3 confirm-save" data-action="update">
                        <i class="bi bi-floppy me-2"></i> Update
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
