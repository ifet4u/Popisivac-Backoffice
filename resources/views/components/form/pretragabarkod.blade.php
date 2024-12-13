<form id="skener" wire:submit.prevent="skeniraj" class="pt-3">
    <div class="input-group mb-2 ">
        <input type="number" class="form-control w-50 text-danger" placeholder="BAR KOD / ID"
               id="barkod"
               wire:model="barkod">
        <button class="btn btn-outline-danger w-25" type="submit">
            <i class="bi bi-upc-scan"></i>
        </button>
        <x-form.pretragasw />
    </div>
    @error('barkod')
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
</form>
