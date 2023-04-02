<header class="header no-print">
  <div class="header__wrapper">
    @auth('admin')
      <div class="header__right">
        <div class="header__buttons">
          <div class="language-selector mr-1">
            <div
              class="button button--small button--square button--secondary-dark" data-action="open-language-selector">
              <img class="button__ico button__ico--flag" src="{{ asset('media/flags/' . app()->getLocale() . '.svg') }}"
                   alt="">
            </div>
            {{--<div class="language-selector__dropdown closed" id="language_selector_dropdown">
              @foreach(\NeKommerce\Core\Models\Language\Language::all() as $language)
                @if($language->code == config('settings.default_language'))
                  @continue
                @endif
                <a href="{{ route('admin::language.change', ['language' => $language->code]) }}"
                   class="button button--small button--square button--transparent" data-action="open-language-selector">
                  <img class="button__ico button__ico--flag"
                       src="{{ asset('media/flags/' . $language->code . '.svg') }}"
                       alt="">
                </a>
              @endforeach
            </div>--}}
          </div>
          {{--<div class="notifications">
            <div
              class="notifications__button{{ $unreadNotificationsCount ? ' notifications__button--alert' : '' }} button button--small button--square button--secondary-dark"
              data-action="open-notifications">
              <svg class="ico ico--x-small" viewBox="0 0 24 24">
                <path
                  d="M21,19V20H3V19L5,17V11C5,7.9 7.03,5.17 10,4.29C10,4.19 10,4.1 10,4A2,2 0 0,1 12,2A2,2 0 0,1 14,4C14,4.1 14,4.19 14,4.29C16.97,5.17 19,7.9 19,11V17L21,19M14,21A2,2 0 0,1 12,23A2,2 0 0,1 10,21"/>
              </svg>
            </div>
            --}}{{--<div class="notifications__dropdown closed" id="notifications_dropdown">
              @forelse($notifications as $notification)
                <div class="notification{{ $notification->read_at ? ' notification--seen' : '' }}">
                  <div class="notification__content">
                    {!! isset($notification['data']['message']) ? __('core::app.notification.message.' . $notification['data']['message'], $notification['data']) : '' !!}
                  </div>
                  <div class="notification__time">
                    {{ \NeKommerce\Core\Helpers\TimeHelper::serializeElapsedTime($notification->created_at, config("settings.date_format") . " " . config("settings.time_format")) }}
                  </div>
                </div>
              @empty
                <div
                  class="notifications__row notifications__row--empty">{{ __('core::app.context.notification.empty') }}</div>
              @endforelse
            </div>--}}{{--
          </div>--}}
        </div>
        <div class="header__separator"></div>
        <div class="header__auth" data-action="open_drawer">
          <div class="auth__wrapper">
            @php
              $admin = auth()->guard('admin')->user();
            @endphp
            <div class="auth__img mr-4"><span
                class="auth__img-initial">{{ strtoupper(str_split($admin->name)[0]) }}</span></div>
            <span class="auth__name">{{ $admin->name }}</span>
          </div>
        </div>
      </div>
    @endauth
  </div>
</header>
