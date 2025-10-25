<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Negeri 4 Bogor- Terampil Dan Teruji</title>
    <link rel="icon" href="{{ asset('images/favicon.svg') }}" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#66B1F2',
                        'primary-dark': '#4A90E2',
                        'primary-light': '#B3D9FF'
                    }
                }
            }
        }
    </script>

  <script>
    // Data jurusan untuk modal
    const majorData = {
      pplg: {
        title: 'PPLG (Pengembangan Perangkat Lunak dan Gim)',
        code: 'PPLG',
        image: '{{ asset('images/LOGO PPLG.png') }}',
        desc: 'Fokus pada pengembangan aplikasi, website, dan game dengan fondasi logika pemrograman yang kuat.',
        bullets: ['Pemrograman Web & Mobile', 'Basis Data', 'UI/UX dasar']
      },
      tkj: {
        title: 'Teknik Jaringan Komputer',
        code: 'TKJ',
        image: '{{ asset('images/LOGO TJKJ.png') }}',
        desc: 'Jaringan komputer, administrasi server, dan keamanan jaringan untuk kebutuhan industri.',
        bullets: ['Administrasi Jaringan', 'Server & Virtualisasi', 'Keamanan Jaringan']
      },
      tpfl: {
        title: 'Teknik Pengelasan',
        code: 'TPFL',
        image: '{{ asset('images/LOGO JURUSAN.png') }}',
        desc: 'Keterampilan pengelasan dan fabrikasi logam untuk manufaktur dan konstruksi.',
        bullets: ['SMAW/GMAW/TIG', 'Fabrikasi & Assembly', 'K3 & Gambar Teknik']
      },
      otomotif: {
        title: 'Teknik Otomotif',
        code: 'TO',
        image: '{{ asset('images/Logo TO.png') }}',
        desc: 'Perawatan, perbaikan, dan diagnosa kendaraan bermotor sesuai standar industri.',
        bullets: ['Sistem Mesin', 'Kelistrikan Otomotif', 'Diagnosis & Perawatan']
      }
    };

    function openMajor(key){
      const d = majorData[key];
      if(!d) return;
      document.getElementById('majorImage').src = d.image;
      document.getElementById('majorTitle').textContent = d.title;
      document.getElementById('majorCode').textContent = d.code;
      document.getElementById('majorDesc').textContent = d.desc;
      const list = document.getElementById('majorBullets');
      list.innerHTML = '';
      d.bullets.forEach(b => {
        const li = document.createElement('li');
        li.className = 'flex items-start gap-2';
        li.innerHTML = `<span class=\"mt-1 w-2.5 h-2.5 rounded-full bg-[#254C6B]\"></span><span>${b}</span>`;
        list.appendChild(li);
      });
      document.getElementById('majorModal').classList.remove('hidden');
      document.body.classList.add('overflow-hidden');
    }

    function closeMajor(){
      document.getElementById('majorModal').classList.add('hidden');
      document.body.classList.remove('overflow-hidden');
    }
  </script>
    <!-- Tambahkan animasi di sini -->
  <style>
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(40px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes slideInLeft {
      from {
        opacity: 0;
        transform: translateX(-50px);
      }
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes slideInRight {
      from {
        opacity: 0;
        transform: translateX(50px);
      }
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes gradientShift {
      0% {
        background-position: 0% 50%;
      }
      50% {
        background-position: 100% 50%;
      }
      100% {
        background-position: 0% 50%;
      }
    }

    @keyframes float {
      0%, 100% {
        transform: translateY(0px);
      }
      50% {
        transform: translateY(-10px);
      }
    }

    @keyframes pulse {
      0%, 100% {
        opacity: 1;
      }
      50% {
        opacity: 0.7;
      }
    }

    @keyframes bounce {
      0%, 20%, 53%, 80%, 100% {
        transform: translate3d(0,0,0);
      }
      40%, 43% {
        transform: translate3d(0, -8px, 0);
      }
      70% {
        transform: translate3d(0, -4px, 0);
      }
      90% {
        transform: translate3d(0, -2px, 0);
      }
    }

    .animate-fade-in-up {
      animation: fadeInUp 1s ease-out forwards;
    }

    .animate-slide-in-left {
      animation: slideInLeft 1s ease-out forwards;
    }

    .animate-slide-in-right {
      animation: slideInRight 1s ease-out forwards;
    }

    .animate-gradient {
      background-size: 200% 200%;
      animation: gradientShift 3s ease infinite;
    }

    .animate-float {
      animation: float 3s ease-in-out infinite;
    }

    .animate-pulse-custom {
      animation: pulse 2s ease-in-out infinite;
    }

    .animate-bounce-custom {
      animation: bounce 2s infinite;
    }

    /* Enhanced Parallax Animations */
    @keyframes parallax-slow {
      0%, 100% { transform: translateY(0px) translateX(0px); }
      50% { transform: translateY(-20px) translateX(10px); }
    }

    @keyframes parallax-medium {
      0%, 100% { transform: translateY(0px) translateX(0px); }
      50% { transform: translateY(-15px) translateX(-15px); }
    }

    @keyframes parallax-fast {
      0%, 100% { transform: translateY(0px) translateX(0px); }
      50% { transform: translateY(-10px) translateX(5px); }
    }

    @keyframes spin-slow {
      from { transform: rotate(0deg); }
      to { transform: rotate(360deg); }
    }

    @keyframes glow-pulse {
      0%, 100% { 
        box-shadow: 0 0 20px rgba(102, 177, 242, 0.3);
        transform: scale(1);
      }
      50% { 
        box-shadow: 0 0 40px rgba(102, 177, 242, 0.6);
        transform: scale(1.05);
      }
    }

    @keyframes text-shimmer {
      0% { background-position: -200% center; }
      100% { background-position: 200% center; }
    }

    .parallax-slow { animation: parallax-slow 8s ease-in-out infinite; }
    .parallax-medium { animation: parallax-medium 6s ease-in-out infinite; }
    .parallax-fast { animation: parallax-fast 4s ease-in-out infinite; }
    .animate-spin-slow { animation: spin-slow 10s linear infinite; }
    .animate-glow-pulse { animation: glow-pulse 3s ease-in-out infinite; }
    .animate-text-shimmer { 
      background: linear-gradient(90deg, #ffffff, #66B1F2, #4A90E2, #66B1F2, #ffffff);
      background-size: 200% auto;
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      animation: text-shimmer 3s linear infinite;
    }

    /* Additional enhanced animations */
    @keyframes morphing {
      0%, 100% { border-radius: 50% 20% 50% 20%; }
      25% { border-radius: 20% 50% 20% 50%; }
      50% { border-radius: 30% 70% 30% 70%; }
      75% { border-radius: 70% 30% 70% 30%; }
    }

    @keyframes wave {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      25% { transform: translateY(-10px) rotate(1deg); }
      50% { transform: translateY(-5px) rotate(0deg); }
      75% { transform: translateY(-15px) rotate(-1deg); }
    }

    @keyframes sparkle {
      0%, 100% { opacity: 0; transform: scale(0); }
      50% { opacity: 1; transform: scale(1); }
    }

    @keyframes gradient-border {
      0% { border-color: #66B1F2; }
      25% { border-color: #4A90E2; }
      50% { border-color: #FAB82F; }
      75% { border-color: #2E5A63; }
      100% { border-color: #66B1F2; }
    }

    .animate-morphing { animation: morphing 8s ease-in-out infinite; }
    .animate-wave { animation: wave 4s ease-in-out infinite; }
    .animate-sparkle { animation: sparkle 2s ease-in-out infinite; }
    .animate-gradient-border { animation: gradient-border 4s linear infinite; }

    /* Hover effects for cards */
    .card-hover-effect {
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    
    .card-hover-effect:hover {
      transform: translateY(-10px) scale(1.02);
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    }

    /* Enhanced click effects for gallery */
    .click-effect {
      position: relative;
      overflow: hidden;
    }

    .click-effect::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 0;
      height: 0;
      background: radial-gradient(circle, rgba(102, 177, 242, 0.3) 0%, transparent 70%);
      transform: translate(-50%, -50%);
      transition: width 0.6s, height 0.6s;
      border-radius: 50%;
      z-index: 0;
    }

    .click-effect:active::before {
      width: 300px;
      height: 300px;
    }

    .click-effect:active {
      transform: scale(0.95);
    }

    /* Enhanced gallery card animations */
    @keyframes gallery-float {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      50% { transform: translateY(-5px) rotate(0.5deg); }
    }

    @keyframes gallery-glow {
      0%, 100% { box-shadow: 0 0 20px rgba(102, 177, 242, 0.2); }
      50% { box-shadow: 0 0 40px rgba(102, 177, 242, 0.4); }
    }

    .gallery-card {
      animation: gallery-float 6s ease-in-out infinite;
    }

    .gallery-card:hover {
      animation: gallery-glow 2s ease-in-out infinite;
    }

    /* Enhanced shadow effects */
    .shadow-3xl {
      box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.25);
    }

    /* Particle animation for gallery */
    @keyframes particle-float {
      0%, 100% { transform: translateY(0px) translateX(0px); opacity: 0.7; }
      25% { transform: translateY(-10px) translateX(5px); opacity: 1; }
      50% { transform: translateY(-5px) translateX(-3px); opacity: 0.8; }
      75% { transform: translateY(-15px) translateX(3px); opacity: 0.9; }
    }

    .particle-float {
      animation: particle-float 4s ease-in-out infinite;
    }

    .text-gradient-animated {
      background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab, #667eea, #764ba2);
      background-size: 400% 400%;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      animation: gradientShift 8s ease infinite;
    }

    .hover-glow:hover {
      box-shadow: 0 0 20px rgba(37, 76, 107, 0.5);
      transform: translateY(-2px);
    }

    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }
    .delay-300 { animation-delay: 0.3s; }
    .delay-400 { animation-delay: 0.4s; }
    .delay-500 { animation-delay: 0.5s; }

    /* Modern glass morphism effects */
    .glass-card {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }

    .glass-card-dark {
      background: rgba(0, 0, 0, 0.2);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.1);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }

    /* Modern card hover effects */
    .modern-card {
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .modern-card:hover {
      transform: translateY(-10px) scale(1.02);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    /* Gradient text effects */
    .gradient-text-blue {
      background: linear-gradient(135deg, #66B1F2 0%, #4A90E2 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    /* Staggered animation delays */
    .delay-700 { animation-delay: 0.7s; }
    .delay-1000 { animation-delay: 1s; }
    .delay-1300 { animation-delay: 1.3s; }
    
    /* Scroll Reveal Animations */
    .scroll-reveal {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }
    
    .scroll-reveal.visible {
        opacity: 1;
        transform: translateY(0);
    }
    
    .scroll-reveal.delay-100 { transition-delay: 0.1s; }
    .scroll-reveal.delay-200 { transition-delay: 0.2s; }
    .scroll-reveal.delay-300 { transition-delay: 0.3s; }
    .scroll-reveal.delay-400 { transition-delay: 0.4s; }
    .scroll-reveal.delay-500 { transition-delay: 0.5s; }
    .scroll-reveal.delay-600 { transition-delay: 0.6s; }
    .scroll-reveal.delay-700 { transition-delay: 0.7s; }
    .scroll-reveal.delay-800 { transition-delay: 0.8s; }

    /* Enhanced Animation Keyframes */
    @keyframes slideInLeft {
      from {
        opacity: 0;
        transform: translateX(-50px);
      }
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes slideInRight {
      from {
        opacity: 0;
        transform: translateX(50px);
      }
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes scaleIn {
      from {
        opacity: 0;
        transform: scale(0.8);
      }
      to {
        opacity: 1;
        transform: scale(1);
      }
    }

    @keyframes rotateIn {
      from {
        opacity: 0;
        transform: rotate(-200deg);
      }
      to {
        opacity: 1;
        transform: rotate(0deg);
      }
    }

    @keyframes bounceIn {
      0% {
        opacity: 0;
        transform: scale(0.3);
      }
      50% {
        opacity: 1;
        transform: scale(1.05);
      }
      70% {
        transform: scale(0.9);
      }
      100% {
        opacity: 1;
        transform: scale(1);
      }
    }

    /* Animation Classes */
    .animate-slide-in-left {
      animation: slideInLeft 0.8s ease-out forwards;
    }

    .animate-slide-in-right {
      animation: slideInRight 0.8s ease-out forwards;
    }

    .animate-scale-in {
      animation: scaleIn 0.6s ease-out forwards;
    }

    .animate-rotate-in {
      animation: rotateIn 0.8s ease-out forwards;
    }

    .animate-bounce-in {
      animation: bounceIn 0.8s ease-out forwards;
    }

    /* Responsive Design Improvements */
    @media (max-width: 1024px) {
      .text-5xl {
        font-size: 3rem;
        line-height: 1.1;
      }
      
      .text-4xl {
        font-size: 2.25rem;
        line-height: 1.2;
      }
      
      .px-10 {
        padding-left: 2rem;
        padding-right: 2rem;
      }
    }

    @media (max-width: 768px) {
      .modern-card:hover {
        transform: translateY(-4px) scale(1.01);
      }
      
      .text-5xl {
        font-size: 2.5rem;
        line-height: 1.1;
      }
      
      .text-4xl {
        font-size: 2rem;
        line-height: 1.2;
      }
      
      .text-3xl {
        font-size: 1.75rem;
        line-height: 1.3;
      }

      .py-20 {
        padding-top: 4rem;
        padding-bottom: 4rem;
      }

      .gap-8 {
        gap: 1.5rem;
      }

      .px-8 {
        padding-left: 1.5rem;
        padding-right: 1.5rem;
      }
    }

    @media (max-width: 640px) {
      .text-5xl {
        font-size: 2rem;
        line-height: 1.1;
      }
      
      .text-4xl {
        font-size: 1.75rem;
        line-height: 1.2;
      }
      
      .text-3xl {
        font-size: 1.5rem;
        line-height: 1.3;
      }

      .text-2xl {
        font-size: 1.25rem;
        line-height: 1.4;
      }

      .py-20 {
        padding-top: 3rem;
        padding-bottom: 3rem;
      }
      
      .px-10 {
        padding-left: 1rem;
        padding-right: 1rem;
      }
      
      .gap-8 {
        gap: 1rem;
      }

      .gap-10 {
        gap: 1.5rem;
      }

      .mb-20 {
        margin-bottom: 3rem;
      }

      .mb-16 {
        margin-bottom: 2.5rem;
      }

      .grid-cols-3 {
        grid-template-columns: repeat(2, minmax(0, 1fr));
      }

      .lg\:grid-cols-3 {
        grid-template-columns: repeat(1, minmax(0, 1fr));
      }

      .xl\:grid-cols-4 {
        grid-template-columns: repeat(2, minmax(0, 1fr));
      }
    }

    @media (max-width: 480px) {
      .text-5xl {
        font-size: 1.75rem;
      }
      
      .text-4xl {
        font-size: 1.5rem;
      }
      
      .text-3xl {
        font-size: 1.25rem;
      }

      .py-20 {
        padding-top: 2rem;
        padding-bottom: 2rem;
      }

      .px-8 {
        padding-left: 1rem;
        padding-right: 1rem;
      }

      .px-6 {
        padding-left: 0.75rem;
        padding-right: 0.75rem;
      }

      .grid-cols-2 {
        grid-template-columns: repeat(1, minmax(0, 1fr));
      }

      .lg\:grid-cols-2 {
        grid-template-columns: repeat(1, minmax(0, 1fr));
      }

      .xl\:grid-cols-4 {
        grid-template-columns: repeat(1, minmax(0, 1fr));
      }
    }

    /* Enhanced Hover Effects */
    .hover-lift {
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .hover-lift:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .hover-scale {
      transition: transform 0.3s ease;
    }

    .hover-scale:hover {
      transform: scale(1.05);
    }

    /* Smooth Scroll Behavior */
    html {
      scroll-behavior: smooth;
    }

    /* Loading Animation */
    .loading-pulse {
      animation: pulse 1.5s ease-in-out infinite;
    }
  </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/swiper@9/swiper-bundle.min.css" />
  <style>
    * {
      font-family: 'Poppins', system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif;
    }
    /* Ensure event swiper doesn't clip shadows */
    .event-swiper {
      overflow: visible !important;
      padding-left: 1rem; /* px-4 */
      padding-right: 1rem; /* px-4 */
      padding-bottom: 1rem; /* give room for shadows and bullets */
    }
    .event-swiper .swiper-slide {
      height: auto; /* allow cards to size naturally */
      transition: transform .3s ease, opacity .3s ease, filter .3s ease;
      opacity: .45;
      transform: scale(.94);
      filter: saturate(.9);
    }
    /* Ensure bullets are visible and centered */
    .event-swiper .swiper-pagination-bullets {
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .event-swiper .swiper-pagination-bullet {
      width: 10px;
      height: 10px;
      background: #cbd5e1; /* slate-300 */
      opacity: 1;
      transition: transform .2s ease, background-color .2s ease;
    }
    .event-swiper .swiper-pagination-bullet-active {
      background: #66B1F2;
      transform: scale(1.2);
    }
    /* Only the active (center) slide is emphasized */
    .event-swiper .swiper-slide-active {
      opacity: 1;
      transform: scale(1);
      filter: none;
    }
    /* Subtly de-emphasize the side previews */
    .event-swiper .swiper-slide-prev,
    .event-swiper .swiper-slide-next + .swiper-slide { /* the one after next */
      opacity: .5;
      transform: scale(.93);
      filter: saturate(.9);
    }
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    .animate-fade-in-up {
      animation: fadeInUp 0.8s ease-out forwards;
    }
    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }
    .delay-300 { animation-delay: 0.3s; }
    .delay-400 { animation-delay: 0.4s; }
    .delay-500 { animation-delay: 0.5s; }
    
    /* Smooth scrolling for the entire page */
    html {
      scroll-behavior: smooth;
    }
    
    /* Mobile menu transition */
    #mobile-menu {
      transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
    }
    
    /* Hide scrollbar when mobile menu is open */
    body.menu-open {
      overflow: hidden;
    }
  </style>
    <script>
      // Mobile menu functionality
      document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const closeMenuButton = document.getElementById('close-menu');
        const mobileMenuLinks = document.querySelectorAll('#mobile-menu a');
        
        // Toggle mobile menu
        mobileMenuButton.addEventListener('click', function() {
          mobileMenu.classList.toggle('hidden');
          mobileMenu.classList.toggle('flex');
          document.body.classList.toggle('menu-open');
        });
        
        // Close mobile menu when clicking the close button
        closeMenuButton.addEventListener('click', function() {
          mobileMenu.classList.add('hidden');
          mobileMenu.classList.remove('flex');
          document.body.classList.remove('menu-open');
        });
        
        // Close mobile menu when clicking on a link
        mobileMenuLinks.forEach(link => {
          link.addEventListener('click', function() {
            mobileMenu.classList.add('hidden');
            mobileMenu.classList.remove('flex');
            document.body.classList.remove('menu-open');
          });
        });
        
        // Smooth scroll for all anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
          anchor.addEventListener('click', function (e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
              // Calculate the offset based on the header height
              const headerOffset = 100;
              const elementPosition = targetElement.getBoundingClientRect().top;
              const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
              
              window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
              });
            }
          });
        });
      });
    </script>
  <style>
    /* Navbar active underline (centered pill indicator) */
    nav .nav-link { position: relative; }
    nav .nav-link.bg-blue-50::after {
      content: '';
      position: absolute;
      left: 25%;
      right: 25%;
      bottom: 6px;
      height: 3px;
      background: linear-gradient(90deg, #66B1F2, #4A90E2);
      border-radius: 9999px;
      box-shadow: 0 6px 14px rgba(102, 177, 242, 0.35);
    }
    /* Softer navbar glass look to match reference */
    nav.nav-glass { background: rgba(255,255,255,0.9); backdrop-filter: blur(16px); box-shadow: 0 12px 30px rgba(0,0,0,0.08); }
  </style>
</head>
<body class="bg-gray-50 font-sans scroll-smooth">
  <!-- Initialize AOS -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Initialize AOS
      AOS.init({
        duration: 800,
        once: true,
        offset: 100
      });
      
      // Enhanced scroll reveal with parallax effects
      const scrollRevealElements = document.querySelectorAll('.scroll-reveal');
      const parallaxElements = document.querySelectorAll('.parallax-slow, .parallax-medium, .parallax-fast');
      
      const revealOnScroll = () => {
        scrollRevealElements.forEach(element => {
          const elementTop = element.getBoundingClientRect().top;
          const elementVisible = 150;
          
          if (elementTop < window.innerHeight - elementVisible) {
            element.classList.add('visible');
          }
        });
      };
      
      // Enhanced parallax scrolling effect
      const handleParallax = () => {
        const scrolled = window.pageYOffset;
        
        parallaxElements.forEach(element => {
          const rect = element.getBoundingClientRect();
          const speed = element.classList.contains('parallax-slow') ? 0.3 : 
                       element.classList.contains('parallax-medium') ? 0.5 : 0.7;
          const yPos = -(scrolled * speed);
          const xPos = Math.sin(scrolled * 0.001) * 10;
          element.style.transform = `translateY(${yPos}px) translateX(${xPos}px)`;
        });
      };
      
      // Smooth scroll reveal with staggered animation
      const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
      };
      
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
          }
        });
      }, observerOptions);
      
      // Apply observer to all scroll-reveal elements
      scrollRevealElements.forEach(element => {
        observer.observe(element);
      });
      
      // Enhanced scroll event with throttling
      let ticking = false;
      const updateOnScroll = () => {
        if (!ticking) {
          requestAnimationFrame(() => {
            revealOnScroll();
            handleParallax();
            ticking = false;
          });
          ticking = true;
        }
      };
      
      window.addEventListener('scroll', updateOnScroll);
      revealOnScroll();

      // Enhanced gallery interactions
      const galleryCards = document.querySelectorAll('.card-hover-effect');
      
      galleryCards.forEach(card => {
        // Add ripple effect on click
        card.addEventListener('click', function(e) {
          const ripple = document.createElement('div');
          const rect = this.getBoundingClientRect();
          const size = Math.max(rect.width, rect.height);
          const x = e.clientX - rect.left - size / 2;
          const y = e.clientY - rect.top - size / 2;
          
          ripple.style.cssText = `
            position: absolute;
            width: ${size}px;
            height: ${size}px;
            left: ${x}px;
            top: ${y}px;
            background: radial-gradient(circle, rgba(102, 177, 242, 0.3) 0%, transparent 70%);
            border-radius: 50%;
            transform: scale(0);
            animation: ripple 0.6s ease-out;
            pointer-events: none;
            z-index: 1000;
          `;
          
          this.appendChild(ripple);
          
          setTimeout(() => {
            ripple.remove();
          }, 600);
        });
        
        // Enhanced hover effects
        card.addEventListener('mouseenter', function() {
          this.style.transform = 'translateY(-15px) scale(1.03)';
          this.style.boxShadow = '0 30px 60px rgba(0, 0, 0, 0.2)';
        });
        
        card.addEventListener('mouseleave', function() {
          this.style.transform = 'translateY(0) scale(1)';
          this.style.boxShadow = '0 10px 25px rgba(0, 0, 0, 0.1)';
        });
      });
      
      // Add ripple animation keyframes
      const style = document.createElement('style');
      style.textContent = `
        @keyframes ripple {
          to {
            transform: scale(2);
            opacity: 0;
          }
        }
      `;
      document.head.appendChild(style);
    });
  </script>
