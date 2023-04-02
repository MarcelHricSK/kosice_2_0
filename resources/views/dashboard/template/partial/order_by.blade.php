<div class="d-flex flex-column items-right mb-4">
  <label class="label" for="order_by__input">
    <span class="label__text">
      {{ __('form.other.order_by') }}
    </span>
    <select name="order_by" id="order_by__input" class="input input--small" style="width: 20rem;" data-action="auto-change-order">
      @foreach($options as $option)
        <option value="{{ $option['value'] }}"{{ request()->input('order_by') === $option['value'] ? ' selected=selected' : '' }}>{{ $option['name'] }}</option>
      @endforeach
    </select>
  </label>
</div>
