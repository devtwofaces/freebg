<?php

session_start();
if(!isset($_SESSION['onlyadminsallowed'])){
header("location:../uploadlogin/index.php");
exit;
}

?>


<!DOCTYPE html>
<html>

    <head lang="en">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin Panel</title>

        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.9/fullpage.min.css" integrity="sha512-8M8By+q+SldLyFJbybaHoAPD6g07xyOcscIOQEypDzBS+sTde5d6mlK2ANIZPnSyxZUqJfCNuaIvjBUi8/RS0w==" crossorigin="anonymous" />
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.1.9/p5.min.js"></script>

        <link rel="stylesheet" href="css/uploadquotes.css">
        <script src="js/uploadquotes.js"></script>
    </head>


    <body>
        <header class="site-header">
            <div class="site-header__inner container-wide">
                <div class="site-branding">
                    <a class="administrator" href="#"></a>
                </div>
                <div>
                    <a class="button button--sm d-nones" href="uploadlogin/index.php">
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </header>


        <div class="container-sm up1">
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFileInput" aria-describedby="customFileInput">
              <label class="custom-file-label" for="customFileInput">Select file</label>
            </div>
            <div class="input-group-append">
              <button class="btn btn-primary" type="button" id="customFileInput">Upload</button>
            </div>
          </div>
        </div>


        <div class="container gallery-container">
            <p class="page-description text-center">....</p>

            <div class="tz-gallery">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <a class="lightbox">
                            <img src="img/park.jpg" alt="Park">
                        </a>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <a class="lightbox">
                            <img src="img/bridge.jpg" alt="Bridge">
                        </a>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <a class="lightbox">
                            <img src="img/tunnel.jpg" alt="Tunnel">
                        </a>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <a class="lightbox">
                            <img src="img/coast.jpg" alt="Coast">
                        </a>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <a class="lightbox">
                            <img src="img/rails.jpg" alt="Rails">
                        </a>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <a class="lightbox">
                            <img src="img/traffic.jpg" alt="Traffic">
                        </a>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <a class="lightbox">
                            <img src="img/rocks.jpg" alt="Rocks">
                        </a>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <a class="lightbox">
                            <img src="img/benches.jpg" alt="Benches">
                        </a>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <a class="lightbox">
                            <img src="img/sky.jpg" alt="Sky">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <script>
          document.querySelector('.custom-file-input').addEventListener('change', function (e) {
            var name = document.getElementById("customFileInput").files[0].name;
            var nextSibling = e.target.nextElementSibling
            nextSibling.innerText = name
          })
        </script>


        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
