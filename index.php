<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Chocolates Regionales</title>
  
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            chocolate: {
              100: '#FFF0E5',
              200: '#E8D5C5',
              300: '#D1BBA6',
              400: '#B38B6A',
              500: '#8B5A2B',
              600: '#6B3E1D',
              700: '#4D2C14',
              800: '#301B0B',
              900: '#1A0D03',
            }
          },
          fontFamily: {
            'sans': ['"Open Sans"', 'sans-serif'],
            'cursive': ['"Dancing Script"', 'cursive']
          }
        }
      }
    }
  </script>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
  
  <style>
    .hero-bg {
      background-image: url('https://images.unsplash.com/photo-1575377427642-087cf684f29d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }
    .text-shadow {
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }
    .card-hover {
      transition: all 0.3s ease;
    }
    .card-hover:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }
  </style>
</head>
<body class="relative font-sans min-h-screen">

  <!-- Fondo con overlay -->
  <div class="fixed inset-0 -z-10">
    <div class="absolute inset-0 bg-black opacity-40"></div>
    <div class="hero-bg absolute inset-0"></div>
  </div>

  <!-- Header -->
  <header class="bg-chocolate-700 bg-opacity-90 text-white p-5 text-center rounded-b-2xl shadow-lg">
    <h1 class="text-4xl md:text-5xl font-bold text-shadow font-cursive">Chocolates Regionales</h1>
    <p class="text-xl md:text-2xl mt-2 text-shadow">Sabor auténtico de nuestra tierra</p>
  </header>

  <!-- Carrusel -->
  <div class="w-full max-w-5xl mx-auto overflow-hidden relative h-[70vh] mt-8 rounded-xl shadow-2xl border-4 border-chocolate-300">
    <!-- Flechas -->
    <button onclick="prevSlide()" class="absolute left-2 top-1/2 -translate-y-1/2 bg-chocolate-800 bg-opacity-70 text-white text-4xl px-3 py-1 rounded-full z-10 hover:bg-chocolate-600 transition">
      ‹
    </button>
    <button onclick="nextSlide()" class="absolute right-2 top-1/2 -translate-y-1/2 bg-chocolate-800 bg-opacity-70 text-white text-4xl px-3 py-1 rounded-full z-10 hover:bg-chocolate-600 transition">
      ›
    </button>

    <!-- Indicadores -->
    <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2 z-10">
      <?php for($i=0; $i<6; $i++): ?>
        <button onclick="goToSlide(<?= $i ?>)" class="w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition <?= $i===0 ? 'bg-opacity-100' : '' ?>" id="indicator-<?= $i ?>"></button>
      <?php endfor; ?>
    </div>

    <!-- Carrusel -->
<div id="carousel" class="flex transition-transform duration-700 ease-in-out h-full w-[600%]">
<!-- Slide 1 ajustado para imagen vertical pero ocupando toda la sección -->
<div class="w-1/6 h-full relative">
  <!-- Contenedor de imagen con fondo de respaldo -->
  <div class="absolute inset-0 bg-amber-900 flex items-center justify-center overflow-hidden">
    <img src="assets/img/cacao.jpg" 
         class="h-full w-auto object-cover"
         alt="Cacao Beniano"
         style="min-width: 100%; object-position: center;">
  </div>
  
  <!-- Overlay de texto (igual que antes) -->
  <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center p-8">
    <div class="text-center text-white max-w-lg">
      <h2 class="text-4xl md:text-5xl font-bold mb-4 text-shadow font-cursive">Cacao Beniano</h2>
      <p class="text-xl md:text-2xl text-shadow">El mejor cacao orgánico cultivado en Trinidad</p>
      <p class="text-lg mt-4 text-yellow-200 font-semibold">100% origen Beni</p>
    </div>
  </div>
</div>
  
  <!-- Slide 2 -->
  <div class="w-1/6 h-full relative">
    <img src="assets/img/cacao1.jpg" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center p-8">
      <div class="text-center text-white max-w-lg">
        <h2 class="text-4xl md:text-5xl font-bold mb-4 text-shadow font-cursive">Chocolates Artesanales</h2>
        <p class="text-xl md:text-2xl text-shadow">Hechos a mano con técnicas tradicionales</p>
        <p class="text-lg mt-4 text-yellow-200 font-semibold">Sabores únicos de Trinidad</p>
      </div>
    </div>
  </div>
  
  <!-- Slide 3 -->
  <div class="w-1/6 h-full relative">
    <img src="assets/img/cacao2.jpg" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center p-8">
      <div class="text-center text-white max-w-lg">
        <h2 class="text-4xl md:text-5xl font-bold mb-4 text-shadow font-cursive">Tabletas Premium</h2>
        <p class="text-xl md:text-2xl text-shadow">Deliciosas combinaciones con frutos benianos</p>
        <p class="text-lg mt-4 text-yellow-200 font-semibold">Castña, copoazú y más</p>
      </div>
    </div>
  </div>
  
  <!-- Slide 4 -->
  <div class="w-1/6 h-full relative">
    <img src="assets/img/cacao3.jpg" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center p-8">
      <div class="text-center text-white max-w-lg">
        <h2 class="text-4xl md:text-5xl font-bold mb-4 text-shadow font-cursive">Bombones Especiales</h2>
        <p class="text-xl md:text-2xl text-shadow">Rellenos de sabores tropicales del Beni</p>
        <p class="text-lg mt-4 text-yellow-200 font-semibold">Mango, maracuyá y guayaba</p>
      </div>
    </div>
  </div>
  
  <!-- Slide 5 -->
  <div class="w-1/6 h-full relative">
    <img src="assets/img/cacao4.jpg" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center p-8">
      <div class="text-center text-white max-w-lg">
        <h2 class="text-4xl md:text-5xl font-bold mb-4 text-shadow font-cursive">Caja Regalo</h2>
        <p class="text-xl md:text-2xl text-shadow">Selección premium de nuestros mejores chocolates</p>
        <p class="text-lg mt-4 text-yellow-200 font-semibold">Presentación exclusiva</p>
      </div>
    </div>
  </div>
  
  <!-- Slide 6 -->
  <div class="w-1/6 h-full relative">
    <img src="assets/img/cacao7.jpg" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center p-8">
      <div class="text-center text-white max-w-lg">
        <h2 class="text-4xl md:text-5xl font-bold mb-4 text-shadow font-cursive">Tradición Chocolatera</h2>
        <p class="text-xl md:text-2xl text-shadow">Más de 20 años endulzando Trinidad</p>
        <p class="text-lg mt-4 text-yellow-200 font-semibold">Orgullo beniano</p>
      </div>
    </div>
  </div>
</div>
      
      <!-- Más slides... (puedes agregar más según necesites) -->
    </div>
  </div>

  <script>
    let current = 0;
    const total = 6;
    let autoSlideInterval;

    function updateCarousel() {
      document.getElementById('carousel').style.transform = `translateX(-${current * (100 / total)}%)`;
      
      // Actualizar indicadores
      document.querySelectorAll('[id^="indicator-"]').forEach((indicator, index) => {
        indicator.classList.toggle('bg-opacity-100', index === current);
        indicator.classList.toggle('bg-opacity-50', index !== current);
      });
    }

    function nextSlide() {
      current = (current + 1) % total;
      updateCarousel();
      resetAutoSlide();
    }

    function prevSlide() {
      current = (current - 1 + total) % total;
      updateCarousel();
      resetAutoSlide();
    }

    function goToSlide(index) {
      current = index;
      updateCarousel();
      resetAutoSlide();
    }

    function resetAutoSlide() {
      clearInterval(autoSlideInterval);
      autoSlideInterval = setInterval(nextSlide, 5000);
    }

    // Iniciar autoplay
    autoSlideInterval = setInterval(nextSlide, 5000);
  </script>

<!-- Sección de Productos con título decorado -->
<section class="py-12 px-5 max-w-6xl mx-auto mt-10 relative">
  <!-- Título decorado -->
  <div class="text-center mb-16 relative">
    <div class="absolute left-1/2 top-1/2 w-3/4 h-1 bg-amber-200 transform -translate-x-1/2 -translate-y-1/2 z-0"></div>
    <h2 class="text-4xl md:text-5xl font-bold text-chocolate-800 relative z-10 inline-block px-8 bg-white font-cursive">
      <span class="text-amber-600">~</span> Nuestros Productos <span class="text-amber-600">~</span>
    </h2>

  <!-- Productos -->
  <section class="p-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto mt-12">
    <?php
      $productos = [
        ["img" => "assets/img/artesanal.jpg",
         "nombre" => "Chocolate Artesanal", 
         "precio" => "15 Bs",
         "desc" => "Elaborado con cacao 100% puro de la región"],
         
        ["img" => "assets/img/choco2.jpg", 
         "nombre" => "Bombones Regionales", 
         "precio" => "25 Bs",
         "desc" => "Variedad de sabores tradicionales"],
         
        ["img" => "assets/img/choco3.jpg", 
         "nombre" => "Chocolate en Barra", 
         "precio" => "10 Bs",
         "desc" => "Deliciosas barras de chocolate con leche"],
         
        ["img" => "assets/img/choco4.jpg", 
         "nombre" => "Tableta de Cacao Puro", 
         "precio" => "20 Bs",
         "desc" => "Para los amantes del chocolate intenso"],
         
        ["img" => "assets/img/choco5.jpg", 
         "nombre" => "Chocolates Mixtos", 
         "precio" => "30 Bs",
         "desc" => "Selección de nuestros mejores productos"],
         
        ["img" => "assets/img/choco6.jpg", 
         "nombre" => "Caja de Bombones", 
         "precio" => "40 Bs",
         "desc" => "Perfecta para regalo o antojo especial"]
      ];
      
      foreach($productos as $p):
    ?>
    <div class="bg-white bg-opacity-90 rounded-xl overflow-hidden shadow-lg card-hover">
      <div class="relative h-60 overflow-hidden">
        <img src="<?= $p['img'] ?>" class="w-full h-full object-cover transition duration-500 hover:scale-110">
        <span class="absolute top-4 right-4 bg-chocolate-600 text-white px-3 py-1 rounded-full text-sm font-bold"><?= $p['precio'] ?></span>
      </div>
      <div class="p-6">
        <h3 class="text-2xl font-bold text-chocolate-800 mb-2"><?= $p['nombre'] ?></h3>
        <p class="text-gray-600 mb-4"><?= $p['desc'] ?></p>
        <a href="pedido.php?producto=<?= urlencode($p['nombre']) ?>" 
           class="inline-block bg-chocolate-600 hover:bg-chocolate-700 text-white font-bold py-2 px-6 rounded-full transition">
          Comprar ahora
        </a>
      </div>
    </div>
    <?php endforeach; ?>
  </section>

  <!-- Testimonios -->
  <section class="py-12 bg-chocolate-800 bg-opacity-90 text-white mt-16">
    <div class="max-w-6xl mx-auto px-4">
      <h2 class="text-3xl font-bold text-center mb-12 font-cursive">Lo que dicen nuestros clientes</h2>
      
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-chocolate-700 bg-opacity-70 p-6 rounded-lg">
          <div class="flex items-center mb-4">
            <img src="https://randomuser.me/api/portraits/women/32.jpg" class="w-12 h-12 rounded-full mr-4">
            <div>
              <h4 class="font-bold">María Fernández</h4>
              <div class="flex text-yellow-300">
                ★ ★ ★ ★ ★
              </div>
            </div>
          </div>
          <p>"El mejor chocolate que he probado en mi vida. El sabor es increíblemente auténtico y la textura perfecta."</p>
        </div>
        
        <!-- Más testimonios... -->
      </div>
    </div>
  </section>

  <!-- Contacto -->
  <section class="py-16 bg-white bg-opacity-90">
    <div class="max-w-4xl mx-auto px-4 text-center">
      <h2 class="text-3xl font-bold text-chocolate-800 mb-4 font-cursive">¿Listo para probar nuestros chocolates?</h2>
      <p class="text-xl text-gray-600 mb-8">Contáctanos para pedidos especiales o visitar nuestra tienda</p>
      
      <div class="flex flex-wrap justify-center gap-4">
        <a href="contacto.php" class="bg-chocolate-600 hover:bg-chocolate-700 text-white font-bold py-3 px-8 rounded-full transition text-lg">
          Contáctanos
        </a>
        <a href="https://wa.me/59168859945" target="_blank" class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-8 rounded-full transition text-lg flex items-center">
          <img src="https://img.icons8.com/ios-filled/24/ffffff/whatsapp.png" class="w-6 h-6 mr-2">
          WhatsApp
        </a>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-chocolate-900 text-white py-8">
    <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
      <div>
        <h3 class="text-xl font-bold mb-4 font-cursive">Chocolates Regionales</h3>
        <p class="text-chocolate-300">Sabor auténtico de nuestra tierra desde 1985.</p>
      </div>
      
      <div>
        <h4 class="font-bold mb-4">Enlaces rápidos</h4>
        <ul class="space-y-2">
          <li><a href="#" class="text-chocolate-300 hover:text-white transition">Inicio</a></li>
          <li><a href="#" class="text-chocolate-300 hover:text-white transition">Productos</a></li>
          <li><a href="#" class="text-chocolate-300 hover:text-white transition">Sobre nosotros</a></li>
          <li><a href="contacto.php" class="text-chocolate-300 hover:text-white transition">Contacto</a></li>
        </ul>
      </div>
      
      <div>
        <h4 class="font-bold mb-4">Contacto</h4>
        <address class="not-italic text-chocolate-300">
          <p>Calle del Cacao #123</p>
          <p>Trinidad,Beni,Bolivia</p>
          <p>Tel: +591 67283243</p>
          <p>Email: chocolatesregionales@gmail.com</p>
        </address>
      </div>
    </div>
    
    <div class="border-t border-chocolate-700 mt-8 pt-6 text-center text-chocolate-400">
      <p>&copy; <?= date('Y') ?> Chocolates Regionales. Todos los derechos reservados.</p>
    </div>
  </footer>

  <!-- Botón WhatsApp flotante -->
  <a href="https://wa.me/59168859945" target="_blank" class="fixed bottom-6 right-6 bg-green-500 p-4 rounded-full shadow-xl hover:scale-110 transition z-50">
    <img src="https://img.icons8.com/ios-filled/50/ffffff/whatsapp.png" class="w-10 h-10">
  </a>

</body>
</html>