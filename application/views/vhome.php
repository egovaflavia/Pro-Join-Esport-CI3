<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "components/head.php"; ?>
  <style type="text/css">
    /* style untuk link popup */
    a.popup-link {
      padding: 17px 0;
      text-align: center;
      margin: 10% auto;
      position: relative;
      width: 300px;
      color: #fff;
      text-decoration: none;
      background-color: #FFBA00;
      border-radius: 3px;
      box-shadow: 0 5px 0px 0px #eea900;
      display: block;
    }

    a.popup-link:hover {
      background-color: #ff9900;
      box-shadow: 0 3px 0px 0px #eea900;
      -webkit-transition: all 1s;
      transition: all 1s;
    }

    /* end link popup*/
    /* animasi popup */

    @-webkit-keyframes autopopup {
      from {
        opacity: 0;
        margin-top: -200px;
      }

      to {
        opacity: 1;
      }
    }

    @-moz-keyframes autopopup {
      from {
        opacity: 0;
        margin-top: -200px;
      }

      to {
        opacity: 1;
      }
    }

    @keyframes autopopup {
      from {
        opacity: 0;
        margin-top: -200px;
      }

      to {
        opacity: 1;
      }
    }

    /* end animasi popup */
    /*style untuk popup */
    #popup {
      background-color: rgba(0, 0, 0, 0.8);
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      margin: 0;
      -webkit-animation: autopopup 2s;
      -moz-animation: autopopup 2s;
      animation: autopopup 2s;
    }

    #popup:target {
      -webkit-transition: all 1s;
      -moz-transition: all 1s;
      transition: all 1s;
      opacity: 0;
      visibility: hidden;
    }

    @media (min-width: 768px) {
      .popup-container {
        width: 600px;
      }
    }

    @media (max-width: 767px) {
      .popup-container {
        width: 100%;
      }
    }

    .popup-container {
      position: relative;
      margin: 7% auto;
      margin-top: 200px;

      padding: 30px 50px;
      background-color: #fafafa;
      color: #333;
      border-radius: 3px;
    }

    a.popup-close {
      position: absolute;
      top: 3px;
      right: 3px;
      background-color: #333;
      padding: 7px 10px;
      font-size: 20px;
      text-decoration: none;
      line-height: 1;
      color: #fff;
    }

    /* end style popup */
  </style>
</head>

