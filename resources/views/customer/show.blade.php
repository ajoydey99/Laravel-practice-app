@extends('layouts.app')

@section('content')
    {{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif --}}


    <div class="container">
        <div class="card shadow p-3">

            <!-- Header -->
            <div class="profile-header">
                <div class="profile-header-content">
                    <img src={{ asset($customer->image ?? config('constants.default_profile_image')) }} class="profile-img"
                        alt="Profile">
                    <div class="profile-info">
                        <div class="profile-mypanel">
                            <i class="bi bi-grid-1x2-fill"></i>
                            My Panel Customer
                        </div>
                        <div class="profile-welcome">Welcome {{ $customer->first_name }} to the panel</div>
                    </div>
                </div>
            </div>

            <!-- Details -->
            <div class="details-card">
                <div class="details-table">
                    <table class="table table-bordered">
                        <tr>
                            <td>First Name</td>
                            <td>{{ $customer->first_name }}</td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td>{{ $customer->last_name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $customer->email }}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{ $customer->phone }}</td>
                        </tr>
                        <tr>
                            <td>Account Number</td>
                            <td>{{ $customer->account_no }}</td>
                        </tr>
                        <tr>
                            <td>About</td>
                            <td>
                                {{ $customer->about ?? 'Share somthing about yourself' }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
