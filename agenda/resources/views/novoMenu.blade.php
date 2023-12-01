<!-- novoMenu.blade.php -->
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="/css/menu.css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
   <title>@yield('title', 'AGENDA DE CONTATOS')</title>
</head>

<body>
   <nav>
      <ul class="menu">
         <li class="logo">AGENDA DE CONTATOS</li>
         <li class="btn"><span class="fas fa-bars"></span></li>
         <div class="items">
            <li><a href="/">Inicio</a></li>
            @auth
            <li><a href="/addContato">Adicionar um contato</a></li>
            <li><a href="#"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            </li>
            <form id="logout-form" action="/logout" method="POST" style="display: none;">
               @csrf
            </form>
            @endauth
            @guest
            <li><a href="/meu-login">Login</a></li>
            <li><a href="/registro">Registro</a></li>
            @endguest
         </div>
         <li class="search-icon">
            <form action="{{ route('contatos.busca') }}" method="get">
               <input type="search" name="termo" placeholder="Pesquisar contatos">
               <label class="icon" for="search-button">
                  <span class="fas fa-search"></span>
               </label>
               <button type="submit" id="search-button" style="display: none;"></button>
            </form>
         </li>


      </ul>
   </nav>
   <section>
      @yield('content')
   </section>
</body>

</html>