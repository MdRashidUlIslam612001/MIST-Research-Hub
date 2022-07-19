<?php
session_start();
  include 'db_conn.php';
  if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    if(isset($_POST['submit'])) {
      
      
      $name = $_POST['StudentName'];
      $id = $_POST['StudentID'];
      $dept = $_POST['Department'];
      $enrolldate = $_POST['EnrollDate'];
      $graddate = $_POST['AdmitDate'];
      $no_of_attended_conferences = $_POST['no_of_attended_conferences'];
      $no_of_researches = "4";
      $cgpa = $_POST['CGPA'];
      $phone = $_POST['PhoneNumber'];
      $email = $_POST['email'];
      $password = $_POST['password'];
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
      VALUES ('S_' || per_user_sq.NEXTVAL,'$name',CONTACT('$email','$phone'),'$password','$dept','$res_int','$no_of_researches','$no_of_attended_conferences')";
      $stid = oci_parse($conn, $sql);
      $r = oci_execute($stid);

      $sql = "
      insert into student (STUDENT_ID ,ACC_ID,INSTITUTION ,CGPA )
      VALUES ('$id','S_' || per_user_sq.currVAL,'$institution','$cgpa')";
      $stid = oci_parse($conn, $sql);
      $r = oci_execute($stid);
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Student Registration Form</title>

<!-- BOOTSTRAP CSS -->
<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
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

<!-- Script --> 

<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> 
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script> 
<script src="js/function.js" ></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script> 
<script>
    $(document).ready(function(){

$('.input-daterange').datepicker({
    format: 'dd/mm/yyyy',
    autoclose: true,
    calendarWeeks : false,
    clearBtn: true,
    disableTouchKeyboard: true
});

});
	  
	  </script> 

<link href="http://fonts.cdnfonts.com/css/berlin-sans-fb-demi" rel="stylesheet"> -->

<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

</head>
<body >

<!-- navbar starts -->
<!-- <div id="nav-placeholder"></div>
<script> $(function(){ $("#nav-placeholder").load("navbar.html"); }); </script> -->
<!-- navbar ends -->

<div class="bg-light" >
  <div class="container" style="padding: 10px 10px 0px 0px;">
    <h2 style="text-align: left"><b>Student Registration Form:</b></h2>
  </div>
  <div class="container mt-5">
    <form class="row g-3 bg-white border p-3 border-1" style="border-radius: 5px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" action="" method="POST">
      
      <!-- <form class="row g-3 bg-white border p-3" method="post" enctype="multipart/form-data"> -->
      
      <div class="col-md-12">
        <label for="StudentName" class="form-label">
        <h6>Name<font color="ff0000">*</font></h6>
        </label>
        <input type="text" required class="form-control" name="StudentName" id="StudentName" />
      </div>
      <!-- <div class="col-md-4">
        <label for="AcademicYear" class="form-label">
        <h6>Academic year<font color="ff0000">*</font></h6>
        <input type="text" required class="form-control" id="StudentName" />
        </label>
        <br />
      </div> -->
      <div class="col-md-6">
        <label for="StudentID" class="form-label">
        <h6>Student ID<font color="ff0000">*</font></h6>
        </label>
        <input type="text" required class="form-control" name="StudentID" id="StudentID" maxlength="9" minlength="9"/>
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
        <label for="Student Photo" class="form-label">
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
     
      <!-- <div class="col-md-12">
        <label for="Present Address" class="form-label"
              >
        <h6>Present Address</h6>
        </label>
        <textarea
              class="form-control"
              id="PresentAddress"
              rows="3"
            ></textarea>
      </div>
      <div class="col-md-12">
        <label for="Permanent Address" class="form-label"
              >
        <h6>Permanent Address</h6>
        </label>
        <textarea
              class="form-control"
              id="PermanentAddress"
              rows="3"
            ></textarea>
      </div> -->
      <div class="col-md-6">
        <label for="no_of_attended_conferences" class="form-label">
        <h6>Number of Attended Conference<font color="ff0000">*</font></h6>
        </label><input type="number" id="no_of_attended_conferences" name="no_of_attended_conferences" min="0" max="100">
        <br/>
        <!-- <select class="form-control selectpicker" required>
          <option selected disabled>Blood Group</option>
          <option value="A+">A+</option>
          <option value="A-">A-</option>
          <option value="B+">B+</option>
          <option value="B-">B-</option>
          <option value="O+">O+</option>
          <option value="O-">O-</option>
          <option value="AB+">AB+</option>
          <option value="AB-">AB-</option>
        </select> -->
      </div>
      <div class="col-md-12">
        <label for="Attended Conferences" class="form-label">
        <h6>Attended Conferences<font color="ff0000">*</font></h6>
        </label>
        <input type="text" required class="form-control" id="PhoneNumber" />
      </div>
      
      <div class="col-md-12">
        <label for="CGPA" class="form-label">
        <h6>CGPA<font color="ff0000">*</font></h6>
        </label>
        <input type="number" required class="form-control" name="CGPA" id="CGPA" min="0.00" max="4.00" step=".01"/>
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
        <button type="submit" name="submit" value="Submit" class="btn btn-success">Submit</button>
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

<!-- BOOTSTRAP JS --> 

<!-- <script src="js/login.js"></script> 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script> 
<script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script> 
<script>
    $('#password, #confirmpassword').on('keyup', function(){

        $('.confirm-message').removeClass('success-message').removeClass('error-message');

        let password=$('#password').val();
        let confirm_password=$('#confirmpassword').val();

        if(password===""){
            $('.confirm-message').text("Password Field cannot be empty").addClass('error-message');
        }
        else if(confirm_password===""){
            $('.confirm-message').text("Confirm Password Field cannot be empty").addClass('error-message');
        }
        else if(confirm_password===password)
        {
            $('.confirm-message').text('Password Match!').addClass('success-message');
        }
        else{
            $('.confirm-message').text("Password Doesn't Match!").addClass('error-message');
        }

    });
</script> -->
</body>
</html>
