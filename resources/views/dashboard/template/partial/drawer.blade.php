@php
  $admin = auth()->guard('admin')->user();
@endphp
<aside class="drawer closed" id="drawer">
  <div class="drawer__wrapper">
    <div class="drawer__content">
      <div class="drawer__data mb-4">
        <div class="drawer__info">
          <div class="drawer-img mr-8"><span class="drawer-img__letter">{{ strtoupper(substr($admin->name, 0, 1)) }}</span></div>
          <div class="drawer-summary">
            <div class="drawer-summary__name">{{ $admin->name }}</div>
            <div class="drawer-summary__username">{{ $admin->email }}</div>
          </div>
        </div>
      </div>
      <div>
        <a href="{{ route('admin.logout') }}" class="button button--primary">Odhlásiť sa</a>
      </div>
    </div>
  </div>
</aside>
