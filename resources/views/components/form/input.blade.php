@props([
     'label' => '',
     'type'  => 'text',
     'naziv' => '',
     'nolabel' => false,
     'live' => false,
     'err' => '',
     'datamask' => null,
     'placeholder' => null,
     'disabled' => null,
     'value'    => null
    ])
@error($naziv)
@php
    $err = 'is-invalid'
@endphp
@enderror
<div {{$attributes}}>
    @if($nolabel == false)
        <label class="form-label">{{$label}}</label>
    @endif
    <input type="{{$type}}" class="form-control {{$err}}"
           @if($live)
               wire:model.live.debounce="{{$naziv}}"
           @else
               wire:model="{{$naziv}}"
           @endif

           @if($datamask)
               data-mask="{{$datamask}}"
           @endif

           @if($placeholder)
               placeholder="{{$placeholder}}"
           @endif

           @if($value)
               value="{{$value}}"
           @endif

        @disabled($disabled)
    />
    @error($naziv)
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

