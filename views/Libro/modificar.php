<title>ExFinal - Modificar Empleado</title>
<?php
require_once 'views/Template/header.php';
?>

<?php
require_once 'views/Template/menu.php';
?>

<main class="px-3">
    <div class="col-lg-6 mx-auto">
        <h4 class="text-primary text-center pb-2">Detalles del libro</h4>

        <form action="<?=constant('URL')?>libro/modificar" method="POST" id="frmProductos">
            <?php
                        $datos = $this->datos;
                    ?>
            <input type="hidden" name="txtCodigo" value="<?=$datos[0]['codigoLibro']?>">

            <span class="badge bg-dark">ISBN</span>
            <input type="text" class="form-control my-3" name="txtIsbn" value="<?=$datos[0]['isbn']?>" data-validetta="required">

            <span class="badge bg-dark">Nombre</span>
            <input type="text" class="form-control my-3" name="txtNombre" value="<?=$datos[0]['nombre']?>" data-validetta="required">

            <span class="badge bg-dark">Precio</span>
            <input type="number" class="form-control my-3" name="txtPrecio" value="<?=$datos[0]['precio']?>" min="0.01" step="0.01"
                data-validetta="required,number">

            <span class="badge bg-dark">Editorial</span>
            <select class="form-control my-3" name="sEditorial" data-validetta="required,minSelected[1],maxSelected[1]">
                <option value="" disabled>Seleccione Editorial</option>
                <?php
                            $datosM = $this->editoriales;
                            foreach ($datosM as $value) {
                        ?>
                <option value="<?=$value['codigoEditorial']?>" <?=($value['codigoEditorial']==$datosM[0]['codigoEditorial'])?"selected":""?>>
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