<?php

// Harjoitukset 8 - 10 (Harjoitus 10 on 8:n twigissä)


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Routing\Annotation\Route;

// Tarvitaan näkymää varten
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class EsimerkitController2 extends AbstractController{
    // Kontrollerit tulee tänne


    // Harjoitus 8
    // Koodaa seuraava kontrolleri. Huomaa miten reitti on määritelty. 
    // Reitti määritellään nyt kontrollerin yläpuolelle (@Route)

    /**
     * @Route("esimerkki/esim8")
     */
    public function laskePakkasasteet() {
        // Muuttujat
        $summa = 0;
        $pakkaspaivat = 0;
        $tekija = "Noora Wallenius";
        $mittausviikko = 35;
        $keskiarvo1 = 0;
        $keskiarvo2 = 0;

        // Talletetaan viikon lämpötilat taulukkoon
        $pakkasasteet = [
            'ma' => 6,
            'ti' => 3,
            'ke' => -2,
            'to' => -4,
            'pe' => 1,
            'la' => 0,
            'su' => -5
        ];

        // Lasketaan pakkaspäivien summa
        foreach ($pakkasasteet as $pakkasaste) {
            if ($pakkasaste < 0) {
                $summa += $pakkasaste;
                $pakkaspaivat += 1;
            }
        }

        // Lasketaan pakkaspäivien keskiarvo yhdellä desimaalilla
        $keskiarvo1 = number_format(($summa / $pakkaspaivat), 1);

        // Lasketaan koko viikon keskilämpötila yhdellä desimaalilla
        $keskiarvo2 = number_format(array_sum($pakkasasteet) / count($pakkasasteet), 1);

        // Kutsutaan näkymää ja lähetetään sille dataa sisältävät muuttujat
        return $this->render('esimerkit/pakkasasteet.html.twig', [
            'pakkasasteet' => $pakkasasteet,
            'keskiarvo1' => $keskiarvo1,
            'keskiarvo2' => $keskiarvo2,
            'viikko' => $mittausviikko,
            'tekija' => $tekija
        ]);

    }



    // Harjoitus 9
    // Nyt kun tunnet Twigistä tulostus komennon, niin koodaa harjoitukset 1 – 6 uudelleen seuraavasti:
    //    reititys määritetään uudella tavalla
    //    tulostuksen hoitaa Twig
    //    tallenna kaikki Twig-tiedostot esimerkit-kansioon (muista että twig-tiedoston pääte on *.html.twig
    
    
    
    // Harjoitus 1 uudella tavalla
    /**
     * @Route("esimerkki/esim9_1")
     */
    public function laskePalkka() {
        $nettopalkka = 4500 * 0.7;
        return $this->render('esimerkit/palkka.html.twig', [
            'nettopalkka' => $nettopalkka
        ]);
    }


    // Harjoitus 2 uudella tavalla
    /**
     * @Route("esimerkki/esim9_2")
     */
    public function tarkistaKarkausvuosi() {
        $vuosi = rand(1,2019);
        return $this->render('esimerkit/karkausvuosi.html.twig', [
            'vuosi' => $vuosi
        ]);
    }


    // Harjoitus 3 uudella tavalla
    /**
     * @Route("esimerkki/esim9_3")
     */
    public function laskePH() {
        $x = 2.13*pow(10,-5);
        $ph = -log10($x);
        return $this->render('esimerkit/ph.html.twig', [
            'vesiliuoksenKonsentraatio' => $x,
            'ph' => number_format($ph, 1)
        ]);
    }


    // Harjoitus 4 uudella tavalla
    /**
     * @Route("esimerkki/esim9_4")
     */
    public function heitaNoppaa() {
        $noppa = rand(1,6);
        return $this->render('esimerkit/noppa.html.twig', [
            'noppa' => $noppa
        ]);
    }


    // Harjoitus 5 uudella tavalla
    /**
     * @Route("esimerkki/esim9_5")
     */
    public function naytaJSON() {
        $nimet = [
            'Etunimi' => 'Pekka',
            'Sukunimi' => 'Nieminen'
        ];
        return $this->render('esimerkit/json.html.twig', [
            'etunimi' => json_encode($nimet['Etunimi']),    // Ei varmuutta, onko json-muoto näin
            'sukunimi' => json_encode($nimet['Sukunimi'])
        ]);
    }


    // Harjoitus 6 uudella tavalla - Extraharjoitus - Lihapiirakkaongelma
    /**
     * @Route("esimerkki/esim9_6")
     */
    public function lihapiirakka() {
        $rahaa = 10;
        $lihis = 2.5;
        if ($rahaa >= $lihis) {
            $rahaaJaljella = $rahaa - $lihis;   // $rahaa -= $lihis;
            return $this->render('esimerkit/lihapiirakka.html.twig', [
                'rahaa' => $rahaa,
                'lihis' => $lihis,
                'rahaaJaljella' => $rahaaJaljella
            ]);
        } else {
            return $this->render('esimerkit/lihapiirakka.html.twig', [
                'rahaa' => $rahaa,
                'lihis' => $lihis
            ]);
        }
    }


}

?>