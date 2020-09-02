<section class="news" style="margin-top: 100px">
    <div class="container">
        <h4 class="mb-3" style="text-align: center;color: #e0b403">All NEWS</h4>
        <div class=" embed-responsive">
            <div class="row">
                <?php foreach ($beritas as $berita) : ?>
                    <div class="col-lg-4 col-md-6">
                        <a href="<?php echo site_url('overview/detail/' . $berita->berita_id) ?>">
                            <div class="col-lg-12" class="card bg-dark text-white mb-3" style="padding-left: 0px">
                                <img src="<?php echo base_url('upload/berita/' . $berita->image) ?>" alt="" style="width:350px; height: 200px">
                                <div class="card-img-overlay d-flex flex-column">
                                    <small class="card-text" style="text-align: right"><b> <?php echo $berita->berita_post ?></b></small>
                                    <h5 class="card-title mt-auto"> <?php echo $berita->berita_judul ?></h5>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php endforeach;  ?>


            </div>
        </div>
    </div>
</section>