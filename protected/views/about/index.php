<section class="outer-inside-middle-content back-white">
  <div class="prelatife">
    <div class="tops-cont-insidepage prelatife"> 
        <div class="picts-fullw"><img src="<?php echo $this->assetBaseurl; ?>inside-pg-abouts-top.jpg" alt="" class="img-responsive"></div>

        <div class="pos-abs-fullw tp50p">
          <div class="tengah insd-container text-center content-up">
             <h1 class="titles-pages-sub">Teknologi Xado</h1>
             <div class="clear height-15"></div>
             <p>Sebuah inovasi untuk perlindungan dan perbaikan</p>
            <div class="clear"></div>
          </div>
        </div>
    </div>

    <div class="clear"></div>
  </div>

  <section class="middle-inside-page-white prelatife">
      <div class="prelatife container">
          <div class="posin-pagincontt-about">
            <div class="text-center">
              <div class="outers-back-top-ppagin-contabout tengah">
                  <ul class="list-inline" id="myTabs">
                    <li class="active"><a href="#revitalisasi" id="revitalisasi-tab" role="tab" data-toggle="tab" aria-controls="revitalisasi" aria-expanded="true">REVITALISASI</a></li>

                    <li><a href="#manfaat" id="manfaat-tab" role="tab" data-toggle="tab" aria-controls="manfaat" aria-expanded="true">MANFAAT REVITALISASI</a></li>

                    <li><a href="#sertifikasi" id="sertifikasi-tab" role="tab" data-toggle="tab" aria-controls="sertifikasi" aria-expanded="true">SERTIFIKASI</a></li>

                    <li><a href="#faq" id="faq-tab" role="tab" data-toggle="tab" aria-controls="faq" aria-expanded="true">FAQ</a></li>

                    <li><a href="#testimoni" id="testimoni-tab" role="tab" data-toggle="tab" aria-controls="testimoni" aria-expanded="true">TESTIMONI</a></li>
                  </ul>
              </div>
            </div> <div class="clear"></div>
          </div>

          <div class="clear height-50"></div>
          <div class="clear height-50"></div>
          <div class="clear height-20"></div>

          <div class="tab-content">
            <div id="revitalisasi" data-id="1" class="tab-pane fade active in" role="tabpanel">
              <?php echo $this->renderPartial("//about/revitalisasi", array()); ?>
            </div>
            <div id="manfaat" data-id="2" class="tab-pane fade" role="tabpanel">
              <?php echo $this->renderPartial("//about/manfaat", array()); ?>
            </div>
            <div id="sertifikasi" data-id="3" class="tab-pane fade" role="tabpanel">
              <?php echo $this->renderPartial("//about/sertifikasi", array()); ?>
            </div>
            <div id="faq" data-id="4" class="tab-pane fade" role="tabpanel">
              <?php echo $this->renderPartial("//about/faq", array()); ?>
            </div>
            <div id="testimoni" data-id="5" class="tab-pane fade" role="tabpanel">
              <?php echo $this->renderPartial("//about/testimoni", array()); ?>
            </div>
            <div class="clear"></div>
          </div>
          
          <?php echo $this->renderPartial('//layouts/others_article', array()); ?>
          <div class="clear"></div>
      </div>
  </section>    

  <div class="clear"></div>
</section>
<script type="text/javascript">
  $(function(){
      $('#myTabs a').click(function (e) {
        e.preventDefault();
        var ids = $(this).attr('href');
        // alert(ids); return false;
        $(ids).tab('show');
      })
  });
</script>