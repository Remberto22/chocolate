<?php
  include 'includes/db.php';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    $query = "INSERT INTO contacto (nombre, email, mensaje) 
              VALUES ('$nombre', '$email', '$mensaje')";

    if (mysqli_query($conn, $query)) {
      echo "<script>alert('Mensaje enviado con éxito'); window.location.href='index.php';</script>";
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
  <title>Contacto - Chocolates Regionales</title>
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
      <h1 class="text-4xl font-bold text-white font-cursive mb-2">Contáctanos</h1>
      <div class="w-24 h-1 bg-amber-300 mx-auto mb-4"></div>
      <p class="text-lg text-white opacity-90">Déjanos tu mensaje y pronto te responderemos</p>
    </div>

    <!-- Formulario -->
    <form action="contacto.php" method="POST" class="form-container bg-white bg-opacity-90 p-8 rounded-xl shadow-2xl border border-amber-100">
      <div class="mb-6">
        <label class="block text-chocolate-800 font-medium mb-2">Tu Nombre</label>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
            </svg>
          </div>
          <input type="text" name="nombre" required 
                 class="input-focus pl-10 w-full border border-amber-200 rounded-lg py-3 px-4 focus:outline-none focus:border-amber-500 transition">
        </div>
      </div>

      <div class="mb-6">
        <label class="block text-chocolate-800 font-medium mb-2">Correo Electrónico</label>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
              <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
              <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
            </svg>
          </div>
          <input type="email" name="email" required 
                 class="input-focus pl-10 w-full border border-amber-200 rounded-lg py-3 px-4 focus:outline-none focus:border-amber-500 transition">
        </div>
      </div>

      <div class="mb-8">
        <label class="block text-chocolate-800 font-medium mb-2">Tu Mensaje</label>
        <div class="relative">
          <div class="absolute top-3 left-3 pl-1 flex items-start pointer-events-none">
            <svg class="h-5 w-5 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"/>
            </svg>
          </div>
          <textarea name="mensaje" required rows="5"
                    class="input-focus pl-10 w-full border border-amber-200 rounded-lg py-3 px-4 focus:outline-none focus:border-amber-500 transition"></textarea>
        </div>
      </div>

      <button type="submit" 
              class="w-full bg-gradient-to-r from-amber-600 to-amber-800 hover:from-amber-700 hover:to-amber-900 text-white font-bold py-3 px-4 rounded-lg shadow-lg transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-opacity-50">
        Enviar Mensaje
      </button>

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
          +591 68859945
        </p>
      </div>
    </form>
  </div>

</body>
</html>