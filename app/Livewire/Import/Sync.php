<?php

namespace App\Livewire\Import;

use App\Http\Controllers\DB;
use App\Models\ArtikliModel;
use App\Models\Backoffice;
use App\Models\BarkodModel;
use App\Models\MagacinModel;
use App\Models\PodesavanjaModel;
use Livewire\Component;

class Sync extends Component
{
    public $artikli = [];
    public $barcode = [];
    public $uspesno = null;

    public function sync()
    {
        // podaci
        $podaci = Backoffice::podaci();
        $podesavanja = PodesavanjaModel::first();
        $podesavanja->firma = $podaci['naziv'];
        $podesavanja->email = $podaci['email'];
        $podesavanja->save();

        // Artikli
        $artikli = Backoffice::artikli();
        collect($artikli)->chunk(500)->each(function ($chunk) {
            ArtikliModel::upsert(
                $chunk->toArray(),
                ['id'], // Unique keys
                ['naziv', 'cena', 'barcode','jm','ps'] // Columns to update if a match is found
            );
        });
        // Barkodovi
        $barcodes = Backoffice::barkodovi();
        //dump($barcodes);
        collect($barcodes)->chunk(500)->each(function ($chunk) {
            BarkodModel::upsert(
                $chunk->toArray(),
                ['id'], // Unique keys
                ['barcode', 'id_artikal'] // Fields to update
            );
        });
        // Magacini
        $magacini = Backoffice::magacini();

        MagacinModel::upsert(
            $magacini,
            ['id'],
            ['naziv','broj','adresa','grad']
        );


        $this->uspesno = true;

    }

    public function render()
    {
        $this->artikli = ArtikliModel::get();
        $this->barcode = BarkodModel::get();
        return view('livewire.import.sync');
    }
}
