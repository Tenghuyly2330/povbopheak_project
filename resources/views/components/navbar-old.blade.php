<!-- STYLE -->
<style>
   .nav-item {
    position: relative;
    padding-bottom: 6px;
    font-weight: 400;
    transition: font-weight 0.2s ease;
  }

  /* Hover */
  .nav-item:hover {
    font-weight: 600; /* font-semibold */
  }

  /* Active */
  .nav-item.active {
    font-weight: 600; /* font-semibold */
  }
</style>

<div class="w-full mx-auto items-center xl:px-6 lg:px-4 py-6">
    <div class="lg:hidden flex justify-between items-center px-4">
      {{-- Logo of version mobile --}}
      <div class="px-4 flex items-center space-x-2">
        <img src="{{ asset('assets/logo/logo-fina.png') }}" alt="Logo" class="w-12 h-auto">
        <span class="text-[#03254B] font-semibold text-md flex gap-1">
            <span>Pov Bopheak</span>
            <span class="font-medium">Land & Home Co., Ltd</span>
        </span>
      </div>
      <div>
        {{-- Button show meno --}}
        <button class="w-8 h-8">
          <img src="{{ asset('assets/icon/menu-mobile.png') }}" alt="" class="w-full h-full object-cover">
        </button>
        {{-- Button Close menu --}}
        <button class="w-8 h-8">
          <img src="{{ asset('assets/icon/button-close.png') }}" alt="" class="w-full h-full object-cover">
        </button>
      </div>
    </div>
    <!-- MENU -->
    {{-- hidden lg:flex items-center h-22.5 relative xl:left-8 lg:left-2 py-24 text-[#03254b] --}}
   <nav class="hidden lg:flex fixed top-0 left-0 w-full z-50
          h-24 items-center text-[#03254b]
          2xl:px-28.75 xl:px-24 px-0 xl:text-lg lg:text-sm" 
          style="background: linear-gradient(0deg, #B5DEFF 14.02%, rgba(223, 245, 255, 0.748843) 51.26%, rgba(225, 244, 255, 0.501149) 74.75%, rgba(255, 255, 255, 0) 100%);">

    <!-- INNER WRAPPER -->
    <div class="relative flex w-full items-center px-6 max-w-8xl mx-auto space-x-6">

        <!-- MENU -->
        <ul id="navMenu" class="flex xl:space-x-10 lg:space-x-6 space-x-4 text-lg relative">

            <!-- Active underline -->
            <span
                id="activeLine"
                class="absolute -bottom-9 left-0 h-2 transition-all duration-300
                      bg-gradient-to-r from-[#F2A93F] to-[#FFFBA6]">
            </span>

            <li><a href="{{ route('home') }}" class="nav-item">Home</a></li>
            <li><a href="{{ route('home') }}#about-us" class="nav-item">About Us</a></li>
            <li><a href="{{ route('home') }}#real-project" class="nav-item">Real Estate Projects</a></li>
            <li><a href="{{ route('home') }}#our-customer" class="nav-item">Our Customers</a></li>
            <li><a href="{{ route('home') }}#freelancer" class="nav-item">Freelancers</a></li>
            <li><a href="{{ route('home') }}#contact-us" class="nav-item">Contact Us</a></li>

            
            <!-- STATIC LINE UNDER MENU TEXT -->
            <span
                class="absolute -bottom-[34px] -left-[22px] w-full h-0.75 bg-[#03254b] -z-20">
            </span>

        </ul>
        <div class="flex items-center gap-3 mt-8">
          <!-- Logo -->
            <img
                src="{{ asset('assets/logo/logo-fina.png') }}"
                alt="Logo"
                class="w-14 h-auto"
            >

            <!-- Text -->
            <div class="hidden xl:flex items-center text-[#03254B] text-lg leading-none">
                <span class="font-semibold">Pov&nbsp;Bopheak</span>
                <span class="font-normal ml-1"> Land & Home Co., Ltd</span>
            </div>
        </div>
    </div>
  </nav>

</div>

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
