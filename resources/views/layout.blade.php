<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/nav.css">
    <link rel="stylesheet" href="/css/layout.css">
    <link rel="stylesheet" href="@yield('css')">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body>
        <header>
            <div class="header_contents">
            @include('header')
            </div>
        </header>
        <div class="global">
            <nav>
                <div class="nav_contents">
                @include('nav')
                </div>
            </nav>
            <main>
                <div class="main_contents">
                @yield('content')
                </div>
            </main>
        </div>
<script type="text/javascript" src="\js\jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="@yield('js')"></script>
<script>
function checkSubmit() {
    if(window.confirm('更新してよろしいですか？')) {
        return true;
    } else {
        return false;
    }
}
</script>
</body>
</html>