<!-- Navbar -->
<!-- Floating Navbar -->
<!-- Floating Solid Navbar -->
<nav class="fixed top-6 left-1/2 transform -translate-x-1/2 w-[95%] md:w-[90%] bg-white/90 shadow-2xl rounded-xl border border-gray-200 z-50 backdrop-blur-xl ring-1 ring-gray-200/60 nav-glass">
  <div class="max-w-7xl mx-auto px-6">
    <div class="flex justify-between items-center h-16">
      <!-- Logo & Nama Sekolah -->
      <div class="flex items-center space-x-3">
      <img src="{{ asset('images/favicon.svg') }}" alt="SMKN 4 Logo" class="w-10 h-10 object-contain" />
        <span class="text-lg md:text-xl font-bold text-gray-800">Gallery4U</span>
        </div>


      <!-- Menu Desktop -->
      <div class="hidden md:flex items-center gap-4">
        <div class="flex items-center gap-1 bg-white/90 rounded-xl px-3 py-1 shadow-lg ring-1 ring-gray-200/70 backdrop-blur relative">
          <a href="#home" class="px-4 py-2 rounded-xl font-semibold transition duration-300 scroll-smooth nav-link">Beranda</a>

          <!-- Informasi dropdown (click to open) -->
          <div class="relative">
            <button type="button" onclick="toggleMenu('infoMenu')" class="px-4 py-2 rounded-xl text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-semibold transition duration-300">Informasi ▾</button>
            <div id="infoMenu" class="absolute left-0 top-full mt-2 w-64 bg-white shadow-lg ring-1 ring-gray-200 rounded-xl py-2 hidden z-40">
              <a href="#profil" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Profil Sekolah</a>
              <a href="#jurusan" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Lihat Jurusan</a>
              <a href="#tenagapendidik" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Guru & Staff</a>
            </div>
          </div>

          <a href="#berita" class="px-4 py-2 rounded-xl text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-semibold transition duration-300 scroll-smooth nav-link">Berita</a>
          <a href="#event" class="px-4 py-2 rounded-xl text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-semibold transition duration-300 scroll-smooth nav-link">Event</a>
          <a href="#galeri" class="px-4 py-2 rounded-xl text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-semibold transition duration-300 scroll-smooth nav-link">Galeri</a>
          <a href="#kontak" class="px-4 py-2 rounded-xl text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-semibold transition duration-300 scroll-smooth nav-link">Kontak</a>
        </div>
        @guest
        <a href="{{ route('user.login', ['redirect' => request()->getRequestUri()]) }}" class="px-5 py-2 rounded-xl text-gray-700 bg-white hover:bg-gray-100 ring-1 ring-gray-200 font-semibold transition">Login</a>
        <a href="{{ route('user.register', ['redirect' => request()->getRequestUri()]) }}" class="px-6 py-2 rounded-xl bg-gradient-to-br from-[#66B1F2] to-[#4A90E2] text-white font-bold shadow-[0_10px_25px_-10px_rgba(59,130,246,0.6)] hover:opacity-95 transition">Daftar</a>
        @endguest
        @auth
        <a href="{{ route('user.profile') }}" title="Profil Saya" class="mr-2 inline-flex items-center justify-center w-9 h-9 rounded-full ring-1 ring-gray-200 overflow-hidden bg-white">
          @php $av = auth()->user()->avatar ? asset('images/avatars/'.auth()->user()->avatar) : null; @endphp
          @if($av)
            <img src="{{ $av }}" alt="Avatar" class="w-full h-full object-cover">
          @else
            <i class="fas fa-user text-gray-600"></i>
          @endif
        </a>
        <span class="text-sm text-gray-600">Hi, <span class="font-semibold">{{ auth()->user()->name }}</span></span>
        <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="ml-1 px-4 py-2 text-sm rounded-xl ring-1 ring-gray-200 hover:bg-gray-100">Keluar</button>
        </form>
        @endauth
      </div>

      <!-- Burger Menu Mobile -->
            <!-- Mobile Menu -->
      <div class="md:hidden">
        <button id="mobile-menu-button" class="text-gray-700 hover:text-indigo-600 focus:outline-none">
          <i class="fas fa-bars text-xl"></i>
        </button>
      </div>

      <!-- Mobile Menu Overlay -->
      <div id="mobile-menu" class="fixed inset-0 bg-white/95 backdrop-blur-xl z-50 hidden flex-col items-center justify-center space-y-8 text-center p-8">
        <button id="close-menu" class="absolute top-6 right-6 text-gray-700 hover:text-indigo-600">
          <i class="fas fa-times text-2xl"></i>
        </button>
        <a href="#home" class="text-xl font-semibold text-gray-800 hover:text-indigo-600 transition duration-300 mobile-link">Beranda</a>
        <a href="#profil" class="text-xl font-semibold text-gray-800 hover:text-indigo-600 transition duration-300 mobile-link">Profil</a>
        <a href="#jurusan" class="text-xl font-semibold text-gray-800 hover:text-indigo-600 transition duration-300 mobile-link">Jurusan</a>
        <a href="#berita" class="text-xl font-semibold text-gray-800 hover:text-indigo-600 transition duration-300 mobile-link">Berita</a>
        <a href="#event" class="text-xl font-semibold text-gray-800 hover:text-indigo-600 transition duration-300 mobile-link">Event</a>
        <a href="#galeri" class="text-xl font-semibold text-gray-800 hover:text-indigo-600 transition duration-300 mobile-link">Galeri</a>
        <a href="#kontak" class="text-xl font-semibold text-gray-800 hover:text-indigo-600 transition duration-300 mobile-link">Kontak</a>
        <div class="pt-4 flex gap-3">
          @guest
          <a href="{{ route('user.login', ['redirect' => request()->getRequestUri()]) }}" class="px-5 py-2 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-50">Login</a>
          <a href="{{ route('user.register', ['redirect' => request()->getRequestUri()]) }}" class="px-5 py-2 rounded-xl bg-gradient-to-br from-[#66B1F2] to-[#4A90E2] text-white hover:opacity-95">Daftar</a>
          @endguest
          @auth
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="px-5 py-2 rounded-xl border hover:bg-gray-50">Keluar</button>
          </form>
          @endauth
        </div>
      </div>
    </div>
  </div>
