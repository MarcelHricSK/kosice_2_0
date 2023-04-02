@extends('dashboard.template.without_header')

@section('title', format_title(__('seo.title.auth.login')))

@section('content')
  <div class="content">
    <div class="content__wrapper">
      <div class="login">
        <div class="login__wrapper">
          <form class="form" action="{{ route('admin.login') }}" method="POST">
            @csrf
            <h1 class="login__header heading heading--2 mb-2">{{ __('app.title.auth.login') }}</h1>
            <span
              class="login__subheader mb-8">{!! __('app.context.auth.login_subheader', ['name' => config('settings.app_name')]) !!}</span>
            <label class="label label--required mb-4" for="email"><span
                class="label__text">{{ __('form.field.auth.email') }}</span>
              <input class="input input--secondary @error('email')input--error @enderror" type="email"
                     name="email"
                     id="email__input"
                     placeholder="{{ __('form.field.auth.email') }}"
                     value="{{ old('email') }}" required="required">
              @error('email')
              <span class="d-block fs-m color-error mt-1">{{ $message }}</span>
              @enderror
            </label>

            <label class="label label--required mb-8" for="password__input"><span
                class="label__text">{{ __('form.field.auth.password') }}</span>
              <input class="input input--secondary" type="password"
                     name="password"
                     id="password__input"
                     placeholder="{{ __('form.field.auth.password') }}" required="required">
            </label>
            <div class="split split--space-between split--fluid split--y-center">
              <div class="login__remember">
                <label class="login__remember-label" for="remember">
                  <div class="checkbox-wrapper mr-3">
                    <input type="checkbox" class="checkbox pseudo" name="remember"
                           id="remember" {{ old('remember', false) ? 'checked=checked' : '' }}/>
                    <div class="checkbox__body">
                      <svg class="checkbox__icon icon icon--white" viewBox="0 0 8 6">
                        <path
                          d="M2.71715 5.88216L0.117152 3.26721C-0.0390508 3.11011 -0.0390508 2.85539 0.117152 2.69827L0.682825 2.12933C0.839028 1.97221 1.09231 1.97221 1.24851 2.12933L3 3.89087L6.75149 0.117826C6.90769 -0.0392753 7.16097 -0.0392753 7.31718 0.117826L7.88285 0.686767C8.03905 0.843868 8.03905 1.09859 7.88285 1.25571L3.28284 5.88218C3.12662 6.03928 2.87336 6.03928 2.71715 5.88216Z"/>
                      </svg>
                    </div>
                  </div>
                  {{ __('form.field.auth.remember') }}
                </label>
              </div>
              <button class="button" type="submit">{{ __('form.action.login') }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
