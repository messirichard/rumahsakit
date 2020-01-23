<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $this->assetAdminBaseurl ?>css/AdminLTE.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo $this->assetAdminBaseurl ?>bower/Ionicons/css/ionicons.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo $this->assetAdminBaseurl ?>plugins/iCheck/square/blue.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script src="<?php echo $this->assetAdminBaseurl ?>plugins/iCheck/icheck.min.js"></script>
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.min.js"></script>
<?php
/*
<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/asset/backend/css/style.default.css" type="text/css" />
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/jquery-ui-1.10.3.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/modernizr.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/custom.js"></script>
*/
 ?>
<script type="text/javascript">
    // jQuery(document).ready(function(){
    //     jQuery('#login').submit(function(){
    //         var u = jQuery('#username').val();
    //         var p = jQuery('#password').val();
    //         if(u == '' && p == '') {
    //             jQuery('.login-alert').fadeIn();
    //             return false;
    //         }
    //     });
    // });
</script>

</head>
<?php echo $content ?>
</html>
