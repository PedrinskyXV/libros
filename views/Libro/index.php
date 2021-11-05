<title>ExFinal - Libros</title>
<?php
require_once 'views/Template/header.php';
?>

<?php
require_once 'views/Template/menu.php';
?>
<main class="px-3">
    <div class="row justify-content-center mt-4">
        <div class="col-lg-10 mt-4">
        <h2 class="text-center p-3 text-primary">Libros</h2>
            
            <a href="<?=constant('URL')?>libro/nuevo" class="btn btn-block btn-primary mt-3">Agregar Libro</a>

            <table class="table table-hover table-responsive" id="Libros">
                <thead class="table-dark text-white text-center">
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Editorial</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody class="text-center">

                </tbody>
            </table>
        </div>
    </div>
</main>
<?php
require_once 'views/Template/footer.php';
?>