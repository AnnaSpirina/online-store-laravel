
<!doctype html>
<html lang="ru" class="h-100" data-bs-theme="auto">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Интернет-магазин | @yield('title')</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js">
</script>
  </head>
  <body class="d-flex flex-column h-100">
    <header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
        <a class="navbar-brand" href="{{route('index')}}">
            <img src="/images/logo.png"
                 height="30"
                 alt="Интернет-магазин"
                 loading="lazy" />
        </a>
        <a class="navbar-brand" href="{{route('index')}}">Интернет-магазин</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" id="products" href="{{route('index')}}">Товары</a>
                </li>
                @php
                    $count=0;
                    $cart = session()->get('cart');
                    if ($cart!=null){
                        foreach($cart as $item){
                            $count+=$item['quantity'];
                        }
                    }
                @endphp
                <li class="nav-item">
                    <a class="nav-link" id="cart" href="{{route('cart')}}"><i class="fa fa-shopping-cart fa-lg"></i><sup>{{$count}}</sup></a>
                </li>
            </ul>
        </div>
        </div>
    </nav>
    </header>

    <!-- Begin page content -->
    <main class="flex-shrink-0">
    <div class="container">
        @yield('content')
    </div>
    </main>

    <footer class="footer mt-auto py-3 bg-body-tertiary">
    <div class="container">
        <p>&copy; 2024 Анна Спирина</p>
    </div>
    </footer>
    <script src="/js/bootstrap.bundle.min.js"></script>
    </body>
</html>