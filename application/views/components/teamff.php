<div class="container top-section" style=" margin-top: 120px">
    <div class=" d-flex flex-row mb-2 portal-nav">
        <!-- <img src="<?php echo base_url('frontend/img/games/dota.png') ?>" alt="" height="30px" class="mr-2 mb-3"> -->
        <h4 class="font-weight-bold portal-title">TEAM LIST</h4>
        <div class="portal-nav ml-auto">
            <a href="<?php echo base_url() ?>ff/player" class="mr-2 ">PLAYERS</a>
            <a href="<?php echo base_url() ?>ff/team" class="mr-2 active">TEAMS</a>
            <a href="<?php echo base_url() ?>ff/tournaments">TOURNAMENTS</a>
        </div>
    </div>
</div>
<div class="container col-lg-2" style="margin-left: 110px">
    <?php

    $_SESSION['jenis'] = "ff";
    ?>
    <a href="<?php echo base_url() ?>daftarteam" class="btn btn-primary btn-block">Daftar Tim</a>

</div>
<div class="card bg-black mb-5" style="overflow-x:auto">
    <div class="container">

        <div class="row mt-3">
            <div class="col-lg-12 d-flex flex-row mb-3">
                <small class="mr-3 mt-1">SORT BY</small>
                <select class="select-custom" id="selectTeam">
                    <option selected value="">-SELECT-</option>
                    <option value="1">TEAM NAME</option>
                    <option value="2">TAHUN GABUNG</option>
                </select>
            </div>
            <div id="tampilTimFf" class='container'></div>
        </div>
    </div>
</div>
