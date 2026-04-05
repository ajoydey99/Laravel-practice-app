<!DOCTYPE html>
<html lang="en">

@include('partials.header')

<body>


    @include('partials.sidebar')

    <div class="content">
        @include('partials.dropdown')
        @yield('content')
    </div>


    @include('partials.footer')

</body>

</html>
