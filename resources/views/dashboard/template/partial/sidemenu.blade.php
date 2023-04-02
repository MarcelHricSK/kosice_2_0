<aside class="menu no-print">
  <div class="menu__wrapper">
    <a href="{{ route('admin.home') }}" class="menu__logo-link">
      <img class="menu__logo-img" src="{{ asset('media/logo.svg') }}" alt="">
    </a>
    <ul class="menu__items">
      <li class="menu__group mb-4">
        <ul>
          <li class="menu__item{{ request()->is(eq_admin_route()) ? ' menu__item--active' : '' }}">
            <a class="menu__item-link"
               href="{{ route('admin.home') }}">{{ __('menu.item.overview') }}</a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</aside>
