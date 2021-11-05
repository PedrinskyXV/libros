<title>ExFinal - Modificar Empleado</title>
<?php
require_once 'views/Template/header.php';
?>

<?php
require_once 'views/Template/menu.php';
?>

<main class="px-3">
    <div class="col-lg-6 mx-auto">
        <h4 class="text-primary text-center pb-2">Detalles del empleado</h4>

        <form action="<?=constant('URL')?>libro/modificar" method="POST" id="frmProductos">
            <?php
                        $datos = $this->datos;
                    ?>
            <input type="hidden" name="txtCodigo" value="<?=$datos[0]['codigoEmpleado']?>">
            <span class="badge bg-dark">Nombre</span>
            <input type="text" class="form-control my-3" name="txtNombre" value="<?=$datos[0]['nombre']?>" data-validetta="required">
            <span class="badge bg-dark">Edad</span>
            <input type="number" class="form-control my-3" name="txtEdad" value="<?=$datos[0]['edad']?>" min="16" max="100" step="1"
                data-validetta="required,number" >
            <span class="badge bg-dark">Sueldo Base</span>
            <input type="number" class="form-control my-3" name="txtSueldoBase" value="<?=$datos[0]['sueldoBase']?>" min="0.01" step="0.01"
                data-validetta="required,number">
            <span class="badge bg-dark">Area</span>
            <select class="form-control my-3" name="sArea" data-validetta="required,minSelected[1],maxSelected[1]">
                <option value="" disabled>Seleccione Area</option>
                <?php
                            $datosM = $this->marcas;
                            foreach ($datosM as $value) {
                        ?>
                <option value="<?=$value['codigoArea']?>" <?=($value['codigoArea']==$datosM[0]['codigoArea'])?"selected":""?>>
                    <?=$value['nombre']?>
                </option>
                <?php        
                            }
                        ?>
            </select>

            <span class="badge bg-dark">Estado</span>
            <select class="form-control my-3" name="sEstado" data-validetta="required,minSelected[1],maxSelected[1]">
                <option value="" disabled>Seleccione Area</option>                
                <option value="1" <?=($datos[0]['estado'] == 1)?"selected":""?>>Disponible</option>
                <option value="0" <?=($datos[0]['estado'] == 0)?"selected":""?>>No Disponible</option>                
            </select>            

            <button class="btn btn-primary mt-2 btn-block btn-sm mt-4" id="btnModificar">Modificar</button>
        </form>
    </div>
</main>
<?php
require_once 'views/Template/footer.php';
?>