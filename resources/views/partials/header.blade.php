<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <meta charset="UTF-8" />
    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Custom Icons -->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />


</head>