<body id="page-top">
  <?php include "components/menu.php"; ?>
  <?php echo $contents; ?>

  <?php include "components/footer.php"; ?>

  <script src="<?php echo base_url('frontend/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <script src="<?php echo base_url('frontend/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

  <script src="<?php echo base_url('frontend/js/joinesports.js') ?>"></script>
  <script>
    $(document).ready(function() {

      $('#selectTeam').change(function(e) {
        e.preventDefault();
        var kode = $(this).val();
        $.ajax({
          url: '<?= base_url('Pubg/ApiContent') ?>',
          type: 'POST',
          data: {
            'kode': kode
          },
          success: function(data) {
            $('#tampilTimPubg').html(data);
          }
        })
      })
    })
  </script>
  <script>
    $(document).ready(function() {
      $('#selectTeam').change(function(e) {
        e.preventDefault();
        var kode = $(this).val();
        $.ajax({
          url: '<?= base_url('Ml/ApiContent') ?>',
          type: 'POST',
          data: {
            'kode': kode
          },
          success: function(data) {
            $('#tampilTimMl').html(data);
          }
        })
      })
    })
  </script>
  <script>
    $(document).ready(function() {
      $('#selectTeam').change(function(e) {
        e.preventDefault();
        var kode = $(this).val();
        $.ajax({
          url: '<?= base_url('Pb/ApiContent') ?>',
          type: 'POST',
          data: {
            'kode': kode
          },
          success: function(data) {
            $('#tampilTimPb').html(data);
          }
        })
      })
    })
  </script>
  <script>
    $(document).ready(function() {
      $('#selectTeam').change(function(e) {
        e.preventDefault();
        var kode = $(this).val();
        $.ajax({
          url: '<?= base_url('Pubgm/ApiContent') ?>',
          type: 'POST',
          data: {
            'kode': kode
          },
          success: function(data) {
            $('#tampilTimPubgm').html(data);
          }
        })
      })
    })
  </script>
  <script>
    $(document).ready(function() {
      $('#selectTeam').change(function(e) {
        e.preventDefault();
        var kode = $(this).val();
        $.ajax({
          url: '<?= base_url('Ff/ApiContent') ?>',
          type: 'POST',
          data: {
            'kode': kode
          },
          success: function(data) {
            $('#tampilTimFf').html(data);
          }
        })
      })
    })
  </script>
  <script>
    $(document).ready(function() {
      $('#selectTeam').change(function(e) {
        e.preventDefault();
        var kode = $(this).val();
        $.ajax({
          url: '<?= base_url('Dota/ApiContent') ?>',
          type: 'POST',
          data: {
            'kode': kode
          },
          success: function(data) {
            $('#tampilTimDota').html(data);
          }
        })
      })
    })
  </script>
  <script>
    $('document').ready(function() {
      $('#combo_pulau').change(function() {
        var id = $(this).val();
        $.ajax({
          url: "<?= base_url('Daftarplayer/ApiPulau') ?>",
          type: 'POST',
          data: {
            'pulau_id': id
          },
          datatype: 'JSON',
          success: function(data) {
            console.log(id);
            // kota();
            $('#Provinsi').html(data);
          }
        })
      })

      $('#Provinsi').change(function() {
        var id = $(this).val();
        $.ajax({
          url: "<?= base_url('Daftarplayer/ApiKota') ?>",
          type: 'POST',
          data: {
            'kota_id': id
          },
          datatype: 'JSON',
          success: function(data) {
            console.log(id);
            $('#player_alamat').html(data);
          }
        })
      })
    })
  </script>
  <script>
    $('document').ready(function() {
      $('#combo_pulau').change(function() {
        var id = $(this).val();
        $.ajax({
          url: "<?= base_url('Daftarteam/ApiPulau') ?>",
          type: 'POST',
          data: {
            'pulau_id': id
          },
          datatype: 'JSON',
          success: function(data) {
            console.log(id);
            // kota();
            $('#Provinsi').html(data);
          }
        })
      })

      $('#Provinsi').change(function() {
        var id = $(this).val();
        $.ajax({
          url: "<?= base_url('Daftarteam/ApiKota') ?>",
          type: 'POST',
          data: {
            'kota_id': id
          },
          datatype: 'JSON',
          success: function(data) {
            console.log(id);
            $('#tim_lokasi').html(data);
          }
        })
      })
    })
  </script>
  <script>
    // Collapse Navbar
    var navbarCollapse = function() {
      if ($("#mainNav").offset().top > 100) {
        $("#mainNav").addClass("navbar-shrink");
      } else {
        $("#mainNav").removeClass("navbar-shrink");
      }
    };

    // Collapse now if page is not at top
    navbarCollapse();
    // Collapse the navbar when page is scrolled
    $(window).scroll(navbarCollapse);
  </script>
  <script>
    $('document').ready(function() {
      $('#combo_pulau').change(function() {
        var id = $(this).val();
        $.ajax({
          url: "<?= base_url('Register/ApiPulau') ?>",
          type: 'POST',
          data: {
            'pulau_id': id
          },
          datatype: 'JSON',
          success: function(data) {
            console.log(id);
            // kota();
            $('#Provinsi').html(data);
          }
        })
      })

      $('#Provinsi').change(function() {
        var id = $(this).val();
        $.ajax({
          url: "<?= base_url('Register/ApiKota') ?>",
          type: 'POST',
          data: {
            'kota_id': id
          },
          datatype: 'JSON',
          success: function(data) {
            console.log(id);
            $('#registrasi_alamat').html(data);
          }
        })
      })
    })
  </script>
  <script>
    $('document').ready(function() {
      $('#combo_pulau').change(function() {
        var id = $(this).val();
        $.ajax({
          url: "<?= base_url('Overview/ApiPulau') ?>",
          type: 'POST',
          data: {
            'pulau_id': id
          },
          datatype: 'JSON',
          success: function(data) {
            console.log(id);
            // kota();
            $('#Provinsi').html(data);
          }
        })
      })

      $('#Provinsi').change(function() {
        var id = $(this).val();
        $.ajax({
          url: "<?= base_url('Overview/ApiKota') ?>",
          type: 'POST',
          data: {
            'kota_id': id
          },
          datatype: 'JSON',
          success: function(data) {
            console.log(id);
            $('#registrasi_alamat').html(data);
          }
        })
      })
    })
  </script>
</body>

</html>