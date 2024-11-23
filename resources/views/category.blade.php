<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="{{ asset('img/LOGO-P.png') }}" type="image/x-icon">
    <title>Home</title>
</head>

<body class="scrollbar">
    @include('layout.header')
    <!-- Nav principal -->
    <nav class="bg-blue-300 text-black p-1">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <img src="{{ asset('img/LOGO-P.png') }}" alt="Logo" width="70px">

            <!-- Menú de Navegación - Visible en Pantallas Grandes -->
            <div class="flex justify-center space-x-6">
                <a href="{{ route('dashboard') }}" class="hover:text-gray-300">Inicio</a>
                <a href="#" class="hover:text-gray-300">Categoria</a>
                <a href="#contacto" class="hover:text-gray-300">Contacto</a>
            </div>

            <!-- Condición de Autenticación -->
            @if (Auth::check())
                <!-- Área de usuario autenticado -->
                <div class="hidden md:flex items-center relative">
                    <button id="desktop-user-menu-btn" class="flex items-center focus:outline-none">
                        <img src="{{ auth()->user()->avatar_url ?? '/img/iconoUser.png' }}"
                            alt="User Avatar" class="w-10 h-10 rounded-full">
                        <span class="text-white ml-2">{{ auth()->user()->name }}</span>
                        <i class="bi bi-chevron-down ml-2 text-white"></i>
                    </button>

                    <div id="desktop-user-menu"
                        class="hidden absolute right-0 mt-2 w-48 bg-white text-black rounded shadow-lg">
                        <!-- <a href="" class="block px-4 py-2 hover:bg-gray-100">Editar Perfil</a>
                        <a href="" class="block px-4 py-2 hover:bg-gray-100">Mis Pedidos</a>-->
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="block px-4 py-2 w-full text-left hover:bg-gray-100">Cerrar
                                Sesión</button>
                        </form>
                    </div>
                </div>
            @else
                <!-- Botones de Inicio de Sesión y Registro - Usuario no autenticado -->
                <div class="hidden md:flex space-x-4">
                    <a href="/singup"
                        class="bg-transparent border border-white py-1 px-4 rounded hover:bg-blue-300">Iniciar
                        Sesión</a>
                    <a href="/singup" class="bg-blue-600 py-1 px-4 rounded hover:bg-blue-700">Registrarse</a>
                </div>
            @endif

            <!-- Icono de Menú para Pantallas Pequeñas -->
            <button id="menu-toggle" class="md:hidden focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Menú Colapsable para Pantallas Pequeñas -->
        <div id="mobile-menu" class="hidden md:hidden flex flex-col items-center mt-4 space-y-4">
            <a href="{{ route('dashboard') }}" class="hover:text-gray-300" class="hover:text-gray-300">Inicio</a>
            <a href="#" class="hover:text-gray-300">Categorias</a>
            <a href="#contacto" class="hover:text-gray-300">Contacto</a>
            @if (Auth::check())
                <!-- Opciones del usuario autenticado para pantallas pequeñas -->
                <!-- <a href="" class="block px-4 py-2 hover:bg-gray-100">Editar Perfil</a>
                <a href="" class="block px-4 py-2 hover:bg-gray-100">Mis Pedidos</a>-->
                <a href="{{ route('logout') }}" class="block px-4 py-2 hover:bg-gray-100">Cerrar Sesión</a>
            @else
                <!-- Botones de registro e inicio de sesión para pantallas pequeñas -->
                <a href="/singup" class="bg-transparent border border-white py-1 px-4 rounded hover:bg-gray-700">Iniciar
                    Sesión</a>
                <a href="/singup" class="bg-blue-600 py-1 px-4 rounded hover:bg-blue-700">Registrarse</a>
            @endif
        </div>
    </nav>
    <script>
        // Alternar menú de usuario en pantallas grandes
        document.getElementById("desktop-user-menu-btn").onclick = function() {
            document.getElementById("desktop-user-menu").classList.toggle("hidden");
        };

        // Alternar menú de usuario en pantallas pequeñas
        document.getElementById("mobile-user-menu-btn").onclick = function() {
            document.getElementById("mobile-user-menu").classList.toggle("hidden");
        };

        // Alternar menú principal en pantallas pequeñas
        document.getElementById("menu-toggle").onclick = function() {
            document.getElementById("mobile-menu").classList.toggle("hidden");
        };

        // Cerrar menús al hacer clic fuera de ellos
        window.addEventListener("click", function(e) {
            if (!document.getElementById("desktop-user-menu-btn").contains(e.target)) {
                document.getElementById("desktop-user-menu").classList.add("hidden");
            }
            if (!document.getElementById("mobile-user-menu-btn").contains(e.target)) {
                document.getElementById("mobile-user-menu").classList.add("hidden");
            }
        });
    </script>


    <!-- Barra de búsqueda y carrito -->
    <div class="bg-blue-300 p-2">
        <div class="container mx-auto flex justify-center items-center">
            <!-- Barra de Búsqueda -->
            <div class="flex items-center md:w-1/2 lg:w-1/3">
                <input type="text" placeholder="Buscar productos..." class="w-full p-2 rounded-l-lg text-gray-900" />
                <button class="bg-blue-500 text-white px-4 py-2 rounded-r-lg hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35m0 0a7.5 7.5 0 111.768-1.768L21 21z" />
                    </svg>
                </button>
            </div>

            <!-- Icono de Carrito -->
            <div class="flex items-center ml-2 relative">
                <button id="cartButton" class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white hover:text-gray-400"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2m0 0L7 13h10l1.6-8H5.4zM16 21a2 2 0 100-4 2 2 0 000 4zM8 21a2 2 0 100-4 2 2 0 000 4z" />
                    </svg>
                    <span
                        class="absolute top-0 right-0 bg-red-500 text-white rounded-full text-xs px-1">{{ \Cart::count() }}</span>
                </button>

                <!-- Shopping Cart Panel -->
                <div id="shoppingCart"
                    class="absolute right-0 mt-2 w-80 bg-white shadow-lg hidden transition-all duration-500">
                    <div class="p-4">
                        <div class="flex items-center justify-between">
                            <h2 class="text-lg font-medium text-gray-900">Carro de Compras</h2>
                            <button id="closeCart" class="text-gray-500 hover:text-gray-700">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <ul class="mt-4 space-y-4">
                            @if (Cart::count())
                                @foreach (Cart::content() as $product)
                                    <li class="flex items-center justify-between border-b border-gray-200 pb-4">
                                        <!-- Imagen del producto -->
                                        <img src="https://tailwindui.com/plus/img/ecommerce-images/shopping-cart-page-04-product-01.jpg"
                                            class="h-16 w-16 rounded-md border border-gray-200" alt="Producto">

                                        <!-- Detalles del producto -->
                                        <div class="flex-1 ml-4">
                                            <p class="text-gray-900 font-medium">{{ $product->name }}</p>
                                            <p class="text-gray-500 text-sm">{{ $product->description }}</p>
                                            <p class="text-gray-900 font-semibold">
                                                {{ number_format($product->price, 2) }} MXN</p>
                                        </div>

                                        <!-- Botón de remover -->
                                        <form action="{{ route('removeItem') }}" method="post" class="ml-4">
                                            @csrf
                                            <input type="hidden" name="rowId" value="{{ $product->rowId }}">
                                            <input type="submit" name="btn"
                                                class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700"
                                                value="Remover">
                                        </form>
                                    </li>
                                @endforeach
                            @else
                                <li>
                                    <p class="text-gray-500 text-center">No hay productos en el carrito.</p>
                                </li>
                            @endif
                        </ul>


                        <div class="mt-6 border-t border-gray-200 pt-4">
                            <p class="text-base font-medium text-gray-900">Subtotal:{{ Cart::subtotal() }}</p>
                            <a href="{{ route('checkout') }}"
                                class="mt-4 inline-block w-full text-center bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700">Pagar
                                ahora</span></a>
                        </div>
                        <div class="mt-6 text-center text-sm text-gray-500">
                            <a href="/dashboard" class="text-indigo-600 hover:text-indigo-500">
                                Continuar Comprando
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript para manejar la visibilidad del carrito -->
    <script>
        const cartButton = document.getElementById('cartButton');
        const shoppingCart = document.getElementById('shoppingCart');
        const closeCart = document.getElementById('closeCart');

        cartButton.addEventListener('click', () => {
            shoppingCart.classList.toggle('hidden');
        });

        closeCart.addEventListener('click', () => {
            shoppingCart.classList.add('hidden');
        });

        // Cerrar el carrito al hacer clic fuera de él
        window.addEventListener('click', (e) => {
            if (!shoppingCart.contains(e.target) && !cartButton.contains(e.target)) {
                shoppingCart.classList.add('hidden');
            }
        });
    </script>

    <script>
        // Script para alternar el menú en pantallas pequeñas
        document.getElementById("menu-toggle").onclick = function() {
            var menu = document.getElementById("mobile-menu");
            menu.classList.toggle("hidden");
        };
    </script>

    <!-- Productos -->
    <main class="container mx-auto my-8">
        <div class="flex justify-between items-center">
            {{-- <div class="flex-none w-14 h-14 bg-gray-200 flex items-center justify-center">
                01
            </div> --}}
            <div class="grow h-14 flex items-center justify-center">
                <h2 class="text-xl font-semibold">Lo Mejor de la Temporada</h2>
            </div>
            {{-- <div class="flex-none w-14 h-14 bg-gray-200 flex items-center justify-center">
                03
            </div> --}}
        </div>
        @if (session('success'))
            <div class="mt-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                <p class="font-bold">¡Éxito!</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif
        <!-- Contenedor de Productos con Scroll Vertical -->
        <div class="mt-4 h-96 overflow-y-scroll border rounded-lg p-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

                @foreach ($products as $product)
                    <!-- Producto 1 -->
                    <div class="bg-white border border-gray-200 rounded-lg p-4 text-center">

                        <img src="/img/descarga.png" alt="Producto 1"
                            class="mx-auto h-40 object-cover mb-2">
                        <h3 class="text-gray-900 font-medium">{{ $product->name }}</h3>
                        <p class="text-gray-500">{{ $product->description }}</p>
                        <p class="text-red-500 font-semibold">${{ $product->price }}</p>
                        <form action="{{ route('add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="submit" name="btn"
                                class="mt-2 bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700"
                                value="Comprar Ahora">
                        </form>
                    </div>
                @endforeach


            </div>
        </div>
    </main>


</body>
@include('layout.footer')

<!-- Agregar Font Awesome para los íconos de redes sociales -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</html>
