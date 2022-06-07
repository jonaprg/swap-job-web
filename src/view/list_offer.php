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
        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
          <div class="nav-wrapper position-relative end-0">

            <li class="nav-item">
              <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <title>settings</title>
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                      <g transform="translate(1716.000000, 291.000000)">
                        <g transform="translate(304.000000, 151.000000)">
                          <polygon class="color-background" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                          </polygon>
                          <path class="color-background" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" opacity="0.596981957"></path>
                          <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                          </path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
                <span class="ms-1">Configuración</span>
              </a>
            </li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>
    <?php
        $currentOffer = false;
        foreach ($_SESSION['company']['offerList'] as $offer) {
            if ($offer['id'] == $_SESSION['currentId']) {
                $currentOffer = $offer;
            }
        }
    ?>
    <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12 col-xl-12">
        <div class="card h-100">
          <div class="card-header pb-0 p-3">
            <div class="row">
              <div class="col-md-8 d-flex align-items-center">
                <h6 class="mb-0"><?php echo $currentOffer['title']; ?></h6>
              </div>

            </div>
          </div>
          <div class="card-body p-3">
            <label>Title</label>
            <div class="mb-3">
                <span type="text" name="title" class="form-control" aria-label="" aria-describedby=""><?php echo $currentOffer['title']; ?></span>
            </div>
            <label>Description</label>
            <div class="mb-3">
                <span type="text" name="description" class="form-control" aria-label="" aria-describedby=""><?php echo $currentOffer['description']; ?></span>
            </div>
            <label>Needed Skills</label>
            <div id="selection" class="mb-3">
            <?php foreach($currentOffer['skillList'] as $skill){ ?>
              <button id="<?php echo $skill["id"]?>" title="<?php echo $skill["title"]?>" class="btn btn-secondary" type="button" style="margin-right: 5px;"><?php echo $skill['title']; ?></button>
            <?php } ?>
            </div>

            <label>Salary</label>
            <div class="mb-3">
                <span type="number" id="salary" name="salary" class="form-control" aria-label="" aria-describedby=""><?php echo $currentOffer['salary']; ?></span>
            </div>

            <label for="remote">Remote work?</label>
            <div class="mb-3">
            <?php if ($currentOffer['remote']){ ?>
                <span class="form-control">Yes</span>
            <?php } else { ?>  
                <span class="form-control">No</span>
            <?php } ?>
            </div>

            <label for="labour">Hours per week?</label>
            <div class="mb-3">
                <span type="number" id="labour" name="labour" class="form-control" aria-label="" aria-describedby=""><?php echo $currentOffer['labour']; ?></span>
            </div>
            </br>
            <div class="d-flex flex-row">
              <form action="/list_offer/disable" method="POST" style="padding-right: 16px;">
                  <button type="submit" class="btn btn-secondary">Disable<i class="fa fa-trash" style="padding-left: 4px;"></i></button>
              </form>
              <form action="/list_offer/finalize" method="POST">
                  <button type="submit" class="btn btn-primary">Finalize<i class="fa fa-exit" style="padding-left: 4px;"></i></button>
              </form>
            </div>
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