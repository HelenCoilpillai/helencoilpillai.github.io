<div class="{{ $divClass }}">
    <label for="{{ $labelFor ?? '' }}" class="{{ $labelClass ?? '' }}"> {{ $label }} </label>
    <input class="form-control {{ $class ?? '' }}" id="{{ $id ?? '' }}" name="{{ $name ?? '' }}"
           type="{{ $type }}" value="{{ $value ?? '' }}">
</div>
