<!DOCTYPE html>
<html >
<head>
  <!-- Site made with Mobirise Website Builder v4.8.1, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.8.1, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="{{ asset('assetsfrontend/images/logo_pemkot.png') }}" type="image/x-icon">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <title>Dinas Sosial Kota Tegal</title>
  <link rel="stylesheet" href="{{ asset('assetsfrontend/web/assets/mobirise-icons-bold/mobirise-icons-bold.css') }}">
  <link rel="stylesheet" href="{{ asset('assetsfrontend/web/assets/mobirise-icons/mobirise-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('assetsfrontend/tether/tether.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assetsfrontend/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assetsfrontend/bootstrap/css/bootstrap-grid.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assetsfrontend/bootstrap/css/bootstrap-reboot.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assetsfrontend/dropdown/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assetsfrontend/animatecss/animate.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assetsfrontend/socicon/css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('assetsfrontend/theme/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assetsfrontend/mobirise/css/mbr-additional.css') }}">
  <script>
      function ceknik() {
          var nik = $('#nik').val();
          console.log(nik);

          $.ajax({
              url: '/cari/getnik/',
              type: 'GET',
              data:{nik:nik},
              success:function (result) {
                    $("#notifverif").text(result);
                      

              },
              error: function(xhr, ajaxOptions, thrownError) {
                  console.log(xhr.responseText);
              }
          })
      }
  </script>
  
</head>
<body>
  <section class="menu cid-r2t69rfwBI" once="menu" id="menu2-2">
    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm bg-color transparent">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="/">
                        <img src="{{asset('assetsfrontend/images/header_logoDinsos.png') }}" alt="Serenidad Homes" title="" style="height: 4.9rem;">
                    </a>
                </span>
                <!-- <span class="navbar-caption-wrap"><a class="navbar-caption text-warning display-4" href="index.html">
                        Dinas Sosial </br>Pemerintah Kota Tegal</a></span> -->
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                <li class="nav-item">
                    <a class="nav-link link text-secondary display-4" href="/">
                        <span class="mbri-home mbr-iconfont mbr-iconfont-btn" style="color: rgb(255, 51, 102);"></span>Home
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</section>

<section class="engine"><a href="https://mobiri.se/a">online site builder</a></section>
<section class="mbr-section form1 cid-r2tiMjmYwP" id="form1-h">    
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                    SEARCH DATA
                </h2>
                <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
                    Masukkan NIK untuk mencari proses data anda.</h3>
                <h2 id="notifverif" class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5"></h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8" data-form-type="formoid">
                    <div data-form-alert="" hidden="">
                        Thanks for filling out the form!
                    </div>
            
                    <!-- <form class="mbr-form" action="" method="post" data-form-title="Mobirise Form"> -->
                        <div class="row row-sm-offset">
                            <div class="col-md-4 multi-horizontal" data-for="name">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="name-form1-h">NIK</label>
                                    <input type="text" id="nik" class="form-control" name="nik" data-form-field="Name" required="" >
                                </div>
                            </div>
                        </div>
            
                        <span class="input-group-btn"><button  type="submit" class="btn btn-primary btn-form display-4 " onclick="ceknik()">CARI DATA</button></span>
                    <!-- </form> -->
            </div>
        </div>
    </div>
</section>

<section class="cid-r2teHS1OXg" id="footer2-d">

    <div class="container">
        <div class="media-container-row content mbr-white">
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <p class="mbr-text"><a href="#">
                    </a><strong><a href="#">Alamat</a></strong><a href="#">
                    </a><br><a href="#">
                    </a><br><a href="#">Jl. Sipelem No.2, Pekauman, Kec. Tegal Barat., Kota Tegal, Jawa Tengah 52112</a><br><a href="#">
                    </a></p>
            </div>
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <p class="mbr-text"><a href="contacts.html">
                    </a><strong><a href="contacts.html">Contacts</a></strong><a href="contacts.html">
                    </a><br><a href="#">
                    </a><br><a href="#">Email: dinassosialtegalkota@gmail.com &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</a><br><a href="#">Telepon: (0283) 355091&nbsp;</a><br><br></p>
                </a></p>
            </div>
            <div class="col-12 col-md-6">
                <div class="google-map"><iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.1898978762297!2d109.11897041429602!3d-6.867834269102999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fb761c33114db%3A0xd6ea687560142313!2sDinas%20Sosial%20Kota%20Tegal!5e0!3m2!1sen!2sid!4v1626669562103!5m2!1sen!2sid" allowfullscreen=""></iframe></div>
            </div>
        </div>
        <div class="footer-lower">
            <div class="media-container-row">
                <div class="col-sm-12">
                    <hr>
                </div>
            </div>
            <div class="media-container-row mbr-white">
                <div class="col-sm-6 copyright">
                    <center>
                        <p class="mbr-text mbr-fonts-style display-7">
                            <!-- © Copyright 2018 Serenidad Homes - All Rights Reserved -->
                            © Dinas Sosial Kota Tegal 2021
                        </p>
                    </center>
                </div>
            </div>
        </div>
    </div>
</section>

  <script src="{{ asset('assetsfrontend/web/assets/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assetsfrontend/popper/popper.min.js') }}"></script>
  <script src="{{ asset('assetsfrontend/tether/tether.min.js') }}"></script>
  <script src="{{ asset('assetsfrontend/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assetsfrontend/viewportchecker/jquery.viewportchecker.js') }}"></script>
  <script src="{{ asset('assetsfrontend/dropdown/js/script.min.js') }}"></script>
  <script src="{{ asset('assetsfrontend/touchswipe/jquery.touch-swipe.min.js') }}"></script>
  <script src="{{ asset('assetsfrontend/smoothscroll/smooth-scroll.js') }}"></script>
  <script src="{{ asset('assetsfrontend/theme/js/script.js') }}"></script>
  <script src="{{ asset('assetsfrontend/formoid/formoid.min.js') }}"></script>

  
 <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i></i></a></div>
    <input name="animation" type="hidden">
  </body>
</html>