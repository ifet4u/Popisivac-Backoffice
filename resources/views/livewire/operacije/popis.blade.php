<main id="main" class="main">

    <div class="pagetitle">
        @if($popis)
            <h1>{{'Popis '.$popis->broj }} - {{$popis->naziv ?? ''}}
                <button @click="
                                                let unos = prompt('Unesite naziv Popisa');
                                                if (unos) {
                                                    $dispatch('updateNazivPopisa',{ naziv:unos}); // Emitovanje događaja ka Livewire-u
                                                }
                                            "
                        CLASS="btn btn-sm ">
                    {!! ($popis->naziv) ? '<i class="bi bi-pencil-square"></i>' : '<span class="text-danger">Dodaj Naziv</span>'!!}
                </button>
            </h1>
        @else
            <h1>Popis</h1>
        @endif

        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">{{$magacin->naziv ?? 'Odaberite Magacin'}}</li>
                <li class="breadcrumb-item">
                    <a href="#" class="text-" x-on:click="$wire.zameniMagacin()">
                        <i class="bi bi-arrow-left-right"></i>
                        Zamenite magacin
                    </a>
                </li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section ">
        <div class="row">
            <!-- Odabir Magacina -->
            @if(!$magacin)
                @foreach($magacini as $mag)
                    <x-widget.magacin magacin="{!!$mag!!}"/>
                @endforeach
            @endif
            <!-- Odabir Magacina -->

            <!-- Odabir popisa -->
            @if($magacin && !$popis)
                @foreach($popisi as $popislista)
                    <x-widget.popis id="{{$popislista->id}}"/>
                @endforeach
                <div class="col-lg-3 col-md-4 col-sm-6 ">
                    <div class="card bg-primary-light"
                         wire:click="odaberiBroj()"
                         wire:confirm="Formirati novi Popis ?">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <h3><i class="bi bi-folder-plus"></i> Novi Popis</h3>
                        </div>
                    </div>
                </div>
            @endif
            <!-- Odabir popisa -->

            <!-- Popisivanje  -->
            @if($popis && $magacin)
                <div class="col-lg-4 col-md-6 col-sm-12 m-sm-0 p-sm-0 m-md-2 p-md-2">
                    <div class="card ">
                        <div class="card-body">
                            @if($traziNaziv)
                                <x-form.pretraganaziv :$pretraga :$rezultatiPretrage/>
                            @else
                                <x-form.pretragabarkod />
                            @endif

                            <div class="mb-2">
                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="basic-addon1">ID</span>
                                    <input type="text" class="form-control" value="{{$artikal->id ?? ''}}" disabled>
                                </div>


                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group mb-2">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="ri-barcode-fill"></i></span>
                                            <input type="text" class="form-control"
                                                   wire:model="noviBarcode" @disabled(!$noviArtikal)>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group mb-2">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-tags"></i></span>
                                            <input type="text" class="form-control"
                                                   wire:model="cena" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="bi bi-file-font"></i></span>
                                    <input type="text" class="form-control" id="noviNaziv"
                                           wire:model="noviNaziv" @disabled(!$noviArtikal)
                                           x-on:keydown.enter="document.getElementById('kolicina').focus()"
                                    >

                                </div>
                                @error('noviNaziv')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <form id="dodaj" wire:submit.prevent="dodaj">
                                <div class="mb-2">
                                    <input type="number" id="kolicina" class="form-control w-100"
                                           placeholder="Kolicina"
                                           x-data
                                           wire:model="kolicina">
                                    @error('kolicina')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div>
                                    <button class="btn btn-lg btn-danger w-100" wire:loading.attr="disabled">Dodaj</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
            <!-- Popisivanje  -->
            <!-- Poipisna lista  -->
            @if($popis)
                <livewire:operacije.popisnalista id="{{$popis->id}}"/>
            @endif
            <!-- Poipisna lista  -->
            <audio id="beep" src="{{asset('assets/beep.mp3')}}" preload="auto"></audio>
            <audio id="posbeep" src="{{asset('assets/posbeep.mp3')}}" preload="auto"></audio>
            <audio id="beep2" src="{{asset('assets/beep2.mp3')}}" preload="auto"></audio>
        </div>
    </section>
    @script
    <script>
        Livewire.on('fokus-kolicina', () => {
            document.getElementById('kolicina').focus();

            let audio = document.getElementById('posbeep');
            if (audio) {
                audio.play(); // Reprodukuj zvuk
            }
        });
        Livewire.on('artikal-unesen', () => {
            document.getElementById('barkod').focus();

            let audio = document.getElementById('beep');
            if (audio) {
                audio.play(); // Reprodukuj zvuk
            }
        });
        Livewire.on('novi-artikal', () => {
            document.getElementById('noviNaziv').focus();

            let audio = document.getElementById('beep2');
            if (audio) {
                audio.play(); // Reprodukuj zvuk
            }

        });
    </script>
    @endscript
    <script src="{{asset('assets/js/html5-qrcode.min.js')}}"></script>
</main>
