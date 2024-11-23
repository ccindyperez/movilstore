<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo de Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 30px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            color: #2a2a2a;
        }

        .header h1 {
            margin: 0;
            font-size: 36px;
            font-weight: bold;
        }

        .header p {
            margin: 10px 0;
            font-size: 18px;
            color: #666;
        }

        .content {
            margin-bottom: 30px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #f1f1f1;
            font-weight: bold;
        }

        .table td {
            background-color: #fafafa;
        }

        .table .total-row {
            font-weight: bold;
            background-color: #f1f1f1;
        }

        .barcode {
            text-align: center;
            margin-top: 40px;
        }

        .barcode h3 {
            font-size: 20px;
            color: #2a2a2a;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            color: #666;
        }

        .footer p {
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container"><br>
        <!-- Logo de la empresa -->
        <img src="img/LOGO-P.png" width="100px" alt="Logo de la Empresa">
        
        <!-- Encabezado del recibo -->
        <div class="header">
            <h1>Recibo de Compra</h1>
            <p>¡Gracias por tu compra! Aquí tienes el detalle de tu pedido.</p>
        </div>

        <!-- Detalles del pedido -->
        <div class="content">
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Recorrer los productos -->
                    @foreach ($pedido['productos'] as $producto)
                    <tr>
                        <td>{{ $producto['name'] }}</td>
                        <td>{{ $producto['quantity'] ?? '1' }}</td> <!-- Si tienes cantidad -->
                        <td>${{ number_format($producto['price'], 2) }}</td> <!-- Si tienes precio -->
                    </tr>
                    @endforeach
                    <!-- Detalles adicionales -->
                    <tr>
                        <th>Usuario</th>
                        <td>{{ $pedido['username'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Fecha de Compra</th>
                        <td>{{ $pedido['datebuy'] }}</td>
                    </tr>
                    <tr>
                        <th>Subtotal</th>
                        <td>${{ number_format($pedido['subtotal'], 2) }}</td>
                    </tr>
                    <tr class="total-row">
                        <th>Total</th>
                        <td>${{ number_format($pedido['total'], 2) }}</td>
                    </tr>
                </tbody>
            </table>

            <!-- Código de barras -->
            <div class="barcode">
                <h3>Tu compra será entregada en la sucursal</h3>
                <h3>Código de Barras para Pago</h3>
                {!! $codigoBarras !!}
            </div>
        </div>

        <!-- Pie de página -->
        <div class="footer">
            <p>Recibo generado el {{ now()->format('d/m/Y H:i') }}</p>
            <p>¡Gracias por confiar en nosotros! Si tienes alguna duda, contáctanos.</p>
        </div>
    </div>
</body>

</html>
