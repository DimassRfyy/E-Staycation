<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @stack('before-styles')
    <link href="{{ asset  ('output.css') }}" rel="stylesheet">
    @stack('after-styles')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

</head>

<body class="font-poppins text-[#070625]">
    @yield('content')
    @stack('before-scripts')

    @stack('after-scripts')
</body>

</html>
