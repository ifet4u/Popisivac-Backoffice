<?php

namespace App\Livewire\Operacije;

use App\Models\PopisDetaljiModel;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
class Popisnalista extends Component
{
    use WithPagination;
    //public $lista ;
    public $popis ;
    public function mount($id)
    {
        $this->popis = $id;
    }
    #[On('artikal-unesen')]
    public function unesenArtikal()
    {
        //unesen Artikal
    }
    public function obrisi($id)
    {
        PopisDetaljiModel::destroy($id);
    }
    public function render()
    {
        $lista = PopisDetaljiModel::where('id_popis', $this->popis)
                    ->orderBy('id','desc')
                    ->paginate(10);
        return view('livewire.operacije.popisnalista', compact('lista'));
    }
}
