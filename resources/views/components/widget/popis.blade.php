@props([
    'popis' => null,
    'id'    => null
])
@php
   $popis = \App\Models\PopisModel::with('magacini')->find($id);
   $unosi= \App\Models\PopisDetaljiModel::where('id_popis',$popis->id)->count();
@endphp
<div class="col-xxl-4 col-md-6 ">
    <div class="card info-card sales-card">

        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                    <h6>Opcije</h6>
                </li>

                <li><a class="dropdown-item" href="#">Ucitaj Popis</a></li>
                <li><a class="dropdown-item" href="#">Izvezi Popis</a></li>
                <li><a class="dropdown-item" href="#">Poslaji na email</a></li>
            </ul>
        </div>

        <div class="card-body"
             wire:click="odaberiBroj({{$popis->id}})"
             wire:confirm="Nastaviti popis {{$popis->broj}}?">
            <h5 class="card-title">{{$popis->magacini->naziv}} | Popis br.{{$popis->broj}} - <span class="text-danger">{{$popis->naziv}}</span></h5>

            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-boxes"></i>
                </div>
                <div class="ps-3">
                    <h6>{{$unosi}}</h6>
                    <span class="text-success small pt-1 fw-bold"> </span> <span class="text-muted small pt-2 ps-1">unosa</span>

                </div>
            </div>
        </div>

    </div>
</div>
