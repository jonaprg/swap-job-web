<?php
include_once "src/view/partials/head.php";
?>

<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container">
        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="">
            SWAP JOB EMPRESA
        </a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
        </button>
    </div>
</nav>
<!-- End Navbar -->
<main class="main-content  mt-0">
    <section class="min-vh-100 mb-8">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
             style="background-image: url('/assets/img/curved-images/curved14.jpg');">
            <span class="mask bg-gradient-dark opacity-6"></span>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4">
                            <h5>Register</h5>
                        </div>
                        <div class="card-body">
                            <form action="signup/register" method="POST">
                                <div class="mb-3">
                                    <input name="company" type="text" class="form-control" placeholder="Company Name"
                                           aria-label="Name"
                                           aria-describedby="email-addon">
                                </div>
                                <div class="mb-3">
                                    <input name="email" type="email" class="form-control" placeholder="Email"
                                           aria-label="Email"
                                           aria-describedby="email-addon">
                                </div>
                                <div class="mb-3">
                                    <input name="password" type="password" class="form-control" placeholder="Password"
                                           aria-label="Password" aria-describedby="password-addon">
                                </div>
                                <div class="mb-3">
                                    <input name="coordinates" type="text" class="form-control" placeholder="Coordinates"
                                           value="" aria-label="Coordinates">
                                </div>
                                <div class="mb-3">
                                    <input name="description" type="text" class="form-control" placeholder="Description"
                                           aria-label="Description">
                                </div>
                                <div class="mb-3">
                                    <input name="postal" type="number" class="form-control"
                                           placeholder="Postal code no leading zeros"
                                           aria-label="Postal">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                                </div>
                                <p class="text-sm mt-3 mb-0">Already have an account? <a href="./"
                                                                                         class="text-dark font-weight-bolder">Sign
                                        in</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
<footer class="footer py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-4 mx-auto text-center">
                <a href="javascript:;" target="_blank" class="text-secondary me-xl-12 me-6 mb-sm-0 mb-2">
                    About Us
                </a>
                <a href="javascript:;" target="_blank" class="text-secondary me-xl-12 me-6 mb-sm-0 mb-2">
                    Team
                </a>
            </div>

        </div>
        <div class="row">
            <div class="col-8 mx-auto text-center mt-1">
                <p class="mb-0 text-secondary">
                    Copyright ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    SWAP JOB.
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
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
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.5"></script>
</body>

</html>