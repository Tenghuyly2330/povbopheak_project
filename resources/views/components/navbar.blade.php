<!-- STYLE -->
<style>
  .nav-item {
    position: relative;
    padding-bottom: 6px;
    font-weight: 400;
    white-space: nowrap;
    /*  VERY IMPORTANT */
    transition: font-weight 0.2s ease;
  }

  .nav-item:hover,
  .nav-item.active {
    font-weight: 600;
  }

  /* Hide horizontal scrollbar */
  .scrollbar-hide::-webkit-scrollbar {
    display: none;
  }

  .scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }
</style>


<div class="w-full mx-auto xl:px-6 lg:px-4">
  <div class="lg:hidden flex justify-between items-center">
    {{-- Logo of version mobile --}}
    <div class="w-[83%] px-3 flex items-center space-x-0 py-2">
      <img src="{{ asset('assets/logo/logo-fina.png') }}" alt="Logo" class="w-10 h-auto">
      <span class="w-full text-[#03254B] font-normal text-[12px] flex">
        <span class="font-semibold">
           {{ app()->getLocale() === 'en'
                ? 'Pov Bopheak'
                : (app()->getLocale() === 'kh'
                    ? 'ក្រុមហ៊ុនពៅបូភ័ក្ត្រ'
                    : 'Pov Bopheak')
            }}
        </span>  
            {{ app()->getLocale() === 'en'
                ? 'Land & Home Co., Ltd'
                : (app()->getLocale() === 'kh'
                    ? 'លែន&ហូមឯ.ក'
                    : 'Land & Home 有限公司')
            }}
      </span>
    </div>
    <div class="w-[15%] lg:hidden px-6">
      <!-- Open menu -->
      <button id="openMenu" class="w-6 h-6">
        <img src="{{ asset('assets/icon/menu-mobile.png') }}" class="w-full h-full object-cover">
      </button>

      <!-- Close menu -->
      <button id="closeMenu" class="w-8 h-8 hidden">
        <img src="{{ asset('assets/icon/button-close.png') }}" class="w-full h-full object-cover">
      </button>
    </div>
  </div>
  <!-- MENU -->
  {{-- hidden lg:flex items-center h-22.5 relative xl:left-8 lg:left-2 py-24 text-[#03254b] --}}
  <nav class="hidden lg:flex w-full z-50
        h-24 items-center text-[#03254b]
        2xl:px-28.75 xl:px-24 px-0 xl:text-lg lg:text-sm py-8">

    <!-- INNER WRAPPER -->
    <div class="relative flex w-full items-center justify-between 2xl:justify-center px-6 max-w-8xl mx-auto">

      <!-- MENU -->
      <ul id="navMenu" class="relative flex flex-nowrap whitespace-nowrap overflow-visible space-x-10 xl:text-lg lg:text-md md:text-sm">

        <!-- Active underline -->
        <span id="activeLine" class="absolute -bottom-9 left-0 h-2 transition-all duration-300
                      bg-gradient-to-r from-[#F2A93F] to-[#FFFBA6] z-20">
        </span>

        <li>
          <a href="{{ route('home') }}" class="nav-item"> 
            {{ app()->getLocale() === 'en'
                ? 'Home'
                : (app()->getLocale() === 'kh'
                    ? 'ទំព័រដើម'
                    : '住宅')
            }}
          </a>
        </li>
        <li>
          <a href="{{ route('home') }}#about-us" class="nav-item">
            {{ app()->getLocale() === 'en'
                ? 'About Us'
                : (app()->getLocale() === 'kh'
                    ? 'អំពីក្រុមហ៊ុន'
                    : '关于公司')
            }}
          </a>
        </li>
        <li>
          <a href="{{ route('home') }}#real-project" class="nav-item">
            {{ app()->getLocale() === 'en'
                ? 'Real Estate Projects'
                : (app()->getLocale() === 'kh'
                    ? 'គម្រោងអចលទ្រព្យ'
                    : '房地产项目')
            }}
          </a>
        </li>
        <li>
          <a href="{{ route('home') }}#our-customer" class="nav-item">
            {{ app()->getLocale() === 'en'
                ? 'Our Customers'
                : (app()->getLocale() === 'kh'
                    ? 'អតិថិជន'
                    : '我们的团队')
            }}
          </a>
        </li>
        <li>
          <a href="{{ route('home') }}#freelancer" class="nav-item">
            {{ app()->getLocale() === 'en'
                ? 'Freelancers'
                : (app()->getLocale() === 'kh'
                    ? 'អ្នកធ្វើការឯករាជ្យ'
                    : '自由工作者')
            }}
          </a>
        </li>
        <li>
          <a href="{{ route('home') }}#contact-us" class="nav-item">
            {{ app()->getLocale() === 'en'
                ? 'Contact Us'
                : (app()->getLocale() === 'kh'
                    ? 'ការទំនាក់ទំនង'
                    : '联系方法')
            }}
          </a>
        </li>


        <!-- STATIC LINE UNDER MENU TEXT -->
        <span class="absolute -bottom-[34px] -left-[22px] w-full h-0.75 bg-[#03254b] z-0">
        </span>

      </ul>

      <div class="flex xl:flex-row lg:flex-col items-center gap-3 mt-8">
        <!-- Logo -->
        <img src="{{ asset('assets/logo/logo-fina.png') }}" alt="Logo" class="w-14 h-auto">

        <!-- Text -->
        <div class="flex xl:flex-row lg:flex-col xl:flex items-center text-[#03254B] text-lg leading-none whitespace-nowrap">
          <span class="font-semibold">
            {{ app()->getLocale() === 'en'
                ? 'Pov Bopheak'
                : (app()->getLocale() === 'kh'
                    ? 'ក្រុមហ៊ុនពៅបូភ័ក្ត្រ'
                    : 'Pov Bopheak')
            }}
          </span>
          <span class="font-normal ml-1">
            {{ app()->getLocale() === 'en'
                ? 'Land & Home Co., Ltd'
                : (app()->getLocale() === 'kh'
                    ? 'លែន&ហូមឯ.ក'
                    : 'Land & Home 有限公司')
            }}
          </span>
        </div>
      </div>
    </div>
  </nav>

  <!-- MOBILE MENU -->
  <div id="mobileMenu" class="lg:hidden fixed top-0 left-0 w-full h-screen bg-white z-50
         transform -translate-y-full transition-transform duration-300">

    <!-- Top bar -->
    <div class="flex justify-between items-center px-6 py-4 border-b">
      <div class="flex items-center gap-2">
        <img src="{{ asset('assets/logo/logo-fina.png') }}" class="w-10">
        <span class="text-[#03254B] font-semibold text-sm whitespace-nowrap">
          {{ app()->getLocale() === 'en'
                ? 'Pov Bopheak Land & Home Co., Ltd'
                : (app()->getLocale() === 'kh'
                    ? 'ក្រុមហ៊ុនពៅបូភ័ក្ត្រលែន&ហូមឯ.ក'
                    : 'Pov Bopheak Land & Home Co., Ltd')
            }}
        </span>
      </div>

      <button id="closeMenuInside" class="w-8 h-8">
        <img src="{{ asset('assets/icon/button-close.png') }}" class="w-full h-full">
      </button>
    </div>

    <!-- Menu links -->
    <ul class="flex flex-col px-6 py-6 space-y-6 text-[#03254b] text-lg font-medium">
      <li><a href="{{ route('home') }}" class="mobile-link">{{ app()->getLocale() === 'en'
                ? 'Home'
                : (app()->getLocale() === 'kh'
                    ? 'ទំព័រដើម'
                    : 'Home')
            }}</a></li>
      <li><a href="{{ route('home') }}#about-us" class="mobile-link">{{ app()->getLocale() === 'en'
                ? 'About Us'
                : (app()->getLocale() === 'kh'
                    ? 'អំពីក្រុមហ៊ុន'
                    : 'About Us')
            }}</a></li>
      <li><a href="{{ route('home') }}#real-project" class="mobile-link">{{ app()->getLocale() === 'en'
                ? 'Real Estate Projects'
                : (app()->getLocale() === 'kh'
                    ? 'គម្រោងអចលទ្រព្យ'
                    : 'Real Estate Projects')
            }}</a></li>
      <li><a href="{{ route('home') }}#our-customer" class="mobile-link"> {{ app()->getLocale() === 'en'
                ? 'Our Customers'
                : (app()->getLocale() === 'kh'
                    ? 'អតិថិជន'
                    : 'Our Customers')
            }}</a></li>
      <li><a href="{{ route('home') }}#freelancer" class="mobile-link">{{ app()->getLocale() === 'en'
                ? 'Freelancers'
                : (app()->getLocale() === 'kh'
                    ? 'អ្នកធ្វើការឯករាជ្យ'
                    : 'Freelancers')
            }}</a></li>
      <li><a href="{{ route('home') }}#contact-us" class="mobile-link">{{ app()->getLocale() === 'en'
                ? 'Contact Us'
                : (app()->getLocale() === 'kh'
                    ? 'ការទំនាក់ទំនង'
                    : 'Contact Us')
            }}</a></li>
    </ul>
  </div>


</div>
<script>
  const mobileLinks = document.querySelectorAll('.mobile-link');

  mobileLinks.forEach(link => {
    link.addEventListener('click', () => {
      closeMobileMenu();
    });
  });
</script>
<script>
  const openMenu = document.getElementById('openMenu');
  const closeMenu = document.getElementById('closeMenu');
  const closeMenuInside = document.getElementById('closeMenuInside');
  const mobileMenu = document.getElementById('mobileMenu');

  function openMobileMenu() {
    mobileMenu.classList.remove('-translate-y-full');
    openMenu.classList.add('hidden');
    closeMenu.classList.remove('hidden');
  }

  function closeMobileMenu() {
    mobileMenu.classList.add('-translate-y-full');
    closeMenu.classList.add('hidden');
    openMenu.classList.remove('hidden');
  }

  openMenu.addEventListener('click', openMobileMenu);
  closeMenu.addEventListener('click', closeMobileMenu);
  closeMenuInside.addEventListener('click', closeMobileMenu);
</script>

<!-- SCRIPT -->
<script>
  const menu = document.getElementById('navMenu');
  const activeLine = document.getElementById('activeLine');
  const items = document.querySelectorAll('.nav-item');

  function moveLine(el) {
    if (!el) return;
    activeLine.style.width = el.offsetWidth + 'px';
    activeLine.style.left = el.offsetLeft + 'px';
  }

  function setActiveByUrl() {
    const currentUrl = window.location.href;

    let activeItem = null;

    items.forEach(item => {
      const href = item.getAttribute('href');

      if (currentUrl.includes(href)) {
        item.classList.add('active');
        activeItem = item;
      } else {
        item.classList.remove('active');
      }
    });

    // Fallback to Home
    if (!activeItem) {
      activeItem = items[0];
      activeItem.classList.add('active');
    }

    moveLine(activeItem);
  }

  // On page load
  window.onload = () => {
    setActiveByUrl();
  };

  // Hover effect
  items.forEach(item => {
    item.addEventListener('mouseenter', () => {
      moveLine(item);
    });

    item.addEventListener('click', () => {
      items.forEach(i => i.classList.remove('active'));
      item.classList.add('active');
      moveLine(item);
    });
  });

  // Restore active on mouse leave
  menu.addEventListener('mouseleave', () => {
    const active = document.querySelector('.nav-item.active');
    moveLine(active);
  });
</script>