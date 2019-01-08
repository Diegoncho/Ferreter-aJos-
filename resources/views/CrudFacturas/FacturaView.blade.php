<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Imprimir | Panel de Administración</title>
    <link rel="stylesheet" href="{{ asset('css/imprimir.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/style.css') }}">
</head>
<body>

<div class="print-report">
    <a href="javascript:void(0);" onclick="javascript:print();"><i class="icon-print"></i> Imprimir</a>
</div>

<div class="container" id="container">
    <table border="1">
        <thead>
            <tr>
                <td colspan="4">
                    <h1>-FACTURA-</h1>
                </td>

                </td>

                <td rowspan="2" colspan="3">
                    <img src="../img/logo-app.png">
                </td>
            </tr>

            <tr>
                <td>
                    <h4>East Repair Inc.</h4>
                    <p>485 Amsterdam Avenue</p>
                    <p>New York, NY 1023</p>
                </td>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td colspan="4">
                    <p><b>FACTURAR A</b></p>
                </td>

                <td colspan="2">
                    <p style="text-align: right;"><b>N° DE FACTURA</b> #{{ $VistaFacturas->id }}</p>
                </td>
            </tr>

            <tr>
                <td colspan="4">
                    <p>{{ $VistaFacturas->nombres }} {{ $VistaFacturas->apellidos }}.</p>
                    <p>{{ $VistaFacturas->direccion }}, <b> Teléfono:</b> {{ $VistaFacturas->telefono }}</p>
                </td>

                <td colspan="2">
                    <p style="text-align: right;"><b>FECHA</b> {{ $VistaFacturas->fecha }}</p>
                </td>
            </tr>

        </tbody>
    
    </table>

    <table border="1" style="margin-top: 10px;">
        <thead class="table-info">
                <tr>
                    <td>
                        <b>CANT.</b>
                    </td>

                    <td>
                        <b>DESCRIPCIÓN.</b>
                    </td>

                    <td>
                        <b>PRECIO UNITARIO.</b>
                    </td>
                    
                    <td>
                        <b>IMPORTE.</b>
                    </td>
                </tr>
        </thead>

            <tbody>
                <tr>
                    <td style="text-align: center;"> {{ $VistaFacturas->cantidad }}</td>
                    <td> {{ $VistaFacturas->producto }} {{ $VistaFacturas->marca }}</td>
                    <td style="text-align: center;"> ${{ $VistaFacturas->precio }}</td>
                    <td style="text-align: center;"> ${{ $VistaFacturas->precio }}</td>
                </tr>

                <tr>
                    <td colspan="3"></td>
                    <td style="text-align: center; font-size: 17px;">
                        <b>Subtotal</b> $<strong id="resultadoSub"></strong>
                    </td>
                </tr>

                <tr>
                    <td  colspan="3"></td>
                    <td style="text-align: center; font-size: 20px;">
                        <b>TOTAL</b> $<strong id="resultadoTo"></strong>
                    </td>
                </tr>
            </tbody>
    
    </table>
</div>

</body>
</html>

<script language="javascript">

  function CalcularTotal(a,b){
    var result = a * b;

    document.getElementById('resultadoTo').innerHTML = result.toFixed(2);
  };

  CalcularTotal({{ $VistaFacturas->cantidad }},{{ $VistaFacturas->precio }});

  function CalcularSubtotal(a,b){
    var result = a * b;

    document.getElementById('resultadoSub').innerHTML = result.toFixed(2);
  };

  CalcularSubtotal({{ $VistaFacturas->cantidad }},{{ $VistaFacturas->precio }});

</script>
