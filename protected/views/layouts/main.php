<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<meta name="language" content="<?php echo Yii::app()->language ?>" />

	<meta name="keywords" content="<?php echo CHtml::encode($this->metaKey); ?>">
	<meta name="description" content="<?php echo CHtml::encode($this->metaDesc); ?>">
	
	<link rel="Shortcut Icon" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/images/favicon.png" />
	<link rel="icon" type="image/ico" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/images/favicon.png" />
	<link rel="icon" type="image/x-icon" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/images/favicon.png" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/css/screen.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/css/common.css" />

    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/js/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/font-awesome/css/font-awesome.min.css" />

    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/js/fancy/jquery.fancybox.css" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/js/fancy/jquery.fancybox.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.fancy-img').fancybox({
                    type        : 'image',
                    fitToView   : false,
                    autoSize    : false,
                    closeClick  : false,
                    openEffect  : 'none',
                    closeEffect : 'none',
                });
            $('.fancy').fancybox();
        });
    </script>

    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-4.0.0/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js" crossorigin="anonymous"></script> 
    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/css/styles.css">

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/css/media.style.css">

    
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <?php /*
    <!-- All JS -->
    <script type="text/javascript">
        // jQuery.noConflict();
        var baseurl = "<?php echo CHtml::normalizeUrl(array('/')); ?>";
        var url_add_cart_action = "<?php echo CHtml::normalizeUrl(array('/product/addCart')); ?>";
        var url_edit_cart_action = "<?php echo CHtml::normalizeUrl(array('/product/edit')); ?>";
    </script>
    <script src="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/js/all.js"></script>
    */ ?>

    <?php echo $this->setting['google_tools_webmaster']; ?>
    <?php echo $this->setting['google_tools_analytic']; ?>
    <?php if ($this->setting['purechat_status'] == '1'): ?>
    <?php echo $this->setting['purechat_code'] ?>
    <?php endif ?>

    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/js/jquery.scrollTo-1.4.3.1-min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
                //Image hover
                $(".serv_block").live('mouseover',function(){
                        var info=$(this).find("img");
                        info.stop().animate({opacity:0.5},100);
                        $(".preloader").css({'background':'none'});
                    }
                );
                $(".serv_block").live('mouseout',function(){
                        var info=$(this).find("img");
                        info.stop().animate({opacity:1},100);
                        $(".preloader").css({'background':'none'});
                    }
                );
                                
            $(".toScroll").live('click', function(){
                var id = $(this).attr("data-id");
                //alert(id);
                $.scrollTo('#'+id , 1500);
            });
        });
    </script>
    </head>
    <body data-spy="scroll" id="page-top">
        <div class="wrapper prelatif">
            <?php echo $content ?>
        </div>

    <script src="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/js/wow.js"></script>
        <script type="text/javascript">
         new WOW().init();
        </script>

        <div id="back-top" class="t-backtop">
        <div class="clear height-5"></div>
            <a href="#top"><i class="fa fa-chevron-up"></i></a>
        </div>
        <script type="text/javascript">
        $(function(){
            $('.t-backtop').click(function () {
                $('body,html').animate({
                    scrollTop: 0
                }, 800);
                return false;
            });

            $(".jumper").on("click", function( e ) {
                e.preventDefault();

                $("body, html").animate({ 
                    scrollTop: $( $(this).attr('href') ).offset().top 
                }, 900);
            });

            var $win = $(window);
                 $win.scroll(function () {
                     if ($win.scrollTop() == 0)
                     $('.t-backtop').hide();
                     else if ($win.height() + $win.scrollTop() != $(document).height() || $win.height() + $win.scrollTop() > 500) {
                     $('.t-backtop').show();
                     }
                 });

        });
        </script>
    </body>
</html>