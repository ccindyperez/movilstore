<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="dark:bg-gray-900 font-family-karla flex justify-center items-center h-screen">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Editar Producto</h2>
        <!-- Asegúrate de actualizar la ruta en el atributo 'action' a la URL correcta para editar el producto -->
        <form action="/auth/admin/admin/{{$products->id}}/update" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('put')
            <!-- Producto ID (oculto para evitar que el usuario lo edite) -->
            <input type="hidden" id="productId" name="productId" value="d">

            <!-- Nombre -->
            <div>
                <label for="name" class="block text-gray-700">Nombre</label>
                <input type="text" id="name" name="name"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ $products->name }}" >
            </div>
            <!-- Descripción -->
            <div>
                <label for="description" class="block text-gray-700">Descripción</label>
                <textarea id="description" name="description" rows="3"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $products->description }}</textarea>
            </div>

            <!-- Categoría -->
            <div>
                <label for="category" class="block text-gray-700">Categoría</label>
                <select id="category" name="category"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="Funda" {{ $products->category == 'Funda' ? 'selected' : '' }}>Fundas</option>
                    <option value="Micas" {{ $products->category == 'Micas' ? 'selected' : '' }}>Micas</option>
                    <option value="Audio" {{ $products->category == 'Audio' ? 'selected' : '' }}>Audio</option>
                    <option value="Cargadores" {{ $products->category == 'Cargadores' ? 'selected' : '' }}>Cargadores</option>
                    <option value="Cables" {{ $products->category == 'Cables' ? 'selected' : '' }}>Cables</option>
                </select>
            </div>
            
            <!-- Cantidad -->
            <div>
                <label for="count" class="block text-gray-700">Cantidad</label>
                <input type="number" id="count" name="count"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ $products->count }}" >
            </div>
            <!-- Status -->
            <div>
                <label for="status" class="block text-gray-700">Estatus</label>
                <select id="status" name="status"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="Disponible" {{ $products->status == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                    <option value="Agotado" {{ $products->status == 'Agotado' ? 'selected' : '' }}>Agotado</option>
                </select>
            </div>
            

            <!-- Precio -->
            <div>
                <label for="price" class="block text-gray-700">Precio</label>
                <input type="number" id="price" name="price" step="0.01"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ $products->price }}" >
            </div>

            <!-- Imagen del Producto -->
             <!-- Imagen 
            <div>
                <label for="imagen" class="block text-gray-700">Imagen del Producto</label>
                <input type="file" id="imagen" name="imagen" accept="image/*"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <small class="text-gray-500">Deja este campo vacío si no deseas cambiar la imagen.</small>
            </div>-->
            <!-- Botón Enviar -->
            <div class="text-center">
                <button type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">
                    Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</body>

</html>
