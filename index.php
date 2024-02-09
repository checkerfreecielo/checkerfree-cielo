<?php
session_start();
error_reporting(0);
ignore_user_abort();



?>

<!DOCTYPE html>
<html class="loading" lang="pt-br" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Checker FULL</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/app-lite.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/colors/palette-gradient.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
 
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
   
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.css">

    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/page-users.css">

    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">



<style type="text/css">
  
  /* ===== Scrollbar CSS ===== */
  /* Firefox */
  * {
    scrollbar-width: auto;
    scrollbar-color: #464855 #464855;
  }

  /* Chrome, Edge, and Safari */
  *::-webkit-scrollbar {
    width: 2px;
  }

  *::-webkit-scrollbar-track {
    background: #464855;
  }

  *::-webkit-scrollbar-thumb {
    background-color: #464855;
    border-radius: 2px;
    border: 2px #464855;
  }

</style>


</head>

<body class="bg-dark vertical-layout vertical-menu-modern dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="dark-layout">
<div class="content-body">
        <div class="mt-2"></div>
        <div class="row">
          <div class="col-md-8">
            <div class="bg-dark card">
              <div class="card-body text-center">
                <h4 class="mb-2"><strong class='text-primary'>Checker Full</strong></h4>
                <textarea rows="6" class="bg-dark form-control text-white text-center form-checker mb-2" placeholder="Coloque Sua Lista Aqui (GG = BLOCK IP!)"></textarea>
                <button class="btn btn-play btn-glow btn-bg-gradient-x-blue-cyan text-white" style="width: 49%; float: left;"><i class="fa fa-play"></i> Iniciar</button>
                <button class="btn btn-stop btn-glow btn-bg-gradient-x-red-pink text-white" style="width: 49%; float: right;" disabled><i class="fa fa-stop"></i> Parar</button>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-2">
              <div class="bg-dark card-body">
                <h5 class='text-primary'>Aprovadas:<span class="badge badge-success float-right aprovadas" style='color:white'>0</span></h5>
                <hr>
                <h5 class='text-primary'>Reprovadas:<span class="badge badge-danger float-right reprovadas" style='color:white'>0</span></h5>
                <hr>
                <h5 class='text-primary'>Testadas:<span class="badge badge-info float-right testadas" style='color:white'>0</span></h5>
                <hr>
                <h5 class='text-primary'>Carregadas:<span class="badge badge-primary float-right carregadas" style='color:white'>0</span></h5>
                <hr>
                <h5 class='text-primary'>Gateway:<span class="badge badge-primary float-right" style='color:white'>Full Cielo</span></h5>
                
              </div>
            </div>
          </div>
          <div class="col-xl-12">
            <div class="card">
              <div class="bg-dark card-body">
                <div class="float-right">
                  <button type="show" class="btn btn-primary btn-sm show-lives"><i class="fa fa-eye-slash"></i></button>
                  <button class="btn btn-success btn-sm btn-copy"><i class="fa fa-copy"></i></button>					
                </div>
                <h4 class="card-title text-success mb-1"><i class="fa fa-check text-success"></i> Aprovadas</h4>
                <div id='lista_aprovadas'></div>
              </div>
            </div>
          </div>
          <div class="col-xl-12">
            <div class="card">
              <div class="bg-dark card-body">
                <div class="float-right">
                  <button type='hidden' class="btn btn-primary btn-sm show-dies"><i class="fa fa-eye"></i></button>
                  <button class="btn btn-danger btn-sm btn-trash"><i class="fa fa-trash"></i></button>					
                </div>
                <h4 class="card-title text-danger mb-1"><i class="fa fa-times text-danger"></i> Reprovadas</h4>
                <div style='display: none;' id='lista_reprovadas'></div>
              </div>
            </div>
          </div>
          </section>
        </div>
      </div>
    </div>
    <script src="theme-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
    <script>
      $(document).ready(function() {

$('.show-lives').click(function() {
  var type = $('.show-lives').attr('type');
  $('#lista_aprovadas').slideToggle();
  if (type == 'show') {
    $('.show-lives').html('<i class="fa fa-eye"></i>');
    $('.show-lives').attr('type', 'hidden');
  } else {
    $('.show-lives').html('<i class="fa fa-eye-slash"></i>');
    $('.show-lives').attr('type', 'show');
  }
});

$('.show-dies').click(function() {
  var type = $('.show-dies').attr('type');
  $('#lista_reprovadas').slideToggle();
  if (type == 'show') {
    $('.show-dies').html('<i class="fa fa-eye"></i>');
    $('.show-dies').attr('type', 'hidden');
  } else {
    $('.show-dies').html('<i class="fa fa-eye-slash"></i>');
    $('.show-dies').attr('type', 'show');
  }
});

$('.btn-trash').click(function() {
  Swal.fire({
    title: 'Reprovadas Apagadas',
    icon: 'success',
    showConfirmButton: false,
    toast: true,
    position: 'top-end',
    timer: 3000
  });
  $('#lista_reprovadas').text('');
});

$('.btn-copy').click(function() {
  Swal.fire({
    title: 'Aprovadas copiadas!',
    icon: 'success',
    showConfirmButton: false,
    toast: true,
    position: 'top-end',
    timer: 2000
  });
  var lista_lives = document.getElementById('lista_aprovadas').innerText;
  var textarea = document.createElement("textarea");
  textarea.value = lista_lives;
  document.body.appendChild(textarea);
  textarea.select();
  document.execCommand('copy');
  document.body.removeChild(textarea);
});


$('.btn-play').click(function() {
  var lista = $('.form-checker').val().trim();
  var array = lista.split('\n');
  var lives = 0,
    dies = 0,
    testadas = 0,
    txt = '';

  if (!lista) {
    Swal.fire({
      title: "Ops",
      text: "Informe uma lista para prosseguir!",
      icon: "warning",
      confirmButtonText: "Retornar",
      buttonsStyling: false,
      confirmButtonClass: 'btn btn-primary'
    });
    return false;
  }

  Swal.fire({
    title: 'Teste iniciado!',
    icon: 'success',
    showConfirmButton: false,
    toast: true,
    position: 'top-end',
    timer: 2000
  });

  var line = array.filter(function(value) {
    if (value.trim() !== "") {
      txt += value.trim() + '\n';
      return value.trim();
    }
  });

  var total = line.length;

  $('.form-checker').val(txt.trim());

  if (total > 100) {
    Swal.fire({
      title: "Ops",
      text: "Você pode utilizar no máximo 100 linhas!",
      icon: "warning",
      confirmButtonText: "Retornar",
      buttonsStyling: false,
      confirmButtonClass: 'btn btn-primary'
    });
    return false;
  }

  $('.carregadas').text(total);
  $('.btn-play').attr('disabled', true);
  $('.btn-stop').attr('disabled', false);

  var audioLive = new Audio('aaa.mp3');

  line.forEach(function(data) {
    var callBack = $.ajax({
      url: 'api.php?lista=' + data,
      success: function(retorno) {
        if (retorno.indexOf("Aprovada") >= 0) {
          Swal.fire({
            title: '+1 Aprovada',
            icon: 'success',
            showConfirmButton: false,
            toast: true,
            position: 'top-end',
            timer: 2000
          });
          $('#lista_aprovadas').append(retorno);
          removelinha();
          lives = lives + 1;
          audioLive.play();
        } else {
          $('#lista_reprovadas').append(retorno);
          removelinha();
          dies = dies + 1;
        }
        testadas = lives + dies;
        $('.aprovadas').text(lives);
        $('.reprovadas').text(dies);
        $('.testadas').text(testadas);

        if (testadas == total) {
          Swal.fire({
            title: 'Teste Concluido!',
            icon: 'success',
            showConfirmButton: false,
            toast: true,
            position: 'top-end',
            timer: 2000
          });
          Swal.fire({
            title: "Teste Finalizado",
            text: "Bons UPS!",
            icon: "success",
            confirmButtonText: "Retornar",
            buttonsStyling: false,
            confirmButtonClass: 'btn btn-primary'
          });
          $('.btn-play').attr('disabled', false);
          $('.btn-stop').attr('disabled', true);
        }
      }
    });
    $('.btn-stop').click(function() {
      Swal.fire({
        title: 'Teste Pausado',
        icon: 'warning',
        showConfirmButton: false,
        toast: true,
        position: 'top-end',
        timer: 2000
      });
      $('.btn-play').attr('disabled', false);
      $('.btn-stop').attr('disabled', true);
      callBack.abort();
      return false;
    });
  });
});
});

function removelinha() {
var lines = $('.form-checker').val().split('\n');
lines.splice(0, 1);
$('.form-checker').val(lines.join("\n"));
}
</script>

    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <script src="../../../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js"></script>
    <script src="../../../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js"></script>
    <script src="../../../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/scripts/configs/vertical-menu-dark.js"></script>
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <script src="../../../app-assets/js/scripts/components.js"></script>
    <script src="../../../app-assets/js/scripts/footer.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/page-users.js"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>