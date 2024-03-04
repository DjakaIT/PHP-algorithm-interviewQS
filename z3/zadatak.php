<!DOCTYPE html>
<html lang="hr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Predračun</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>



  <?php
  include('predracun.php');

  $predracun = new Predracun(
    20221695063,
    "SMJEŠTAJ",
    "AS-16950",
    new DateTime('2022-08-20'),
    new DateTime('2022-08-15'),
    2,
    104.00,
    7,
    "Akontacija",
    "Kreditnom karticom (Visa, EC/MC, Maestro)",
    new DateTime('2022-08-08 11:00'),
    364.00,
    "Uključeno u cijenu (bez dodatne naplate): turistička pristojba",
    "Uplatom akontacije gost potvrđuje da je upoznat te se slaže s Općim uvjetima pružanja usluga smještaja u privatnim kapacitetima."
  );
  ?>


  <h1>PREDRAČUN <?php echo $predracun->getBrojPredracuna(); ?> ZA USLUGU SMJEŠTAJA</h1>
  <table class="tablica_Usluge">
    <tr class="tr_Usluge">
      <th class="th_Usluge">Usluga</th>
      <th class="th_Usluge">Cijena</th>
      <th class="th_Usluge">Količina</th>
      <th class="th_Usluge">Ukupno</th>
    </tr>
    <tr class="tr_Usluge">
      <td class="td_Usluge" id="multiskup_usluge">
        <div><?php echo $predracun->getModelUsluge(); ?></div>
        <div><?php echo $predracun->getDatumIzdavanjaFormatirano(); ?></div>
        <div><?php echo $predracun->getBrojOsoba(); ?> (osobe)</div>
      </td>
      <td class="td_Usluge"><?php echo $predracun->getCijena(); ?>,00 €</td>
      <td class="td_Usluge"><?php echo $predracun->getKolicina(); ?> (noćenja)</td>
      <td class="td_Usluge"><?php echo $predracun->getUkupnaCijena(); ?>,00 €</td>
    </tr>
    <tr id="tr_prazan">
      <td colspan="4"></td>
    </tr>
    <tfoot class="tr_Usluge">
      <td class="td_Usluge" colspan="3">Ukupno</td>
      <td class="td_Usluge"><?php echo $predracun->getUkupnaCijena(); ?>, 00 €</td>
    </tfoot>
  </table>
  <p><?php echo $predracun->getNapomena(); ?></p>


  <h4 class="h4_dinamika">DINAMIKA PLAĆANJA</h4>
  <table class="table_dinamika">
    <tr class="tr_dinamika">
      <th class="th_dinamika">Uplata</th>
      <th class="th_dinamika">Način plaćanja</th>
      <th class="th_dinamika">Vrijeme plaćanja</th>
      <th class="th_dinamika">Iznos</th>
    </tr>
    <tr class="tr_dinamika">
      <td class="td_dinamika">Akontacija</td>
      <td class="td_dinamika"><?php echo $predracun->getNacinPlacanja(); ?></td>
      <td class="td_dinamika">Najkasnije do <?php echo $predracun->getVrijemePlacanjaFormatirano(); ?> </td>
      <td class="td_dinamika"><?php echo $predracun->getIznosUplate(); ?>,00 €</td>
    </tr>
    <tr class="tr_dinamika">
      <td class="td_dinamika">Ostatak iznosa</td>
      <td class="td_dinamika"><?php echo $predracun->getNacinPlacanja(); ?></td>
      <td class="td_dinamika">Najkasnije do <?php echo $predracun->getVrijemePlacanjaFormatirano(); ?></td>
      <td class="td_dinamika"><?php echo $predracun->getIznosUplate(); ?>,00 €</td>
    </tr>
  </table>
  <p class="p_dinamika"><?php echo $predracun->getPristojba(); ?></p>