<?php
require_once 'views/Template/header.php';
?>

<?php
require_once 'views/Template/menu.php';
?>
<main class="px-3">
    <div class="row justify-content-center mt-4">
        <div class="col-lg-10 mt-4">
            <?=$this->grafico?>
        </div>
    </div>
</main>
<?php
require_once 'views/Template/footer.php';
?>