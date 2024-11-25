<main id="main" class="main">

    <div class="pagetitle">
        <h1>Podesavanja</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Podesavanja</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Kontrolni Parametri</h5>
                        <x-alert.alertimport/>
                        <!-- Vertical Form -->
                        <form class="row g-3" wire:submit.prevent="snimi">
                            <div class="col-12">
                                <x-form.input label="Firma" naziv="firma"/>
                            </div>
                            <div class="col-12">
                                <x-form.input label="Drajver" naziv="drajver"/>
                            </div>
                            <div class="col-12">
                                <x-form.input label="Putanja" naziv="putanja"/>
                            </div>
                            <div class="col-12">
                                <x-form.input label="Email" naziv="email"/>
                            </div>
                            <div class="col-12">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                           @checked($zvuk) wire:model="zvuk">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Zvuk</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                           @checked($napredne) wire:model.live="napredne">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Napredne Opcije</label>
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary"><span
                                        class="spinner-border spinner-border-sm" role="status" aria-hidden="true"
                                        wire:loading></span>
                                    Snimi
                                </button>
                            </div>
                        </form><!-- Vertical Form -->
                    </div>
                </div>

            </div>

            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Dodatni Parametri</h5>
                        <p>
                            <livewire:import.sync/>
                        </p>
                        @if($napredne)
                            <p>
                                <button class="btn btn-danger" wire:click="obrisiSve"
                                        wire:confirm="Da li zelite da obrisete sve podatke ?">
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"
                                          wire:loading></span>
                                    Obrisi Sve
                                </button>
                            </p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>
