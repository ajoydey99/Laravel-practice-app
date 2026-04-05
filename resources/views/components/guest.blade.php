<!DOCTYPE html>
<html lang="en">

@include('partials.header')

</head>

<body>

    <main>
        {{ $slot }}
    </main>

    @include('partials.footer')


</body>

</html>
