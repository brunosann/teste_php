<?php
require_once('./classes/DB.php');
$userDB = new DB('usuarios');

$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT);
$page = $page ? $page : 1;
$paginate = $userDB->paginate($page);
?>

<?php include('./layout/header.php') ?>

<?php if ($paginate['rows'] > 0) : ?>
  <h1 class="text-center">Usuarios</h1>
  <ul class="list-users">
    <?php foreach ($paginate['users'] as $user) : ?>
      <li class="list-item">
        <?= $user->nome ?>
      </li>
    <?php endforeach ?>
  </ul>
<?php endif ?>

<ul class="link-pages">
  <?php for ($i = 1; $i <= $paginate['pages']; $i++) : ?>
    <li class="link-item">
      <a href="pagination.php?page=<?= $i ?>"><?= $i ?></a>
    </li>
  <?php endfor ?>
</ul>

<?php if ($paginate['rows'] <= 0) : ?>
  <h1 class="text-center">Nenhum usuario encontrado</h1>
<?php endif ?>

<?php include('./layout/footer.php') ?>