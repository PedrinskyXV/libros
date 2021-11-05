<title>ExFinal - Nuevo Empleado</title>

<?php
require_once 'views/Template/header.php';
?>

<?php
require_once 'views/Template/menu.php';
?>

<main class="px-3">
    <div class="row justify-content-center mt-4">
        <div class="col-lg-6 mt-4">
            <h2 class="text-center pt-3">Nuevo Libro</h2>
            <form action="<?=constant('URL')?>libro/agregar" method="POST" id="frmProductos">
                
                <span class="badge bg-dark">ISBN</span>
                <input type="text" class="form-control my-3" name="txtIsbn" data-validetta="required">
                <span class="badge bg-dark">Nombre</span>
                <input type="text" class="form-control my-3" name="txtNombre" data-validetta="required">
                <span class="badge bg-dark">Precio</span>
                <input type="number" class="form-control my-3" name="txtPrecio" min="0.01" step="0.01" data-validetta="required,number">
                <span class="badge bg-dark">Editorial</span>
                <select class="form-control" name="sEditorial" data-validetta="required,minSelected[1],maxSelected[1]">
                    <option value="" selected>Seleccione Editorial</option>
                    <?php
                            $datos = $this->editoriales;
                            foreach ($datos as $value) {
                        ?>
                    <option value="<?=$value['codigoEditorial']?>"><?=$value['nombre']?></option>
                    <?php        
                            }
                        ?>
                </select>                
                <button class="btn btn-primary mt-2 btn-block btn-sm" id="btnAdd">Agregar</button>
            </form>
        </div>
    </div>
</main>
<?php
require_once 'views/Template/footer.php';
?>