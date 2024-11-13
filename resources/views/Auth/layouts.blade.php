<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Real Estate</title>
    <link rel="shortcut icon" type="image/icon" href="/assets/img/logoipsum.svg"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!--font-awesome.min.css-->
    <link rel="stylesheet" href="/assets/admin/css/font-awesome.min.css">
    
    
    <!--style.css-->
    <link rel="stylesheet" href="/assets/admin/css/admin.css">    
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container">
          <a class="navbar-brand" href="{{ URL('/') }}"><img src = "/assets/img/logoipsum.svg"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto navbar-right">
                
                @guest
                    
                @else  
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('category.index') }}">Category Maintenance</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('location.index') }}">Location Maintenance</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('property_type.index') }}">Property Type Maintenance</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('property.index') }}">Properties Maintenance</a>
                    </li>

                    <li class="nav-item">
                       <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                            >Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                    </li>
                    
                @endguest
            </ul>
          </div>
        </div>
    </nav>    

    <div class="container">
        @yield('content')
        
    </div>
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> 
        <!-- Include all js compiled plugins (below), or include individual files as needed -->
                
        <script src="/assets/admin/js/jquery.js"></script>
        <!--bootstrap.min.js-->
        <script src="/assets/admin/js/bootstrap.min.js"></script>
    </body>
</html>