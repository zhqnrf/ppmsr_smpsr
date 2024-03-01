<!DOCTYPE html>
<html lang="en">

<head data-bs-theme="dark">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="" type="image/x-icon">
    <title>{{ $pageTitle }}</title>
    @include('components.styleAndScript.top')
    @yield('html-head-bottom')
</head>

<body>
    <header></header>
    <main class="container-fluid">
        <div id="content">
            @yield('content')
        </div>
    </main>
    <footer></footer>
    @include('components.styleAndScript.bottom')
    @yield('html-body-bottom')
</body>

</html>
