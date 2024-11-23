<?php

namespace App\Http\Controllers;

use App\Models\shopping;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Obtén el usuario autenticado
        return view('auth.dashboard', compact('user'));
    }

    public function users()
    {
        $user = User::all();
        return view('auth.forms', compact('user'));
    }
    public function createU()
    {
        return view('auth.forms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
            'role' => 'required|string', // Asegura que el rol sea válido
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.users')->with('success', 'El usuario a sido registrador correctamente');
    }

    public function edit(Request $request)
    {
        $usuario = User::find($request->id);
        return view('auth.forms.edit', compact('usuario'));
    }
    public function update(Request $request, $id)
    {
        $usuario = User::find($id);

        $usuario->name = $request->input('name');
        return redirect()->route('admin.users')->with('success', 'Usuario actualizador');
    }
    public function eliminar(Request $request)
    {
        $usuario = user::find($request->id);
        return view('auth.forms.delete', compact('usuario'));
    }
    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect(url('/auth/user'))->with('success', 'Usuario eliminado');
    }

    public function verShop()
    {
        $shopping = shopping::all();
        return view('auth.calendar', compact('shopping'));
    }

    public function EliminarShop(Request $request)
    {
        $shop = shopping::find($request->id);
        return view('auth.shopping.delete', compact('shop'));
    }
    public function destroyShop(shopping $shop)
    {
        $shop->delete();
        return redirect(url('/auth/calendar'))->with('success', 'Venta eliminada...');
    }

}
