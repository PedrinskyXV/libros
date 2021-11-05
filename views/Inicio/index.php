<?php
require_once 'views/Template/header.php';
?>

<?php
require_once 'views/Template/menu.php';
?>
<main class="px-3">
    <h1 class="fw-bold">Bienvenido/a <span class="text-warning"><?=$_SESSION['usuario']?></span></h1>
    <div>
    <img src="<?= constant('URL').'public/img/'.$_SESSION['foto']?>" class="col-6">
    </div>
</main>
<?php
require_once 'views/Template/footer.php';
?>