<div class="col-xxl-4 col-md-6 ">
    <x-alert.alertimport />
    <div class="card info-card sales-card">
        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                    <h6>Opcije</h6>
                </li>
                <li><a class="dropdown-item text-danger " href="#" x-on:click="$wire.obrisiPopis">Obrisi popis</a></li>
            </ul>
        </div>

        <div class="card-body" data-bs-toggle="modal" data-bs-target="#popis_{{$popis->id}}">
            <h5 class="card-title">{{$popis->magacini->naziv}} | Popis br.{{$popis->broj}} - <span
                    class="text-danger">{{$popis->naziv}}</span></h5>


            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-boxes"></i>
                </div>
                <div class="ps-3">
                    <h6>{{$unosi}}</h6>
                    <span class="text-success small pt-1 fw-bold"> </span> <span class="text-muted small pt-2 ps-1">unosa</span>
                </div>
            </div>
            <div class="modal fade" id="popis_{{$popis->id}}" tabindex="-1" style="display: none;" aria-hidden="true" wire:ignore>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Popis br.{{$popis->broj}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body row ">
                            <button class="btn btn-primary col" x-on:click="$wire.ucitajPopis">
                                <i class="bi bi-boxes"></i> Nastavi Popis
                            </button>
                            <button class="btn btn-success col" x-on:click="$wire.preuzmi">
                                <i class="bi bi-card-text"></i> Preuzmi TXT
                            </button>
                            <button class="btn btn-warning col" x-on:click="$wire.posaljiMail">
                                <i class="bi bi-envelope-at"></i>  Posalji email
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
