<section class="cover">
    <div class="row no-gutters">
        <div class="col-md-30">
            <div class="prelative container2">
                <div class="box-content">
                    <h5>ARTIKEL</h5>
                    <p>My daughter has worn glasses since being 8 years old. She switched to contact lenses at 16. She is 21 now and told me yesterday that she is considering using her savings from her part-time job to get laser eye surgery.</p>
                    <button>SELENGKAPNYA</button>
                </div>
            </div>
        </div>
        <div class="col-md-30">
            <img class="w-100 img img-fluid" src="<?php echo $this->assetBaseurl ?>layanan1.jpg" alt="">
        </div>
    </div>
</section>

<section class="artikel-sec-1">
    <div class="prelative container">
        <div class="row">
            <div class="col-md-20">
                <div class="sidebar-art">
                    <h5>Artikel & Berita Terkait</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Terbaru</a></li>
                        <li><a href="#">Terpopuler</a></li>
                        <li><a href="#">Terlama</a></li>
                        <li><a href="#">Paling Banyak Dikunjungi</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-40">
                <div class="row">
                    <?php for($i=1;$i<=6;$i++) { ?>
                        <div class="col-md-30">
                            <div class="box-content">
                                <img src="<?php echo $this->assetBaseurl ?>artikel1.jpg" alt="">
                                <h5>Understanding Drug And Alcohol Rehabilitation</h5>
                                <p>At every moment you can tell if the vibration that you are sending is either a positive one or a negative one by identifying the feeling you are experiencing.</p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

