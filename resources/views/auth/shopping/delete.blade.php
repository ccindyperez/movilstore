<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eliminar Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <body class="dark:bg-gray-900 font-family-karla flex justify-center items-center h-screen">
        <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Eliminar Producto</h2>
            <!-- Asegúrate de actualizar la ruta en el atributo 'action' a la URL correcta para editar el producto -->
            <form action="/auth/shopping/{{ $shop->id }}/destroy" method="POST" enctype="multipart/form-data"
                class="space-y-4">
                @csrf
                @method('DELETE')
                <div class="text-center">
                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">
                        Eliminar Venta
                    </button>
                </div>
            </form>
        </div>
    </body>
</body>

</html>
