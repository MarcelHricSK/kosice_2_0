<header class="header no-print">
  <div class="header__wrapper">
    <div class="header__left">
      <img src="{{ asset('media/logo.png') }}" alt="" class="header__logo">
    </div>
    @auth('admin')
      <div class="header__right">
        <a href="{{ 1 }}" class="header-link">
          Prihlásiť sa
        </a>
      </div>
    @endauth
  </div>
</header>
