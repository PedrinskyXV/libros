<?php
require_once 'views/Template/header.php';
?>

<?php
require_once 'views/Template/menu.php';
?>
<main class="px-3">
    <div class="row justify-content-center mt-4">
        <div class="col-lg-10 mt-4">
            <div class="card mt-4">
                <div class="card-header bg-primary text-white">
                    <h5>Filtros</h5>
                </div>
                <br>
                <div class="card-body">
                    <form action="<?=constant('URL')?>informe/pdfAutores" method="POST" target="__blank">
                        <div class="row justify-content-center">
                            <br>
                            <div class="col-6">
                                Código Autor
                                <input type="number" class="form-control" name="txtCodigo" required>
                            </div>
                            <br>                            
                        </div>
                        <br>
                        <div class="text-center">
                            <button class="btn btn-primary mt-3">Generar PDF</button>
                        </div>
                    </form>
                </div>
                <br>
            </div>
        </div>
    </div>
</main>
<?php
require_once 'views/Template/footer.php';
?>