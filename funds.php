<?php
session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc

include 'db_conn.php';
?><!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"
    />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"
    />

    <link
    rel="stylesheet"
    href="New folder/style1.css"
    />

    <!-- favicon link css  -->
    <link rel="shortcut icon" type="image/png" href="img/MIST.png" />
    <link href="assets/css/style.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

    <title>Funds</title>
  </head>
  <body>
    <!-- navbar starts -->
    <div id="nav-placeholder"></div>
    <script> $(function(){ $("#nav-placeholder").load("navbar.php"); }); </script>
    <!-- navbar ends -->

    <!-- papers -->
    <div class="container-flex">
      <div class="container px-4 pt-5">
        <div class="row gx-5">
          
          <div class="col-xxl-12 col-12">
            <div class="card mb-2 border border-3  border-success">
              <h5 class="card-header text-white bg-success">Funds</h5>
              <?php
                                $sql = "select * from FUND_REQUESTS JOIN NEEDS USING (FUND_ID) JOIN RESEARCH USING (RESEARCH_ID) where FUND_STATUS='Not Raised'
                                ";
                                $stid = oci_parse($conn, $sql);
                                $r = oci_execute($stid);
                               
                                while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) 
                                { $ar=($row['AMOUNT_REQUIRED'] /$row['AMOUNT_RAISED'])*100 ;

                                echo '
                                
                              <div class="card-body bg-white">
                                <a
                                  href="paper_details.html"
                                  class="text-decoration-none text-black"
                                  ><div class="p-3 mt-2 mb-2 border border border-2  border-success">
                                    <h4 class="mb-3"> 
                                      ' .$row['PAPER_TITLE'] .'
                
                                  </h4>
                                  <h4 class="mb-3">
                                      ' .$row['PAPER_TYPE'] .' Paper
                
                                  </h4>
                                  <h6 class="mb-3">Amount left to be raised: 
                                  ' .$row['AMOUNT_LEFT']*(-1) .' Taka
            
                              </h6>

                                  <div class=" text-black">
                                  <p class="m-0 p-2">
                                   <h6 class="d-inline-block"></h6>
                                    <a href="#" class="text-decoration-none float-end">
                                      <div class="btn-group float-end" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-outline-success">Accept</button>
                                        <button type="button" class="btn btn-outline-danger">Reject</button>
                                      </div>
                                   </a>
                                  </p>
                                  <div class="progress">
                                  <div class="progress-bar bg-success" role="progressbar" style="width: '.$ar.'%; " aria-valuenow=" ' .$row['AMOUNT_REQUIRED'] .';" aria-valuemin="0" aria-valuemax=" ' .$row['AMOUNT_RAISED'] .'">'.$row['AMOUNT_REQUIRED'].' Tk / '.$row['AMOUNT_RAISED'].' Tk raised</div>
                              </div>
                              <br>
                              <a class="btn-sm btn-success" id="donatefund" type="button" href="grantproviderform.php" style="text-decoration: none;">Donate Fund</a>
                            </div>
                                </div>
                               </a
                                >
                              </div>
                               
                                ';
                                }


              ?> 


              
            </div>
          </div>
          <!-- Right BAR ends -->
        </div>
      </div>

      <!-- footer -->
      <!-- footer -->

      <div class="container-fluid bg-black py-2 mt-5">
        <div class="row">
          <div class="col-md-4 col-12 pt-3">
            <p class="text-white-50 text-center">
              ?? 2022 MIST. All rights reserved
            </p>
            <p></p>
          </div>

          <div class="col-md-4 col-12 pt-3">
            <p class="text-white-50 text-center">
              <i class="bi bi-telephone"></i>+880 176 902 3806
            </p>
          </div>
          <div class="col-md-4 col-12 pt-3">
            <p class="text-white-50 text-center">
              <i class="bi bi-envelope"></i> info@mist.ac.bd
            </p>
          </div>
        </div>
      </div>

      <!-- footer -->
    </div>
    <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Back to top button -->
  <button type="button" class="btn btn-success btn-floating" id="btn-back-to-top">
    <i class="fas fa-arrow-up"></i>
  </button>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script> -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>