</nav>
<script>
  // Mobile menu toggle
  (function() {
    const openBtn = document.getElementById('mobile-menu-button');
    const closeBtn = document.getElementById('close-menu');
    const menu = document.getElementById('mobile-menu');
    if (openBtn && closeBtn && menu) {
      const open = () => menu.classList.remove('hidden');
      const close = () => menu.classList.add('hidden');
      openBtn.addEventListener('click', open);
      closeBtn.addEventListener('click', close);
      // Close after clicking any mobile link
      document.querySelectorAll('#mobile-menu .mobile-link').forEach(function(el){
        el.addEventListener('click', close);
      });
    }
    // Scrollspy: highlight active nav link
    const links = Array.from(document.querySelectorAll('nav .nav-link'));
    const map = links.map(function(link){
      const id = link.getAttribute('href');
      const target = id ? document.querySelector(id) : null;
      return { link, target };
    }).filter(function(x){ return x.target; });
    
    const setActive = function(activeTarget){
      // Keep dimensions identical to avoid layout shift
      links.forEach(function(l){ l.classList.remove('text-blue-600','bg-blue-50'); });
      const found = map.find(function(x){ return x.target === activeTarget; });
      if (found) {
        found.link.classList.add('text-blue-600','bg-blue-50');
      }
    };
    
    // Set initial active state
    const currentHash = window.location.hash;
    if (currentHash) {
      const hashTarget = document.querySelector(currentHash);
      if (hashTarget) {
        setActive(hashTarget);
      } else {
        // Default to Beranda if hash doesn't exist
        const berandaLink = links.find(l => l.getAttribute('href') === '#home');
        if (berandaLink) berandaLink.classList.add('text-blue-600','bg-blue-50');
      }
    } else {
      // Default to Beranda for home page
      const berandaLink = links.find(l => l.getAttribute('href') === '#home');
      if (berandaLink) berandaLink.classList.add('text-blue-600','bg-blue-50');
    }
    
    // Set up intersection observer for all sections
    if ('IntersectionObserver' in window) {
      const io = new IntersectionObserver(function(entries){
        entries.forEach(function(entry){
          if (entry.isIntersecting) setActive(entry.target);
        });
      },{ rootMargin: '0px 0px -70% 0px', threshold: 0.1 });
      map.forEach(function(x){ io.observe(x.target); });
    }
  })();
</script>


 <section id="home" class="relative min-h-screen flex items-center justify-center overflow-hidden scroll-reveal">
  <!-- Decorative Background (no video) -->
  <div class="absolute inset-0 w-full h-full" style="background-image:url('{{ asset('images/hero.JPG') }}'); background-size:cover; background-position:center;">
    <!-- Base gradient overlays (retain existing palette) -->
    <div class="absolute inset-0 bg-gradient-to-br from-black/70 via-[#254C6B]/60 to-black/80"></div>
    <div class="absolute inset-0 bg-[#66B1F2]/20"></div>

    <!-- Soft glow shapes -->
    <div class="pointer-events-none">
      <div class="absolute -top-24 -left-16 w-96 h-96 rounded-full blur-3xl opacity-40 bg-[#66B1F2]"></div>
      <div class="absolute -bottom-16 -right-10 w-[28rem] h-[28rem] rounded-full blur-3xl opacity-30 bg-[#4A90E2]"></div>
      <div class="absolute top-1/3 left-1/2 -translate-x-1/2 w-[40rem] h-[40rem] rounded-full blur-3xl opacity-20 bg-white"></div>
    </div>

    <!-- Subtle pattern -->
    <svg class="absolute inset-0 w-full h-full opacity-10" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <pattern id="dots" x="0" y="0" width="32" height="32" patternUnits="userSpaceOnUse">
          <circle cx="1.5" cy="1.5" r="1.5" fill="#66B1F2" />
        </pattern>
      </defs>
      <rect width="100%" height="100%" fill="url(#dots)" />
    </svg>
  </div>

  <!-- Content Overlay -->
  <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8 text-center" style="margin-top: 80px;">
    <div class="animate-fade-in-up">
      <div class="relative">
        <h1 class="text-5xl lg:text-7xl font-extrabold text-white leading-tight mb-6 drop-shadow-2xl">
          <span class="bg-gradient-to-r from-[#66B1F2] via-white to-[#4A90E2] bg-clip-text text-transparent">Selamat Datang Di</span>
          <br>
          <span class="text-white">Gallery4U!</span>
        </h1>
        <div class="absolute -inset-1 bg-gradient-to-r from-[#66B1F2]/30 to-[#4A90E2]/30 blur-xl opacity-40 rounded-xl"></div>
      </div>
      <p class="text-xl lg:text-2xl text-white/90 leading-relaxed mb-20 max-w-4xl mx-auto animate-fade-in-up delay-400 drop-shadow-lg font-medium">
      Platform galeri digital untuk mendokumentasikan kegiatan, prestasi, dan momen terbaik SMKN 4 Bogor.
      </p>
      
      <!-- Statistics Section - Single Bar Style -->
      <div class="mt-14 max-w-5xl mx-auto">
        <div class="bg-white/95 backdrop-blur-md border border-white/60 rounded-2xl shadow-xl">
          <div class="grid grid-cols-1 md:grid-cols-3 md:divide-x md:divide-white/60">
            <!-- Siswa Aktif -->
            <div class="flex flex-col items-center justify-center gap-2.5 px-6 py-6">
              <div class="bg-gradient-to-br from-[#66B1F2] to-[#4A90E2] p-2.5 rounded-full">
                <i class="fas fa-users text-white text-base"></i>
              </div>
              <h4 class="text-2xl font-bold bg-gradient-to-r from-[#66B1F2] to-[#4A90E2] bg-clip-text text-transparent leading-none">
                <span class="count-up" data-start="1" data-target="{{ (int) $statistics->active_students }}" data-suffix="+">0</span>
              </h4>
              <p class="text-[#1E88E5] text-xs md:text-sm font-semibold">Siswa Aktif</p>
            </div>

            <!-- Jurusan -->
            <div class="flex flex-col items-center justify-center gap-2.5 px-6 py-6">
              <div class="bg-gradient-to-br from-[#66B1F2] to-[#4A90E2] p-2.5 rounded-full">
                <i class="fas fa-laptop-code text-white text-base"></i>
              </div>
              <h4 class="text-2xl font-bold bg-gradient-to-r from-[#66B1F2] to-[#4A90E2] bg-clip-text text-transparent leading-none">
                <span class="count-up" data-start="1" data-target="{{ (int) $statistics->majors_count }}">0</span>
              </h4>
              <p class="text-[#1E88E5] text-xs md:text-sm font-semibold">Jurusan</p>
            </div>

            <!-- Guru Profesional -->
            <div class="flex flex-col items-center justify-center gap-2.5 px-6 py-6">
              <div class="bg-gradient-to-br from-[#66B1F2] to-[#4A90E2] p-2.5 rounded-full">
                <i class="fas fa-chalkboard-teacher text-white text-base"></i>
              </div>
              <h4 class="text-2xl font-bold bg-gradient-to-r from-[#66B1F2] to-[#4A90E2] bg-clip-text text-transparent leading-none">
                <span class="count-up" data-start="1" data-target="{{ (int) $statistics->professional_teachers }}" data-suffix="+">0</span>
              </h4>
              <p class="text-[#1E88E5] text-xs md:text-sm font-semibold">Guru Profesional</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal Detail Jurusan (on-page, no navigation) -->
