<?php

namespace App\Http\Controllers;

use App\Models\PodesavanjaModel;
use App\Models\PopisDetaljiModel;
use App\Models\PopisModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Mime\Email;


class PopisIzvoz extends Controller
{
    public function izvozCsv($id)
    {
        $detalji = PopisDetaljiModel::select('naziv','barcode','kolicina')
            ->where('id_popis',$id)
            ->get();
        // Naziv fajla
        $fileName = 'izvoz_' . $id . '.txt';

        // Kreiraj sadržaj fajla
        $content = '';
        foreach ($detalji as $detalj) {
            $content .= $detalj->barcode . ',' . $detalj->kolicina . ',' . $detalj->naziv . "\n";
        }

        // Snimi fajl u storage (privremeni direktorijum)
        $filePath = storage_path('app/' . $fileName);
        file_put_contents($filePath, $content);

        // Vraćanje fajla za preuzimanje i automatsko brisanje nakon preuzimanja
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
    public function izvozMail($id)
    {
        $podesavanja = PodesavanjaModel::first();
        $popis = PopisModel::with('magacini')->find($id);
        $email = $podesavanja->email;

        $detalji = PopisDetaljiModel::select('naziv', 'barcode', 'kolicina')
            ->where('id_popis', $id)
            ->get();

        // Naziv fajla
        $fileName = 'izvoz_' . $id . '.txt';

        // Kreiraj sadržaj fajla
        $content = '';
        foreach ($detalji as $detalj) {
            $content .= $detalj->barcode . ',' . $detalj->kolicina . ',' . $detalj->naziv . "\n";
        }

        // Snimi fajl u storage
        $filePath = storage_path('app/' . $fileName);
        file_put_contents($filePath, $content);

        // Pošalji email
        Mail::send([], [], function ($message) use ($email, $filePath, $fileName,$popis) {
            $message->to($email)
                ->subject('Popis u TXT formatu - '.$popis->magacini->naziv.' Br.'.$popis->broj)
                ->html('<p>U prilogu se nalazi traženi izveštaj.</p>') // Koristi 'html' umesto 'setBody'
                ->attach($filePath, [
                    'as' => $fileName,
                    'mime' => 'text/csv',
                ]);
        });

        // Obriši fajl nakon slanja
        unlink($filePath);
        return true;
    }


}
