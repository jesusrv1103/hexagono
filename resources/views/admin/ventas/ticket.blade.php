@php
$medidaTicket = 180;
@endphp

<!DOCTYPE html>
<html>

<head>

    <style>
        * {
            font-size: 12px;
            font-family: 'DejaVu Sans', serif;
        }

        h1 {
            font-size: 18px;
        }

        .ticket {
            margin: 2px;
        }

        td,
        th,
        tr,
        table {
            border-top: 1px solid black;
            border-collapse: collapse;
            margin: 0 auto;
        }

        td.precio {
            text-align: right;
            font-size: 11px;
        }

        td.cantidad {
            font-size: 11px;
        }

        td.producto {
            text-align: center;
        }

        th {
            text-align: center;
        }


        .centrado {
            text-align: center;
            align-content: center;
        }

        .ticket {
            width: <?php echo $medidaTicket; ?>px;
            max-width: <?php echo $medidaTicket; ?>px;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        * {
            margin: 0;
            padding: 0;
        }

        .ticket {
            margin: 0;
            padding: 0;
        }

        body {
            text-align: center;
        }

    </style>
</head>

<body>
    <div class="ticket centrado">
        <!-- notification for small viewports and landscape oriented smartphones -->
        <div class="ticket centrado" >
         
            <br> 
         
            
            <p>HEXAGONO</p>
     

        </div>
        <h2>Ticket de venta #{{ $venta->id }}</h2>
        <h2>{{ $venta->fecha_recibido }}</h2>




        <table>
            <thead>
                <tr class="centrado">
                    <th class="cantidad">Can:</th>
                    <th class="producto">Prod</th>
                    <th class="precio">Impor:</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($venta->detalle_venta as $detalle)
                    <tr style=" border-style: none;"  >
                        <td  style=" border-style: none;" class="cantidad">{{ $detalle->cantidad }}</td>
                        <td style=" border-style: none;"  class="producto">{{ $detalle->producto->nombre }}</td>
                        <td  style=" border-style: none;" class="precio">
                            @if ($detalle->producto->tipo_producto == 'pieza')
                                ${{ number_format($detalle->cantidad * $detalle->producto->precio_venta, 2) }}
                            @else
                                ${{ $total_x_area = number_format($detalle->ancho * $detalle->alto * $detalle->producto->precio_venta * $detalle->cantidad, 2) }}
                            @endif
                        </td>
                    </tr>


                @endforeach

            </tbody>
            <tr>
                <td class="cantidad"></td>
                <td class="producto">
                    <strong>SubTotal</strong>
                </td>
                <td class="precio">
                    @php
                        $total = ($venta->total / (100 - $venta->cliente->descuento)) * 100;
                        echo "$" . number_format($total, 2);
                    @endphp
                </td>
            </tr>

            <tr>
                <td class="cantidad"></td>
                <td class="producto">
                    <strong>Descuento</strong>
                </td>
                <td class="precio">
                    {{ $venta->cliente->descuento }}%
                </td>
            </tr>

            <tr>
                <td class="cantidad"></td>
                <td class="producto">
                    <strong>Anticipo</strong>
                </td>
                <td class="precio">
                    ${{ number_format($venta->pagos->first()->monto_pago, 2) }}
                </td>
            </tr>


            <tr>
                <td class="cantidad"></td>
                <td class="producto">
                    <strong>TOTAL</strong>
                </td>
                <td class="precio">
                    $ {{ $venta->total }}
                </td>
            </tr>
        </table>
        <p class="centrado">¡GRACIAS POR SU COMPRA!
        </p>
    </div>
</body>

</html>
