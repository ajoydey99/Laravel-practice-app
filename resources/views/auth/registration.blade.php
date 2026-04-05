<x-guest title="Registration">

    <div class="card shadow p-4" style="width: 600px;">
        <h3 class="text-center mb-3">Register</h3>
        {{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif --}}
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text" class="form-control shadow-none @error('name') is-invalid @enderror" name="name"
                    placeholder="Full Name" value={{ old('name') }}>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" class="form-control shadow-none @error('email') is-invalid @enderror"
                    name="email" placeholder="Email address" value={{ old('email') }}>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" class="form-control shadow-none @error('password') is-invalid @enderror"
                    name="password" placeholder="Enter Password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>Confirm Password</label>
                <input type="password" class="form-control shadow-none @error('password') is-invalid @enderror"
                    placeholder="Confirm Password" name="password_confirmation">
            </div>

            <button class="btn btn-primary w-100">Register</button>
        </form>

        <p class="text-center mt-3">
            Already have an account? <a href="{{ route('login') }}">Login</a>
        </p>
    </div>
</x-guest>
