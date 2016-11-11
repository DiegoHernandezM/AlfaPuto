<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Factura</title>
  
   <style type="text/css">
body {
  position: relative;
  margin: 0 auto; 
  color: #555555;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 14px; 
}
table {
  text-align: center;
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table td {
  padding: 20px;
  background: #EEEEEE;
  text-align: center;
  border-bottom: 1px solid #FFFFFF;
}

table td {
  text-align: center;
}

table td h1{
  color: #2c3e50;
  font-weight: normal;

}


table tr  {
  text-align: center;
}

   </style>
  </head>
  <body>

    <main>
      <table>
          <tr><td><h1>Tienda Virtual Online - Factura</h1></td></tr> 
          <tr><td id="folio">Folio: {{ $invoice }}</td></tr>
          <tr><td id="fecha"> Fecha: {{ $date }} &nbsp; Hora: {{ $time }}</td></tr>
      </table>

       <h3>Datos del usuario</h3>
                <table class="table table-striped table-hover table-bordered">
                    <tr><td>Nombre:</td><td>{{ Auth::user()->name . " " . Auth::user()->last_name }}</td></tr>
                    <tr><td>Usuario:</td><td>{{ Auth::user()->user }}</td></tr>
                    <tr><td>Correo:</td><td>{{ Auth::user()->email }}</td></tr>
                    <tr><td>Dirección:</td><td>{{ Auth::user()->address }}</td></tr>
                </table>

                 <h3>Datos del pedido</h3>
                <table class="table table-striped table-hover table-bordered">
             
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                    @foreach($cart as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>${{ number_format($item->price,2) }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ number_format($item->price * $item->quantity,2) }}</td>
                        </tr>
                    @endforeach
                 
                </table><hr>
                
                <span class="label label-success">
            Total: ${{ number_format($total, 2) }}
          </span>
                </h3><hr>
      
  </body>
</html>