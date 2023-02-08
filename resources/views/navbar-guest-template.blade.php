<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>@yield('navbar-guest-template')</title>
</head>
<body>

    {{-- navbar --}}
    <header>
        <nav class="navbar" style="background-color: #5cb85c">
            <div class="container-fluid">
              <a href="/" class="navbar-brand h1">{{ trans('dicts.Amazing E-Grocery')}}</a>
            <form class="d-flex" method="POST" action="/lang">
                @csrf

                <a href="/register" class="me-2 btn btn-outline-warning" type="submit">{{ trans('dicts.Register')}}</a>

                <a href="/login" class="me-2 btn btn-outline-warning" type="submit">{{ trans('dicts.Login')}}</a>

                <input class="form-check-input" type="hidden" id="flexSwitchCheckDefault" name="language" value="{{Config::get('app.locale') == 'en' ? 'id' : 'en'}}">
                <button class="btn btn-outline-warning" type="submit"> 
                    {{ Config::get('app.lang') == 'en' ? 'Indonesia' : 'English' }}
                </button>

            </form>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    {{-- <footer>
        <nav class="navbar" style="background-color: cadetblue; bottom: 0px; position: fixed; width: 100%;">
            <div class="container-fluid text-center d-flex" style="justify-content: center; align-items: center;">
              <p class="">Amazing E-Grocery 2023</p>
            </div>
        </nav>
    </footer> --}}
    

    


    
</body>
</html>