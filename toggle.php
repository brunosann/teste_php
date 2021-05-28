<?php
require_once('./classes/MyDate.php');
// mude para testar outros valores de data, certo ou errado

$toggleDate = MyDate::toggle('2021-12-26'); // padrão americano

// $toggleDate = MyDate::toggle('27/03/2021'); // padrão brasileiro

// $toggleDate = MyDate::toggle('2021-12-276'); // padrão errado
?>

<?php include('./layout/header.php') ?>

<?php if (isset($toggleDate['verif']) && !$toggleDate['verif']) : ?>
  <h1 class="text-center text-error">Exception: <?= $toggleDate['exception'] ?></strong></h1>
<?php endif ?>

<?php if (!isset($toggleDate['verif'])) : ?>
  <h1 class="text-center">Data Convertida: <?= $toggleDate ?> </h1>
<?php endif ?>

<?php include('./layout/footer.php') ?>