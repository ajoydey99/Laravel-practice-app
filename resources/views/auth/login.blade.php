<x-guest title="Login">
    <div class="card shadow p-4" style="width: 400px;">
        <h3 class="text-center mb-3">Login</h3>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-success">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('authenticate') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email"
                    class="form-control shadow-none @error('email') is-invalid @enderror" placeholder="Enter email"
                    value={{ old('email') }}>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password"
                    class="form-control shadow-none @error('password') is-invalid @enderror"
                    placeholder="Enter password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button class="btn btn-primary w-100">Login</button>
        </form>

        <p class="text-center mt-3">
            Don't have an account? <a href="{{ route('register') }}">Register</a>
        </p>
    </div>
</x-guest>