<div id="majorModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden">
  <div class="absolute inset-0" onclick="closeMajor()"></div>
  <div class="relative max-w-4xl mx-auto mt-16 mb-10 bg-white rounded-2xl shadow-2xl overflow-hidden">
    <div class="flex flex-col md:flex-row">
      <div class="md:w-2/5 relative h-44 md:h-auto">
        <img id="majorImage" src="#" alt="Major" class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
        <button type="button" onclick="closeMajor()" class="absolute top-3 right-3 bg-white/90 hover:bg-white text-gray-700 w-9 h-9 rounded-full shadow flex items-center justify-center">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <div class="md:w-3/5 p-6 md:p-8">
        <div class="flex items-center gap-2 mb-2">
          <span id="majorCode" class="px-2 py-0.5 text-xs rounded-full bg-[#254C6B] text-white"></span>
        </div>
        <h3 id="majorTitle" class="text-2xl font-bold text-gray-800 mb-2"></h3>
        <p id="majorDesc" class="text-gray-600 mb-4 text-sm"></p>
        <ul id="majorBullets" class="space-y-2 text-sm text-gray-700 mb-4"></ul>
        <div class="flex flex-wrap gap-2">
          <button type="button" class="px-4 py-2 rounded-full bg-[#254C6B] text-white text-sm" onclick="closeMajor()">Tutup</button>
        </div>
      </div>
    </div>
    <!-- Floating switcher inside modal -->
    <div class="absolute bottom-4 right-4 flex gap-2">
      <button class="w-9 h-9 rounded-full bg-[#254C6B] text-white text-xs" onclick="openMajor('pplg')">PPLG</button>
      <button class="w-9 h-9 rounded-full bg-[#254C6B] text-white text-xs" onclick="openMajor('tkj')">TKJ</button>
      <button class="w-9 h-9 rounded-full bg-[#254C6B] text-white text-xs" onclick="openMajor('tpfl')">TPFL</button>
      <button class="w-9 h-9 rounded-full bg-[#254C6B] text-white text-xs" onclick="openMajor('otomotif')">TO</button>
    </div>
  </div>
  
</div>

<!-- Hero no-video: audio script removed -->

