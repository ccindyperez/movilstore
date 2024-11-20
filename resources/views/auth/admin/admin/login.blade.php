<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="{{ asset('img/LOGO-P.png') }}" type="image/x-icon">

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white dark:bg-gray-900 transition-colors duration-500 flex items-center justify-center h-screen">

<section class="w-full max-w-md px-6 lg:px-16 xl:px-12">
    <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg transition-colors duration-500">

        <h1 class="text-xl md:text-2x3 font-bold leading-tight mt-4 text-gray-800 dark:text-gray-100">Inicia Sesión </h1>

        <form class="mt-6" action="#" method="POST">
            <div>
                <label class="block text-gray-700 dark:text-gray-300">Correo </label>
                <input type="email" placeholder="Correo Electrónico" class="w-full px-4 py-3 rounded-lg bg-gray-200 dark:bg-gray-700 mt-2 border focus:border-blue-500 focus:bg-white dark:focus:bg-gray-600 focus:outline-none" required>
            </div>

            <div class="mt-4">
                <label class="block text-gray-700 dark:text-gray-300">Contraseña</label>
                <input type="password" placeholder="Contraseña" minlength="6" class="w-full px-4 py-3 rounded-lg bg-gray-200 dark:bg-gray-700 mt-2 border focus:border-blue-500 focus:bg-white dark:focus:bg-gray-600 focus:outline-none" required>
            </div>

            <div class="text-right mt-2">
                <a href="#" class="text-sm font-semibold text-blue-500 hover:text-blue-700 dark:hover:text-blue-400">¿Has olvidado tu contraseña?</a>
            </div>

            <button type="submit" class="w-full block bg-blue-500 hover:bg-blue-400 dark:hover:bg-blue-600 text-white font-semibold rounded-lg px-4 py-3 mt-6">Acceder</button>
        </form>

        <hr class="my-6 border-gray-300 dark:border-gray-700">

        <button class="w-full flex items-center justify-center bg-gray-700 hover:bg-gray-600 text-white font-semibold py-3 rounded-lg">
            <svg class="w-5 h-5 mr-2" viewBox="0 0 48 48"><path fill="#4285F4" d="M48 24.42c0-1.83-.16-3.57-.45-5.27H24v9.98h13.38c-.58 2.94-2.28 5.42-4.87 7.1v5.92h7.88c4.6-4.24 7.24-10.49 7.24-17.73z"/><path fill="#34A853" d="M24 48c6.48 0 11.92-2.14 15.9-5.79l-7.88-5.92c-2.14 1.43-4.88 2.27-8.02 2.27-6.18 0-11.42-4.17-13.3-9.86H2.48v6.17C6.43 42.06 14.72 48 24 48z"/><path fill="#FBBC05" d="M10.7 28.68A14.84 14.84 0 0 1 9.52 24c0-1.63.28-3.22.8-4.68V13.16H2.48A24 24 0 0 0 0 24c0 3.91.92 7.61 2.52 10.84l8.18-6.16z"/><path fill="#EA4335" d="M24 9.5c3.43 0 6.5 1.18 8.93 3.47l6.63-6.63C35.9 2.88 30.47 0 24 0 14.72 0 6.43 5.94 2.48 13.16l8.18 6.16C12.58 13.67 17.82 9.5 24 9.5z"/></svg>
            Registrarse con Google
        </button>

        <p class="mt-8 text-gray-500 dark:text-gray-400">
            ¿No tienes una cuenta?
            <a href="#" class="text-blue-500 hover:text-blue-700 dark:hover:text-blue-400 font-semibold">Crear Cuenta</a>
        </p>

    </div>
</section>

<script>
    function toggleTheme() {
        document.documentElement.classList.toggle('dark');
    }
</script>

</body>
</html>