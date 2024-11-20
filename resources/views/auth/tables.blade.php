<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Admin Template</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwind -->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }

        .bg-sidebar {
            background: #3d68ff;
        }

        .cta-btn {
            color: #3d68ff;
        }

        .upgrade-btn {
            background: #1947ee;
        }

        .upgrade-btn:hover {
            background: #0038fd;
        }

        .active-nav-link {
            background: #1947ee;
        }

        .nav-item:hover {
            background: #1947ee;
        }

        .account-link:hover {
            background: #3d68ff;
        }
    </style>
</head>

<body class="bg-gray-100 font-family-karla flex">

    @includeIf('layout.layout.admin.header')

    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="text-3xl text-black pb-6">Tables</h1>

            <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-md">
                <!-- Barra de búsqueda -->
                <div class="flex flex-col sm:flex-row justify-between items-center mb-4 space-y-2 sm:space-y-0">
                    <div class="flex space-x-2">
                        <select id="searchAttribute" class="px-3 py-2 border rounded-lg">
                            <option value="nombre">Nombre</option>
                            <option value="categoria">Categoría</option>
                            <option value="precio">Precio</option>
                            <option value="status">Status</option>
                        </select>
                        <input type="text" id="searchValue" placeholder="Buscar..."
                            class="px-3 py-2 border rounded-lg">
                        <button onclick="filterTable()"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Buscar
                        </button>
                    </div>
                </div>

                <!-- Botón para agregar un nuevo producto -->
                <div class="flex justify-end mb-4">
                    <a href="/productos/form"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Nuevo
                    </a>
                </div>

                <!-- Contenedor de tabla responsiva -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border rounded-lg">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">ID</th>
                                <th class="py-3 px-6 text-left">Nombre</th>
                                <th class="py-3 px-6 text-left">Descripción</th>
                                <th class="py-3 px-6 text-left">Categoria</th>
                                <th class="py-3 px-6 text-left">Cantidad</th>
                                <th class="py-3 px-6 text-left">Estatus</th>
                                <th class="py-3 px-6 text-left">Precio</th>
              <!--              <th class="py-3 px-6 text-left">Imagen</th>--> 
                                <th class="py-3 px-6 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 text-sm font-light">
                            @foreach ($products as $product)
                                <!-- Ejemplo de fila de producto -->
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-2 sm:py-3 px-3 sm:px-6 text-left">{{ $product->id }}</td>
                                    <td class="py-2 sm:py-3 px-3 sm:px-6 text-left">{{ $product->name }}</td>
                                    <td class="py-2 sm:py-3 px-3 sm:px-6 text-left">{{ $product->description }}</td>
                                    <td class="py-2 sm:py-3 px-3 sm:px-6 text-left">{{ $product->category}}</td>
                                    <td class="py-2 sm:py-3 px-3 sm:px-6 text-left">{{ $product->count }}</td>
                                    <td class="py-2 sm:py-3 px-3 sm:px-6 text-left">{{ $product->status }}</td>
                                    <td class="py-2 sm:py-3 px-3 sm:px-6 text-left">{{ $product->price }}</td>
                                <!--<td class="py-2 sm:py-3 px-3 sm:px-6 text-left">img</td>
                                    <td class="py-2 sm:py-3 px-3 sm:px-6 text-center">
                                        <img src="/ruta_de_la_imagen" alt="Imagen del producto"
                                            class="h-10 w-10 object-cover rounded-full mx-auto">
                                    </td>--> 
                                    <td class="py-2 sm:py-3 px-3 sm:px-6 text-center">
                                        <div class="flex item-center justify-center space-x-2">
                                            <a href="/auth/admin/admin/{{$product->id}}/edit">
                                                <i
                                                    class="bi bi-pencil-square bg-green-500 hover:bg-green-600 text-white font-bold py-1 sm:py-2 px-2 sm:px-4 rounded focus:outline-none focus:shadow-outline"></i>
                                            </a>
                                            <a href="/auth/admin/admin/{{$product->id}}/delete">
                                                <i
                                                    class="bi bi-trash-fill bg-red-500 hover:bg-red-600 text-white font-bold py-1 sm:py-2 px-2 sm:px-4 rounded focus:outline-none focus:shadow-outline"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

        <footer class="w-full bg-white text-right p-4">
        </footer>
    </div>


    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>

</html>
