<?php
include_once "src/view/partials/head.php";
include_once "src/view/partials/sidenav.php";
?>
<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
  <div class="container-fluid">
    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved19.jpg'); background-position-y: 90%;">
      <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
      <div class="row gx-4">
        <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
            <img src="<?php echo $_SESSION['company']['imageUrl'] ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm"> <!-- IMAGE PROFILE -->
          </div>
        </div>
        <div class="col-auto my-auto">
          <div class="h-100">
            <h5 class="mb-1">
              <?php echo $_SESSION['company']['name']; ?>
              <!-- NAME PROFILE -->
            </h5>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12 col-xl-4">
        <div class="card h-100">
          <div class="card-header pb-0 p-3">
            <div class="row">
              <div class="col-md-8 d-flex align-items-center">
                <h6 class="mb-0">
                    Información
                </h6>
              </div>
            </div>
          </div>
          <div class="card-body p-3">
            <p class="text-sm">
                <?php echo $_SESSION['company']['description']; ?>
            </p>
            <ul class="list-group">
              <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Correo:</strong> <?php echo $_SESSION['company']['email']; ?></li>
              <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Ubicación:</strong> <?php echo $_SESSION['company']['coordinates']; ?></li>
              <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Visible:</strong> <?php echo $_SESSION['company']['visible']?"YES":"NO"; ?></li>
            </ul>
            <hr class="horizontal gray-light my-4">
            <form action="/profile/deleteUser" method="POST">
              <button type="submit" class="btn btn-primary">Delete<i class="fa fa-trash" style="padding-left: 4px;"></i></button>
            </form>
          </div>
        </div>
      </div>
      <!-- CARD TRABJOS ACTIVOS -->
      <div class="col-12 col-xl-4">
        <div class="card h-100">
          <div class="card-header pb-0 p-3">
            <h6 class="mb-0">Puestos de trabajo</h6>
          </div>
          <div class="card-body p-3">
            <ul class="list-group">
              <!-- FOREACH -->
              <?php 
              foreach ($_SESSION['company']['offerList'] as $offer){ 
                if ($offer['visible']){
              ?>
              <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                <div class="avatar-group mt-2">
                  <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                    <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                  </a>
                  <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                    <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                  </a>
                  <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                    <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                  </a>
                  <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                    <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                  </a>
                </div>
                <div class="d-flex align-items-start flex-column justify-content-center">
                  <h6 class="mb-0 text-sm"><?php echo $offer['title'] ?></h6>
                  <?php if($offer['remote']){ ?>
                    <p class="mb-0 text-xs">Remoto</p>
                  <?php } else { ?>
                    <p class="mb-0 text-xs">Presencial</p>
                  <?php } ?>
                </div>
                <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="/list_offer?offerId=<?php echo $offer['id']; ?>">Ir al puesto</a>
              </li>
              <?php 
                }
              } 
              ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-12 col-xl-4">
        <div class="card h-100 card-plain border">
          <div class="card-body d-flex flex-column justify-content-center text-center">
            <a href="/new_offer">
              <i class="fa fa-plus text-secondary mb-3"></i>
              <h5 class=" text-secondary"> Nuevo puesto de trabajo </h5>
            </a>
          </div>
        </div>
      </div>
    </div>
    <?php include_once "src/view/partials/footer.php"; ?>
  </div>
</div>

<!--   Core JS Files   -->
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>