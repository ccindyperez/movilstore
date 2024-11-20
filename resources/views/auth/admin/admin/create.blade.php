<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="dark:bg-gray-900 font-family-karla flex justify-center items-center min-h-screen">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Agregar Nuevo Producto</h2>
        <form action="/productos/crear" method="POST" class="space-y-4">
            @csrf <!-- Verifica que esta línea es compatible con tu backend -->
            
            <!-- Producto ID -->
            <input type="hidden" id="productId" name="productId" value="ID_DEL_PRODUCTO">

            <!-- Nombre -->
            <div>
                <label for="name" class="block text-gray-700">Nombre</label>
                <input type="text" id="name" name="name"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Ingresa el nombre del producto" required>
            </div>

            <!-- Descripción -->
            <div>
                <label for="description" class="block text-gray-700">Descripción</label>
                <textarea id="description" name="description" rows="3"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Ingresa una descripción breve" required></textarea>
            </div>

            <!-- Categoría -->
            <div>
                <label for="category" class="block text-gray-700">Categoría</label>
                <select id="category" name="category"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="1">Fundas</option>
                    <option value="2">Micas</option>
                    <option value="3">Audio</option>
                    <option value="4">Cargadores</option>
                    <option value="5">Cables</option>
                </select>
            </div>

            <!-- Cantidad -->
            <div>
                <label for="count" class="block text-gray-700">Cantidad</label>
                <input type="number" id="count" name="count"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Ejemplo: 10" required>
            </div>

            <!-- Estatus -->
            <div>
                <label for="status" class="block text-gray-700">Estatus</label>
                <select id="status" name="status"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="Disponible">Disponible</option>
                    <option value="Agotado">Agotado</option>
                </select>
            </div>

            <!-- Precio -->
            <div>
                <label for="price" class="block text-gray-700">Precio</label>
                <input type="number" id="price" name="price" step="0.01"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Ejemplo: 99.99" required>
            </div>

            <!-- Imagen 
            <div>
                <label for="imagen" class="block text-gray-700">Imagen del Producto</label>
                <input type="file" id="imagen" name="imagen" accept="image/*"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>-->

            <!-- Botón Enviar -->
            <div class="text-center">
                <button type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">
                    Guardar Producto
                </button>
            </div>
        </form>
    </div>
</body>

</html>
