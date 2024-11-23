<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="dark:bg-gray-900 font-family-karla flex justify-center items-center h-screen">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Editar Usuario</h2>
        <form action="/auth/forms/{{$usuario->id}}/update" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('put')
            <input type="hidden" id="usuarioId" name="usuarioId" value="{{ $usuario->id }}">

            <div>
                <label for="name" class="block text-gray-700">Nombre</label>
                <input type="text" id="name" name="name"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ $usuario->name }}" >
            </div>

            <div>
                <label for="email" class="block text-gray-700">Correo</label>
                <textarea id="email" name="email"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $usuario->email }}</textarea>
            </div>

            <!-- Campo para la nueva contraseña -->
            <div>
                <label for="password" class="block text-gray-700">Nueva Contraseña</label>
                <input type="password" id="password" name="password"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Confirmar nueva contraseña -->
            <div>
                <label for="password_confirmation" class="block text-gray-700">Confirmar Contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="role" class="block text-gray-700">Rol</label>
                <select id="role" name="role"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="admin" {{ $usuario->category == 'admin' ? 'selected' : '' }}>Administrador</option>
                    <option value="user" {{ $usuario->category == 'user' ? 'selected' : '' }}>Usuario</option>
                </select>
            </div>

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