<?php

namespace App\Livewire\Sifarnik;

use App\Models\ArtikliModel;
use Livewire\Component;
use Livewire\WithPagination;
class Artikli extends Component
{
    use WithPagination;
    //public $artikli;
    public function mount()
    {

    }
    public function render()
    {
        $artikli = ArtikliModel::paginate(25);

        return view('livewire.sifarnik.artikli',[
            'artikli' => $artikli
            ]);
    }
}
