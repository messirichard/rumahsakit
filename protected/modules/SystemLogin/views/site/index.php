<?php
$this->breadcrumbs=array(
    'Dashboard',
);
?>
    
<div class="pageheader">
    
    <div class="pageicon"><span class="fa fa-laptop"></span></div>
    <div class="pagetitle">
        <h5>All Features Summary</h5>
        <h1>Dashboard</h1>
    </div>
</div><!--pageheader-->

<div class="maincontent">
    <div class="maincontentinner">
        <div class="row-fluid">
            <div id="dashboard-left" class="span8">
                    <h5 class="subtitle">Menu</h5>
<?php 
$session = new CHttpSession;
$session->open();
$checks_user = $session['login']['group_id'];
?>
<?php if ($checks_user == 8): ?>
        <ul class="shortcuts">
            <li class="products">
                <a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/order/index')); ?>">
                    <i class="icon-cms fa fa-fax"></i>
                    <span class="shortcuts-label">List Orders</span>
                </a>
            </li>
        </ul>
        <?php else: ?>
                    <ul class="shortcuts">
                        <li class="products">
                            <a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/slide/index')); ?>">
                                <i class="icon-cms fa fa-image"></i>
                                <span class="shortcuts-label">Slide</span>
                            </a>
                        </li>
                        <li class="events">
                            <a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/product/index')); ?>">
                                <i class="icon-cms fa fa-tag"></i>
                                <span class="shortcuts-label">Products</span>
                            </a>
                        </li>
                        
                        <li class="archive">
                            <a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/contact/index')); ?>">
                                <i class="icon-cms fa fa-phone"></i>
                                <span class="shortcuts-label">Contact Us</span>
                            </a>
                        </li>
                </ul>
        <?php endif; ?>

            </div> <!-- span-8 -->
            
            <div id="dashboard-right" class="span4">
                
                <h5 class="subtitle">Announcements</h5>
                
                <div class="divider15"></div>
                
                <div class="alert alert-block">
                      <button data-dismiss="alert" class="close" type="button">&times;</button>
                      <h4>Documentation!</h4>
                      <p style="margin: 8px 0">View Documentation Guide Click <a target="_blank" href="<?php echo Yii::app()->baseUrl.'/images/Documentation-Surya-SS.pdf' ?>">here</a></p>
                      <!-- <p style="margin: 8px 0">Best check yo self, you're not looking too good. Nulla vitae elit libero, a pharetra augue. Praesent commodo cursus magna.</a></p> -->
                </div><!--alert-->
                
                <br />
                
                
                <br />
                                        
            </div><!--span4-->
        </div><!--row-fluid-->
        
        <div class="footer">
            <div class="footer-left">
                <span>Copyright &copy; <?php echo date('Y'); ?> by <?php echo Yii::app()->name ?>.</span>
            </div>
            <div class="footer-right">
                <span>All Rights Reserved - Suryasukses Team.</span>
                <span class="hide hidden" style="opacity: 0;">developed by <a target="_blank" href="http://www.atechnoweb.com">www.atechnoweb.com</a></span>
            </div>
        </div><!--footer-->
        
    </div><!--maincontentinner-->
</div><!--maincontent-->