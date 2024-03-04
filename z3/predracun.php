<?php


class Predracun
{
    private $brojPredracuna;
    private $usluga;
    private $modelUsluge;
    private $datumIzdavanjaOD;
    private $datumIzdavanjaDO;
    private $brojOsoba;
    private $cijena;
    private $kolicina;
    private $uplata;
    private $nacinPlacanja;
    private $vrijemePlacanja;
    private $iznosUplate;
    private $pristojba;
    private $napomena;

    public function __construct(
        int $brojPredracuna,
        string $usluga = "",
        string $modelUsluge = "",
        DateTime $datumIzdavanjaOD,
        DateTime $datumIzdavanjaDO,
        int $brojOsoba,
        float $cijena,
        int $kolicina,
        string $uplata = "",
        string $nacinPlacanja = "",
        DateTime $vrijemePlacanja,
        float $iznosUplate,
        string $napomena = "",
        string $pristojba = ""

    ) {
        $this->brojPredracuna = $brojPredracuna;
        $this->usluga = $usluga;
        $this->modelUsluge = $modelUsluge;
        $this->datumIzdavanjaOD = $datumIzdavanjaOD;
        $this->datumIzdavanjaDO = $datumIzdavanjaDO;
        $this->brojOsoba = $brojOsoba;
        $this->cijena = $cijena;
        $this->kolicina = $kolicina;
        $this->uplata = $uplata;
        $this->nacinPlacanja = $nacinPlacanja;
        $this->vrijemePlacanja = $vrijemePlacanja;
        $this->iznosUplate = $iznosUplate;
        $this->napomena = $napomena;
        $this->pristojba = $pristojba;
    }


    public function getBrojPredracuna(): int
    {
        return $this->brojPredracuna;
    }

    public function getUsluga(): string
    {
        return $this->usluga;
    }

    public function getModelUsluge(): string
    {
        return $this->modelUsluge;
    }

    public function getDatumIzdavanjaFormatirano(): string
    {
        return $this->datumIzdavanjaOD->format('d.m.Y') . ' - ' .  $this->datumIzdavanjaDO->format('d.m.Y');
    }

    public function getBrojOsoba(): int
    {
        return $this->brojOsoba;
    }

    public function getCijena(): float
    {
        return $this->cijena;
    }

    public function getKolicina(): int
    {
        return $this->kolicina;
    }

    public function getUkupnaCijena(): float
    {

        return $this->cijena * $this->kolicina;
    }

    public function getUplata(): string
    {
        return $this->uplata;
    }

    public function getNacinPlacanja(): string
    {
        return $this->nacinPlacanja;
    }

    public function getVrijemePlacanjaFormatirano(): string
    {
        return $this->vrijemePlacanja->format('d.m.Y H:i');
    }
    public function getIznosUplate(): string
    {
        return $this->iznosUplate;
    }

    public function getNapomena(): string
    {
        return $this->napomena;
    }
    public function getPristojba(): string
    {
        return $this->pristojba;
    }
}
