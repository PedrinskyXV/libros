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
            <h2 class="text-center pt-3">Nuevo empleado</h2>
            <form action="<?=constant('URL')?>libro/agregar" method="POST" id="frmProductos">
                
                <span class="badge bg-dark">Nombre</span>
                <input type="text" class="form-control my-3" name="txtNombre" data-validetta="required">
                <span class="badge bg-dark">Edad</span>
                <input type="number" class="form-control my-3" name="txtEdad" min="16" max="100" step="1" data-validetta="required,number">
                <span class="badge bg-dark">Sueldo Base</span>
                <input type="number" class="form-control my-3" name="txtSueldoBase" min="0.01" step="0.01" data-validetta="required,number">
                <span class="badge bg-dark">Area</span>
                <select class="form-control" name="sArea" data-validetta="required,minSelected[1],maxSelected[1]">
                    <option value="" selected>Seleccione Area</option>
                    <?php
                            $datos = $this->marcas;
                            foreach ($datos as $value) {
                        ?>
                    <option value="<?=$value['codigoArea']?>"><?=$value['nombre']?></option>
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