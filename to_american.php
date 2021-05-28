<?php
require_once('./classes/MyDate.php');
$dateAmerican = MyDate::toAmerican('27/03/2021');
?>

<?php include('./layout/header.php') ?>
<?php if (!$dateAmerican) : ?>
  <h2 class="text-center text-error">Parâmetro de 'toAmerican' não esta no padrão Brasileiro</h2>
<?php endif ?>

<?php if ($dateAmerican) : ?>
  <h1 class="text-center">Data no padrão Brasileiro: <strong>'27/03/2021'</strong></h1>
  <h1 class="text-center">Data no padrão Americano: <strong>'<?= $dateAmerican ?>'</strong></h1>
<?php endif ?>

<?php include('./layout/footer.php') ?>