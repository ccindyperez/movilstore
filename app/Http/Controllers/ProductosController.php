<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductosController extends Controller
{

    public function index()
{
    $products = Product::with('category')->get(); // Esto es correcto
    return view('auth.tables', compact('products'));
}
    public function create()
    {
        return view('auth.admin.admin.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'category' => ['required', 'string'],
            'count' => ['required', 'integer'],
            'status' => ['required', 'string'],
            'price' => ['required', 'integer'],
        ]);
        product::create([
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'count' => $request->count,
            'status' => $request->status,
            'price' => $request->price,
        ]);
        return redirect(url('/auth/tables'));
    }

    public function edit(Request $request)
    {
        $products = product::find($request->id);
        return view('auth.admin.admin.edit', compact('products'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'string',
            'description' => 'string',
            'category' => 'string',
            'count' => 'integer',
            'status' => 'string',
            'price' => 'string',
        ]);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->count = $request->count;
        $product->status = $request->status;
        $product->price = $request->price;
        $product->save();

        return redirect(url('/auth/tables'))->with('success', 'Producto actualizado correctamente');
    }

    public function eliminar(Request $request)
    {
        $products = product::find($request->id);
        return view('auth.admin.admin.delete', compact('products'));
    }
    public function destroy(product $product)
    {
        $product->delete();
        return redirect(url('/auth/tables'))->with('success', 'Producto Eliminado');
    }

    public function show()
    {
        $products = Product::all();  // O la lógica para obtener los productos
        return view('inicio', compact('products'));
    }
}
