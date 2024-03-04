<?php

function find($arrayA, $arrayB, $arrayC)
{

    //koristim ugradjenu metodu PHP-a, ona pronalazi zajednicke elemente iz svih danih nizova
    $skupneVrijednosti = array_intersect($arrayA, $arrayB, $arrayC);

    //ovdje implementiram ugradjenu metodu array_diff koja pronalazi jedinstvene elemente, odnosno one koji se nalaze samo u jednome nizu
    $samostalnoA = array_diff($arrayA, $arrayB, $arrayC);
    $samostalnoB = array_diff($arrayB, $arrayA, $arrayC);
    $samostalnoC = array_diff($arrayC, $arrayA, $arrayB);

    echo "U sva tri niza se nalaze znakovi: " . "[" . implode(', ', $skupneVrijednosti) . "]" . "<br> \r";
    echo "Samo u nizu \$arrayA se nalaze znakovi: " . "[" . implode(', ', $samostalnoA) . "]" . "<br> \r";
    echo "Samo u nizu \$arrayB se nalaze znakovi: " . "[" . implode(', ', $samostalnoB) . "]" . "<br> \r";
    echo "Samo u nizu \$arrayC se nalaze znakovi: " . "[" . implode(', ', $samostalnoC) . "]" . "<br> \r";
}

$arrayA = ['a', 'b', 'c', 'dd', '234', '22', 'rc'];
$arrayB = ['a', 'b2', 'c', 'dad', 'rc', '24', '222'];
$arrayC = ['222', 'a', 'be', 'rc', 'dd', '234', '22', 'pp'];

find($arrayA, $arrayB, $arrayC);

//ovo rjesenje daje time complexity O(Nˇ2) sto je jako dobro, ali moze i bolje
//rjesenje je moglo i preko hash tablica



echo "<br> <br>";


//rjesenje broj 2, ono koje preferiram, sa dva rjesenja sam samo htio pokazati da razumijem siru sliku ovog problema


//optimalnije rjesenje, daje O(n) vremensku složenost,
//oba rješenja su jako brza, no ovo je optimalnije i pogodnije, 
//zato što jednako brzo radi i za ogromne setove podataka
function findByHash($arrayA, $arrayB, $arrayC): void
{

    //stvaranje hash tablica za svaki niz
    //metodom flip mijenjamo indeks i njegovu vrijednost
    //na nacin da ta vrijednost sada postaje kljuc hash tablice

    $hashTableA = array_flip($arrayA);
    $hashTableB = array_flip($arrayB);
    $hashTableC = array_flip($arrayC);

    //traženje zajedničkih vrijednosti u sva 3 niza, metodom array_intersect_ke
    //ona traži po ključu koji je zapravo vrijednost originalnog niza
    //uspoređuje ih u svim nizovima koje prima
    //vraća nam uparene vrijednosti

    $zajednickeVrijednosti = array_intersect_key($hashTableA, $hashTableB, $hashTableC);

    //pronalazak vrijednosti koje su unikati

    $unikatneVrijednosti = [];


    foreach ($arrayA as $value) {
        if (!isset($hashTableB[$value]) && !isset($hashTableC[$value])) {
            $unikatneVrijednosti['arrayA'][] = $value;
        }
    }

    foreach ($arrayB as $value) {
        if (!isset($hashTableA[$value]) && !isset($hashTableC[$value])) {
            $unikatneVrijednosti['arrayB'][] = $value;
        }
    }

    foreach ($arrayC as $value) {
        if (!isset($hashTableA[$value]) && !isset($hashTableB[$value])) {
            $unikatneVrijednosti['arrayC'][] = $value;
        }
    }

    //array_keys metoda vraca kljuceve hash tablice tog niza, bez nje, dobili bi samo indekse tog niza, odnosno 0,6
    echo "U sva tri niza nalaze se slijedeći elementi: " . implode(", ", array_keys($zajednickeVrijednosti)) . "<br>";
    foreach ($unikatneVrijednosti as $arrayName => $values) {
        echo "Samo u nizu $arrayName se nalaze znakovi: [" . implode(", ", $values) . "]<br>";
    }
}


$arrayA = ['a', 'b', 'c', 'dd', '234', '22', 'rc'];
$arrayB = ['a', 'b2', 'c', 'dad', 'rc', '24', '222'];
$arrayC = ['222', 'a', 'be', 'rc', 'dd', '234', '22', 'pp'];

findByHash($arrayA, $arrayB, $arrayC);
