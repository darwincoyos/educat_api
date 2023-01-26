<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        body{
            background-color: #ffffff;
        }
        .sidebar{
            position: fixed;
            top:0;
            left: 0;
            height: 100%;
            width:250px;
            padding: 10px 14px;
            transition: all 0.3s ease;
            z-index: 100;
            background-color: #ffffff;
            border-right: 1px solid #999999;
        }
        .sidebar.close img{
            width:100%;
            transition: all 0.3s ease;
        }
        .sidebar img{
            width:90%;
            transition: all 0.3s ease;
        }
        .sidebar header{
                position: relative;
        }
        .sidebar header .toggle{
            position: absolute;
            top:50%;
            right: -25px;
            transform: translateY(-50%);
            height: 25px;
            width: 25px;
            background-color: #234B81;
            display:flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: #ffffff;
            border-radius:50%;
        }
        .sidebar li{
            height: 50px;
            margin-top: 10px;
            list-style: none;
            display: flex;
            align-items: center;
        }
        .sidebar li .icon{
            font-size:20px;
            min-width: 60px;
            display:flex;
            align-items: center;
            justify-content: center;
        }
        .sidebar li a{
            height: 100%;
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #234B81;
            transition: all 0.3s ease;
            font-weight: bold;
            cursor: pointer;
        }
        .sidebar li a:hover{
            border-left: 2px solid #234B81;
            transition: all 0.3s ease;
        }
        .sidebar .menu-bar{
            height: calc(100% - 50px);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .page-content{
            height: 100vh;
            left: 250px;
            width: calc(100% - 250px);
            position: relative;
            transition: all 0.3s ease;
        }

        .sidebar.close ~ .page-content{
            left: 100px;
            width: calc(100% - 88px);
        }

        .sidebar.close img{
            width:100%;
            transition: all 0.3s ease;
        }
        .sidebar.close header .toggle{
            transform: translateY(-50%) rotate(180deg);
            transition: all 0.3s ease;
        }
        .sidebar.close{
            width: 100px;
            background-color: #ffffff;
        }
        .sidebar.close .text{
            opacity: 0;
        }
        .sidebar.close li{
            margin-left: -80%;
        }
        .company-color{
            background-color: #234B81;
        }
    </style>
</head>
<body>
    <div id="app">
        <div class="content">
            <nav class="sidebar">
                <header>
                    <div class="image-text">
                        <img src="/img/forex.png" alt="logo">
                    </div>

                    <i class="bi bi-chevron-right toggle"></i>
                </header>
                <div class="menu-bar">
                    <div class="menu">
                        <ul class="menu-link">
                            <li class="nav-link">
                                <a href="/report">
                                    <i class="bi bi-box icon"></i>
                                    <span class="text">
                                        Report
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <ul class="menu-link">
                            <li class="nav-link">
                                <a id="logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box icon"></i>
                                    <span class="text">
                                        Logout
                                    </span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            {{-- <router-view></router-view> --}}
            <section class="page-content" id="page-content">
                <router-view></router-view>
            </section>
        </div>

    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>
<script>
    const body = document.querySelector("body"),
            sidebar = body.querySelector(".sidebar"),
            toggle = body.querySelector(".toggle");

    toggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    });


</script>
</html>
