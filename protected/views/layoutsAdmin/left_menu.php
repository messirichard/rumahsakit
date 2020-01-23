<?php 
$session = new CHttpSession;
$session->open();
$checks_user = $session['login']['group_id'];
?>
<div class="leftmenu">        
    <ul class="nav nav-tabs nav-stacked">
        <li class="nav-header">Navigation</li>
        <li class="dropdown"><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/product/index')); ?>"><span class="fa fa-folder"></span> <?php echo Tt::t('admin', 'Static Page') ?></a>
            <ul>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/static/home')); ?>">Page Home</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/static/about')); ?>">Page About Us</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/static/product')); ?>">Page Our Products</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/static/application')); ?>">Page Applications</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/static/install')); ?>">Page Installation</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/static/contact')); ?>">Page Contact Us</a></li>
            </ul>
        </li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/slide/index')); ?>"><span class="fa fa-image"></span> <?php echo Tt::t('admin', 'Home Slides') ?></a></li>

        <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/product/index')); ?>"><span class="fa fa-book"></span> <?php echo Tt::t('admin', 'Data Products') ?></a></li>

        <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/gallery/index')); ?>"><span class="fa fa-picture-o"></span> <?php echo Tt::t('admin', 'Data Applications') ?></a></li>
        </li>
        
        <li class="dropdown"><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/product/index')); ?>"><span class="fa fa-folder"></span> <?php echo Tt::t('admin', 'Blog / Artikel') ?></a>
            <ul>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/blog/index')); ?>">Data Artikel</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/categoryblog/index')); ?>">Category Artikel</a></li>
            </ul>
        </li>

         <li class="dropdown"><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/contact/index')); ?>"><span class="fa fa-phone"></span> <?php echo Tt::t('admin', 'Contact Us') ?></a>
            <ul>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/contact/index')); ?>">Contact Overview</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/companyList/index')); ?>">List Company</a></li>
            </ul>
        </li>

        <li><a href="<?php echo CHtml::normalizeUrl(array('setting/index')); ?>"><span class="fa fa-cogs"></span> <?php echo Tt::t('admin', 'General Setting') ?></a>
        </li>

        <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/home/logout')); ?>"><span class="fa fa fa-sign-out"></span> Logout</a></li>
    </ul>
</div><!--leftmenu-->
