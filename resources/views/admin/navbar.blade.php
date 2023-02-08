<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>@yield('navbar-admin')</title>
</head>
<body>
    <header>
        <nav class="navbar" style="background-color: #5cb85c">
            <div class="container-fluid">
                <a href="/home" class="navbar-brand h1">{{ trans('dicts.Amazing E-Grocery')}}</a>
            <form class="d-flex">
                <a href="/logout" class="btn btn-outline-warning" type="submit">{{ trans('dicts.Logout')}}</a>
            </form>
            </div>
        </nav>
    </header>
    
    <nav class="navbar navbar-expand-lg" style="background-color: #f0ad4e">
        <div class="container-fluid d-flex" style="justify-content: center; align-items:center">
            <ul class="navbar-nav">
                <li class="nav-item me-3">
                    <a class="nav-link active" aria-current="page" href="/home">{{ trans('dicts.Home')}}</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link disable" href="#">{{ trans('dicts.Cart')}}</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link active" href="/profile">{{ trans('dicts.Profile')}}</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link active" href="/account-maintenance">{{ trans('dicts.Account Maintenance')}}</a>
                </li>
            </ul>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

</body>
</html>