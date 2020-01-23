<div class="leftmenu">        
    <ul class="nav nav-tabs nav-stacked">
        <li class="nav-header">Navigation</li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/slide/index')); ?>"><span class="fa fa-image"></span> <?php echo Tt::t('admin', 'Slides') ?></a></li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/dashboard/index')); ?>"><span class="fa fa-home"></span> <?php echo Tt::t('admin', 'Home') ?></a></li>
        <!-- <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/about/index')); ?>"><span class="fa fa-info"></span> <?php echo Tt::t('admin', 'About Us') ?></a></li> -->
        <li class="dropdown"><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/product/index')); ?>"><span class="fa fa-tag"></span> <?php echo Tt::t('admin', 'Products') ?></a>
            <ul>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/product/index')); ?>">View Products</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/product/create')); ?>">Add Products</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/category/index')); ?>">View Category</a></li>
            </ul>
        </li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/contact/index')); ?>"><span class="fa fa-phone"></span> <?php echo Tt::t('admin', 'Contact Us') ?></a></li>
        <?php /*
        <li class="dropdown"><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/career/index')); ?>"><span class="fa fa-heart"></span> <?php echo Tt::t('admin', 'Career') ?></a>
            <ul>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/productedit/index')); ?>">Page Product</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/career/index')); ?>">Page Career</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/banner/index')); ?>">View Banner</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/banner/create')); ?>">Add Banner</a></li>
            </ul>
        </li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/factory/index')); ?>"><span class="fa fa-bank"></span> <?php echo Tt::t('admin', 'Factory') ?></a></li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/blog/index')); ?>"><span class="fa fa-book"></span> <?php echo Tt::t('admin', 'Blog/Artikel') ?></a></li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/gema/index')); ?>"><span class="fa fa-group"></span> <?php echo Tt::t('admin', 'ge-ma') ?></a></li>
        <li class="dropdown"><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/about/index')); ?>"><span class="fa fa-info"></span> <?php echo Tt::t('admin', 'About Us') ?></a>
            <ul>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/about/index')); ?>">About Header</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/about/whoweare')); ?>">What is Realfood?</a></li>
                <!-- <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/about/ourteam')); ?>">Our Team</a></li> -->
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/about/visimisi')); ?>">Vision & Mision</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/about/workwithus')); ?>">Why bird's nest?</a></li>
            </ul>
        </li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/career/index')); ?>"><span class="fa fa-heart"></span> <?php echo Tt::t('admin', 'Career') ?></a></li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/customer/index')); ?>"><span class="fa fa-group"></span> <?php echo Tt::t('admin', 'Customers') ?></a></li>
                <!-- <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/pages/update', 'id'=>3)); ?>">About US</a></li> -->
                <!-- <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/pages/update', 'id'=>4)); ?>">Contact US</a></li> -->
        */ ?>
        <li class="dropdown"><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/pages/index')); ?>"><span class="fa fa-folder-open"></span> <?php echo Tt::t('admin', 'Pages') ?></a>
            <ul>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/about/index')); ?>">About Us</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/feedback/index')); ?>">Feedback</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/tos/index')); ?>">TOS</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/privacy/index')); ?>">Privacy</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/payment/index')); ?>">Payment Confirmation</a></li>
            </ul>
        </li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/order/index')); ?>"><span class="fa fa-fax"></span> <?php echo Tt::t('admin', 'Orders') ?></a></li>
        <!-- <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/toko/index')); ?>"><span class="fa fa-group"></span> <?php echo Tt::t('admin', 'Toko') ?></a></li> -->
        <!-- <li><a href="#"><span class="fa fa-bullhorn"></span> <?php echo Tt::t('admin', 'Promotions') ?></a></li> -->
        <!-- <li><a href="#"><span class="fa fa-file-text-o"></span> <?php echo Tt::t('admin', 'Reports') ?></a></li> -->
        <!-- class="dropdown" -->
        <li><a href="<?php echo CHtml::normalizeUrl(array('setting/index')); ?>"><span class="fa fa-cogs"></span> <?php echo Tt::t('admin', 'General Setting') ?></a>
             <!--  <ul>
                <li class="active"><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/administrator/index')); ?>">Administrator Manager</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/language/index')); ?>">Language (Bahasa)</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/access_block/index')); ?>">Access Blok</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/contact/index')); ?>">Contact & Form Setting</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/meta_page/index')); ?>">Default Meta Page</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/google_tools/index')); ?>">Google Tools</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/#/index')); ?>">Import/Export Product</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/purechat/index')); ?>">Integrasi PureChat</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/invoice_setting/index')); ?>">Invoice Setting</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/logo_setting/index')); ?>">Logo Setting</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/mail_setting/index')); ?>">Mail Setting</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/mailchimp/index')); ?>">MailChimp</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/marketplace/index')); ?>">Market Place</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/mobile_text/index')); ?>">Mobile Text Setting</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/payment/index')); ?>">Payment Setting</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/shipping/index')); ?>">Pengaturan Shipping</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/popOut/index')); ?>">Setting PopOut</a></li>
            </ul> -->
        </li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/SystemLogin/home/logout')); ?>"><span class="fa fa fa-sign-out"></span> Logout</a></li>
    </ul>
</div><!--leftmenu-->
