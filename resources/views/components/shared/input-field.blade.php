@props([
    'id',
    'type' => 'text',
    'name',
    'placeholder' => '' ,
    'value' => '',
    ])

    <div class="mb-3 ">
        <label for="{{ $id }}" class="form-label">{{$slot}}</label>

        @if ($type == 'textarea')

        <textarea class="form-control" id="{{$id}}"
            rows="3" name="{{ $name }}">{{ $value }}</textarea>
        @else
        <input type="{{ $type }}" class="form-control"
                name="{{$name}}" id="{{ $id }}"
                placeholder="{{ $placeholder }}" value="{{ $value }}">
        @endif

        @error("$name")
                <span class="text-danger"> {{ $message }}</span>
        @enderror
    </div>
