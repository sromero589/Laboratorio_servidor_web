<!-- Html para Editar Revista -->
<div class="row">
    <div class="col-lg-10 offset-md-1">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-film"></i> <a href="?c=Serie">Revistas</a>
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
                    <form class="form" id="form1" action="?c=Revista&a=Guardar" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="codigo" value="<?php echo $alm->codigo; ?>" />

                        <div class="form-group">
                            <label for="nomb">Titulo</label>
                            <input value="<?php echo $alm->titulo; ?>" required type="text" name="titulo" class="form-control" id="nomb" placeholder="Ingrese el Título de la revista">
                        </div>

                        <div class="form-group">
                            <label for="nomb">Lugar</label>
                            <input type="text" name="lugar" value="<?php echo $alm->lugar; ?>" class="form-control" placeholder="Ingrese el Lugar" data-validacion-tipo="requerido|min:8" />

                        </div>


                        <div class="form-group">
                            <label for="direc">Autor</label>
                            <input type="text" name="autor" value="<?php echo $alm->autor; ?>" class="form-control" placeholder="Ingrese el Autor de la revista" data-validacion-tipo="requerido|min:8" />

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
                            <label>Volúmen</label>
                            <input type="text" name="volumen" value="<?php echo $alm->volumen; ?>" class="form-control" placeholder="Ingrese el volumen de la revista" data-validacion-tipo="requerido" />


                        </div>


                        <div class="form-group">
                            <label>Fecha de Edición</label>
                            <input type="date" name="fechaedicion" value="<?php echo $alm->fechaEdicion; ?>" class="form-control" placeholder="Ingrese la feha de edicion" data-validacion-tipo="requerido" />


                        </div>


                        <div class="form-group">
                            <label>Temas</label>
                            <input type="text" name="temas" value="<?php echo $alm->temas; ?>" class="form-control" placeholder="Ingrese el tema de la revista" data-validacion-tipo="requerido" />


                        </div>

                        <div class="form-group">
                            <label>Seccion</label>
                            <input type="text" name="secciones" value="<?php echo $alm->secciones; ?>" class="form-control" placeholder="Ingrese la seccion de la revista" data-validacion-tipo="requerido" />


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