<!-- Profil Sekolah -->
<section id="profil" class="py-6 relative overflow-hidden scroll-reveal">
  <!-- Background disamakan dengan 'Informasi & Kontak' -->
  <div class="absolute inset-0 bg-gradient-to-br from-black/70 via-[#254C6B]/60 to-black/80"></div>
  <div class="absolute inset-0 bg-[#66B1F2]/20"></div>
  
  <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-6 animate-fade-in-up">
      <h2 class="text-3xl md:text-4xl font-bold text-[#FFFFFF] mb-3">Profil Sekolah</h2>
      <div class="w-24 h-1.5 bg-[#425161] mx-auto mb-5 rounded-full"></div>
      <p class="text-base md:text-lg text-white/90 max-w-3xl mx-auto drop-shadow-md">
        {{ $school->profile ?? 'SMKN 4 Bogor adalah institusi pendidikan terdepan yang berkomitmen menghasilkan lulusan berkualitas dan siap kerja' }}
      </p>
    </div>
    <!-- Rest of the code remains the same -->

            <div class="grid md:grid-cols-2 gap-6 items-start">
                <!-- Vision & Mission Section -->
                <div class="space-y-8 animate-slide-in-left">
                    <!-- Vision Card with enhanced effects -->
                    <div class="group relative bg-white/95 backdrop-blur-md p-4 rounded-xl border border-white/30 hover:bg-white transition-all duration-700 hover:scale-105 hover:shadow-2xl overflow-hidden min-h-[180px] md:min-h-[200px] scroll-reveal delay-100">
                        <!-- Animated background gradient -->
                        <div class="absolute inset-0 bg-gradient-to-br from-yellow-400/10 via-orange-500/5 to-yellow-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                        <!-- Floating particles effect -->
                        <div class="absolute top-4 right-4 w-2 h-2 bg-yellow-400/60 rounded-full animate-pulse delay-300"></div>
                        <div class="absolute bottom-6 left-6 w-1.5 h-1.5 bg-orange-500/60 rounded-full animate-bounce delay-700"></div>
                        
                        <div class="relative z-10">
                            <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-2 flex items-center group-hover:scale-105 transition-transform duration-500">
                                <div class="bg-[#254C6B] p-2.5 rounded-lg mr-3 shadow-md group-hover:shadow-lg transition-shadow duration-300">
                                    <i class="fas fa-eye text-white text-base animate-pulse"></i>
                                </div>
                                <span class="bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">Visi Sekolah</span>
                            </h3>
                            <p class="text-gray-700 leading-relaxed text-xs md:text-sm font-medium group-hover:text-gray-800 transition-colors duration-500">
                                {{ $school->vision ?? 'Menjadi SMK unggul yang menghasilkan lulusan berkarakter, kompeten, dan berdaya saing global di era digital.' }}
                            </p>
                        </div>
                    </div>
                    
                    <!-- Mission Card with enhanced effects -->
                    <div class="group relative bg-white/95 backdrop-blur-md p-5 rounded-2xl border border-white/30 hover:bg-white transition-all duration-700 hover:scale-105 hover:shadow-2xl overflow-hidden min-h-[180px] md:min-h-[200px] scroll-reveal delay-200">
                        <!-- Animated background gradient -->
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-400/10 via-blue-500/5 to-blue-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                        <!-- Floating particles effect -->
                        <div class="absolute top-4 right-4 w-2 h-2 bg-blue-400/60 rounded-full animate-pulse delay-500"></div>
                        <div class="absolute bottom-6 left-6 w-1.5 h-1.5 bg-blue-500/60 rounded-full animate-bounce delay-1000"></div>
                        
                        <div class="relative z-10">
                            <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-2 flex items-center group-hover:scale-105 transition-transform duration-500">
                                <div class="bg-[#254C6B] p-2.5 rounded-lg mr-3 shadow-md group-hover:shadow-lg transition-shadow duration-300">
                                    <i class="fas fa-bullseye text-white text-base animate-pulse"></i>
                                </div>
                                <span class="bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">Misi Sekolah</span>
                            </h3>
                            @php 
                              $missions = preg_split("/(\r?\n)/", trim($school->mission ?? ''));
                            @endphp
                            @if(!empty($missions) && !empty($missions[0]))
                              <ul class="text-gray-700 space-y-2">
                                @foreach($missions as $m)
                                  @if(trim($m) !== '')
                                  <li class="flex items-start transform hover:translate-x-2 transition-all duration-500 group/item">
                                    <div class="bg-[#254C6B] p-1.5 rounded-full mr-3 mt-0.5 shadow-md group-hover/item:scale-110 transition-transform duration-300">
                                      <i class="fas fa-check text-white text-xs animate-bounce-custom"></i>
                                    </div>
                                    <span class="text-sm font-medium group-hover/item:text-gray-800 transition-colors duration-300">{{ $m }}</span>
                                  </li>
                                  @endif
                                @endforeach
                              </ul>
                            @else
                              <ul class="text-gray-700 space-y-2">
                                <li class="flex items-start transform hover:translate-x-2 transition-all duration-500 group/item">
                                  <div class="bg-[#254C6B] p-1.5 rounded-full mr-3 mt-0.5 shadow-md group-hover/item:scale-110 transition-transform duration-300">
                                    <i class="fas fa-check text-white text-xs animate-bounce-custom"></i>
                                  </div>
                                  <span class="text-sm font-medium group-hover/item:text-gray-800 transition-colors duration-300">Menyelenggarakan pendidikan berkualitas tinggi</span>
                                </li>
                                <li class="flex items-start transform hover:translate-x-2 transition-all duration-500 group/item">
                                  <div class="bg-[#254C6B] p-1.5 rounded-full mr-3 mt-0.5 shadow-md group-hover/item:scale-110 transition-transform duration-300">
                                    <i class="fas fa-check text-white text-xs animate-bounce-custom"></i>
                                  </div>
                                  <span class="text-sm font-medium group-hover/item:text-gray-800 transition-colors duration-300">Mengembangkan karakter dan soft skills siswa</span>
                                </li>
                                <li class="flex items-start transform hover:translate-x-2 transition-all duration-500 group/item">
                                  <div class="bg-[#254C6B] p-1.5 rounded-full mr-3 mt-0.5 shadow-md group-hover/item:scale-110 transition-transform duration-300">
                                    <i class="fas fa-check text-white text-xs animate-bounce-custom"></i>
                                  </div>
                                  <span class="text-sm font-medium group-hover/item:text-gray-800 transition-colors duration-300">Membangun kemitraan dengan industri</span>
                                </li>
                              </ul>
                            @endif
                        </div>
                    </div>
                </div>
                
                <!-- Principal Section with enhanced effects -->
                <div class="group relative bg-white/95 backdrop-blur-md p-5 rounded-3xl shadow-2xl border border-white/30 hover:bg-white transition-all duration-700 hover:scale-105 animate-slide-in-right overflow-hidden scroll-reveal delay-300">
                    <!-- Animated background gradient -->
                    <div class="absolute inset-0 bg-gradient-to-br from-[#2E5A63]/10 via-[#66B1F2]/5 to-[#4A90E2]/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <!-- Floating decorative elements -->
                    <div class="absolute top-4 right-4 w-3 h-3 bg-[#2E5A63]/60 rounded-full animate-pulse delay-400"></div>
                    <div class="absolute bottom-4 left-4 w-2 h-2 bg-[#66B1F2]/60 rounded-full animate-bounce delay-800"></div>
                    
                    <!-- Principal Photo with enhanced effects -->
                    <div class="text-center mb-4 animate-fade-in-up delay-300">
                        <div class="relative inline-block group/photo">
                            <!-- Multiple glow layers for depth -->
                            <div class="absolute inset-0 rounded-full bg-gradient-to-r from-[#2E5A63]/30 to-[#66B1F2]/30 blur-2xl group-hover/photo:blur-3xl transition-all duration-700"></div>
                            <div class="absolute inset-0 rounded-full bg-gradient-to-r from-[#66B1F2]/20 to-[#4A90E2]/20 blur-xl group-hover/photo:blur-2xl transition-all duration-500"></div>
                            
                            @php $headPhoto = !empty($school->headmaster_photo) ? asset('images/headmaster/'.$school->headmaster_photo) : asset('images/kepalasekolah.JPG'); @endphp
                            <img src="{{ $headPhoto }}" 
                                 alt="Kepala Sekolah" 
                                 class="relative w-28 h-28 rounded-full mx-auto object-cover border-4 border-white shadow-2xl group-hover/photo:scale-110 transition-all duration-700 animate-float z-10">
                            
                            <!-- Enhanced badge with animation -->
                            <div class="absolute -bottom-3 -right-3 bg-gradient-to-r from-[#2E5A63] to-[#66B1F2] text-white p-3 rounded-full shadow-xl animate-bounce-custom group-hover/photo:scale-110 transition-transform duration-300">
                                <i class="fas fa-graduation-cap text-lg"></i>
                            </div>
                            
                            <!-- Floating particles around photo -->
                            <div class="absolute -top-2 -left-2 w-2 h-2 bg-[#FAB82F]/80 rounded-full animate-pulse delay-200"></div>
                            <div class="absolute -top-1 -right-1 w-1.5 h-1.5 bg-[#66B1F2]/80 rounded-full animate-bounce delay-600"></div>
                        </div>
                        
                        <div class="mt-4 space-y-1">
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent animate-fade-in-up delay-500">
                                {{ $school->headmaster_name ?? 'Kepala Sekolah' }}
                            </h3>
                            <p class="text-gray-600 font-semibold text-sm md:text-base animate-fade-in-up delay-700">
                                Kepala Sekolah SMKN 4 Bogor
                            </p>
                        </div>
                    </div>
                    
                    <!-- Enhanced Welcome Message -->
                    <div class="group/message relative bg-white/95 backdrop-blur-md p-4 rounded-xl shadow-lg ring-1 ring-gray-200/50 hover:bg-white transition-all duration-500 animate-fade-in-up delay-700 overflow-hidden min-h-[180px] md:min-h-[200px]">
                        <!-- Animated background -->
                        <div class="absolute inset-0 bg-gradient-to-r from-[#2E5A63]/5 to-[#66B1F2]/5 opacity-0 group-hover/message:opacity-100 transition-opacity duration-500"></div>
                        
                        <div class="relative z-10">
                            <div class="flex items-start mb-3">
                                <div class="bg-[#254C6B] p-2.5 rounded-lg mr-3 shadow-md">
                                    <i class="fas fa-quote-left text-white text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="text-base md:text-lg font-bold text-gray-800 mb-2 group-hover/message:scale-105 transition-transform duration-300">
                                        Sambutan Kepala Sekolah
                                    </h4>
                                    <div class="space-y-3">
                                        <p class="text-gray-700 leading-relaxed text-sm">
                                            {{ $school->headmaster_greeting ?? 'Selamat datang di SMKN 4 Bogor. Kami berkomitmen untuk memberikan pendidikan terbaik yang mempersiapkan siswa menghadapi tantangan masa depan. Dengan fasilitas modern dan tenaga pengajar profesional, kami yakin dapat mencetak lulusan yang kompeten dan berkarakter.' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right mt-1">
                                <div class="bg-[#254C6B] p-1.5 rounded-md inline-block shadow-md">
                                    <i class="fas fa-quote-right text-white text-sm"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- End Profil Section -->
        </div>
    </section>
    
    <!-- Program Keahlian (Jurusan) -->
    <section id="jurusan" class="py-20 bg-white relative overflow-hidden scroll-reveal">
        <!-- Subtle decorative elements -->
        <div class="absolute top-10 right-10 w-32 h-32 bg-[#66B1F2]/5 rounded-full blur-xl"></div>
        <div class="absolute bottom-10 left-10 w-48 h-48 bg-[#4A90E2]/5 rounded-full blur-2xl"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-fade-in-up">
                <h2 class="text-5xl font-bold text-[#FAB82F] mb-6">
                            Jurusan
                        </h2>
                <div class="w-32 h-1.5 bg-[#425161] mx-auto mb-8 rounded-full"></div>
                <p class="text-xl text-gray-700 max-w-3xl mx-auto leading-relaxed">Pilih jurusan yang sesuai dengan minat dan bakatmu untuk masa depan yang cerah</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <!-- PPLG (RPL) -->
                <button type="button" onclick="openMajor('pplg')" class="group block w-full text-left rounded-3xl overflow-hidden shadow-2xl border border-gray-200 hover:shadow-[0_20px_50px_rgba(102,177,242,0.35)] transition-all duration-500 scroll-reveal delay-100">
                    <div class="relative aspect-square">
                        <img src="{{ asset('images/LOGO PPLG.png') }}" alt="PPLG" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/10 to-transparent"></div>
                    </div>
                    <div class="px-2 pt-2 pb-1">
                        <h3 class="text-gray-800 text-lg font-bold">PPLG</h3>
                        <p class="text-gray-500 text-xs">Pengembangan Perangkat Lunak dan Gim</p>
                    </div>
                </button>

                <!-- TKJ -->
                <button type="button" onclick="openMajor('tkj')" class="group block w-full text-left rounded-3xl overflow-hidden shadow-2xl border border-gray-200 hover:shadow-[0_20px_50px_rgba(102,177,242,0.35)] transition-all duration-500 scroll-reveal delay-200">
                    <div class="relative aspect-square">
                        <img src="{{ asset('images/LOGO TJKJ.png') }}" alt="TKJ" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/10 to-transparent"></div>
                    </div>
                    <div class="px-2 pt-2 pb-1">
                        <h3 class="text-gray-800 text-lg font-bold">Teknik Jaringan Komputer</h3>
                        <p class="text-gray-500 text-xs">TKJ</p>
                    </div>
                </button>

                <!-- TPFL -->
                <button type="button" onclick="openMajor('tpfl')" class="group block w-full text-left rounded-3xl overflow-hidden shadow-2xl border border-gray-200 hover:shadow-[0_20px_50px_rgba(102,177,242,0.35)] transition-all duration-500 scroll-reveal delay-300">
                    <div class="relative aspect-square">
                        <img src="{{ asset('images/LOGO JURUSAN.png') }}" alt="TPFL" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/10 to-transparent"></div>
                    </div>
                    <div class="px-2 pt-2 pb-1">
                        <h3 class="text-gray-800 text-lg font-bold">Teknik Pengelasan</h3>
                        <p class="text-gray-500 text-xs">TPFL</p>
                    </div>
                </button>

                <!-- Otomotif -->
                <button type="button" onclick="openMajor('otomotif')" class="group block w-full text-left rounded-3xl overflow-hidden shadow-2xl border border-gray-200 hover:shadow-[0_20px_50px_rgba(102,177,242,0.35)] transition-all duration-500 scroll-reveal delay-400">
                    <div class="relative aspect-square">
                        <img src="{{ asset('images/Logo TO.png') }}" alt="Otomotif" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/10 to-transparent"></div>
                    </div>
                    <div class="px-2 pt-2 pb-1">
                        <h3 class="text-gray-800 text-lg font-bold">Teknik Otomotif</h3>
                        <p class="text-gray-500 text-xs">Otomotif</p>
                    </div>
                </button>
            </div>

            
        </div>
</section>


            <!-- Teacher Profiles Section -->
            <section id="tenagapendidik" class="py-12 relative overflow-hidden bg-[#D2D5D9] scroll-reveal">
                <!-- Decorative elements -->
                <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="50" height="50" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23000000" fill-opacity="0.03"%3E%3Cpath d="M25 25c0-6.9-5.6-12.5-12.5-12.5S0 18.1 0 25s5.6 12.5 12.5 12.5S25 31.9 25 25z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
                <div class="absolute inset-0 bg-[#66B1F2]/20"></div>
                <!-- Decorative elements -->
                <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"0.03\"%3E%3Ccircle cx=\"30\" cy=\"30\" r=\"2\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
                <div class="absolute top-20 right-20 w-80 h-80 bg-gradient-to-br from-[#66B1F2]/20 to-[#4A90E2]/20 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute bottom-20 left-20 w-96 h-96 bg-gradient-to-tl from-[#4A90E2]/15 to-[#66B1F2]/15 rounded-full blur-3xl animate-pulse delay-1000"></div>
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-72 h-72 bg-gradient-to-r from-[#66B1F2]/10 to-[#4A90E2]/10 rounded-full blur-2xl"></div>
                
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-12 animate-fade-in-up">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-[#254C6B] to-[#66B1F2] rounded-2xl mb-4 shadow-xl">
                            <i class="fas fa-users text-3xl text-white"></i>
                        </div>
                        <h2 class="text-4xl font-bold text-[#FAB82F] mb-4">
                            Guru & Staff
                        </h2>
                        <div class="w-24 h-1.5 bg-[#425161] mx-auto mb-6 rounded-full"></div>
                        <p class="text-lg text-gray-700 max-w-3xl mx-auto leading-relaxed">
                            Kenali tim pengajar dan staf profesional kami yang berpengalaman dan siap membimbing Anda menuju kesuksesan
                        </p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 relative">
                        @foreach($teachers as $i => $t)
                        <div class="bg-white rounded-3xl overflow-hidden shadow-lg border border-gray-200 group animate-fade-in-up relative hover:scale-[1.02] transition-all duration-300 scroll-reveal {{ ['delay-100','delay-200','delay-300','delay-400'][$i % 4] }}">
                            <!-- Floating decorative elements -->
                            <div class="absolute -top-2 -right-2 w-16 h-16 bg-gradient-to-br from-[#66B1F2]/30 to-[#4A90E2]/30 rounded-full blur-lg"></div>
                            <div class="absolute -bottom-2 -left-2 w-12 h-12 bg-gradient-to-tr from-[#254C6B]/20 to-[#66B1F2]/20 rounded-full blur-md"></div>
                            
                            <div class="relative h-56 overflow-hidden">
                                @if($t->foto)
                                    <img src="{{ asset('images/teachers/' . $t->foto) }}" alt="{{ $t->nama }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-slate-600 via-gray-700 to-slate-800 flex items-center justify-center group-hover:from-slate-500 group-hover:to-slate-700 transition-all duration-500">
                                        <div class="bg-white/10 backdrop-blur-sm p-6 rounded-2xl">
                                            <i class="fas fa-user text-white/80 text-6xl"></i>
                                        </div>
                                    </div>
                                @endif
                                
                                <!-- Enhanced gradient overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                                
                                <!-- Profile info overlay -->
                                <div class="absolute bottom-0 left-0 right-0 p-4">
                                    <div class="transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                                        <h3 class="text-xl font-bold text-white mb-1.5 drop-shadow-lg">{{ $t->nama }}</h3>
                                        <div class="flex items-center space-x-2 mb-3">
                                            <div class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></div>
                                            <p class="text-emerald-200 font-medium text-xs">{{ $t->jabatan ?? 'Tenaga Pendidik' }}</p>
                                        </div>
                                        
                                        <!-- Contact buttons -->
                                        <div class="flex space-x-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            @if($t->email)
                                                <a href="mailto:{{ $t->email }}" class="bg-white/20 backdrop-blur-sm p-2 rounded-xl hover:bg-white/30 transition-colors duration-300" title="Email">
                                                    <i class="fas fa-envelope text-white text-sm"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="p-4 bg-white">
                                @php $tags = collect(explode(',', (string) $t->keahlian))->filter(fn($x) => trim($x) !== '')->take(3); @endphp
                                
                                <!-- Skills/Tags -->
                                <div class="flex flex-wrap gap-2 mb-3">
                                    @foreach($tags as $index => $tag)
                                        @php
                                            $colors = [
                                                'bg-gradient-to-r from-[#66B1F2] to-[#4A90E2]',
                                                'bg-gradient-to-r from-[#4A90E2] to-[#254C6B]',
                                                'bg-gradient-to-r from-[#254C6B] to-[#66B1F2]'
                                            ];
                                            $color = $colors[$index % 3];
                                        @endphp
                                        <span class="px-2.5 py-1 {{ $color }} text-white text-[11px] font-semibold rounded-xl shadow">
                                            {{ trim($tag) }}
                                        </span>
                                    @endforeach
                                    @if($tags->isEmpty() && $t->bidang)
                                        <span class="px-2.5 py-1 bg-gradient-to-r from-[#66B1F2] to-[#4A90E2] text-white text-[11px] font-semibold rounded-xl shadow">
                                            {{ $t->bidang }}
                                        </span>
                                    @endif
                                </div>
                                
                                <!-- Bio -->
                                <p class="text-gray-700 text-sm mb-4 leading-relaxed">
                                    {{ Str::limit($t->bio ?? 'Tenaga pendidik profesional SMKN 4 Bogor yang berpengalaman dalam bidangnya', 100) }}
                                </p>
                                
                                <!-- Action footer -->
                                <div class="flex items-center justify-between pt-3 border-t border-white/10">
                                    <div class="flex items-center space-x-2">
                                        <div class="w-2 h-2 bg-[#66B1F2] rounded-full animate-pulse"></div>
                                        <span class="text-gray-600 text-[11px]">Available</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                    @if($teachers->isEmpty())
                        <div class="col-span-3 text-center py-16">
                            <div class="inline-flex items-center justify-center w-24 h-24 bg-white/10 backdrop-blur-sm rounded-3xl mb-6 mx-auto">
                                <i class="fas fa-user-graduate text-4xl text-white/60"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-2">Belum Ada Data</h3>
                            <p class="text-lg text-white/60">Data tenaga pendidik akan segera ditambahkan</p>
                        </div>
                    @endif
                </div>
                
                <div class="text-center mt-12">
                    <a href="{{ route('guest.teachers') }}" class="group inline-flex items-center px-8 py-3 bg-gradient-to-r from-[#66B1F2] to-[#4A90E2] hover:from-[#4A90E2] hover:to-[#66B1F2] text-white text-base font-semibold rounded-full transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 hover:scale-105">
                        <i class="fas fa-users mr-2"></i>
                        Lihat Semua Guru & Staff
                        <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform duration-300"></i>
                    </a>
                </div>
            </div>
        </section>

            <!-- Berita Terbaru Section -->
            <section id="berita" class="py-20 bg-gradient-to-br from-blue-50 via-white to-sky-50 relative overflow-hidden scroll-reveal">
                <!-- Enhanced decorative elements -->
                <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%2366B1F2" fill-opacity="0.03"%3E%3Cpath d="M20 20c0-5.5-4.5-10-10-10s-10 4.5-10 10 4.5 10 10 10 10-4.5 10-10z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-60"></div>
                <div class="absolute top-20 right-20 w-64 h-64 bg-gradient-to-br from-[#66B1F2]/20 to-[#4A90E2]/20 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute bottom-20 left-20 w-80 h-80 bg-gradient-to-tl from-[#4A90E2]/15 to-[#254C6B]/15 rounded-full blur-3xl animate-pulse delay-1000"></div>
                <div class="absolute top-1/3 left-1/3 w-48 h-48 bg-gradient-to-r from-[#66B1F2]/10 to-[#4A90E2]/10 rounded-full blur-2xl"></div>
                
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-20 animate-fade-in-up">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-[#254C6B] to-[#66B1F2] rounded-2xl mb-6 shadow-2xl">
                            <i class="fas fa-newspaper text-3xl text-white"></i>
                        </div>
                        <h2 class="text-5xl font-bold text-[#FAB82F] mb-6">
                            Berita Terbaru
                        </h2>
                        <div class="w-32 h-1.5 bg-[#425161] mx-auto mb-8 rounded-full"></div>
                        <p class="text-xl text-gray-700 max-w-3xl mx-auto leading-relaxed">
                            Ikuti perkembangan terbaru dan informasi penting dari SMK Negeri 4 Bogor
                        </p>
                    </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($berita as $item)
                <article class="modern-card glass-card rounded-3xl overflow-hidden shadow-2xl border border-white/20 group animate-fade-in-up delay-300 relative hover:scale-105 transition-all duration-500">
                    <!-- Floating decorative elements -->
                    <div class="absolute -top-2 -right-2 w-16 h-16 bg-gradient-to-br from-[#66B1F2]/30 to-[#4A90E2]/30 rounded-full blur-lg"></div>
                    <div class="absolute -bottom-2 -left-2 w-12 h-12 bg-gradient-to-tr from-[#254C6B]/20 to-[#66B1F2]/20 rounded-full blur-md"></div>
                    
                    <div class="relative h-56 overflow-hidden">
                        @if($item->gambar)
                        <img src="{{ asset('images/posts/' . $item->gambar) }}" 
                             alt="{{ $item->judul }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        @else
                        <div class="h-full bg-gradient-to-br from-[#254C6B] via-[#66B1F2] to-[#4A90E2] relative overflow-hidden">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -translate-y-16 translate-x-16"></div>
                            <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/5 rounded-full translate-y-12 -translate-x-12"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="bg-white/10 backdrop-blur-sm p-6 rounded-2xl">
                                    <i class="fas fa-newspaper text-white text-5xl animate-pulse"></i>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        <!-- Enhanced gradient overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        
                        <!-- Category badge -->
                        <div class="absolute top-4 right-4">
                            <div class="bg-gradient-to-r from-[#254C6B] to-[#66B1F2] backdrop-blur-sm px-4 py-2 rounded-xl shadow-lg">
                                <span class="text-white text-xs font-bold">{{ $item->kategori->nama ?? 'Berita' }}</span>
                            </div>
                        </div>
                        
                        <!-- Date badge -->
                        <div class="absolute bottom-4 left-4">
                            <div class="bg-white/20 backdrop-blur-sm px-3 py-1.5 rounded-xl">
                                <div class="flex items-center space-x-2 text-white">
                                    <i class="fas fa-calendar-alt text-xs"></i>
                                    <span class="text-xs font-medium">{{ $item->created_at->format('d M Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-6 bg-white/80 backdrop-blur-sm">
                        <!-- Title -->
                        <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-[#66B1F2] transition-colors leading-tight">
                            {{ Str::limit($item->judul, 60) }}
                        </h3>
                        
                        <!-- Content preview -->
                        <p class="text-gray-600 mb-4 leading-relaxed text-sm">
                            {{ Str::limit(strip_tags($item->isi), 120) }}
                        </p>
                        
                        <!-- Stats and action -->
                        <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                            <div class="flex items-center space-x-4 text-xs text-gray-500">
                                <div class="flex items-center space-x-1">
                                    <i class="fas fa-eye"></i>
                                    <span>{{ number_format($item->views ?? 0) }}</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <i class="fas fa-clock"></i>
                                    <span>{{ $item->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                            <a href="{{ route('guest.berita.detail', $item->id) }}" class="text-[#66B1F2] hover:text-[#4A90E2] font-semibold text-sm group/link">
                                Baca <i class="fas fa-arrow-right ml-1 group-hover/link:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </article>
                @empty
                <div class="col-span-3 text-center py-16">
                    <div class="inline-flex items-center justify-center w-24 h-24 bg-blue-100 rounded-3xl mb-6 mx-auto">
                        <i class="fas fa-newspaper text-4xl text-[#66B1F2]"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Belum Ada Berita</h3>
                    <p class="text-lg text-gray-600">Berita terbaru akan segera ditambahkan</p>
                </div>
                @endforelse
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('guest.berita') }}" class="group inline-flex items-center px-8 py-3 bg-gradient-to-r from-[#66B1F2] to-[#4A90E2] hover:from-[#4A90E2] hover:to-[#66B1F2] text-white text-base font-semibold rounded-full transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 hover:scale-105">
                    <i class="fas fa-newspaper mr-2"></i>
                    Lihat Semua Berita
                    <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform duration-300"></i>
                </a>
            </div>
                </div>
            </div>
        </section>

        <!-- Event Terbaru Section -->
        <section id="event" class="py-20 bg-gradient-to-br from-blue-50 via-white to-sky-50 relative overflow-hidden scroll-reveal">
            <!-- Enhanced decorative elements -->
            <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%2366B1F2" fill-opacity="0.03"%3E%3Cpath d="M20 20c0-5.5-4.5-10-10-10s-10 4.5-10 10 4.5 10 10 10 10-4.5 10-10z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-60"></div>
            <div class="absolute top-20 right-20 w-64 h-64 bg-gradient-to-br from-[#66B1F2]/20 to-[#4A90E2]/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 left-20 w-80 h-80 bg-gradient-to-tl from-[#4A90E2]/15 to-[#254C6B]/15 rounded-full blur-3xl animate-pulse delay-1000"></div>
            
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16 animate-fade-in-up">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-[#254C6B] to-[#66B1F2] rounded-2xl mb-6 shadow-2xl">
                        <i class="fas fa-calendar-alt text-3xl text-white"></i>
                    </div>
                    <h2 class="text-5xl font-bold text-[#FAB82F] mb-6">
                        Event Terbaru
                    </h2>
                    <div class="w-32 h-1.5 bg-[#425161] mx-auto mb-8 rounded-full"></div>
                    <p class="text-xl text-gray-700 max-w-3xl mx-auto leading-relaxed">
                        Jangan lewatkan event-event menarik dan kegiatan seru yang akan datang
                    </p>
                </div>
                <!-- Event Slider -->
                <div class="swiper event-swiper overflow-visible relative">
                    <div class="swiper-wrapper">
                        @forelse($event as $item)
                        <div class="swiper-slide">
                            <div class="modern-card glass-card rounded-3xl overflow-hidden shadow-2xl border border-white/20 group animate-fade-in-up delay-300 relative hover:scale-105 transition-all duration-500 h-full">
                                <!-- Floating decorative elements -->
                                <div class="absolute -top-2 -right-2 w-20 h-20 bg-gradient-to-br from-[#66B1F2]/30 to-[#4A90E2]/30 rounded-full blur-lg"></div>
                                <div class="absolute -bottom-2 -left-2 w-16 h-16 bg-gradient-to-tr from-[#254C6B]/20 to-[#66B1F2]/20 rounded-full blur-md"></div>
                                
                                <!-- Event Image with overlay -->
                                <div class="relative overflow-hidden h-64">
                                    @if($item->gambar)
                                        <img src="{{ asset('images/posts/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                    @elseif($item->galeries && $item->galeries->isNotEmpty() && $item->galeries->first()->fotos && $item->galeries->first()->fotos->isNotEmpty())
                                        <img src="{{ asset('images/gallery/' . $item->galeries->first()->fotos->first()->file) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-[#254C6B] via-[#66B1F2] to-[#4A90E2] flex items-center justify-center">
                                            <div class="bg-white/10 backdrop-blur-sm p-6 rounded-2xl">
                                                <i class="fas fa-calendar-alt text-white text-5xl animate-pulse"></i>
                                            </div>
                                        </div>
                                    @endif
                                    
                                    <!-- Enhanced gradient overlay -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent"></div>
                                    
                                    <!-- Prominent Date Display -->
                                    <div class="absolute top-4 left-4">
                                        <div class="bg-gradient-to-br from-[#254C6B] to-[#66B1F2] text-white rounded-2xl p-4 text-center min-w-[80px] shadow-2xl transform rotate-3 group-hover:rotate-0 transition-transform duration-300">
                                            <div class="text-2xl font-black leading-none">{{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d') : $item->created_at->format('d') }}</div>
                                            <div class="text-sm font-bold uppercase tracking-wide mt-1">{{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('M') : $item->created_at->format('M') }}</div>
                                        </div>
                                    </div>
                                    
                                    <!-- Event Status Badge -->
                                    <div class="absolute top-4 right-4">
                                        <div class="bg-gradient-to-r from-[#66B1F2] to-[#4A90E2] backdrop-blur-sm px-4 py-2 rounded-xl shadow-lg">
                                            <span class="text-white text-xs font-bold">Event</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-8 bg-white/80 backdrop-blur-sm">
                                    <!-- Event title -->
                                    <h3 class="text-2xl font-bold text-gray-800 mb-4 group-hover:text-[#66B1F2] transition-colors duration-300 leading-tight">{{ Str::limit($item->judul, 50) }}</h3>
                                    
                                    <!-- Event meta info -->
                                    <div class="grid grid-cols-2 gap-4 mb-6">
                                        <div class="flex items-center bg-blue-50 px-4 py-3 rounded-2xl border border-blue-100">
                                            <div class="bg-gradient-to-r from-[#66B1F2] to-[#4A90E2] p-2 rounded-xl mr-3 group-hover:scale-110 transition-transform">
                                                <i class="fas fa-map-marker-alt text-white text-sm"></i>
                                            </div>
                                            <div>
                                                <div class="text-xs text-[#66B1F2] font-bold uppercase tracking-wide">Lokasi</div>
                                                <div class="text-sm font-bold text-gray-800">{{ Str::limit($item->lokasi ?? 'TBA', 15) }}</div>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-center bg-sky-50 px-4 py-3 rounded-2xl border border-sky-100">
                                            <div class="bg-gradient-to-r from-[#4A90E2] to-[#254C6B] p-2 rounded-xl mr-3 group-hover:scale-110 transition-transform">
                                                <i class="fas fa-clock text-white text-sm"></i>
                                            </div>
                                            <div>
                                                <div class="text-xs text-[#4A90E2] font-bold uppercase tracking-wide">Waktu</div>
                                                <div class="text-sm font-bold text-gray-800">{{ $item->waktu_mulai ?? 'TBA' }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Event description -->
                                    <p class="text-gray-600 mb-6 leading-relaxed">{{ Str::limit(strip_tags($item->isi), 120) }}</p>
                                    
                                    <!-- Bottom section -->
                                    <div class="flex justify-between items-center pt-4 border-t border-gray-200">
                                        <div class="flex items-center space-x-4">
                                            <!-- Gallery preview -->
                                            @if($item->galeries && $item->galeries->isNotEmpty() && $item->galeries->first()->fotos && $item->galeries->first()->fotos->isNotEmpty())
                                            <div class="flex items-center">
                                                <div class="flex -space-x-2 mr-3">
                                                    @foreach($item->galeries->first()->fotos->take(3) as $foto)
                                                    <div class="h-8 w-8 rounded-full border-2 border-white overflow-hidden shadow-lg">
                                                        <img src="{{ asset('images/gallery/' . $foto->file) }}" alt="Gallery" class="w-full h-full object-cover">
                                                    </div>
                                                    @endforeach
                                                    @if($item->galeries->first()->fotos->count() > 3)
                                                    <div class="h-8 w-8 rounded-full bg-[#66B1F2] text-white flex items-center justify-center text-xs font-bold border-2 border-white shadow-lg">
                                                        +{{ $item->galeries->first()->fotos->count() - 3 }}
                                                    </div>
                                                    @endif
                                                </div>
                                                <span class="text-xs text-gray-500">Galeri</span>
                                            </div>
                                            @endif
                                            
                                            <!-- Comment count -->
                                            <div class="flex items-center text-gray-500">
                                                <i class="far fa-comment-alt mr-1"></i>
                                                <span class="text-xs">{{ $item->comments_count ?? 0 }}</span>
                                            </div>
                                            
                                            <!-- View count -->
                                            <div class="flex items-center text-gray-500">
                                                <i class="far fa-eye mr-1"></i>
                                                <span class="text-xs">{{ number_format($item->views ?? 0) }}</span>
                                            </div>
                                        </div>
                                        
                                        <a href="{{ route('guest.event.detail', $item->id) }}" class="text-[#66B1F2] hover:text-[#4A90E2] font-medium text-sm flex items-center group/readmore">
                                            Selengkapnya
                                            <i class="fas fa-arrow-right ml-1 text-xs transform group-hover/readmore:translate-x-1 transition-transform duration-300"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="swiper-slide">
                            <div class="text-center py-16">
                                <div class="inline-flex items-center justify-center w-24 h-24 bg-white/10 backdrop-blur-sm rounded-3xl mb-6 mx-auto">
                                    <i class="fas fa-calendar-alt text-4xl text-white/60"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-[#254C6B] mb-2">Belum Ada Event</h3>
                                <p class="text-lg text-[#254C6B]/70">Tidak ada event yang tersedia saat ini. Silakan kembali lagi nanti untuk melihat event terbaru.</p>
                            </div>
                        </div>
                        @endforelse
                    </div>
                    <!-- Controls row: only arrows -->
                    <div class="mt-8 flex items-center justify-center gap-4">
                        <button class="event-swiper-prev bg-white shadow-lg border border-gray-200 hover:bg-gray-50 text-gray-700 w-10 h-10 rounded-full flex items-center justify-center">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="event-swiper-next bg-white shadow-lg border border-gray-200 hover:bg-gray-50 text-gray-700 w-10 h-10 rounded-full flex items-center justify-center">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('guest.event') }}" class="group inline-flex items-center px-8 py-3 bg-gradient-to-r from-[#66B1F2] to-[#4A90E2] hover:from-[#4A90E2] hover:to-[#66B1F2] text-white text-base font-semibold rounded-full transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 hover:scale-105">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    Lihat Semua Event
                    <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform duration-300"></i>
                </a>
            </div>
                </div>
        </section>

        <!-- Swiper JS + Initialization for Event Slider -->
        <script src="https://unpkg.com/swiper@9/swiper-bundle.min.js"></script>
        <script>
          document.addEventListener('DOMContentLoaded', function () {
            new Swiper('.event-swiper', {
              slidesPerView: 2.1, // 1 event utama + sisi kanan/kiri tidak ditonjolkan
              spaceBetween: 28,
              loop: false,
              rewind: true, // go back to first after reaching the end
              centeredSlides: true,
              slidesPerGroup: 1, // geser per satu event
              speed: 600, // transition speed between slides
              autoplay: {
                delay: 2000, // 2s per slide (faster)
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
              },
              allowTouchMove: true, // allow swipe on touch devices
              navigation: {
                nextEl: '.event-swiper-next',
                prevEl: '.event-swiper-prev',
              },
              pagination: {
                el: '.event-swiper-pagination',
                clickable: true,
              },
              grabCursor: true,
              
              // Improve side preview smoothness
              watchSlidesProgress: true,
            });
          });
        </script>

            <!-- Galeri Terbaru Section - Pinterest Style -->
            <section id="galeri" class="py-20 relative overflow-hidden bg-[#D2D5D9] scroll-reveal">
                <!-- Decorative elements -->
                <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\"50\" height=\"50\" viewBox=\"0 0 50 50\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23000000\" fill-opacity=\"0.03\"%3E%3Cpath d=\"M25 25c0-6.9-5.6-12.5-12.5-12.5S0 18.1 0 25s5.6 12.5 12.5 12.5S25 31.9 25 25z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
                <div class="absolute inset-0 bg-[#66B1F2]/20"></div>
                <div class="absolute top-20 right-20 w-64 h-64 bg-gradient-to-br from-[#66B1F2]/20 to-[#4A90E2]/20 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute bottom-20 left-20 w-72 h-72 bg-gradient-to-tl from-[#4A90E2]/15 to-[#66B1F2]/15 rounded-full blur-3xl animate-pulse delay-1000"></div>
                
                <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <!-- Header -->
                    <div class="text-center mb-12 animate-fade-in-up">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-[#254C6B] to-[#66B1F2] rounded-2xl mb-6 shadow-xl">
                            <i class="fas fa-images text-2xl text-white"></i>
                        </div>
                        <h2 class="text-4xl md:text-5xl font-bold text-[#FAB82F] mb-4">
                            Galeri Terbaru
                        </h2>
                        <div class="w-24 h-1.5 bg-[#425161] mx-auto mb-6 rounded-full"></div>
                        <p class="text-lg text-gray-700 max-w-3xl mx-auto leading-relaxed">
                            Kumpulan momen berharga dan kegiatan inspiratif dari SMK Negeri 4 Bogor
                        </p>
                    </div>

                    @php $hasGaleri = false; @endphp
                    @foreach($galeriByKategori as $kategori => $galeriItems)
                        @if($galeriItems->isNotEmpty())
                            @php 
                                $hasGaleri = true; 
                                // Ambil max 8 items untuk masonry yang lebih full
                                $displayItems = $galeriItems->take(8);
                            @endphp
                            <div class="mb-16 animate-fade-in-up delay-200">
                                <!-- Category header -->
                                <div class="flex items-center justify-between mb-8">
                                    <h3 class="text-2xl font-bold text-gray-800 flex items-center">
                                        <div class="w-2 h-8 bg-[#2E5A63] rounded-full mr-3 animate-pulse"></div>
                                        {{ $kategori }}
                                    </h3>
                                </div>
                                
                                <!-- Clean responsive grid -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                                    @foreach($displayItems as $index => $item)
                                        <div class="group animate-fade-in-up {{ ['delay-100','delay-200','delay-300','delay-400'][$index % 4] }}">
                                            <div class="relative rounded-2xl overflow-hidden shadow-lg hover:shadow-[0_12px_40px_rgba(102,177,242,0.25)] transition-all duration-500 bg-white border border-gray-200">
                                                <!-- Image with fixed aspect ratio for neat grid -->
                                                <div class="relative aspect-[4/3] overflow-hidden">
                                                    @if($item->fotos && $item->fotos->isNotEmpty())
                                                        <img src="{{ asset('images/gallery/' . $item->fotos->first()->file) }}" alt="{{ $item->judul ?? 'Gallery Image' }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                                                    @else
                                                        <div class="absolute inset-0 bg-gradient-to-br from-[#66B1F2] via-[#4A90E2] to-[#FAB82F] flex items-center justify-center">
                                                            <i class="fas fa-images text-white text-5xl opacity-30"></i>
                                                        </div>
                                                    @endif
                                                    <!-- Badge count -->
                                                    @if($item->fotos && $item->fotos->count() > 1)
                                                    <div class="absolute top-3 right-3 bg-white/90 backdrop-blur px-2.5 py-1 rounded-full shadow text-[11px] font-semibold text-gray-700 flex items-center gap-1">
                                                        <i class="fas fa-images text-[#66B1F2]"></i>{{ $item->fotos->count() }}
                                                    </div>
                                                    @endif
                                                    <!-- Hover CTA overlay -->
                                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-3">
                                                        <a href="{{ route('guest.detail-galeri', $item->id) }}" class="ml-auto bg-white text-[#254C6B] px-4 py-2 rounded-full text-xs font-semibold shadow hover:bg-[#66B1F2] hover:text-white transition">Lihat Galeri</a>
                                                    </div>
                                                </div>
                                                <!-- Content -->
                                                <div class="p-4">
                                                    <h4 class="text-gray-800 font-bold text-base mb-1 leading-tight line-clamp-2 hover:text-[#66B1F2] transition-colors">
                                                        {{ $item->judul ?? 'Galeri' }}
                                                    </h4>
                                                    @if($item->deskripsi)
                                                    <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ Str::limit(strip_tags($item->deskripsi), 70) }}</p>
                                                    @endif
                                                    <div class="flex items-center justify-between text-xs text-gray-500">
                                                        <span class="inline-flex items-center gap-1"><i class="fas fa-clock text-[#66B1F2]"></i>{{ $item->created_at->diffForHumans() }}</span>
                                                        <span class="inline-flex items-center gap-2">
                                                            <span class="w-1.5 h-1.5 bg-[#66B1F2] rounded-full"></span>
                                                            <span class="w-1.5 h-1.5 bg-[#FAB82F] rounded-full"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                
                                <!-- CTA button -->
                                @if($galeriItems->count() > 8)
                                <div class="text-center mt-10 animate-fade-in-up delay-500">
                                    <a href="{{ route('guest.galeri', ['kategori' => $kategori]) }}" class="group inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-[#66B1F2] to-[#4A90E2] hover:from-[#4A90E2] hover:to-[#66B1F2] text-white font-bold rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 hover:scale-105 border border-white/20">
                                        <span>Lihat Semua {{ $kategori }}</span>
                                        <i class="fas fa-arrow-right transform group-hover:translate-x-1 transition-transform duration-300"></i>
                                    </a>
                                </div>
                                @endif
                            </div>
                        @endif
                    @endforeach
                    
                    @if(!$hasGaleri)
                    <div class="text-center py-20">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-white/10 backdrop-blur-sm rounded-3xl mb-6 mx-auto">
                            <i class="fas fa-images text-4xl text-gray-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Belum Ada Galeri</h3>
                        <p class="text-gray-600 max-w-md mx-auto leading-relaxed">Galeri akan segera diupdate dengan foto-foto terbaru kegiatan sekolah</p>
                    </div>
                    @endif
            
                    @if($hasGaleri)
                    <div class="text-center mt-12 animate-fade-in-up delay-500">
                        <a href="{{ route('guest.galeri') }}" class="group inline-flex items-center gap-2 px-8 py-3 bg-gradient-to-r from-[#66B1F2] to-[#4A90E2] hover:from-[#4A90E2] hover:to-[#66B1F2] text-white font-semibold rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 hover:scale-105">
                            <i class="fas fa-images"></i>
                            <span>Lihat Semua Galeri</span>
                            <i class="fas fa-arrow-right transform group-hover:translate-x-1 transition-transform duration-300"></i>
                        </a>
                    </div>
                    @endif
                </div>
            </section>
            
    <!-- Kontak & Lokasi Section -->
    <section id="kontak" class="py-20 relative overflow-hidden">
        <!-- Background with gradient matching profile section -->
        <div class="absolute inset-0 bg-gradient-to-br from-black/70 via-[#254C6B]/60 to-black/80"></div>
        <div class="absolute inset-0 bg-[#66B1F2]/20"></div>
        
        <!-- Animated background elements -->
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')"></div>
        <div class="absolute top-16 left-16 w-64 h-64 bg-[#66B1F2]/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-16 right-16 w-96 h-96 bg-[#4A90E2]/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-fade-in-up">
                <h2 class="text-5xl font-bold text-[#FFFFFF] mb-6">Informasi Kontak & Lokasi</h2>
                <div class="w-32 h-1.5 bg-[#425161] mx-auto mb-8 rounded-full"></div>
                <p class="text-xl text-white/90 max-w-3xl mx-auto drop-shadow-md">Temukan lokasi SMK Negeri 4 Bogor dan informasi kontak lengkap</p>
            </div>
            
            <div class="grid lg:grid-cols-2 gap-12 items-stretch">
                <div class="space-y-6">
                    <div class="bg-white/90 backdrop-blur-sm p-8 rounded-2xl shadow-xl h-full border border-white/20 hover:shadow-2xl transition-all duration-300 hover:bg-white hover:scale-[1.02]">
                        <h3 class="text-2xl font-bold text-gray-800 mb-6">Informasi Kontak</h3>
                        
                        <div class="space-y-6">
                            <div class="flex items-start space-x-4">
                                <div class="bg-gradient-to-r from-[#66B1F2] to-[#4A90E2] text-white p-3 rounded-xl shadow-lg flex-shrink-0 transform transition-transform hover:scale-110 duration-300">
                                    <i class="fas fa-map-marker-alt text-lg"></i>
                                </div>
                                <div class="text-gray-600">
                                    <h4 class="font-semibold text-gray-800 mb-1">Alamat</h4>
                                    <p>Jl. Raya Tajur, Kp. Buntar<br>Bogor Selatan, Jawa Barat<br>16137</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4">
                                <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white p-3 rounded-xl shadow-lg flex-shrink-0 transform transition-transform hover:scale-110 duration-300">
                                    <i class="fas fa-phone text-lg"></i>
                                </div>
                                <div class="text-gray-600">
                                    <h4 class="font-semibold text-gray-800 mb-1">Telepon</h4>
                                    <p>(0251) 7520477</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4">
                                <div class="bg-gradient-to-r from-yellow-500 to-amber-500 text-white p-3 rounded-xl shadow-lg flex-shrink-0 transform transition-transform hover:scale-110 duration-300">
                                    <i class="fas fa-envelope text-lg"></i>
                                </div>
                                <div class="text-gray-600">
                                    <h4 class="font-semibold text-gray-800 mb-1">Email</h4>
                                    <a href="mailto:info@smkn4bogor.sch.id" class="text-[#66B1F2] hover:text-[#4A90E2] transition-colors font-medium">info@smkn4bogor.sch.id</a>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4">
                                <div class="bg-gradient-to-r from-purple-500 to-indigo-500 text-white p-3 rounded-xl shadow-lg flex-shrink-0 transform transition-transform hover:scale-110 duration-300">
                                    <i class="fas fa-clock text-lg"></i>
                                </div>
                                <div class="text-gray-600">
                                    <h4 class="font-semibold text-gray-800 mb-1">Jam Operasional</h4>
                                    <p>Senin - Jumat: 07:00 - 17:00 WIB</p>
                                    <p>Sabtu & Minggu: Libur</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl shadow-2xl overflow-hidden h-full transform transition-all duration-300 hover:shadow-2xl border border-gray-200">
                    <div class="h-full relative">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.0498396124403!2d106.82211897475432!3d-6.6407333933537815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8b16ee07ef5%3A0x14ab253dd267de49!2sSMK%20Negeri%204%20Bogor%20(Nebrazka)!5e0!3m2!1sid!2sid!4v1757426549328!5m2!1sid!2sid" 
                            class="w-full h-full border-0 rounded-2xl" 
                            style="min-height: 400px;"
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                        <div class="absolute bottom-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1.5 rounded-full text-sm font-medium text-gray-800 shadow-lg transform transition-transform hover:scale-105">
                            <i class="fas fa-map-marker-alt text-red-500 mr-1"></i> Lokasi SMKN 4 Bogor
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>

    <!-- Social Media & Footer -->
    <footer id="kontak" class="bg-[#2D343B] text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center mb-6">
                        <img src="/images/favicon.svg" alt="Logo Gallery4U" class="w-10 h-10 mr-3">
                        <span class="font-bold text-xl">Gallery4U</span>
                    </div>
                    <p class="text-gray-300 mb-6">Berkarya Menuju Masa Depan Gemilang. Menjadi SMK unggul yang menghasilkan lulusan berkarakter dan kompeten.</p>
                    
                    <div class="flex space-x-4">
                        <a href="https://www.facebook.com/p/SMK-NEGERI-4-KOTA-BOGOR-100054636630766/?locale=id_ID" class="bg-primary hover:bg-primary-dark text-white p-3 rounded-lg transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/smkn4kotabogor/" class="bg-primary hover:bg-primary-dark text-white p-3 rounded-lg transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.youtube.com/@smknegeri4bogor905" class="bg-primary hover:bg-primary-dark text-white p-3 rounded-lg transition-colors">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="https://www.tiktok.com/@smkn4kotabogor" class="bg-primary hover:bg-primary-dark text-white p-3 rounded-lg transition-colors">
                            <i class="fab fa-tiktok"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-xl font-bold mb-6">Menu Utama</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('guest.home') }}#home" class="text-gray-300 hover:text-primary transition-colors">Beranda</a></li>
                        <li><a href="{{ route('guest.home') }}#profil" class="text-gray-300 hover:text-primary transition-colors">Profil Sekolah</a></li>
                        <li><a href="{{ route('guest.home') }}#jurusan" class="text-gray-300 hover:text-primary transition-colors">Jurusan</a></li>
                        <li><a href="{{ route('guest.home') }}#tenagapendidik" class="text-gray-300 hover:text-primary transition-colors">Tenaga Pendidik</a></li>
                        <li><a href="{{ route('guest.home') }}#berita" class="text-gray-300 hover:text-primary transition-colors">Berita</a></li>
                        <li><a href="{{ route('guest.home') }}#event" class="text-gray-300 hover:text-primary transition-colors">Event</a></li>
                        <li><a href="{{ route('guest.home') }}#galeri" class="text-gray-300 hover:text-primary transition-colors">Galeri</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-xl font-bold mb-6">Jurusan</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('guest.jurusan') }}" class="text-gray-300 hover:text-primary transition-colors">Semua Jurusan</a></li>
                    </ul>
                    <!-- Floating style quick buttons -->
                    <div class="mt-4 flex flex-wrap gap-2">
                        <button type="button" onclick="openMajor('pplg')" class="px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 text-gray-200 text-xs font-semibold shadow-md ring-1 ring-white/20 backdrop-blur transition">PPLG</button>
                        <button type="button" onclick="openMajor('tkj')" class="px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 text-gray-200 text-xs font-semibold shadow-md ring-1 ring-white/20 backdrop-blur transition">TKJ</button>
                        <button type="button" onclick="openMajor('tpfl')" class="px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 text-gray-200 text-xs font-semibold shadow-md ring-1 ring-white/20 backdrop-blur transition">TPFL</button>
                        <button type="button" onclick="openMajor('otomotif')" class="px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 text-gray-200 text-xs font-semibold shadow-md ring-1 ring-white/20 backdrop-blur transition">Otomotif</button>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-xl font-bold mb-6">Ikuti Kami</h3>
                    <p class="text-gray-300 mb-4">Dapatkan update terbaru dari SMK Negeri 4</p>
                    <div class="space-y-3">
                        <a href="https://www.facebook.com/p/SMK-NEGERI-4-KOTA-BOGOR-100054636630766/?locale=id_ID" class="flex items-center text-gray-300 hover:text-primary transition-colors">
                            <i class="fab fa-facebook-f mr-3"></i>
                            <span>Facebook</span>
                        </a>
                        <a href="https://www.instagram.com/smkn4kotabogor/" class="flex items-center text-gray-300 hover:text-primary transition-colors">
                            <i class="fab fa-instagram mr-3"></i>
                            <span>Instagram</span>
                        </a>
                        <a href="https://www.youtube.com/@smknegeri4bogor905" class="flex items-center text-gray-300 hover:text-primary transition-colors">
                            <i class="fab fa-youtube mr-3"></i>
                            <span>YouTube</span>
                        </a>
                        <a href="https://www.tiktok.com/@smkn4kotabogor" class="flex items-center text-gray-300 hover:text-primary transition-colors">
                            <i class="fab fa-tiktok mr-3"></i>
                            <span>TikTok</span>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-12 pt-8 text-center">
            <p class="text-gray-400">&copy; 2025 <span class="font-semibold text-white">Gallery4U</span> by 
            <span class="text-blue-400 font-semibold">Cero Tech</span>. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <style>
        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }
            33% {
                transform: translate(30px, -50px) scale(1.1);
            }
            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }
            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script>
    (function(){
      const els = document.querySelectorAll('.count-up');
      if (!els.length) return;
      const easeOutCubic = t => 1 - Math.pow(1 - t, 3);
      const animate = (el) => {
        const startVal = parseInt(el.getAttribute('data-start') || '0', 10);
        const target = parseInt(el.getAttribute('data-target') || '0', 10);
        const suffix = el.getAttribute('data-suffix') || '';
        const duration = 1500;
        const t0 = performance.now();
        const step = (now) => {
          const p = Math.min(1, (now - t0) / duration);
          const eased = easeOutCubic(p);
          const val = Math.floor(startVal + (target - startVal) * eased);
          el.textContent = val.toLocaleString('id-ID') + suffix;
          if (p < 1) requestAnimationFrame(step);
        };
        requestAnimationFrame(step);
      };
      const io = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            animate(entry.target);
            io.unobserve(entry.target);
          }
        });
      }, { threshold: 0.5 });
      els.forEach(el => io.observe(el));
    })();
  </script>
  <script>
    // Navbar dropdown: Informasi
    function toggleMenu(id){
      const el = document.getElementById(id);
      if(!el) return;
      el.classList.toggle('hidden');
    }
    // close when clicking outside
    document.addEventListener('click', function(e){
      const isButton = e.target.closest('button[onclick^="toggleMenu"]');
      const isMenu = e.target.closest('#infoMenu');
      if(!isButton && !isMenu){
        const el = document.getElementById('infoMenu');
        if(el) el.classList.add('hidden');
      }
    });
  </script>
</body>
</html>




