@props([
    'magacin' => null
])
@php
$mag = json_decode($magacin);
@endphp
<div class="col-lg-3 col-md-4 col-sm-6">
    <div class="card"
         wire:click="odaberiMagacin({{ $mag->id }})"
         wire:confirm="Odabrati Magacin {{ $mag->naziv }} ?">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <h3>{{preslovi($mag->naziv)}}</h3>
            <span class="text-secondary">{{preslovi($mag->grad)}} {{preslovi($mag->adresa)}}</span>
        </div>
    </div>
</div>
