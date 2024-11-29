<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="shortcut icon" href="{{ asset('img/LOGO-P.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Chekout</title>
</head>

<body>
    @include('layout.header')
    <!-- Nav principal -->
    <nav class="bg-blue-300 text-black p-1">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <img src="{{ asset('img/LOGO-P.png') }}" alt="Logo" width="70px">

            <!-- Menú de Navegación - Visible en Pantallas Grandes -->
            <div class="hidden md:flex space-x-6">
                <a href="/dashboard" class="hover:text-gray-300">Inicio</a>
                <a href="#contacto" class="hover:text-gray-300">Contacto</a>
            </div>


            @if (Auth::check())
                <!-- Área de usuario autenticado -->
                <div class="hidden md:flex items-center relative">
                    <button id="desktop-user-menu-btn" class="flex items-center focus:outline-none">
                        <img src="{{ auth()->user()->avatar_url ?? 'img/iconoUser.png' }}" alt="User Avatar"
                            class="w-10 h-10 rounded-full">
                        <i class="bi bi-chevron-down ml-2 text-white"></i>
                    </button>

                    <div id="desktop-user-menu"
                        class="hidden absolute right-0 mt-2 w-48 bg-white text-black rounded shadow-lg">
                        <!-- <a href="" class="block px-4 py-2 hover:bg-gray-100">Editar Perfil</a>
                    <a href="" class="block px-4 py-2 hover:bg-gray-100">Mis Pedidos</a>-->
                        <div
                            class="flex flex-wrap items-center justify-between bg-white p-4 rounded-lg shadow-lg max-w-full">
                            <!-- Información del Usuario -->
                            @auth
                                <div class="flex items-center space-x-2">
                                    <!-- Ícono de Usuario -->
                                    <span class="text-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M5.121 17.804A5 5 0 0112 14a5 5 0 016.879 3.804M15 10a3 3 0 11-6 0 3 3 0 016 0zM12 14v6m0 0H6m6 0h6" />
                                        </svg>
                                    </span>
                                    <!-- Nombre del Usuario -->
                                    <div class="text-gray-800">
                                        <p class="font-semibold text-sm leading-tight">{{ auth()->user()->name }}</p>
                                    </div>
                                </div>
                            @endauth

                            <!-- Botón de Cerrar Sesión -->
                            <form action="{{ route('logout') }}" method="POST" class="mt-2 sm:mt-0 sm:ml-4">
                                @csrf
                                <button type="submit"
                                    class="px-3 py-1 bg-red-500 text-white text-sm font-medium rounded-lg shadow hover:bg-red-600 transition w-full sm:w-auto">
                                    Cerrar Sesión
                                </button>
                            </form>
                        </div>
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
            <a href="Inicio" class="hover:text-gray-300">Inicio</a>
            <a href="#contacto" class="hover:text-gray-300">Contacto</a>
            @if (Auth::check())
                <!-- Opciones del usuario autenticado para pantallas pequeñas
                <a href="" class="block px-4 py-2 hover:bg-gray-100">Editar Perfil</a>
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
        document.addEventListener("DOMContentLoaded", function() {
            // Alternar el menú principal en pantallas pequeñas
            document.getElementById("menu-toggle").onclick = function() {
                document.getElementById("mobile-menu").classList.toggle("hidden");
            };

            // Alternar el menú de usuario en pantallas grandes (si se usa)
            const desktopUserMenuBtn = document.getElementById("desktop-user-menu-btn");
            if (desktopUserMenuBtn) {
                desktopUserMenuBtn.onclick = function() {
                    document.getElementById("desktop-user-menu").classList.toggle("hidden");
                };
            }
        });
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

    <!-- Contenedor Principal del Checkout -->
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-8">Carrito de Compras</h1>

        <!-- Contenedor Principal con dos columnas -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Columna Izquierda - Lista de Productos -->
            <div class="lg:col-span-2">
                @if (Cart::count())
                    <table class="min-w-full bg-white border rounded-lg">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Nombre</th>
                                <th class="py-3 px-6 text-left">Cantidad</th>
                                <th class="py-3 px-6 text-left">Precio</th>
                                <th class="py-3 px-6 text-left">Importe</th>
                                <th class="py-3 px-6 text-left">Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::content() as $product)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-2 sm:py-3 px-3 sm:px-6 text-left">{{ $product->name }}</td>
                                    <td class="py-2 sm:py-3 px-3 sm:px-6 text-left">
                                        <div class="flex items-center space-x-2">
                                            <!-- Botón "+" -->
                                            <form action="{{ route('increaseQuantity') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="rowId" value="{{ $product->rowId }}">
                                                <input type="submit" name="btn"
                                                    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700"
                                                    value="+">
                                            </form>

                                            <!-- Cantidad -->
                                            <p class="text-center">{{ $product->qty }}</p>

                                            <!-- Botón "-" -->
                                            <form action="{{ route('decreaseQuantity') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="rowId" value="{{ $product->rowId }}">
                                                <input type="submit" name="btn"
                                                    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700"
                                                    value="-">
                                            </form>
                                        </div>
                                    </td>

                                    <td class="py-2 sm:py-3 px-3 sm:px-6 text-left">
                                        {{ number_format($product->price) }}</td>
                                    <td class="py-2 sm:py-3 px-3 sm:px-6 text-left">
                                        {{ number_format($product->qty * $product->price, 2) }}</td>
                                    <td>
                                        <form action="{{ route('removeItem') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="rowId" value="{{ $product->rowId }}">
                                            <button type="submit" name="btn"
                                                class="mt-2 bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 flex items-center justify-center">
                                                <i class="fas fa-trash"></i>
                                                <span class="sr-only">Borrar</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tbody class="text-gray-700 text-sm font-light">
                    </table>
                    <a href="{{ route('clear') }}" class="bg-blue-600 py-1 px-4 rounded hover:bg-blue-700">Vaciar
                        carrito</a>
                @else
                    <a href="{{ route('dashboard') }}"
                        class="bg-blue-600 py-1 px-4 rounded hover:bg-blue-700">Agregar
                        productos</a>
                @endif

            </div>
            <!-- Columna Derecha - Resumen del Pedido -->
            <form action="{{ route('guardarPedido') }}" method="POST" class="space-y-4">
                @csrf
                <!-- Campo para el ID del Usuario -->
                @if (Auth::check())
                    <input type="hidden" name="username" value="{{ auth()->user()->id }}">
                @else
                    <p class="text-red-500">Debes iniciar sesión para completar la compra.</p>
                @endif
                @foreach (Cart::content() as $product)
                    <!-- Campo para el ID del Producto -->
                    <input type="hidden" name="keyproduct" value="{{ $product->id }}">
                @endforeach
                <!-- Campo para la Fecha de Compra -->
                <input type="hidden" name="datebuy" value="{{ now() }}">

                <!-- Campo para el Subtotal -->
                <input type="hidden" name="subtotal" value="{{ Cart::subtotal() }}">

                <!-- Campo para el Total -->
                <input type="hidden" name="total" value="{{ Cart::total() }}">

                <div class="bg-gray-100 p-6 rounded-lg">
                    <h2 class="text-xl font-semibold mb-4">Resumen del Pedido</h2>
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-700">Subtotal</span>
                        <span class="text-gray-900">{{ Cart::subtotal() }}</span>
                    </div>
                    <div class="flex justify-between mb-6">
                        <span class="text-gray-700">Impuesto</span>
                        <span class="text-gray-900">{{ Cart::tax() }}</span>
                    </div>
                    <div class="flex justify-between font-semibold text-lg mb-6">
                        <span class="text-gray-700">Total del Pedido</span>
                        <span class="text-gray-900">{{ Cart::total() }}</span>
                    </div>
                </div>

                <!-- Botón de Enviar -->
                <button id="guardarPedidoBtn"
                    class="bg-indigo-600 text-white py-3 px-4 rounded-lg font-semibold hover:bg-indigo-700">
                    Guardar Pedido
                </button>
            </form>
        </div>
    </div>

    <!-- Modal de Confirmación -->
    <!-- Modal de Confirmación -->
    <div id="modalConfirmacion"
        class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex justify-center items-center z-50">
        <div class="bg-white rounded-lg p-6 w-full max-w-lg relative shadow-lg">
            <h2 class="text-xl font-bold mb-4">¡Tu Pedido Ha Sido Registrado!</h2>
            <p class="mb-4">Gracias por tu compra. ¿Deseas generar el recibo en PDF?</p>

            <!-- Botón para generar PDF -->
            <form id="formGenerarPdf" action="{{ route('generarRecibo') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="username" value="{{ auth()->user()->id }}">
                @foreach (Cart::content() as $product)
                    <input type="hidden" name="productos[{{ $loop->index }}][keyproduct]"
                        value="{{ $product->id }}">
                    <input type="hidden" name="productos[{{ $loop->index }}][name]" value="{{ $product->name }}">
                    <input type="hidden" name="productos[{{ $loop->index }}][qty]" value="{{ $product->qty }}">
                    <input type="hidden" name="productos[{{ $loop->index }}][price]"
                        value="{{ $product->price }}">
                @endforeach
                <input type="hidden" name="datebuy" value="{{ now() }}">
                <input type="hidden" name="subtotal" value="{{ Cart::subtotal() }}">
                <input type="hidden" name="total" value="{{ Cart::total() }}">

                <button type="submit"
                    class="bg-indigo-600 text-white py-3 px-4 rounded-lg font-semibold hover:bg-indigo-700">
                    Generar PDF
                </button>
            </form>

            <!-- Botón de cerrar el modal -->
            <button type="button" onclick="closeModal()"
                class="absolute top-2 right-2 text-gray-600 hover:text-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>


    <script>
        document.getElementById('guardarPedidoBtn').addEventListener('click', function(event) {
            event.preventDefault();

            const form = document.querySelector('form[action="{{ route('guardarPedido') }}"]');
            const formData = new FormData(form);

            fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        // Mostrar el modal
                        document.getElementById('modalConfirmacion').classList.remove('hidden');
                    } else {
                        alert('Ocurrió un error al guardar el pedido. Intenta de nuevo.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Hubo un problema con la solicitud.');
                });
        });

        function closeModal() {
            document.getElementById('modalConfirmacion').classList.add('hidden');
        }
    </script>


</body>

@include('layout.footer')

</html>
