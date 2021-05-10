<!DOCTYPE html>
<html lang="{{ config('app.locale')}}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <title>{{config('app.name', 'nnxmxni')}}</title>
</head>
<body>
    
    <section id="main">
        <nav>
            <a href="#" class="logo">nnxmxni</a>

            <ul class="menu">
                <li><a href="#" class="active">Home </a></li>
                <li><a href="#">User stories</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <ul>
                <li><a href="#" class="profile">Profile</a></li>
            </ul>
        </nav>
       
    </section>

    <section>
        @yield('content')
    </section>

</body>
</html>