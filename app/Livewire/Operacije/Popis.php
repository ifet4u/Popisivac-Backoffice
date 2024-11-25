<?php

namespace App\Livewire\Operacije;

use App\Models\ArtikliModel;
use App\Models\MagacinModel;
use App\Models\PopisDetaljiModel;
use App\Models\PopisModel;
use Livewire\Attributes\On;
use Livewire\Attributes\Session;
use Livewire\Attributes\Validate;
use Livewire\Component;
use function Pest\Laravel\post;

class Popis extends Component
{
    public $magacini;
    public $popisi;

    #[Session]  // problemi sa sesijama. Proveri o cemu se radi
    public $popis;
    #[Session]
    public $magacin;
    #[Validate('required',message: 'Barkod je obavezan')]
    public $barkod;
    #[Validate('required',message: 'Unesite Kolicinu')]
    public $kolicina;
    public $artikal = null;
    public $noviArtikal = false;
    #[Validate('required',message:'Naziv je obavezan')]
    public $noviNaziv ;
    public $noviBarcode;
    public function mount($id = null)
    {
        if($id){
            $this->popis = PopisModel::find($id);
            $this->magacin = MagacinModel::find($this->popis->magacin);
        }

        $this->magacini = MagacinModel::get();

    }
    public function odaberiMagacin($id)
    {
        $this->magacin = MagacinModel::find($id);
        $this->popis = null;

        if($this->magacin){
            $this->popisi = PopisModel::with('magacini')
                ->where('magacin',$this->magacin->id)
                ->get();
        }

    }
    public function zameniMagacin()
    {
        $this->magacin = null;
        $this->popis = null;
    }
    public function odaberiBroj($br = null)
    {
      if ($br){
          $this->popis = PopisModel::find($br);
      } else {

          $popis = PopisModel::latest()->first();
          $broj = ($popis) ? $popis->broj + 1 : 1 ;

          $novi = PopisModel::create([
              'broj' => $broj,
              'magacin' => $this->magacin->id,
              'operater'=> 'Operater 1', // resi unos operatera
              'vrednost'=> 0
          ]);

          $this->popis = $novi;
      }

    }
    public function skeniraj()
    {
        $this->validateOnly('barkod');
        $this->artikal = ArtikliModel::where('barcode',$this->barkod)
                                ->orWhere('id',$this->barkod)
                                ->first();
        if ($this->artikal){
            $this->noviArtikal = false;
            $this->noviNaziv = preslovi($this->artikal->naziv);
            $this->noviBarcode = $this->artikal->barcode;
            $this->dispatch('fokus-kolicina');

        } else{
            $this->noviArtikal = true;
            $this->noviBarcode = $this->barkod;

            $this->dispatch('novi-artikal');
        }
    }
    public function dodaj()
    {
        $this->validate();
        $art = PopisDetaljiModel::create([
            'id_popis' => $this->popis->id,
            'barcode' => $this->noviBarcode,
            'naziv' =>  $this->noviNaziv,
            'kolicina'=> $this->kolicina,
            'jm'=> $this->artikal->jm ?? null,
            'st'=>$this->artikal->ps ?? null
        ]);
        $this->dispatch('artikal-unesen');
        $this->reset('artikal','kolicina','barkod','noviNaziv','noviBarcode');

    }
    #[On('updateNazivPopisa')]
    public function updateNazivPopisa($naziv)
    {
        $this->popis->naziv = $naziv;
        $this->popis->save();
    }
    public function render()
    {

        if($this->magacin && !$this->popisi){
            $this->popisi = PopisModel::with('magacini')
                ->where('magacin',$this->magacin->id)
                ->get();
        }
        return view('livewire.operacije.popis');
    }
}
