 
  <body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Amari</b> Upvc</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to Content Management System</p>

    <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id'=>'verticalForm',
            //'htmlOptions'=>array('class'=>'well'),
            'enableClientValidation'=>false,
            'clientOptions'=>array(
                'validateOnSubmit'=>false,
            ),
        )); ?>
      <div class="form-group has-feedback">
        <input type="text" name="LoginForm[username]" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="LoginForm[password]" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group">
      <div class="row null_margin">
        <div class="col-xs-7">
          <div class="checkbox icheck" style="margin-left: 22px;">
            <label>
              <input type="checkbox"> Keep me signed in
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-5">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
      </div>
    <?php $this->endWidget(); ?>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
    <div class="loginfooter">
        Copyright &copy; <?php echo date('Y'); ?> by <?php echo Yii::app()->name ?>.<br/>
            All Rights Reserved. <br>
            <span style="visibility: hidden; opacity: 0;">Developed By <a target="_blank" href="http://atechno.web.id/">Atechno.web.id</a>.</span>
    </div>
    

    <style type="text/css">
        .loginfooter {
            text-align: center;
            font-size: 12px;
            line-height: 1.6;
            font-weight: 400;
        }
        .loginfooter a{
            text-decoration: none; color: #2C2C2C;
        }

        .loginfooter a:hover,
        .loginfooter a:focus{
            text-decoration: none; color: #4D4D4D;
        }
    </style>
</body>