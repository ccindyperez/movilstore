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
        <h2 class="text-2xl font-bold mb-6 text-center">Agregar Nuevo Usuario</h2>
        <form action="/user/crearN" method="POST" class="space-y-4">
            @csrf <!-- Verifica que esta línea es compatible con tu backend -->
            
            <!-- Producto ID -->
            <input type="hidden" id="productId" name="productId" value="ID_DEL_PRODUCTO">

            <!-- Nombre -->
            <div>
                <label for="name" class="block text-gray-700">Nombre</label>
                <input type="text" id="name" name="name"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Ingresa el nombre" required>
            </div>

            <!-- Descripción -->
            <div>
                <label for="description" class="block text-gray-700">Correo</label>
                <input type="email" id="email" name="email"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Ingresa un correo" required>
            </div>

            <!-- Categoría -->
            <div>
                <label for="category" class="block text-gray-700">Contraseña</label>
                <input type="password" id="password" name="password"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Ingresa el nombre del producto" required>
            </div>

            <!-- Cantidad -->
            <div>
                <label for="count" class="block text-gray-700">Rol</label>
                <select name="role" id="role" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option selected>Selecciona un rol</option>
                    <option value="admin">Administrador</option>
                    <option value="user">Usuario</option>
                </select>
            </div>

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
