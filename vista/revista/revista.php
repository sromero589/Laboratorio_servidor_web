<!-- Html para Editar Revista -->

<div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Título</th>
                                <th >Lugar</th>
                                <th >Autor</th>
                                <th >Ingreso</th>
                                <th >Paginas </th>
                                <th >Numero </th>

                                <th >País </th>
                                <th >Volumen </th>
                                <th >Edicion </th>
                                 <th >Temas </th>
                                <th >Secciones </th>
                                <th >Opciones </th>

                            </tr>
                            </thead>

                            <tbody>

                            <?php foreach($this->model->Listar() as $r): ?>
                                <tr>
                                    <td><small><h6><?php echo $r->titulo; ?></small></h6></td>
                                    <td><small><h6><?php echo $r->lugar; ?></small></h6></td>
                                    <td><small><h6><?php echo $r->autor; ?></small></h6></td>
                                    <td><small><h6><?php echo $r->fechaingreso; ?></small></h6></td>
                                    <td><small><h6><?php echo $r->numpaginas; ?></small></h6></td>
                                    <td><small><h6><?php echo $r->numero; ?></small></h6></td>
                                     <td><small><h6><?php echo $r->pais; ?></small></h6></td>                                   
                                    <td><small><h6><?php echo $r->volumen; ?></small></h6></td>
                                    <td><small><h6><?php echo $r->fechaEdicion; ?></small></h6></td>
                                    <td><small><h6><?php echo $r->temas; ?></small></h6></td>
                                    <td><small><h6><?php echo $r->secciones; ?></small></h6></td>


                                    <td>
                                        <a class="btn btn-primary btn-sm" href="?c=Revista&a=Crud&id=<?php echo $r->codigo; ?>">Editar</a>
                                        <button class="btn btn-warning btn-sm" onclick='ConfirmDelete(<?php echo $r->codigo; ?>)'>Eliminar</button>
                                    </td>


                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-8">
                                <a href="?c=Revista&a=Crud" class="btn btn-success"><i class="fa fa-edit"></i> Nueva Revista</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

                <script type="text/javascript">
                    function ConfirmDelete($id)
                    {
                        if (confirm("Seguro de eliminar este registro"))
                            location.href='?c=Revista&a=Eliminar&id='+$id;
                    }
                </script>