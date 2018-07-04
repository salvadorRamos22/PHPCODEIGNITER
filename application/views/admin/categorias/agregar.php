
        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                Categorias
                <small>Agregar</small>
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box box-solid">
                    <div class="box-body">
                         
                         <hr>
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger">
                             <p><?php echo $this->session->flashdata("error")?></p>
                            </div> 
                        <?php endif ?>
                         <div class="row">
                              <div class="col-md-12">
                                  <form action="<?php echo base_url()?>mantenimiento/categoria/store" class="class" method="POST">
                                  <div class="form-group">
                                   <label for="nombre">Nombre:</label>
                                   <input type="text" class="form-control" id="nombre" name="nombre">
                                  </div>
                                  <div class="form-group">
                                   <label for="descripcion">Descripcion:</label>
                                   <input type="text" class="form-control" id="descripcion" name="descripcion">
                                  </div>
                                  <div class="form-group">
                                   <button type="submit" class="btn btn-success">Guardar</button>
                                  </div>
                                  </form>
                              </div>
                         </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->