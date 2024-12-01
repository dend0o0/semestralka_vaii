<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Databáza zelených rastlín</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/css.css') }}">
    <script src="{{ asset('js/menu.js') }}"></script>


</head>
<body>
<header>
    <div id="title-wrapper">
        <h1>Databáza zelených rastlín</h1>
        <p id="menu-button-resp"><i class="fa-solid fa-bars" onclick="menuShowHide()"></i></p>
    </div>

    <nav>
        <ul>
            <li class="menu-item {{ request()->is('/') ? 'active' : ''}}"><a href="/" >Domovček</a></li>
            <li class="menu-item {{ request()->is('list') ? 'active' : ''}}"><a href="/list" >Zoznam rastlín</a></li>
            <li class="menu-item {{ request()->is('login') ? 'active' : ''}}"><a href="/login" >Prihlásiť sa</a></li>
            <li class="menu-item {{ request()->is('login') ? 'active' : ''}}"><a href="/clanok/novy" >Pridať rastlinu</a></li>
        </ul>
    </nav>
</header>
<main>
    {{ $slot }}
</main>
<footer>
    <p>Denis Želiezka</p>
</footer>

</body>
</html>
