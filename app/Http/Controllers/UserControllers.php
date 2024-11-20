<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserControllers extends Controller
{
    public function login(Request $request)
    {
        // Validación de los datos de entrada
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Verificar las credenciales del usuario
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Credenciales correctas, iniciar sesión
            Auth::login($user);

            // Redirigir según el rol del usuario
            if ($user->role == 'admin') {
                return redirect()->route('admin.index')->with('success', 'Bienvenido, administrador.');
            } else {
                return redirect()->route('dashboard')->with('success', 'Inicio de sesión exitoso');
            }
        }

        // Credenciales incorrectas
        return back()->withErrors(['email' => 'Credenciales incorrectas.'])->withInput();
    }


    public function showLoginForm()
    {
        return view('loginUser.login'); // Vista del formulario de inicio de sesión
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Cerrar sesión
        return redirect()->route('loginUser.login')->with('success', 'Sesión cerrada correctamente');
    }
    public function showForm()
    {
        return view('loginUser.registry'); // Regresa la vista del formulario
    }

    public function crear(Request $request)
    {
        // Validación de los datos de entrada
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed', // Validación con confirmed
            'role' => 'required|string',
        ]);

        // Crear el usuario utilizando el modelo y Hash para la contraseña
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); // Usamos Hash para codificar la contraseña
        $user->role = $request->role;
        $user->save();

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('loginUser.login')->with('success', '¡Usuario registrado con éxito!');
    }
}
