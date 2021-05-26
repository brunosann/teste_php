<?php
$valores = [1, 3, 5, 9, 12, 10];
$soma = 0;

foreach ($valores as $valor) {
  $soma += $valor;
}
?>

<?php include('./layout/header.php') ?>
<pre>$valores = [1, 3, 5, 9, 12, 10];</pre>
<h1>A soma do Array acima é: <?= $soma ?></h1>
<?php include('./layout/footer.php') ?>