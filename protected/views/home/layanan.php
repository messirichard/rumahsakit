<section class="cover">
    <div class="row no-gutters">
        <div class="col-md-30">
            <div class="prelative container2">
                <div class="box-content">
                    <h5>LAYANAN</h5>
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

<section class="layanan-sec-1">
    <div class="prelative container2">
        <div class="row">
            <div class="col-md-60">
                <div class="title-content">
                    <h3>Layanan Kami</h3>
                </div>
                <div class="arrow">
                    <img src="<?php echo $this->assetBaseurl ?>hr.svg" alt="">
                </div>
            </div>
        </div>
        <div class="row">
            <?php for($i=1;$i<=4;$i++) { ?>
                <div class="col-md-60">
                    <div class="box-content">
                        <div class="row">
                            <div class="col-md-23">
                                <img class="img img-fluid" src="<?php echo $this->assetBaseurl ?>lay-1.jpg" alt="">
                            </div>
                            <div class="col-md-27">
                                <h5>MEDICAL CHECKUP</h5>
                                <p>Did you know that nearly half of the population of the developed countries like USA and Canada suffer from the disorders caused by spastic colon? It is a chronic health problem that affects a number of people which is far greater than the number of population suffering from diabetes, asthma or depression.</p>
                            </div>
                            <div class="col-md-10">
                                <button>CARI PERAWAT</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
        </div>
    </div>
</section>

<section class="layanan-sec-2">
    <div class="prelative container">
        <div class="row">
            <div class="col-md-60">
                <div class="title-content">
                    <h3>Mengapa Memilih Kami</h3>
                </div>
                <div class="arrow">
                    <img src="<?php echo $this->assetBaseurl ?>hr.svg" alt="">
                </div>
            </div>
        </div>
        <div class="row no-gutters">
            <?php for($i=1;$i<=4;$i++) { ?>
                <div class="col-md-30">
                    <div class="box-content2-yeayyy">
                        <div class="row no-gutters">
                            <div class="col-md-10">
                                <i class="fa fa-heart" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-50">
                                <h6>FAVORITES CUSTOMERS</h6>
                                <p>Eczema can be a burden. It is a skin condition that can range in severity from dry, red patches on your skin to cracked, weeping sores. Eczema is caused by many factors such as genetics and allergic reactions.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
        </div>
    </div>
</section>


<section class="home-sec-4">
    <div class="prelative container">
        <div class="row">
            <div class="col-md-20">
                <img src="<?php echo $this->assetBaseurl ?>pic-sec-4.png" alt="">
            </div>
            <div class="col-md-20">
                <div class="content">
                    <h5>Pilih Jenis Layanan yang Anda Butuhkan, lalu pilih Durasi Layanan</h5>
                    <p>My daughter has worn glasses since being 8 years old. She switched to contact lenses at 16. She is 21 now and told me yesterday that she is considering using her savings from her part-time job to get laser eye surgery.</p>
                </div>
            </div>
            <div class="col-md-20">
                <div class="box-content">
                    <div class="atas">
                        <i class="fa fa-medkit" aria-hidden="true"></i>
                        <p>Daftar Layanan</p>
                    </div>
                    <form class="form-inline">
                        <label class="" for="inlineFormCustomSelectPref">Pilih Jenis Layanan</label>
                        <select class="custom-select" id="inlineFormCustomSelectPref">
                            <option selected>— Jenis Layanan —</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <label class="label2" for="inlineFormCustomSelectPref">Pilih Durasi Layanan</label>
                        <select class="custom-select" id="inlineFormCustomSelectPref">
                            <option selected>— Jenis Layanan —</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Cari Layanan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="home-sec-6 layanan-top">
    <div class="prelative container">
        <div class="row">
            <div class="col-md-20">
                <div class="title">
                    <h5>Artikel & Berita Terkait</h5>
                </div>
            </div>
            <div class="col-md-40">
                <div class="paginationclass">
                    <div class="rounded">
                        <a href="#">
                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="rounded">
                        <a href="#">
                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php for($i=1;$i<=3;$i++) { ?>
                <div class="col-md-20">
                    <div class="box-content">
                        <img src="<?php echo $this->assetBaseurl ?>artikel1.jpg" alt="">
                        <h5>Understanding Drug And Alcohol Rehabilitation</h5>
                        <p>At every moment you can tell if the vibration that you are sending is either a positive one or a negative one by identifying the feeling you are experiencing.</p>
                    </div>
                </div>
                <?php } ?>
        </div>
    </div>
</section>