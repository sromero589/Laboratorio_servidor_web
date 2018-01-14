<!-- Page Heading -->
<div class="row">
    <div class="col-lg-10 offset-md-1">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-film"></i> <a href="?c=Libro">Libros</a>
            </li>

        </ol>
    </div>
</div>

    <div class="col-md-6 offset-md-3">

        <div class="card card-outline-secondary centered">
            <div class="card-header">
                <legend>
                    <i class="fa fa-edit"></i>  <?php echo $alm->codigo != null ? $alm->titulo : 'Nuevo Registro'; ?>
                </legend>
            </div>

            <div class="card-block">
                <div class="col-md-12">
                    <form class="form" id="form1" action="?c=Libro&a=Guardar" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="codigo" value="<?php echo $alm->codigo; ?>" />

                        <div class="form-group">
                            <label for="nomb">Titulo</label>
                            <input value="<?php echo $alm->titulo; ?>" required type="text" name="titulo" class="form-control" id="nomb" placeholder="Ingrese el Título del Libro">
                        </div>

                        <div class="form-group">
                            <label for="nomb">Lugar</label>
                            <input type="text" name="lugar" value="<?php echo $alm->lugar; ?>" class="form-control" placeholder="Ingrese el Lugar" data-validacion-tipo="requerido|min:8" />

                        </div>


                        <div class="form-group">
                            <label for="direc">Autor</label>
                            <input type="text" name="autor" value="<?php echo $alm->autor; ?>" class="form-control" placeholder="Ingrese el Autor del Libro" data-validacion-tipo="requerido|min:8" />

                        </div>


                        <div class="form-group">
                            <label>Fecha de Ingreso</label>
                            <input type="date" name="fechaingreso" value="<?php echo $alm->fechaingreso; ?>" class="form-control" placeholder="Ingrese la feha de ingreso" data-validacion-tipo="requerido" />


                        </div>



                        <div class="form-group">
                            <label>Número de páginas</label>
                            <input type="number" name="paginas" value="<?php echo $alm->numpaginas; ?>" class="form-control" placeholder="Ingrese el numero de paginas" data-validacion-tipo="requerido" />


                        </div>
                        <div class="form-group">
                            <label>País</label>
                            <input type="text" name="pais" value="<?php echo $alm->pais; ?>" class="form-control" placeholder="Ingrese el pais" data-validacion-tipo="requerido" required />


                        </div>
                        <div class="form-group">
                            <label>Número</label>
                            <input type="number" name="numero" value="<?php echo $alm->numero; ?>" class="form-control" placeholder="Ingrese el numero" data-validacion-tipo="requerido" />

                            <hr />
                        </div>

                        <div class="form-group">
                            <label>Edicion</label>
                            <input type="text" name="edicion" value="<?php echo $alm->edicion; ?>" class="form-control" placeholder="Ingrese la edicion del libro" data-validacion-tipo="requerido" />


                        </div>





                        <div class="form-group">
                            <label>Editorial</label>
                            <input type="text" name="editorial" value="<?php echo $alm->editorial; ?>" class="form-control" placeholder="Ingrese la editorial del libro" data-validacion-tipo="requerido" />


                        </div>

                        <div class="form-group">
                            <label>Capitulos</label>
                            <input type="number" name="capitulos" value="<?php echo $alm->capitulos; ?>" class="form-control" placeholder="Ingrese los capitulos del libro" data-validacion-tipo="requerido" />


                        </div>



                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </form>

                    <br><br>
                </div>
            </div>
        </div>
    </div>

</div>
<br><br>
