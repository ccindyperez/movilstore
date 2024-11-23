<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\shopping;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Picqer\Barcode\BarcodeGeneratorHTML;

class shoppingController extends Controller
{
    public function index()
{
    // Obtén el usuario autenticado
    $user = Auth::user();

    // Filtra los productos del carrito por user_id
    $cartItems = \App\Models\Shopping::where('username', $user->id)
                ->with('product') // Asegúrate de que `product` sea una relación en tu modelo Shopping
                ->get();

    return view('cart.index', compact('cartItems'));
}


    public function add(Request $request)
    {
        $products = product::find($request->id);
        if (empty($products))
            return redirect('inicio');
        Cart::add(
            $products->id,
            $products->name,
            1,
            $products->price
        );
        return redirect()->back()->with("success", "Producto agregado: " . $products->name);
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function removeItem(Request $request)
    {
        Cart::remove($request->rowId);
        return redirect()->back()->with("success", "Producto Eliminado!");
    }

    public function clear()
    {
        Cart::destroy();
        return redirect()->back()->with("success", "Producto Eliminado!");
    }

    public function increaseQuantity(Request $request)
    {
        $products = Cart::get($request->rowId);
        $qty = $products->qty + 1;
        Cart::update($request->rowId, $qty);
        return redirect()->back()->with("success");
    }

    public function decreaseQuantity(Request $request)
    {
        $products = Cart::get($request->rowId);
        $qty = $products->qty - 1;
        Cart::update($request->rowId, $qty);
        return redirect()->back()->with("success");
    }

    // OrderController.php
    public function guardarPedido(Request $request)
    {
        // Validar los datos
        $request->validate([
            'keyproduct' => 'required|integer',
            'username' => 'required|integer',
            'datebuy' => 'required|date',
            'subtotal' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        // Guardar el pedido en la base de datos
        $pedido = shopping::create([
            'keyproduct' => $request->keyproduct,
            'username' => $request->username,
            'datebuy' => $request->datebuy,
            'subtotal' => $request->subtotal,
            'total' => $request->total,
        ]);

        // Responder con un JSON para indicar que el pedido fue guardado
        return response()->json(['status' => 'success']);
    }


    public function generarRecibo(Request $request)
    {
        // Validar que productos sea un array y tenga al menos un elemento
        $productos = $request->productos ?? [];

        // Obtener el nombre del usuario usando la relación de la clave foránea 'username'
        $usuario = User::find($request->username); // Suponiendo que 'username' es el ID del usuario

        // Crear el array de datos del pedido
        $pedido = [
            'username' => $usuario ? $usuario->name : 'Usuario desconocido', // Nombre del usuario
            'datebuy' => $request->datebuy,     // Fecha de la compra
            'subtotal' => $request->subtotal,   // Subtotal
            'total' => $request->total,         // Total
            'productos' => $productos,          // Array de productos
        ];

        // Generar código de barras
        $keyproduct = isset($productos[0]['keyproduct']) ? $productos[0]['keyproduct'] : '000000';
        $generator = new BarcodeGeneratorHTML();
        $codigoBarras = $generator->getBarcode($keyproduct, $generator::TYPE_CODE_128);

        // Generar el PDF con DomPDF
        $pdf = Pdf::loadView('pdf.recibo', compact('pedido', 'codigoBarras'));

        // Descargar el PDF
        return $pdf->download('recibo.pdf');
    }
}
