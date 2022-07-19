<?php
  include 'db_conn.php';
  if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    
    if(isset($_POST['submit'])) {
     
      $rid=$_POST['rid'];
      $raised = 0;
      $required = $_POST['required'];
      $trust = $_POST['trust'];
      $bkash = $_POST['bkash'];
      $status="Not_Approved";

      $sql = "
      insert into FUND_REQUESTS(FUND_ID ,AMOUNT_RAISED,AMOUNT_REQUIRED,TRUST_ACCNO, BKASH, FUND_STATUS )
      VALUES ('FD_' || per_fund_sq.nextVAL,'$raised','$required','$trust','$bkash','$status')";
      $stid = oci_parse($conn, $sql);
      $r = oci_execute($stid);
      $sql = "
      insert into needs(RESEARCH_ID,FUND_ID )
      VALUES ('$rid','FD_' || per_fund_sq.CURRVAL)";
      $stid = oci_parse($conn, $sql);
      $r = oci_execute($stid);

     
    }
   }
?>


<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta
  name="viewport"
  content="width=device-width, initial-scale=1, maximum-scale=1"
/>

<title>Fund Request Form</title>

<!-- BOOTSTRAP CSS -->
<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

 <!-- Vendor CSS Files -->
 <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
 <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
 <link href="assets/vendor/aos/aos.css" rel="stylesheet">
 <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
 <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
 <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
 <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

 <link
 rel="stylesheet"
 href="New folder/style1.css"
 />

 <!-- favicon link css  -->
 <link rel="shortcut icon" type="image/png" href="img/MIST.png" />
 <link href="assets/css/style.css" rel="stylesheet">

 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">



<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

</head>
<body >

<!-- navbar starts -->
 <!-- <div id="nav-placeholder"></div>
<script> $(function(){ $("#nav-placeholder").load("navbar.html"); }); </script>  -->
<!-- navbar ends -->

<div class="bg-light" >
  <div class="container" style="padding: 10px 10px 0px 0px;">
    <h2 style="text-align: left"><b>Fund Request Form:</b></h2>
  </div>
  <div class="container mt-5">
  <form class="row g-3 bg-white border p-3 border-1" style="border-radius: 5px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" action="" method="POST">      
      
      <div class="col-md-12">
      <label for="rid" class="form-label">
        <h6>Research ID:<font color="ff0000">*</font></h6>
        </label>
        <input type="text" required class="form-control" name="rid" id="rid" />
      </div>
       
      <div class="col-md-12"  >
        <label for="trust" class="form-label">
        <h6>TRUST ACC NO:<font color="ff0000">*</font></h6>
        </label>
        <input type="text" required class="form-control" name="trust" id="trust" />
      </div>
       
      <div class="col-md-6"  ></div>
    
      <div class="col-md-12">
        <label for="required" class="form-label">
        <h6>Amount required:<font color="ff0000">*</font></h6>
        </label>
        <input type="number" required class="form-control" name="required" id="required" min="1000"  />
      </div>
     

      <div class="col-md-6">
        <label for="bkash" class="form-label">
        <h6>Bkash Number<font color="ff0000">*</font></h6>
        </label>
        <input type="number" required class="form-control" name="bkash" id="bkash"  />
      </div>
 
     
      <div class="col-md-6"><br>
      </div>
      <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-success" name="submit">Submit</button>
      </div>
    </form>
  </div>
</div>

<!-- footer -->

<div class="container-fluid bg-black py-2 mt-5">
  <div class="row">
    <div class="col-md-4 pt-3">
      <p class="text-white-50 text-center"> © 2022 MIST. All rights reserved </p>
      <p></p>
    </div>
    <div class="col-md-4 pt-3">
      <p class="text-white-50 text-center"> <i class="bi bi-telephone"></i>+880 176 902 3806 </p>
    </div>
    <div class="col-md-4 pt-3">
      <p class="text-white-50 text-center"> <i class="bi bi-envelope"></i> info@mist.ac.bd </p>
    </div>
  </div>
</div>


<!-- Back to top button -->
<button type="button" class="btn btn-success btn-floating" id="btn-back-to-top">
  <i class="fas fa-arrow-up"></i>
</button>

<script src="assets/vendor/purecounter/purecounter.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>
</html>
