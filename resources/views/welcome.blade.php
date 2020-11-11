<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Library Management @yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

    <!-- font awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">

    <style>
        body {
            font-family: 'Nunito';
        }

    </style>

</head>

<body class="antialiased">

    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-info">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home')}}" style="font-size: 25px">Library Management</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                <ul class="navbar-nav mr-auto">
                    @auth

                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>

                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Category
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route ('addCategory')}}">Add category</a>
                            <a class="dropdown-item" href="{{ route('categoryList') }}">List Category</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Book
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route ('addBook')}}">Add Book</a>
                            <a class="dropdown-item" href="{{ route('bookList') }}">List Book</a>
                            <a class="dropdown-item" href="#">Book Lost</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Member
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route ('addMember')}}">Add Member</a>
                            <a class="dropdown-item" href="{{ route('memberList')}}">List Member</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Borrowing
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route ('selectMemberBorrow')}}">Add Borrowing</a>
                            <a class="dropdown-item" href="{{ route('listBorrow') }}">List Borrowing</a>
                        </div>
                    </li>

                    @else
                    <li class="nav-item dropdown">
                        <a href="{{ route('login')}}" class="nav-link active">Login<i
                                class="fas fa-sign-in-alt mx-2"></i></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{ route('register')}}" class="nav-link active">Register<i
                                class="fas fa-user-plus mx-2"></i></a>
                    </li>
                    @endif
                </ul>

            </div>

        </div>
    </nav>
    
    @yield('content')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
