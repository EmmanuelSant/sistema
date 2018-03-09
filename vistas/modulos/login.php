<div id="back"></div>
<div class="login-box">
  <!-- /.login-logo -->
  <div class="login-box-body">
    <br/>
    <h2 class="login-box-msg">Ingresar al sistema</h2>

    <form method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Usuario" name="usuario" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Clave" name="clave">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <br/>
          <button type="submit" class="btn btn-flat btn-primary btn-block">Ingresar</button>
        </div>
        <!-- /.col -->
      </div>

      <?php
      //aqui se llama al codigo php
      ?>
    </form>
  </div>
</div>

  <!-- /.login-box-body -->

<!-- /.login-box -->