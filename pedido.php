<?php
  include 'includes/db.php';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $cliente = $_POST['cliente'];
    $telefono = $_POST['telefono'];
    $pago = $_POST['pago'];

    $query = "INSERT INTO pedidos (producto, cantidad, cliente, telefono, metodo_pago) 
              VALUES ('$producto', '$cantidad', '$cliente', '$telefono', '$pago')";

    if (mysqli_query($conn, $query)) {
      echo "<script>alert('Pedido enviado con éxito'); window.location.href='index.php';</script>";
    } else {
      echo "Error: " . mysqli_error($conn);
    }
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pedido - Chocolates Regionales</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      background-image: url('https://images.unsplash.com/photo-1575377427642-087cf684f29d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }
    .form-container {
      backdrop-filter: blur(8px);
    }
    .input-focus:focus {
      box-shadow: 0 0 0 3px rgba(210, 130, 50, 0.3);
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center p-5">

  <div class="w-full max-w-2xl">
    <!-- Encabezado decorado -->
    <div class="text-center mb-10">
      <h1 class="text-4xl font-bold text-white font-cursive mb-2">Realizar Pedido</h1>
      <div class="w-24 h-1 bg-amber-300 mx-auto mb-4"></div>
      <p class="text-lg text-white opacity-90">Complete el formulario para reservar sus chocolates</p>
    </div>

    <!-- Formulario -->
    <form action="pedido.php" method="POST" class="form-container bg-white bg-opacity-90 p-8 rounded-xl shadow-2xl border border-amber-100">
      <!-- Campo Producto -->
      <div class="mb-6">
        <label class="block text-chocolate-800 font-medium mb-2">Producto Seleccionado</label>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
              <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
              <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
            </svg>
          </div>
          <input type="text" name="producto" value="<?= isset($_GET['producto']) ? htmlspecialchars($_GET['producto']) : '' ?>" required 
                 class="input-focus pl-10 w-full border border-amber-200 rounded-lg py-3 px-4 focus:outline-none focus:border-amber-500 transition">
        </div>
      </div>

      <!-- Campo Cantidad -->
      <div class="mb-6">
        <label class="block text-chocolate-800 font-medium mb-2">Cantidad</label>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
            </svg>
          </div>
          <input type="number" name="cantidad" required min="1" 
                 class="input-focus pl-10 w-full border border-amber-200 rounded-lg py-3 px-4 focus:outline-none focus:border-amber-500 transition">
        </div>
      </div>

      <!-- Campo Cliente -->
      <div class="mb-6">
        <label class="block text-chocolate-800 font-medium mb-2">Nombre del Cliente</label>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
            </svg>
          </div>
          <input type="text" name="cliente" required 
                 class="input-focus pl-10 w-full border border-amber-200 rounded-lg py-3 px-4 focus:outline-none focus:border-amber-500 transition">
        </div>
      </div>

      <!-- Campo Teléfono -->
      <div class="mb-6">
        <label class="block text-chocolate-800 font-medium mb-2">Teléfono</label>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
              <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
            </svg>
          </div>
          <input type="text" name="telefono" required 
                 class="input-focus pl-10 w-full border border-amber-200 rounded-lg py-3 px-4 focus:outline-none focus:border-amber-500 transition">
        </div>
      </div>

      <!-- Método de Pago -->
      <div class="mb-8">
        <label class="block text-chocolate-800 font-medium mb-2">Método de Pago</label>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
              <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/>
              <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/>
            </svg>
          </div>
          <select name="pago" class="input-focus pl-10 w-full border border-amber-200 rounded-lg py-3 px-4 focus:outline-none focus:border-amber-500 transition appearance-none" required>
            <option value="Efectivo">Efectivo</option>
            <option value="QR">Pago QR</option>
          </select>
        </div>
      </div>

      <!-- Botones -->
      <div class="flex flex-col space-y-4">
        <button type="submit" 
                class="w-full bg-gradient-to-r from-amber-600 to-amber-800 hover:from-amber-700 hover:to-amber-900 text-white font-bold py-3 px-4 rounded-lg shadow-lg transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-opacity-50">
          Confirmar Pedido
        </button>
        
        <a href="index.php" 
           class="w-full text-center bg-white text-amber-800 border border-amber-600 hover:bg-amber-50 font-bold py-3 px-4 rounded-lg shadow transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-opacity-50">
          Seguir Comprando
        </a>
      </div>

      <!-- Información adicional -->
      <div class="mt-6 text-center text-chocolate-700">
        <p class="flex items-center justify-center">
          <svg class="w-5 h-5 mr-2 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
          </svg>
          Trinidad, Beni - Bolivia
        </p>
        <p class="flex items-center justify-center mt-2">
          <svg class="w-5 h-5 mr-2 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
          </svg>
          +591 6885 9945
        </p>
      </div>
    </form>
  </div>

</body>
</html>