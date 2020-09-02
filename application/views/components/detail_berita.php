<section class="news" style="margin-top: 100px">
    <div class="container">

        <h1 class="mb-3" style="text-align: center;color: #e0b403"> <?php echo $berita->berita_judul ?></h1>
        <div class="row">
            <div class="col-lg-5">
                <img src="<?php echo base_url('upload/berita/' . $berita->image) ?>" style="width: 100%;height: 300px">
            </div>
            <div class="col-lg-7">
                <p style="text-align: justify"><?php echo $berita->berita_isi ?></p>
            </div>
            </a>
        </div>
    </div>




</section>