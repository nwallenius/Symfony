<?php

// Harjoitukset 11 - 13


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Routing\Annotation\Route;

// Tarvitaan näkymää varten
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class EsimerkitController3 extends AbstractController{
    // Kontrollerit tulee tänne


    // Harjoitus 11
    /**
     * @Route("esimerkki/esim11/uutiset/{slug}")
     */
    public function nayta($slug) {
        $kommentit = [
            'Muropaketin arvostelun mukaan Control on viiden tähden täysosuma!',
            'Apple Arcade toimii iPhoneilla ja iPadeillä sekä Macilla ja Apple TV:llä!',
            'PlayStation Blog on jälleen listannut viikon suurimmat PS4-julkaisut!'
        ];
        return $this->render('esimerkit/nayta.html.twig', [
            'otsikko' => $slug,
            'kommentit' => $kommentit
        ]);
    }


    // Harjoitus 12
    /**
     * @Route("esimerkki/esim12/{bruttopalkka}")
     */
    public function laskePalkka($bruttopalkka) {
        $nettopalkka = $bruttopalkka * 0.7;
        return $this->render('esimerkit/palkka2.html.twig', [
            'nettopalkka' => $nettopalkka,
            'bruttopalkka' => $bruttopalkka
        ]);
    }
    


    // Harjoitus 13
    /**
     * @Route("esimerkki/esim13")
     */
    public function laskeKuntopisteet() {

        // Talletetaan kuntoilijoiden tiedot taulukkoon
        $kuntoilijat = [
            'k1' => ['Arwid Lee', 10, 5, 20], // nimi, holkkaKm, hiihtoKm, kavelyKm
            'k2' => ['Pekka', 64, 27, 0],
            'k3' => ['Ville', 10, 0, 8],
            'k4' => ['Salla', 8, 4, 63]
        ];

        return $this->render('esimerkit/kuntopisteet.html.twig', [
            'kuntoilijat' => $kuntoilijat,
        ]);
    
    }


    /* TOINEN VERSIO: 

        // Talletetaan kuntoilijoiden tiedot taulukkoon
        $kuntoilijat = [
            'k1' => ['Arwid Lee', 10, 5, 20], // nimi, holkkaKm, hiihtoKm, kavelyKm
            'k2' => ['Pekka', 64, 27, 0],
            'k3' => ['Ville', 10, 0, 8],
            'k4' => ['Salla', 8, 4, 63]
        ];

        $kuntopisteet1 = $kuntoilijat['k1']['1'] * 4 + $kuntoilijat['k1']['2'] * 2 + $kuntoilijat['k1']['3'] * 1;
        $kuntopisteet2 = $kuntoilijat['k2']['1'] * 4 + $kuntoilijat['k2']['2'] * 2 + $kuntoilijat['k2']['3'] * 1;
        $kuntopisteet3 = $kuntoilijat['k3']['1'] * 4 + $kuntoilijat['k3']['2'] * 2 + $kuntoilijat['k3']['3'] * 1;
        $kuntopisteet4 = $kuntoilijat['k4']['1'] * 4 + $kuntoilijat['k4']['2'] * 2 + $kuntoilijat['k4']['3'] * 1;
        
        return $this->render('esimerkit/kuntopisteetTesti.html.twig', [
            'kuntoilijat' => $kuntoilijat,
            'kuntopisteet1' => $kuntopisteet1,
            'kuntopisteet2' => $kuntopisteet2,
            'kuntopisteet3' => $kuntopisteet3,
            'kuntopisteet4' => $kuntopisteet4
        ]);
    */
    

    /* AJATUKSIA:
    
        foreach($kuntoilijat as $kuntoilija) {
            $kuntopisteet = $kuntoilija['1'] * 4 + $kuntoilija['2'] * 2 + $kuntoilija['3'] * 1;
        }

        foreach($kuntoilijat as $kuntoilija) {
            $nimi = $kuntoilija['0'];
            $holkkaKm = $kuntoilija['1'];
            $hiihtoKm = $kuntoilija['2'];
            $kavelyKm = $kuntoilija['3'];
            $kuntopisteet = $kuntoilija['1'] * 4 + $kuntoilija['2'] * 2 + $kuntoilija['3'] * 1;
        }

        'nimi' => $nimi,
        'holkka' => $holkkaKm,
        'hiihto' => $hiihtoKm,
        'kavely' => $kavelyKm,
        'kuntopisteet' => $kuntopisteet,
    */

    /* ALKUPERÄINEN VERSIO:

        // Talletetaan kuntoilija tiedot taulukkoon
        $kuntoilija = [
            'nimi' => 'Arwid Lee',
            'holkkaKm' => 10,
            'hiihtoKm' => 5,
            'kavelyKm' => 20
        ];

        $holkkaPisteet = $kuntoilija['holkkaKm'] * 4;
        $hiihtoPisteet = $kuntoilija['hiihtoKm'] * 2;
        $kavelyPisteet = $kuntoilija['kavelyKm'] * 1;

        $kuntopisteet = $holkkaPisteet + $hiihtoPisteet + $kavelyPisteet;

        return $this->render('esimerkit/kuntopisteetTesti.html.twig', [
            'holkka' => $kuntoilija['holkkaKm'],
            'hiihto' => $kuntoilija['hiihtoKm'],
            'kavely' => $kuntoilija['kavelyKm'],
            'kuntopisteet' => $kuntopisteet,
            'nimi' => $kuntoilija['nimi']
        ]);
    }
    */

}

?>