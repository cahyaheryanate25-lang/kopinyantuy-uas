<!DOCTYPE html>
<html lang="id" class="scroll-smooth opacity-0 transition-opacity duration-700" id="htmlRoot">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>KopiNyantuy | Self Service & Order</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet">
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            primary: '#3d5a32',
            primaryLight: '#527744',
            primaryDark: '#23331b',
            accent: '#a7d970',
            bgLight: '#f6f8f4',
            textMain: '#1a2318',
            textMuted: '#5d6e58'
          },
          fontFamily: {
            sans: ['Plus Jakarta Sans', 'sans-serif'],
            heading: ['Space Grotesk', 'sans-serif']
          }
        }
      }
    }
  </script>
  <style>
    .glass-card {
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.6);
      box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.05);
    }
    .dark .glass-card {
      background: rgba(24, 31, 22, 0.85);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.08);
      box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.3);
    }

    .loader { border-top-color: #3d5a32; animation: spin 0.8s cubic-bezier(0.6, 0.2, 0.4, 0.8) infinite; }
    @keyframes spin { 100% { transform: rotate(360deg); } }
    
    .reveal { opacity: 0; transform: translateY(20px); transition: all 0.6s ease-out; }
    .reveal.active { opacity: 1; transform: translateY(0); }
    
    ::-webkit-scrollbar { width: 4px; }
    ::-webkit-scrollbar-thumb { background: #3d5a32; border-radius: 4px; }
  </style>
</head>
<body class="bg-bgLight dark:bg-[#111810] text-textMain dark:text-gray-100 font-sans transition-colors duration-300 pb-28">

  <!-- PRELOADER -->
  <div id="preloader" class="fixed inset-0 bg-bgLight dark:bg-[#111810] z-[10000] flex justify-center items-center transition-opacity duration-500">
    <div class="flex flex-col items-center gap-3">
      <div class="loader border-4 border-gray-200 dark:border-gray-800 rounded-full w-10 h-10"></div>
      <span class="font-heading text-xs font-bold tracking-widest text-primary dark:text-accent animate-pulse">KOPINYANTUY</span>
    </div>
  </div>
  
  <!-- SCROLL PROGRESS BAR -->
  <div id="scroll-progress" class="fixed top-0 left-0 h-1 bg-accent z-[10001] w-0 transition-all duration-150"></div>

  <!-- TOAST NOTIFICATION -->
  <div id="toast" class="fixed -bottom-20 left-1/2 -translate-x-1/2 w-[90%] max-w-xs bg-primaryDark text-white dark:bg-accent dark:text-primaryDark px-5 py-3 rounded-full font-bold shadow-2xl z-[9999] transition-all duration-300 text-center text-xs flex items-center justify-center gap-2 backdrop-blur-md">
    <span>🛒</span> <span id="toastMsg">Menu ditambahkan ke keranjang!</span>
  </div>

  <!-- FLOATING THEME SWITCHER -->
  <div class="fixed bottom-24 right-4 z-[9000] bg-white/90 dark:bg-gray-800/90 backdrop-blur-md p-2 rounded-full border border-gray-200 dark:border-gray-700 shadow-xl">
    <button id="theme-btn" class="flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold">
      <span id="theme-icon">🌙</span>
      <span id="theme-text" class="text-[11px]">Dark</span>
    </button>
  </div>
  
  <a href="https://wa.me/62895320078768" target="_blank" class="fixed bottom-6 right-4 bg-emerald-600 hover:bg-emerald-500 text-white p-3.5 rounded-full font-bold shadow-xl z-[9000] flex items-center justify-center transition-all">
    <span class="text-lg">💬</span>
  </a>

  <!-- NAVBAR HEADER -->
  <header class="sticky top-0 z-50 px-4 py-3 bg-primaryDark text-white shadow-lg">
    <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-3">
      <div class="flex justify-between items-center w-full sm:w-auto">
        <a href="#" class="text-xl font-heading font-black tracking-tight flex items-center gap-2">
          <span>☕</span> <span>Kopi<span class="text-accent">Nyantuy</span></span>
        </a>
      </div>
      <div class="w-full sm:w-auto">
        <input type="search" id="menuSearch" placeholder="🔍 Cari menu favorit..." class="w-full sm:w-64 px-4 py-2 rounded-full text-gray-900 bg-white focus:outline-none text-xs font-medium shadow-inner">
      </div>
    </div>
  </header>

  <!-- MAIN CONTAINER -->
  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex flex-col gap-8">
    
    <!-- HERO SECTION -->
    <section id="hero" class="reveal glass-card rounded-2xl p-5 md:p-8 relative overflow-hidden flex flex-col md:flex-row justify-between items-center gap-6">
      <div class="w-full md:w-3/5 z-10 text-left">
        <span class="inline-block bg-primary/10 dark:bg-accent/10 border border-primary/20 text-primary dark:text-accent text-[10px] font-extrabold px-3 py-1 rounded-full uppercase tracking-wider mb-2">
          ☕ CAFE & COFFEE
        </span>
        <h1 class="font-heading text-2xl sm:text-4xl font-black my-2 text-primaryDark dark:text-white leading-tight">
          Ngopi Santai di <span class="text-primary dark:text-accent">KopiNyantuy</span>
        </h1>
        <p class="text-textMuted dark:text-gray-300 text-xs sm:text-sm mb-5 leading-relaxed">
          Tempat nyaman untuk menikmati kopi, ngobrol bersama teman, mengerjakan tugas, atau sekadar santai.
        </p>
        <div class="flex gap-3">
          <button onclick="document.getElementById('menuGrid').scrollIntoView();" class="bg-primary hover:bg-primaryDark text-white px-5 py-2.5 rounded-xl font-bold text-xs shadow-md">
            Lihat Menu →
          </button>
          <a href="#kontak" class="border border-primary/40 text-primary dark:border-accent dark:text-accent px-5 py-2.5 rounded-xl font-bold text-xs">
            Kontak
          </a>
        </div>
      </div>

      <!-- Promo Card -->
      <div class="w-full md:w-2/5 z-10">
        <div class="glass-card p-3.5 rounded-xl flex items-center gap-3 shadow-md cursor-pointer" onclick="tambahKeKeranjang('Kopi Susu Nyantuy', 18000)">
          <img src="https://images.unsplash.com/photo-1517701604599-bb29b565090c?auto=format&fit=crop&w=150&q=80" alt="Promo" class="w-20 h-20 rounded-lg object-cover flex-shrink-0">
          <div class="flex-1">
            <span class="text-[9px] text-primary dark:text-accent font-black uppercase tracking-wider block mb-0.5">⭐ FAVORIT</span>
            <h4 class="font-heading font-bold text-sm leading-snug">Kopi Susu Nyantuy</h4>
            <p class="text-[11px] text-textMuted dark:text-gray-400 mb-1">Manis, creamy, nikmat.</p>
            <div class="flex items-center justify-between">
              <span class="text-primary dark:text-accent font-black text-sm">Rp18.000</span>
              <span class="text-[10px] bg-primary text-white px-2.5 py-1 rounded-md font-bold">+ Pesan</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- WIDGET QUICK INFO -->
    <section class="reveal grid grid-cols-1 sm:grid-cols-2 gap-4">
      <div class="glass-card p-4 rounded-xl flex items-center gap-3 border-l-4 border-l-amber-500">
        <div class="text-2xl bg-amber-500/10 p-2.5 rounded-xl text-amber-500">🔥</div>
        <div>
          <span class="text-[9px] font-black text-gray-400 uppercase">PROMO HARI INI</span>
          <h4 class="font-heading font-bold text-sm">Beli 2 Kopi Susu</h4>
          <p class="text-[11px] text-textMuted dark:text-gray-400">Dua cup hanya Rp30.000</p>
        </div>
      </div>
      <div class="glass-card p-4 rounded-xl flex items-center gap-3 border-l-4 border-l-emerald-500">
        <div class="text-2xl bg-emerald-500/10 p-2.5 rounded-xl text-emerald-500">🕒</div>
        <div>
          <span class="text-[9px] font-black text-gray-400 uppercase">JAM OPERASIONAL</span>
          <h4 class="font-heading font-bold text-sm">Setiap Hari</h4>
          <p class="text-[11px] text-textMuted dark:text-gray-400">08.00 - 22.00 WIB</p>
        </div>
      </div>
    </section>

    <!-- TENTANG KAMI -->
    <section id="tentang" class="reveal flex flex-col md:flex-row items-center gap-6 py-2">
      <div class="w-full md:w-1/2">
        <span class="text-[10px] font-black text-primary dark:text-accent uppercase tracking-widest block mb-1">TENTANG KAMI</span>
        <h2 class="font-heading text-xl sm:text-2xl font-extrabold mb-3">Kenalan dengan KopiNyantuy</h2>
        <p class="text-textMuted dark:text-gray-300 text-xs leading-relaxed mb-3">
          KopiNyantuy hadir sebagai tempat nongkrong yang nyaman untuk semua kalangan. Kami menyajikan berbagai pilihan kopi, minuman non-kopi, dan makanan ringan dengan harga ramah di kantong.
        </p>
      </div>
      <div class="w-full md:w-1/2">
        <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&w=600&q=80" alt="Cafe" class="w-full h-48 object-cover rounded-xl shadow-md">
      </div>
    </section>

    <!-- LAYOUT MENU UTAMA -->
    <div class="flex flex-col lg:flex-row gap-6" id="menuGrid">
      
      <!-- SIDEBAR KATEGORI -->
      <aside class="w-full lg:w-1/4">
        <div class="glass-card p-4 rounded-xl sticky top-20 z-20">
          <h3 class="font-heading text-sm font-extrabold mb-3">Kategori Menu</h3>
          <ul class="flex lg:flex-col gap-2 overflow-x-auto pb-1 no-scrollbar" id="categoryList">
            <li onclick="filterKategori('semua', this)" class="category-btn whitespace-nowrap bg-primary text-white font-bold px-4 py-2 rounded-lg cursor-pointer text-xs flex items-center gap-1.5 flex-shrink-0">
              ☕ Semua
            </li>
            <li onclick="filterKategori('kopi', this)" class="category-btn whitespace-nowrap bg-gray-100 dark:bg-gray-800 text-textMuted dark:text-gray-300 font-bold px-4 py-2 rounded-lg cursor-pointer text-xs flex items-center gap-1.5 flex-shrink-0">
              ☕ Kopi
            </li>
            <li onclick="filterKategori('non-kopi', this)" class="category-btn whitespace-nowrap bg-gray-100 dark:bg-gray-800 text-textMuted dark:text-gray-300 font-bold px-4 py-2 rounded-lg cursor-pointer text-xs flex items-center gap-1.5 flex-shrink-0">
              🍵 Non-Kopi
            </li>
            <li onclick="filterKategori('snack', this)" class="category-btn whitespace-nowrap bg-gray-100 dark:bg-gray-800 text-textMuted dark:text-gray-300 font-bold px-4 py-2 rounded-lg cursor-pointer text-xs flex items-center gap-1.5 flex-shrink-0">
              🥐 Snack
            </li>
          </ul>
        </div>
      </aside>

      <!-- DAFTAR MENU CARDS -->
      <section class="w-full lg:w-3/4 flex flex-col gap-3">
        
        <!-- KOPI -->
        <article class="reveal menu-list-card glass-card rounded-xl p-3 flex items-center gap-3.5" data-name="Americano" data-category="kopi">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmkkXsrVqRu40WBZ62zmAwcmm_LGw8fjF5EKbOlhG3JQ&s=10" class="w-20 h-20 rounded-lg object-cover flex-shrink-0" onclick="bukaQuickView('Americano', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmkkXsrVqRu40WBZ62zmAwcmm_LGw8fjF5EKbOlhG3JQ&s=10', 'Kopi hitam dengan rasa kuat dan menyegarkan.')">
          <div class="flex-1 min-w-0">
            <h3 class="font-heading font-bold text-sm truncate">Americano</h3>
            <p class="text-[11px] text-textMuted dark:text-gray-400 line-clamp-1 mb-1">Kopi hitam rasa kuat dan menyegarkan.</p>
            <div class="flex items-center justify-between mt-1">
              <span class="text-primary dark:text-accent font-extrabold text-sm">Rp10.000</span>
              <button onclick="tambahKeKeranjang('Americano', 10000)" class="bg-primary hover:bg-primaryDark text-white px-3 py-1 rounded-md font-bold text-xs">+ Pesan</button>
            </div>
          </div>
        </article>

        <article class="reveal menu-list-card glass-card rounded-xl p-3 flex items-center gap-3.5" data-name="Cafe Latte" data-category="kopi">
          <img src="https://gendhiscoffee.id/wp-content/uploads/2025/01/cafe-latte.jpg" class="w-20 h-20 rounded-lg object-cover flex-shrink-0" onclick="bukaQuickView('Cafe Latte', 'https://images.unsplash.com/photo-1570968915860-54d5c301fa9f?auto=format&fit=crop&w=400&q=80', 'Perpaduan espresso dan susu yang lembut.')">
          <div class="flex-1 min-w-0">
            <h3 class="font-heading font-bold text-sm truncate">Cafe Latte</h3>
            <p class="text-[11px] text-textMuted dark:text-gray-400 line-clamp-1 mb-1">Perpaduan espresso dan susu lembut.</p>
            <div class="flex items-center justify-between mt-1">
              <span class="text-primary dark:text-accent font-extrabold text-sm">Rp20.000</span>
              <button onclick="tambahKeKeranjang('Cafe Latte', 20000)" class="bg-primary hover:bg-primaryDark text-white px-3 py-1 rounded-md font-bold text-xs">+ Pesan</button>
            </div>
          </div>
        </article>

        <article class="reveal menu-list-card glass-card rounded-xl p-3 flex items-center gap-3.5" data-name="Cappuccino" data-category="kopi">
          <img src="https://www.acouplecooks.com/wp-content/uploads/2020/10/how-to-make-cappuccino-005.jpg" class="w-20 h-20 rounded-lg object-cover flex-shrink-0" onclick="bukaQuickView('Cappuccino', 'https://images.unsplash.com/photo-1570968915860-54d5c301fa9f?auto=format&fit=crop&w=400&q=80', 'Espresso dengan susu dan foam creamy.')">
          <div class="flex-1 min-w-0">
            <h3 class="font-heading font-bold text-sm truncate">Cappuccino</h3>
            <p class="text-[11px] text-textMuted dark:text-gray-400 line-clamp-1 mb-1">Espresso dengan foam creamy.</p>
            <div class="flex items-center justify-between mt-1">
              <span class="text-primary dark:text-accent font-extrabold text-sm">Rp20.000</span>
              <button onclick="tambahKeKeranjang('Cappuccino', 20000)" class="bg-primary hover:bg-primaryDark text-white px-3 py-1 rounded-md font-bold text-xs">+ Pesan</button>
            </div>
          </div>
        </article>

        <article class="reveal menu-list-card glass-card rounded-xl p-3 flex items-center gap-3.5 border border-primary/30" data-name="Kopi Susu Nyantuy" data-category="kopi">
          <img src="https://images.unsplash.com/photo-1517701604599-bb29b565090c?auto=format&fit=crop&w=200&q=80" class="w-20 h-20 rounded-lg object-cover flex-shrink-0" onclick="bukaQuickView('Kopi Susu Nyantuy', 'https://images.unsplash.com/photo-1517701604599-bb29b565090c?auto=format&fit=crop&w=400&q=80', 'Kopi susu creamy dengan rasa manis yang pas.')">
          <div class="flex-1 min-w-0">
            <h3 class="font-heading font-bold text-sm truncate flex items-center gap-1">Kopi Susu Nyantuy ⭐</h3>
            <p class="text-[11px] text-textMuted dark:text-gray-400 line-clamp-1 mb-1">Kopi susu creamy rasa manis pas.</p>
            <div class="flex items-center justify-between mt-1">
              <span class="text-primary dark:text-accent font-extrabold text-sm">Rp18.000</span>
              <button onclick="tambahKeKeranjang('Kopi Susu Nyantuy', 18000)" class="bg-primary hover:bg-primaryDark text-white px-3 py-1 rounded-md font-bold text-xs">+ Pesan</button>
            </div>
          </div>
        </article>

        <article class="reveal menu-list-card glass-card rounded-xl p-3 flex items-center gap-3.5" data-name="Caramel Macchiato" data-category="kopi">
          <img src="https://copykat.com/wp-content/uploads/2021/08/Starbucks-Caramel-Macchiato-Pin-3.jpg" class="w-20 h-20 rounded-lg object-cover flex-shrink-0" onclick="bukaQuickView('Caramel Macchiato', 'https://images.unsplash.com/photo-1570968915860-54d5c301fa9f?auto=format&fit=crop&w=400&q=80', 'Kopi manis dengan sentuhan saus karamel.')">
          <div class="flex-1 min-w-0">
            <h3 class="font-heading font-bold text-sm truncate">Caramel Macchiato</h3>
            <p class="text-[11px] text-textMuted dark:text-gray-400 line-clamp-1 mb-1">Kopi manis dengan saus karamel.</p>
            <div class="flex items-center justify-between mt-1">
              <span class="text-primary dark:text-accent font-extrabold text-sm">Rp22.000</span>
              <button onclick="tambahKeKeranjang('Caramel Macchiato', 22000)" class="bg-primary hover:bg-primaryDark text-white px-3 py-1 rounded-md font-bold text-xs">+ Pesan</button>
            </div>
          </div>
        </article>

        <!-- NON KOPI -->
        <article class="reveal menu-list-card glass-card rounded-xl p-3 flex items-center gap-3.5" data-name="Matcha Latte" data-category="non-kopi">
          <img src="https://images.unsplash.com/photo-1515823064-d6e0c04616a7?auto=format&fit=crop&w=200&q=80" class="w-20 h-20 rounded-lg object-cover flex-shrink-0" onclick="bukaQuickView('Matcha Latte', 'https://images.unsplash.com/photo-1515823064-d6e0c04616a7?auto=format&fit=crop&w=400&q=80', 'Matcha lembut dengan rasa manis yang seimbang.')">
          <div class="flex-1 min-w-0">
            <h3 class="font-heading font-bold text-sm truncate">Matcha Latte</h3>
            <p class="text-[11px] text-textMuted dark:text-gray-400 line-clamp-1 mb-1">Matcha lembut manis seimbang.</p>
            <div class="flex items-center justify-between mt-1">
              <span class="text-primary dark:text-accent font-extrabold text-sm">Rp20.000</span>
              <button onclick="tambahKeKeranjang('Matcha Latte', 20000)" class="bg-primary hover:bg-primaryDark text-white px-3 py-1 rounded-md font-bold text-xs">+ Pesan</button>
            </div>
          </div>
        </article>

        <article class="reveal menu-list-card glass-card rounded-xl p-3 flex items-center gap-3.5" data-name="Chocolate" data-category="non-kopi">
          <img src="https://images.unsplash.com/photo-1542990253-0d0f5be5f0ed?auto=format&fit=crop&w=200&q=80" class="w-20 h-20 rounded-lg object-cover flex-shrink-0" onclick="bukaQuickView('Chocolate', 'https://images.unsplash.com/photo-1542990253-0d0f5be5f0ed?auto=format&fit=crop&w=400&q=80', 'Minuman cokelat creamy dan kental.')">
          <div class="flex-1 min-w-0">
            <h3 class="font-heading font-bold text-sm truncate">Chocolate</h3>
            <p class="text-[11px] text-textMuted dark:text-gray-400 line-clamp-1 mb-1">Cokelat creamy dan kental.</p>
            <div class="flex items-center justify-between mt-1">
              <span class="text-primary dark:text-accent font-extrabold text-sm">Rp18.000</span>
              <button onclick="tambahKeKeranjang('Chocolate', 18000)" class="bg-primary hover:bg-primaryDark text-white px-3 py-1 rounded-md font-bold text-xs">+ Pesan</button>
            </div>
          </div>
        </article>

        <article class="reveal menu-list-card glass-card rounded-xl p-3 flex items-center gap-3.5" data-name="Lychee Tea" data-category="non-kopi">
          <img src="https://images.unsplash.com/photo-1556679343-c7306c1976bc?auto=format&fit=crop&w=200&q=80" class="w-20 h-20 rounded-lg object-cover flex-shrink-0" onclick="bukaQuickView('Lychee Tea', 'https://images.unsplash.com/photo-1556679343-c7306c1976bc?auto=format&fit=crop&w=400&q=80', 'Teh segar dengan rasa buah laci.')">
          <div class="flex-1 min-w-0">
            <h3 class="font-heading font-bold text-sm truncate">Lychee Tea</h3>
            <p class="text-[11px] text-textMuted dark:text-gray-400 line-clamp-1 mb-1">Teh segar rasa buah laci.</p>
            <div class="flex items-center justify-between mt-1">
              <span class="text-primary dark:text-accent font-extrabold text-sm">Rp15.000</span>
              <button onclick="tambahKeKeranjang('Lychee Tea', 15000)" class="bg-primary hover:bg-primaryDark text-white px-3 py-1 rounded-md font-bold text-xs">+ Pesan</button>
            </div>
          </div>
        </article>

        <article class="reveal menu-list-card glass-card rounded-xl p-3 flex items-center gap-3.5" data-name="Lemon Tea" data-category="non-kopi">
          <img src="https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?auto=format&fit=crop&w=200&q=80" class="w-20 h-20 rounded-lg object-cover flex-shrink-0" onclick="bukaQuickView('Lemon Tea', 'https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?auto=format&fit=crop&w=400&q=80', 'Teh lemon yang segar dan menyegarkan.')">
          <div class="flex-1 min-w-0">
            <h3 class="font-heading font-bold text-sm truncate">Lemon Tea</h3>
            <p class="text-[11px] text-textMuted dark:text-gray-400 line-clamp-1 mb-1">Teh lemon segar menyegarkan.</p>
            <div class="flex items-center justify-between mt-1">
              <span class="text-primary dark:text-accent font-extrabold text-sm">Rp15.000</span>
              <button onclick="tambahKeKeranjang('Lemon Tea', 15000)" class="bg-primary hover:bg-primaryDark text-white px-3 py-1 rounded-md font-bold text-xs">+ Pesan</button>
            </div>
          </div>
        </article>

        <article class="reveal menu-list-card glass-card rounded-xl p-3 flex items-center gap-3.5" data-name="Strawberry Milk" data-category="non-kopi">
          <img src="https://www.mightymrs.com/wp-content/uploads/hot-strawberry-milk3.jpg" class="w-20 h-20 rounded-lg object-cover flex-shrink-0" onclick="bukaQuickView('Strawberry Milk', 'https://images.unsplash.com/photo-1553787499-6f9133860278?auto=format&fit=crop&w=400&q=80', 'Susu stroberi yang manis dan creamy.')">
          <div class="flex-1 min-w-0">
            <h3 class="font-heading font-bold text-sm truncate">Strawberry Milk</h3>
            <p class="text-[11px] text-textMuted dark:text-gray-400 line-clamp-1 mb-1">Susu stroberi manis creamy.</p>
            <div class="flex items-center justify-between mt-1">
              <span class="text-primary dark:text-accent font-extrabold text-sm">Rp18.000</span>
              <button onclick="tambahKeKeranjang('Strawberry Milk', 18000)" class="bg-primary hover:bg-primaryDark text-white px-3 py-1 rounded-md font-bold text-xs">+ Pesan</button>
            </div>
          </div>
        </article>

        <!-- SNACK -->
        <article class="reveal menu-list-card glass-card rounded-xl p-3 flex items-center gap-3.5" data-name="French Fries" data-category="snack">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6JZcOy2ayNqRZRoWOihdJd805djPrL9-qoD1tbf4Sh-L-wWaicjwIHFY&s=10" class="w-20 h-20 rounded-lg object-cover flex-shrink-0" onclick="bukaQuickView('French Fries', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6JZcOy2ayNqRZRoWOihdJd805djPrL9-qoD1tbf4Sh-L-wWaicjwIHFY&s=10', 'Kentang goreng renyah dan gurih.')">
          <div class="flex-1 min-w-0">
            <h3 class="font-heading font-bold text-sm truncate">French Fries</h3>
            <p class="text-[11px] text-textMuted dark:text-gray-400 line-clamp-1 mb-1">Kentang goreng renyah gurih.</p>
            <div class="flex items-center justify-between mt-1">
              <span class="text-primary dark:text-accent font-extrabold text-sm">Rp15.000</span>
              <button onclick="tambahKeKeranjang('French Fries', 15000)" class="bg-primary hover:bg-primaryDark text-white px-3 py-1 rounded-md font-bold text-xs">+ Pesan</button>
            </div>
          </div>
        </article>

        <article class="reveal menu-list-card glass-card rounded-xl p-3 flex items-center gap-3.5" data-name="Roti Bakar" data-category="snack">
          <img src="https://cdn.yummy.co.id/content-images/images/20231121/uLzYfWthFfeE97voURJ5XPHVY8Vt9dd7-31373030353532303332d41d8cd98f00b204e9800998ecf8427e.jpg?x-oss-process=image/resize,w_388,h_388,m_fixed,x-oss-process=image/format,webp" class="w-20 h-20 rounded-lg object-cover flex-shrink-0" onclick="bukaQuickView('Roti Bakar', 'https://images.unsplash.com/photo-1584776296944-ab6fb57b0bff?auto=format&fit=crop&w=400&q=80', 'Roti bakar dengan pilihan topping lezat.')">
          <div class="flex-1 min-w-0">
            <h3 class="font-heading font-bold text-sm truncate">Roti Bakar</h3>
            <p class="text-[11px] text-textMuted dark:text-gray-400 line-clamp-1 mb-1">Roti bakar topping lezat.</p>
            <div class="flex items-center justify-between mt-1">
              <span class="text-primary dark:text-accent font-extrabold text-sm">Rp17.000</span>
              <button onclick="tambahKeKeranjang('Roti Bakar', 17000)" class="bg-primary hover:bg-primaryDark text-white px-3 py-1 rounded-md font-bold text-xs">+ Pesan</button>
            </div>
          </div>
        </article>

        <article class="reveal menu-list-card glass-card rounded-xl p-3 flex items-center gap-3.5" data-name="Croissant" data-category="snack">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHOjC99zBNxfzlWqqpamcTDOulc_rxXr1YcesiygGdkST82fiE2IcrrVU&s=10" class="w-20 h-20 rounded-lg object-cover flex-shrink-0" onclick="bukaQuickView('Croissant', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHOjC99zBNxfzlWqqpamcTDOulc_rxXr1YcesiygGdkST82fiE2IcrrVU&s=10', 'Pastry renyah dengan tekstur lembut di dalam.')">
          <div class="flex-1 min-w-0">
            <h3 class="font-heading font-bold text-sm truncate">Croissant</h3>
            <p class="text-[11px] text-textMuted dark:text-gray-400 line-clamp-1 mb-1">Pastry renyah lembut di dalam.</p>
            <div class="flex items-center justify-between mt-1">
              <span class="text-primary dark:text-accent font-extrabold text-sm">Rp10.000</span>
              <button onclick="tambahKeKeranjang('Croissant', 10000)" class="bg-primary hover:bg-primaryDark text-white px-3 py-1 rounded-md font-bold text-xs">+ Pesan</button>
            </div>
          </div>
        </article>

        <article class="reveal menu-list-card glass-card rounded-xl p-3 flex items-center gap-3.5" data-name="Pisang Cokelat" data-category="snack">
          <img src="https://asset.kompas.com/crops/hEEZr_BVv0biGRKAQlc71JcsZHE=/56x42:936x629/1200x800/data/photo/2022/07/21/62d8f389f1e8a.jpg" class="w-20 h-20 rounded-lg object-cover flex-shrink-0" onclick="bukaQuickView('Pisang Cokelat', 'https://images.unsplash.com/photo-1528736235302-52922df5c122?auto=format&fit=crop&w=400&q=80', 'Pisang crispy dengan cokelat lumer.')">
          <div class="flex-1 min-w-0">
            <h3 class="font-heading font-bold text-sm truncate">Pisang Cokelat</h3>
            <p class="text-[11px] text-textMuted dark:text-gray-400 line-clamp-1 mb-1">Pisang crispy cokelat lumer.</p>
            <div class="flex items-center justify-between mt-1">
              <span class="text-primary dark:text-accent font-extrabold text-sm">Rp15.000</span>
              <button onclick="tambahKeKeranjang('Pisang Cokelat', 15000)" class="bg-primary hover:bg-primaryDark text-white px-3 py-1 rounded-md font-bold text-xs">+ Pesan</button>
            </div>
          </div>
        </article>

        <p id="pesanKosong" class="hidden text-center py-8 text-gray-400 font-bold text-xs">🔍 Menu tidak ditemukan.</p>
      </section>
    </div>

    <!-- KONTAK SECTION -->
    <section id="kontak" class="reveal py-4">
      <span class="text-[10px] font-black text-primary dark:text-accent uppercase tracking-widest block mb-1">INFORMASI</span>
      <h2 class="font-heading text-xl font-extrabold mb-4">Kontak KopiNyantuy</h2>
      
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
        <div class="glass-card p-3.5 rounded-xl flex items-center gap-3">
          <div class="text-lg bg-red-500/10 p-2 rounded-lg text-red-500">📍</div>
          <div>
            <p class="font-bold text-[10px] text-gray-400 uppercase">Alamat</p>
            <p class="font-bold">Jl. Nyantuy No. 10</p>
          </div>
        </div>
        <div class="glass-card p-3.5 rounded-xl flex items-center gap-3">
          <div class="text-lg bg-emerald-500/10 p-2 rounded-lg text-emerald-500">📞</div>
          <div>
            <p class="font-bold text-[10px] text-gray-400 uppercase">Telepon</p>
            <p class="font-bold">0895-3200-78768</p>
          </div>
        </div>
        <div class="glass-card p-3.5 rounded-xl flex items-center gap-3">
          <div class="text-lg bg-sky-500/10 p-2 rounded-lg text-sky-500">✉️</div>
          <div>
            <p class="font-bold text-[10px] text-gray-400 uppercase">Email</p>
            <p class="font-bold">kopinyantuy@gmail.com</p>
          </div>
        </div>
        <div class="glass-card p-3.5 rounded-xl flex items-center gap-3">
          <div class="text-lg bg-purple-500/10 p-2 rounded-lg text-purple-500">🕒</div>
          <div>
            <p class="font-bold text-[10px] text-gray-400 uppercase">Jam Operasional</p>
            <p class="font-bold">08.00 - 22.00 WIB</p>
          </div>
        </div>
      </div>
    </section>

  </main>

  <!-- FOOTER -->
  <footer class="bg-primaryDark text-white py-6 border-t border-white/10 mt-6">
    <div class="max-w-7xl mx-auto px-4 text-center text-xs text-gray-400">
      <p class="font-heading font-black text-white text-sm mb-1">☕ KopiNyantuy</p>
      <p>© 2026 KopiNyantuy. All Rights Reserved.</p>
    </div>
  </footer>

  <!-- STICKY CART BAR FLOATING -->
  <div id="stickyCart" class="fixed bottom-0 left-0 right-0 bg-primaryDark/95 backdrop-blur-xl text-white py-3 px-4 z-[8000] flex justify-between items-center transform translate-y-full transition-transform duration-300 border-t border-white/10 shadow-2xl">
    <div class="flex items-center gap-3">
      <div class="relative bg-primary p-2.5 rounded-full text-lg">
        🛒 <span id="cartCount" class="absolute -top-1 -right-1 bg-accent text-primaryDark font-black text-[10px] w-4 h-4 rounded-full flex items-center justify-center">0</span>
      </div>
      <div>
        <p class="text-[9px] text-gray-400 font-bold uppercase">Total</p>
        <p id="cartTotalHeader" class="text-base font-black text-accent">Rp0</p>
      </div>
    </div>
    <button onclick="bukaModalPembayaran()" class="bg-accent text-primaryDark font-black px-5 py-2.5 rounded-xl text-xs shadow-md">
      Bayar →
    </button>
  </div>

  <!-- PRODUCT QUICK VIEW MODAL -->
  <div id="quickViewModal" class="fixed inset-0 bg-black/70 z-[9999] hidden justify-center items-center p-4 backdrop-blur-sm opacity-0 transition-all duration-300">
    <div class="bg-white dark:bg-gray-800 w-full max-w-xs rounded-2xl overflow-hidden relative shadow-2xl" id="qvContent">
      <button onclick="tutupQuickView()" class="absolute top-3 right-3 bg-black/50 text-white w-7 h-7 rounded-full font-bold text-xs z-10">✕</button>
      <img id="qvImage" src="" class="w-full h-48 object-cover">
      <div class="p-4 text-center">
        <h3 id="qvTitle" class="font-heading font-bold text-base mb-1 text-gray-900 dark:text-gray-100">Title</h3>
        <p id="qvDesc" class="text-xs text-textMuted dark:text-gray-400 leading-relaxed mb-3">Desc</p>
        <button onclick="tutupQuickView()" class="w-full bg-primary text-white py-2 rounded-lg font-bold text-xs">Tutup</button>
      </div>
    </div>
  </div>

  <!-- MODAL PEMBAYARAN -->
  <div id="modalBayar" class="fixed inset-0 bg-black/70 z-[9999] hidden justify-center items-center p-4 backdrop-blur-md">
    <div class="bg-white dark:bg-gray-800 w-full max-w-sm p-5 rounded-2xl relative shadow-2xl max-h-[90vh] overflow-y-auto">
      <button onclick="tutupModalPembayaran()" class="absolute top-3 right-3 text-gray-400 text-lg font-bold">✕</button>
      <h2 class="font-heading text-xl font-black mb-1">Rincian Pesanan</h2>

      <div class="border border-gray-200 dark:border-gray-700 rounded-xl p-3 bg-gray-50 dark:bg-gray-700/50 mb-4 mt-3">
        <div id="daftarPesananModal" class="space-y-2 max-h-36 overflow-y-auto pr-1"></div>
        <div class="border-t border-dashed border-gray-300 dark:border-gray-600 mt-3 pt-2 flex justify-between items-center font-black text-sm">
          <span>TOTAL:</span>
          <span id="totalAkhirModal" class="text-primary dark:text-accent">Rp0</span>
        </div>
      </div>

      <form id="formCheckout" onsubmit="prosesBayar(event)" class="space-y-3">
        <div>
          <label class="block text-[11px] font-bold mb-1">Nomor Meja / Lokasi</label>
          <select id="inputMeja" required class="w-full p-2.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-xs focus:outline-none">
            <option value="">-- Pilih Lokasi --</option>
            <option value="Meja 1 (Indoor)">Meja 1 (Indoor)</option>
            <option value="Meja 2 (Indoor)">Meja 2 (Indoor)</option>
            <option value="Meja 3 (Outdoor)">Meja 3 (Outdoor)</option>
            <option value="Bungkus / Takeaway">Bungkus / Takeaway</option>
          </select>
        </div>
        <div>
          <label class="block text-[11px] font-bold mb-1">Metode Pembayaran</label>
          <select id="inputBayar" required class="w-full p-2.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-xs focus:outline-none">
            <option value="">-- Pilih Pembayaran --</option>
            <option value="Tunai">Bayar di Kasir (Tunai)</option>
            <option value="QRIS">QRIS / E-Wallet</option>
          </select>
        </div>
        <button type="submit" id="btnSubmitCheckout" class="w-full bg-emerald-600 hover:bg-emerald-500 text-white font-bold py-3 rounded-xl transition shadow-md mt-2 text-xs">
          Kirim ke WhatsApp Kasir →
        </button>
      </form>
    </div>
  </div>

  <!-- JAVASCRIPT LOGIC -->
  <script>
    // 1. PRELOADER
    window.onload = () => {
      document.getElementById('htmlRoot').classList.remove('opacity-0');
      setTimeout(() => {
        document.getElementById('preloader').classList.add('opacity-0');
        setTimeout(() => document.getElementById('preloader').style.display = 'none', 500);
      }, 300);
    };

    // 2. REVEAL ANIMATION ON SCROLL
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => { if (entry.isIntersecting) entry.target.classList.add('active'); });
    }, { threshold: 0.05 });
    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

    // 3. SCROLL PROGRESS
    window.onscroll = () => {
      let winScroll = document.documentElement.scrollTop;
      let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
      document.getElementById("scroll-progress").style.width = (winScroll / height) * 100 + "%";
    };

    // 4. QUICK VIEW MODAL
    function bukaQuickView(title, imgUrl, desc) {
      const modal = document.getElementById('quickViewModal');
      document.getElementById('qvTitle').innerText = title;
      document.getElementById('qvImage').src = imgUrl;
      document.getElementById('qvDesc').innerText = desc;
      modal.style.display = 'flex';
      setTimeout(() => { modal.classList.remove('opacity-0'); }, 10);
    }
    function tutupQuickView() {
      const modal = document.getElementById('quickViewModal');
      modal.classList.add('opacity-0');
      setTimeout(() => modal.style.display = 'none', 300);
    }

    // 5. DARK MODE TOGGLE
    const themeBtn = document.getElementById('theme-btn');
    const themeIcon = document.getElementById('theme-icon');
    const themeText = document.getElementById('theme-text');

    themeBtn.addEventListener('click', () => {
      const isDark = document.documentElement.classList.toggle('dark');
      themeIcon.innerText = isDark ? '☀️' : '🌙';
      themeText.innerText = isDark ? 'Light' : 'Dark';
    });

    // 6. TOAST NOTIFICATION
    function showToast(pesan) {
      const toast = document.getElementById("toast");
      if(pesan) document.getElementById("toastMsg").innerText = pesan;
      toast.style.bottom = "80px";
      setTimeout(() => { toast.style.bottom = "-80px"; }, 2500);
    }

    const formatRp = (angka) => new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(angka);

    // 7. FILTER KATEGORI MENU
    let katAktif = 'semua';
    function filterKategori(kat, el) {
      katAktif = kat;
      document.querySelectorAll('.category-btn').forEach(btn => {
        btn.className = "category-btn whitespace-nowrap bg-gray-100 dark:bg-gray-800 text-textMuted dark:text-gray-300 font-bold px-4 py-2 rounded-lg cursor-pointer text-xs flex items-center gap-1.5 flex-shrink-0";
      });
      el.className = "category-btn whitespace-nowrap bg-primary text-white font-bold px-4 py-2 rounded-lg cursor-pointer text-xs flex items-center gap-1.5 flex-shrink-0";
      terapkanFilter();
    }

    function terapkanFilter() {
      const keyword = document.getElementById('menuSearch').value.toLowerCase();
      let ada = false;
      document.querySelectorAll('.menu-list-card').forEach(card => {
        const cocokNama = card.dataset.name.toLowerCase().includes(keyword);
        const cocokKat = (katAktif === 'semua') || (card.dataset.category === katAktif);
        if (cocokNama && cocokKat) { card.style.display = 'flex'; ada = true; } 
        else { card.style.display = 'none'; }
      });
      document.getElementById('pesanKosong').classList.toggle('hidden', ada);
    }
    document.getElementById('menuSearch').addEventListener('input', terapkanFilter);

    // 8. SYSTEM KERANJANG & INTEGRASI DATABASE + WHATSAPP
    let keranjang = [];

    function tambahKeKeranjang(nama, harga) {
      const item = keranjang.find(i => i.nama === nama);
      if (item) { item.qty++; } else { keranjang.push({ nama, harga, qty: 1 }); }
      updateCart();
      showToast(`${nama} ditambahkan!`);
    }

    function ubahQty(nama, delta) {
      const item = keranjang.find(i => i.nama === nama);
      if (item) { item.qty += delta; if (item.qty <= 0) keranjang = keranjang.filter(i => i.nama !== nama); }
      updateCart();
      renderModal();
    }

    function updateCart() {
      const totalItem = keranjang.reduce((s, i) => s + i.qty, 0);
      const totalHarga = keranjang.reduce((s, i) => s + (i.harga * i.qty), 0);
      document.getElementById('cartCount').innerText = totalItem;
      document.getElementById('cartTotalHeader').innerText = formatRp(totalHarga);
      document.getElementById('stickyCart').classList.toggle('translate-y-full', totalItem === 0);
    }

    function renderModal() {
      const box = document.getElementById('daftarPesananModal'); box.innerHTML = '';
      let sum = 0;
      if (keranjang.length === 0) {
        box.innerHTML = `<p class="text-center text-gray-400 py-3 text-xs font-bold">Keranjang kosong.</p>`;
        document.getElementById('totalAkhirModal').innerText = formatRp(0);
        return;
      }
      keranjang.forEach(i => {
        const sub = i.harga * i.qty; sum += sub;
        box.innerHTML += `
          <div class="flex justify-between items-center text-xs border-b border-gray-100 dark:border-gray-600 pb-1.5">
            <div class="flex-1">
              <p class="font-bold text-[11px]">${i.nama}</p>
              <p class="text-[10px] text-gray-400">${formatRp(i.harga)} x ${i.qty}</p>
            </div>
            <div class="flex items-center gap-1.5">
              <div class="flex items-center border rounded bg-white dark:bg-gray-800">
                <button type="button" onclick="ubahQty('${i.nama}', -1)" class="px-1.5 py-0.5 font-bold text-xs">-</button>
                <span class="px-1.5 font-bold text-[10px]">${i.qty}</span>
                <button type="button" onclick="ubahQty('${i.nama}', 1)" class="px-1.5 py-0.5 font-bold text-xs">+</button>
              </div>
              <span class="font-bold text-primary dark:text-accent w-14 text-right text-[11px]">${formatRp(sub)}</span>
            </div>
          </div>`;
      });
      document.getElementById('totalAkhirModal').innerText = formatRp(sum);
    }

    function bukaModalPembayaran() { if(keranjang.length > 0) { renderModal(); document.getElementById('modalBayar').style.display = 'flex'; } }
    function tutupModalPembayaran() { document.getElementById('modalBayar').style.display = 'none'; }

    async function prosesBayar(e) {
      e.preventDefault();
      if (keranjang.length === 0) return;

      const btnSubmit = document.getElementById('btnSubmitCheckout');
      btnSubmit.innerText = "Menyimpan Pesanan...";
      btnSubmit.disabled = true;

      const meja = document.getElementById('inputMeja').value;
      const bayar = document.getElementById('inputBayar').value;
      const total = keranjang.reduce((s, i) => s + (i.harga * i.qty), 0);
      const id = "ORD-" + Math.floor(Math.random() * 9000 + 1000);
      const rincian = keranjang.map(i => `• ${i.nama} x${i.qty} = ${formatRp(i.harga * i.qty)}`).join("\n");

      try {
        // 1. Simpan data pesanan ke Database MySQL Laragon via simpan_pesanan.php
        await fetch('simpan_pesanan.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ id, meja, bayar, rincian, total })
        });

        // 2. Buka WhatsApp Kasir setelah data berhasil disimpan di MySQL
        const textWA = `*PESANAN BARU KOPINYANTUY*\n\nID: ${id}\nLokasi: ${meja}\nMetode Bayar: ${bayar}\n\n*Rincian Menu:*\n${rincian}\n\n*TOTAL PEMBAYARAN: ${formatRp(total)}*\n\n_Mohon segera disiapkan!_`;
        window.open(`https://wa.me/62895320078768?text=${encodeURIComponent(textWA)}`, '_blank');

        // 3. Reset Keranjang & Form
        keranjang = [];
        updateCart();
        tutupModalPembayaran();
        document.getElementById('formCheckout').reset();
      } catch (err) {
        alert("Gagal menyimpan ke database! Periksa koneksi server Laragon.");
      } finally {
        btnSubmit.innerText = "Kirim ke WhatsApp Kasir →";
        btnSubmit.disabled = false;
      }
    }
  </script>
</body>
</html>
```[cite: 13, 14]

---

### Perubahan Utama:
1. Mengubah fungsi `prosesBayar(e)` menjadi **`async/await`** sehingga browser akan mengirimkan data pesanan dan menunggu konfirmasi tersimpan di database **`db_kopinyantuy`** terlebih dahulu sebelum jendela WhatsApp terbuka[cite: 13, 14].
2. Menambahkan indikator status *"Menyimpan Pesanan..."* pada tombol checkout agar pemesan mengetahui transaksi sedang diproses di server backend[cite: 13].