<?php

namespace App\Livewire;

use App\Models\PodesavanjaModel;
use Illuminate\Support\Facades\Artisan;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Podesavanja extends Component
{
    public $podesavanja;
    #[Validate('required|min:1')]
    public $firma;
    #[Validate('required|min:3')]
    public $drajver;
    #[Validate('required|min:3')]
    public $putanja;
    public $email;
    public $zvuk;
    public $napredne = null;

    public function snimi()
    {
        $this->validate();
        $this->podesavanja->firma = $this->firma;
        $this->podesavanja->drajver = $this->drajver;
        $this->podesavanja->putanja = $this->putanja;
        $this->podesavanja->email = $this->email;
        $this->podesavanja->zvuk = $this->zvuk;
        $this->podesavanja->save();

        alert('Podaci su snimljeni');
    }
    public function obrisiSve()
    {
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed');
        Artisan::call('cache:clear');

        alert('Podaci su obrisan','danger');
    }
    public function render()
    {
        $this->podesavanja = PodesavanjaModel::first();
        $this->firma = $this->podesavanja->firma ?? null;
        $this->drajver = $this->podesavanja->drajver ?? null;
        $this->putanja = $this->podesavanja->putanja ?? null;
        $this->email = $this->podesavanja->email ?? null;
        $this->zvuk = $this->podesavanja->zvuk ?? null;

        return view('livewire.podesavanja');
    }
}
