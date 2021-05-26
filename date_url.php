<?php
$urlDate = filter_input(INPUT_GET, 'date');
$verifDate = preg_match('/^(0[1-9]|[12][0-9]|3[01])[- \/.](0[1-9]|1[012])[- \/.](18|19|20)\d\d$/', $urlDate);

function datePattern($date)
{
  $arrayDate = explode('/', $date);
  return end($arrayDate) . '-' . $arrayDate[1] . '-' . $arrayDate[0];
}

if ($verifDate) {
  $error = false;
  $timezone = new DateTimeZone('America/Sao_Paulo');
  $date = new DateTime(datePattern($urlDate), $timezone);
  $now = new DateTime('now', $timezone);
  $diff = $now->diff($date);
  $days = $diff->days;
  $time = "$diff->h:$diff->i:$diff->s";
  if ($days == 0) $days = "0 Dias e $time horas";
  else $days = "$days Dias";
} elseif (!$urlDate) {
  $error = 'no-date';
} else {
  $error = true;
}
?>

<?php include('./layout/header.php') ?>

<?php if ($error === 'no-date') : ?>

  <h1>Preencha um parâmetro "date" na url no padrão brasileiro</h1>
  <h2>Exemplo: date_url.php?date=27/03/2021</h2>

<?php elseif ($error) : ?>

  <h1 class="text-center text-error">Preencha a data no padrão brasileiro</h1>
  <h2 class="text-center">Exemplo: 15/07/2021</h2>

<?php else : ?>

  <h1 class="text-center">Dias de diferença:</h1>
  <h2 class="text-center"><?= $days ?></h2>

<?php endif; ?>

<?php include('./layout/footer.php') ?>