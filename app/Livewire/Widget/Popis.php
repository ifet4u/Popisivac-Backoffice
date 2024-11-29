<?php

namespace App\Livewire\Widget;

use App\Http\Controllers\PopisIzvoz;
use App\Models\PopisDetaljiModel;
use App\Models\PopisModel;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Popis extends Component
{
    public $id;
    public $popis;
    public $unosi;

    public function mount($id)
    {
        $this->id = $id;
        $this->popis = PopisModel::with('magacini')->find($id);

    }

    public function preuzmi(PopisIzvoz $popis)
    {
        alert('Uspesno Izvezeno');
        return $popis->izvozCsv($this->id);
    }

    public function ucitajPopis()
    {

        $this->redirect('/popis/'.$this->popis->id);
    }

    public function posaljiMail(PopisIzvoz $popis)
    {
        $mail = $popis->izvozMail($this->id);
        if ($mail) {
            alert('Mail je uspesno poslat');
        }
    }

    public function render()
    {
        $this->unosi = PopisDetaljiModel::where('id_popis', $this->popis->id)->count();
        return view('livewire.widget.popis');
    }
}
