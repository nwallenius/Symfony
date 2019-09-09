<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;


class EsimerkitController {
    // Kontrollerit tulee tänne


    // Harjoitus 1 (tehtiin hiukan erilailla kuin tehtävänannossa)
    public function laskePalkka() {
        $nettopalkka = 4500 * 0.7;

        // Pyydetään Response-oliota näyttämään tulos
        return new Response('Bruttopalkkasi on 4500 ja nettopalkkasi on ' . $nettopalkka .'.');
    }

    // Harjoitus 2
    // Testaa onko vuosi karkausvuosi. Käytetään if – else rakennetta. Määrittelin vuoden satunnaiseksi.
    public function tarkistaKarkausvuosi() {
        $vuosi = rand(1,2019);
        if ($vuosi % 4 == 0) {
            return new Response('Vuosi <strong>' . $vuosi .'</strong> on karkausvuosi.');
        } else {
            return new Response('Vuosi <strong>' . $vuosi .'</strong> ei ole karkausvuosi.');
        } 
    }

    // Harjoitus 3
    // Laskee vesiliuoksen pH-arvon, kun tunnetaan vesiliuoksen vetyioni-konsentraatio X
    public function laskePH() {
        $x = 2.13*pow(10,-5);
        $ph = -log10($x);
        return new Response('Kun vesiliuoksen vetyionikonsentraatio on ' . $x .' mol/l, sen pH on ' . number_format($ph, 1));
    }


    // Harjoitus 4
    // Tulostaa nopan silmäluvun (1-6). Käytetään PHP-kielen satunnaisluku-funktiota
    public function heitaNoppaa() {
        $noppa = rand(1,6);
        return new Response("Nopan silmäluku on " . $noppa .".");
    }


    // Harjoitus 5
    // Näyttää taulukkoon talletetut tiedot JSON-formaatissa
    public function naytaJSON() {
        // Henkilö-taulukko
        $nimet = [
            'Etunimi' => 'Pekka',
            'Sukunimi' => 'Nieminen'
        ];
        // Pyydetään Response-oliota näyttämään tulos
        return new JsonResponse($nimet);
    }


    /* 
    Harjoitus 6 - Extraharjoitus - Lihapiirakkaongelma
    Lisää loppuun kontrolleri (lihapiirakka) joka tutkii, onko henkilöllä varaa ostaa lihapiirakka. 
    Jos on, niin lompakon rahamäärästä vähennetään lihapiirakan hinta. 
    Jos rahaa ei ole tarpeeksi, niin henkilöä kehotetaan paastoamaan. 
    Henkilöllä on lompakossa rahaa 10 euroa ja lihapiirakan hinta on 2.5 euroa. 
    */
    public function lihapiirakka() {
        $rahaa = 10;
        $lihis = 2.5;
        if ($rahaa >= $lihis) {
            $rahaa = $rahaa - $lihis;   // $rahaa -= $lihis;
            return new Response('Lompakkoon jää rahaa ' . $rahaa .' euroa.');
        } else {
            return new Response('Pitäiskö sun vähän paastota!?!');
        }
    }
    

}

?>