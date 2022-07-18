<?php
  include 'db_conn.php';
  if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    
    if(isset($_POST['submit'])) {
     
      $name = $_POST['AlumniName'];
      $id = $_POST['AlumniID'];
      $dept = $_POST['Department'];
      $enrolldate = $_POST['EnrollDate'];
      $graddate = $_POST['AdmitDate'];
      $no_of_attended_conferences = $_POST['no_of_attended_conferences'];
      $no_of_researches = "6";
      $cj = $_POST['CurrentJob'];
      $phone = $_POST['PhoneNumber'];
      $email = $_POST['email'];
      $batch = $_POST['batch'];
      $experience = $_POST['exp'];
      $password=$_POST['password'];
      $institution = "Military Institute of Science and Technology";

      $res_int = "";
      $cnt=0;
      if(isset($_POST['resint'])){
        foreach($_POST['resint'] as $selected){
            if($cnt==0) $res_int = $selected;
            else $res_int .= ','.$selected;
            $cnt = $cnt+1;
            };
      };

      $sql = "
      insert into users (ACC_ID,NAME, CONTACT,PASSWORD,DEPARTMENT,RESEARCH_INTEREST,NUMBER_OF_RESEARCHES,ATTENDED_CONFERENCE)
      VALUES ('A_' || per_user_sq.NEXTVAL,'$name',CONTACT('$email','$phone'),'$password','$dept','$res_int','$no_of_researches','$no_of_attended_conferences')";
      $stid = oci_parse($conn, $sql);
      $r = oci_execute($stid);

      $sql = "
      insert into ALUMNI (STUDENT_ID ,ACC_ID,CURRENT_JOB, ENROLL_YEAR, BATCH, GRAD_YEAR,EXPERIENCES )
      VALUES ('$id','A_' || per_user_sq.CURRVAL,'$cj',TO_DATE('$enrolldate','DD/MM/YYYY'),'$batch',TO_DATE('$graddate','DD/MM/YYYY'),'$experience')";
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

<title>Alumni Registration Form</title>

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
<div id="nav-placeholder"></div>
<script> $(function(){ $("#nav-placeholder").load("navbar.html"); }); </script> 
<!-- navbar ends-->

<div class="bg-light" >
  <div class="container" style="padding: 10px 10px 0px 0px;">
    <h2 style="text-align: left"><b>Alumni Registration Form:</b></h2>
  </div>
  <div class="container mt-5">
  <form class="row g-3 bg-white border p-3 border-1" style="border-radius: 5px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" action="" method="POST">      
      
      <div class="col-md-12">
        <label for="AlumniName" class="form-label">
        <h6>Name<font color="ff0000">*</font></h6>
        </label>
        <input type="text" required class="form-control" name="AlumniName" id="AlumniName" />
      </div>
      
      <div class="col-md-6">
        <label for="AlumniID" class="form-label">
        <h6>Student ID<font color="ff0000">*</font></h6>
        </label>
        <input type="text" required class="form-control" name="AlumniID" id="AlumniID" maxlength="9" minlength="9"/>
      </div>
      <div class="col-md-6">
      <label for="Department" class="form-label">
        <h6>Department<font color="ff0000">*</font></h6>
        </label>
        <br />
        <select class="form-control selectpicker" required name="Department">
          <option selected disabled>Department</option>
          <option value="CE">Department of Civil Engineering (CE)</option>
          <option value="EWCE">Department of Environmental, Water Resources and Coastal Engineering (EWCE)</option>
          <option value="ARCH">Department of Architecture</option>
          <option value="PME">Department of Petroleum &amp; Mining Engineering (PME)</option>
          <option value="CSE">Department of Computer Science &amp; Engineering (CSE)</option>
          <option value="EECE">Department of Electrical, Electronic and Communication Engineering (EECE)</option>
          <option value="ME">Department of Mechanical Engineering (ME)</option>
          <option value="AE">Department of Aeronautical Engineering (AE)</option>
          <option value="NAME">Department of Naval Architecture and Marine Engineering (NAME)</option>
          <option value="IPE">Department of Industrial and Production Engineering (IPE)</option>
          <option value="NSE">Department of Nuclear Science &amp; Engineering (NSE)</option>
          <option value="BME">Department of Biomedical Engineering (BME)</option>
          <option value="SH">Department of Science &amp; Humanities (SH)</option>
        </select>
      </div>
      <div class="col-md-6">
        <label for="Alumni Photo" class="form-label">
        <h6>Your Photo</h6>
        </label>
        <br />
        <input type="File" accept="image/*" />
      </div>
     
      <div class="col-md-6"  ></div>
      <div class="col-md-6"  >
        <label for="EnrollDate" class="form-label">
        <h6>Enroll Date<font color="ff0000">*</font></h6>
        </label>
        <div class="input-group input-daterange">
          <input type="text" name="EnrollDate" id="EnrollDate" placeholder="DD/MM/YYYY" class="form-control text-left mr-2" required>
          <span class="fa fa-calendar" id="fa-1"></span> </div>
      </div>
      <div class="col-md-6" >
        <label for="AdmitDate" class="form-label"
              >
        <h6>Graduation Date</h6>
        </label>
        <div class="input-group input-daterange">
          <input type="text" name="AdmitDate" id="AdmitDate" placeholder="DD/MM/YYYY" class="form-control text-left ml-2">
          <span class="fa fa-calendar" id="fa-2"></span> </div>
      </div>
      <div class="col-md-6">
          <label for="Research Interest" class="form-label">
          <h6>Research Interest<font color="ff0000">*</font></h6>
          </label>
          <br />
          <input type="checkbox" id="resint" name="resint[]" value="Machine Learning">
          <label for="resint">Machine Learning</label><br>
          <input type="checkbox" id="resint" name="resint[]" value="Artificial Intelligence">
          <label for="resint">Artificial Intelligence</label><br>
          <input type="checkbox" id="resint" name="resint[]" value="Environmental Science">
          <label for="resint">Environmental Science</label><br>
          <input type="checkbox" id="resint" name="resint[]" value="Information Technology">
          <label for="resint">Information Technology</label><br<br>
      </div>
     

      <div class="col-md-6">
        <label for="no_of_attended_conferences" class="form-label">
        <h6>Number of Attended Conference<font color="ff0000">*</font></h6>
        </label><input type="number" id="no_of_attended_conferences" name="no_of_attended_conferences" min="0" max="100">
        <br/>

      </div>
      <div class="col-md-12">
        <label for="Phone Number" class="form-label">
        <h6>Attended Conferences<font color="ff0000">*</font></h6>
        </label>
        <input type="text" required class="form-control" id="PhoneNumber" />
      </div>
      <div class="col-md-12">
        <label for="CurrentJob" class="form-label">
        <h6>CurrentJob<font color="ff0000">*</font></h6>
        </label>
        <input type="text" required class="form-control" name="CurrentJob" id="CurrentJob" />
      </div>
      <div class="col-md-12">
        <label for="batch" class="form-label">
        <h6>Batch<font color="ff0000">*</font></h6>
        </label>
        <input type="number" required class="form-control" name="batch" id="batch" min="2000" step="1"/>
      </div>
      <div class="col-md-12">
        <label for="exp" class="form-label">
        <h6>Experiences<font color="ff0000">*</font></h6>
        </label> 
        <input type="text" required class="form-control" name="exp" id="exp" />
      </div>

      <div class="col-md-6">
        <label for="PhoneNumber" class="form-label">
        <h6>Phone Number<font color="ff0000">*</font></h6>
        </label>
        <input type="text" required class="form-control" name="PhoneNumber" id="PhoneNumber" />
      </div>
      <div class="col-md-12" id="pwd-container">
        <section class="login-form">
          <div class="form-floating mt-3 mb-2">
            <input type="email" name="email" placeholder="Email" required  class="form-control input-lg"/>
            <label for="email">
            <h6>Email address<font color="ff0000">*</font></h6>
            </label>
          </div>
          <div class="form-floating mt-3 mb-2">
            <input type="password" class="form-control input-lg" name="password" id="password" placeholder="Password" required />
            <label for="password">
            <h6>Password<font color="ff0000">*</font></h6>
            </label>
          </div>
          <div class="pwstrength_viewport_progress"></div>
         </section>
      </div>
      <div class="col-md-12">
        <div class="form-floating mt-3 mb-2">
          <input type="text" style="-webkit-text-security: disc" class="form-control input-lg" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" required />
          <label for="confirmpassword">Confirm Password<font color="ff0000">*</font></label>
          <div class="form-text confirm-message"></div>
        </div>
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
