<?php

require_once('./classes/DB.php');
$userDB = new DB('usuarios');

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if ($id) {
  $error = false;
  $user = $userDB->getById($id);
} else {
  $error = true;
}
?>

<?php include('./layout/header.php') ?>

<?php if ($error) : ?>
  <h1 class="text-center text-error">Preencha o id na url</h1>
  <h2 class="text-center">Exemplo: user_id.php?id=1</h2>
<?php endif ?>

<?php if (isset($user) && $user) : ?>
  <div class="text-center">
    <h1>Usuario</h1>
    <p>Nome: <strong><?= $user->nome ?></strong></p>
  </div>
<?php endif ?>

<?php if (isset($user) && !$user) : ?>
  <h1 class="text-center text-error">Usuario não encontrado</h1>
<?php endif ?>

<?php include('./layout/footer.php') ?>