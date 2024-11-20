<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\shopping;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Picqer\Barcode\BarcodeGeneratorHTML;

class shoppingController extends Controller
{
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
        // Recuperar los datos del pedido
        $pedido = [
            'username' => $request->username,
            'datebuy' => $request->datebuy,
            'subtotal' => $request->subtotal,
            'total' => $request->total,
            'productos' => $request->productos, // Array de productos enviado desde el formulario
        ];

        // Generar código de barras basado en un identificador único, por ejemplo, el primer producto o un pedido ID
        $generator = new BarcodeGeneratorHTML();
        $codigoBarras = $generator->getBarcode($pedido['productos'][0]['keyproduct'] ?? '000000', $generator::TYPE_CODE_128);

        // Generar el PDF con DomPDF
        $pdf = Pdf::loadView('pdf.recibo', compact('pedido', 'codigoBarras'));
        // Descargar el PDF
        return $pdf->download('recibo.pdf');
    }
}
