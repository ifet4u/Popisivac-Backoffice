@props([
    'pretraga',
    'rezultatiPretrage'
])
<form id="skener" wire:submit.prevent="pretrazi" class="pt-3">
    <div class="input-group mb-2">
        <input type="text" class="form-control w-50 text-primary " placeholder="NAZIV"
               id="barkod"
               @click="$wire.pretraga = ''"
               autocomplete="off"
               wire:model="pretraga">
        <button class="btn btn-outline-primary w-25" type="submit">
            <i class="bi bi-search"></i>
        </button>
        <x-form.pretragasw boja="primary"/>
    </div>
    @error('pretraga')
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
    <!-- Basic Modal -->
    <div class="modal fade m-0 p-0" id="traziModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Rezultati - {{$pretraga ??''}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if(collect($rezultatiPretrage)->isEmpty()) <h1 class="text-danger">Nema rezultata</h1> @endif
                    <table class="table table-striped">
                        @if($rezultatiPretrage)
                            @foreach($rezultatiPretrage as $art)
                                <tr @click="$wire.odaberiArtikal({{$art->id}})" data-bs-dismiss="modal">
                                    <td>{{preslovi($art->naziv)}}</td>
                                    <td>{{br($art->cena)}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Zatvori</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Basic Modal-->
    @script
    <script>
        window.addEventListener('otvori-modal', event => {
            var modal = new bootstrap.Modal(document.getElementById('traziModal'));
            modal.show();
        });
    </script>
    @endscript
</form>
