<?php
session_start();
  include 'db_conn.php';
  if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    if(isset($_POST['submit'])) {
      
        $approval = 'Pending';
        $pdf = '';
        $link = $_POST['paper_link'];
        $publisher = $_POST['publisher'];
        $title = $_POST['paper_title'];
        $pubornot = $_POST['pubornot'];
        $abst = $_POST['paper_abstract'];
        $type = $_POST['conforjour'];
        
        $sql = "
        insert into RESEARCH (RESEARCH_ID,APPROVE_STATUS,PAPER_PDF,PAPER_LINK,PUBLISHER,PAPER_TITLE,PUBLISH_STATUS,PAPER_ABSTRACT,PAPER_TYPE)
        VALUES ('R_' || per_paper_sq.NEXTVAL,'$approval','$pdf','$link','$publisher','$title','$pubornot','$abst','$type')";
        $stid = oci_parse($conn, $sql);
        $r = oci_execute($stid);

        

        if($type == 'Conference') {
            $conf_name = $_POST['conf_name'];
            $type_of_paper = $_POST['type_of_paper'];
            $doi = $_POST['doi'];

            $sql = "
            insert into CONFERENCE_PAPER (RESEARCH_ID,CONFERENCE_NAME,TYPE_OF_PAPER,DOI)
            VALUES ('R_' || per_paper_sq.CURRVAL,'$conf_name','$type_of_paper','$doi')";
            $stid = oci_parse($conn, $sql);
            $r = oci_execute($stid);
        }
        else {
            $jour_name = $_POST['jour_name'];
            $sjr = $_POST['sjr'];
            $issn = $_POST['issn'];

            $sql = "
            insert into JOURNAL_PAPER (RESEARCH_ID,JOURNAL_NAME,SJR_RATING,ISSN)
            VALUES ('R_' || per_paper_sq.CURRVAL,'$jour_name','$sjr','$issn')";
            $stid = oci_parse($conn, $sql);
            $r = oci_execute($stid);
        }

      $res_int = "";
      if(isset($_POST['resint'])){
        foreach($_POST['resint'] as $selected){
            $sql = "
            insert into RESEARCH_AREA (RESEARCH_ID,RESEARCH_AREA)
            VALUES ('R_' || per_paper_sq.CURRVAL,'$selected')";
            $stid = oci_parse($conn, $sql);
            $r = oci_execute($stid);
        }
      }

      for($i=1;$i<=$_POST['no_of_awards'];$i++) {
        $award_name = $_POST['award'.$i];
        $sql = "
        insert into AWARDS (RESEARCH_ID,AWARDS)
        VALUES ('R_' || per_paper_sq.CURRVAL,'$award_name')";
        $stid = oci_parse($conn, $sql);
        $r = oci_execute($stid);
      }
     
      for($i=1;$i<=$_POST['no_of_authors'];$i++) {
        $id = $_POST['sorfid'.$i];
        $acc_type = $_POST['acc_type'.$i];

        if($acc_type == 'Student') {
            $sql = "
            insert into STUDENT_RESEARCH (STUDENT_ID,RESEARCH_ID)
            VALUES ('$id','R_' || per_paper_sq.CURRVAL)";
            $stid = oci_parse($conn, $sql);
            $r = oci_execute($stid);
        }
        else if($acc_type == 'Faculty') {
            $sql = "
            insert into FACULTY_RESEARCH (FACULTY_ID,RESEARCH_ID)
            VALUES ('$id','R_' || per_paper_sq.CURRVAL)";
            $stid = oci_parse($conn, $sql);
            $r = oci_execute($stid);
        }
        else {
            $sql = "
            insert into ALUMNI_RESEARCH (STUDENT_ID,RESEARCH_ID)
            VALUES ('$id','R_' || per_paper_sq.CURRVAL)";
            $stid = oci_parse($conn, $sql);
            $r = oci_execute($stid);
        }
        
      }

      
    }
  }
?>

<!DOCTYPE html>
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
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link
    rel="stylesheet"
    href="New folder/style1.css"
    />

    <!-- favicon link css  -->
    <link rel="shortcut icon" type="image/png" href="img/MIST.png" />
    <link href="assets/css/style.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

    <title>Research Paper Form</title>
  </head>
  <body class="bg-light">
    
    <!-- navbar starts -->
    <div id="nav-placeholder"></div>
    <script> $(function(){ $("#nav-placeholder").load("navbar.php"); }); </script>
    <!-- navbar ends -->

    <!-- main container  -->

    <div class="bg-light" style="margin-top: 9rem;">
      <div class="container mt-5">
        <h2 class="my-5">Research Paper Submission form :</h2>

        <form class="row g-3 bg-white border p-3" action="" method="POST">
          <!-- <form class="row g-3 bg-white border p-3" method="post" enctype="multipart/form-data"> -->
  
            <div class="col-md-12">
                <div class="form-group">
                  <label for="no_of_authors">Number of authors</label>
                  <input type="number" id="no_of_authors" name="no_of_authors" class="form-control" placeholder="1" min="1" max="20" onchange="gen_author_id_field();">
                </div>
            </div> 

            <div class="form-group" id="id_node_def" style="display: none;">
              <label for="sorfid0">Student/Faculty ID</label>
              <input type="text" id="sorfid0" name="sorfid0" class="form-control" placeholder="Author 0">
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="student0" name="acc_type0" value="Student" checked>Student
                    <label class="form-check-label" for="student0"></label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="faculty0" name="acc_type0" value="Faculty">Faculty
                    <label class="form-check-label" for="faculty0"></label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="alumni0" name="acc_type0" value="Alumni">Alumni
                    <label class="form-check-label" for="alumni0"></label>
                </div>
            </div>

            <div class="col-md-6" id="id_par">
              <div class="form-group" id="id_node1">
                <label for="sorfid1">Student/Faculty ID</label>
                <input type="text" id="sorfid1" name="sorfid1" class="form-control" placeholder="Author 1">
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="student1" name="acc_type1" value="Student" checked>Student
                    <label class="form-check-label" for="student1"></label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="faculty1" name="acc_type1" value="Faculty">Faculty
                    <label class="form-check-label" for="faculty1"></label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="alumni1" name="acc_type1" value="Alumni">Alumni
                    <label class="form-check-label" for="alumni1"></label>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <h6>Paper Type<font color="ff0000">*</font></h6>
            <div class="form-check">
              <input type="radio" class="form-check-input" id="conf" name="conforjour" value="Conference" checked onchange="show_form();">Conference Paper
              <label class="form-check-label" for="conf"></label>
            </div>
            <div class="form-check">
              <input type="radio" class="form-check-input" id="jour" name="conforjour" value="Journal" onchange="show_form();">Journal Paper
              <label class="form-check-label" for="jour"></label>
            </div>
            </div>

            <div class="col-md-12">
              <h6>Publish Status<font color="ff0000">*</font></h6>
              <div class="form-check">
                <input type="radio" class="form-check-input" id="radio3" name="pubornot" value="Published" checked>Published
                <label class="form-check-label" for="radio3"></label>
              </div>
              <div class="form-check">
                <input type="radio" class="form-check-input" id="radio4" name="pubornot" value="Unpublished">Unpublished
                <label class="form-check-label" for="radio4"></label>
              </div>
              </div>

          <div class="col-md-12">
            <label for="Paper Title" class="form-label"
              ><h6>Paper Title <font color="ff0000">*</font></h6>
            </label>
            <input
              class="form-control"
              id="PaperTitle"
              required
              name="paper_title"
            ></input>
          </div>

          <div class="col-md-12">
            <label for="Paper_Abstract" class="form-label"
              ><h6>Paper Abstract<font color="ff0000">*</font></h6>
            </label>
            <input
              class="form-control"
              id="Paper_Abstract"
              required
              name="paper_abstract"
            ></input>
          </div>

          <div class="col-md-12">
            <label for="Research Interest" class="form-label">
              <h6>Paper Domain<font color="ff0000">*</font></h6>
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

            <div class="col-md-12">
                <div class="form-group">
                  <label for="no_of_awards">Number of awards</label>
                  <input type="number" id="no_of_awards" name="no_of_awards" class="form-control" placeholder="1" min="1" max="20" onchange="gen_award_field();">
                </div>
            </div> 

            <div class="form-group" id="award_def" style="display: none;">
              <label for="award0">Award Name</label>
              <input type="text" id="award0" name="award0" class="form-control" placeholder="Award 0">
            </div>

            <div class="col-md-6" id="award_par">
              <div class="form-group" id="award_n1">
                <label for="award1">Award Name</label>
                <input type="text" id="award1" name="award1" class="form-control" placeholder="Award 1">
              </div>
            </div>

          <div class="col-md-12">
            <label for="Paper Link URL" class="form-label">
              <h6>Paper Link</h6>
            </label>
            <input
              type="text"
              class="form-control"
              id="Paper Link URL"
              placeholder="Paper Link URL"
              name="paper_link"
            />
          </div>

          <div class="col-md-12">
            <label for="Team Photo" class="form-label">
              <h6>Paper PDF</h6>
            </label>
            <br />
            <input type="File" accept=".pdf" />
          </div>

          <div class="col-md-12">
            <label for="Publisher" class="form-label"
              ><h6>Publisher</h6>
            </label>
            <input
              class="form-control"
              id="Publisher"
              required
              name="publisher"
            ></input>
          </div>

          <div class="col-md-12 conf">
            <label for="Conference Name" class="form-label"
              ><h6>Conference Name<font color="ff0000">*</font></h6>
            </label>
            <input
              class="form-control"
              id="ConferenceName"
              required
              name="conf_name"
            ></input>
          </div>

          <div class="col-md-12 conf">
            <label for="Type of Paper" class="form-label"
              ><h6>Type of Paper<font color="ff0000">*</font></h6>
            </label>
            <input
              class="form-control"
              id="TypeofPaper"
              required
              name="type_of_paper"
            ></input>
          </div>

          <div class="col-md-12 conf">
            <label for="DOI" class="form-label"
              ><h6>DOI<font color="ff0000">*</font></h6>
            </label>
            <input
              class="form-control"
              id="DOI"
              required
              name="doi"
            ></input>
          </div>

          <div class="col-md-12 jour">
            <label for="Journal Name" class="form-label"
              ><h6>Journal Name<font color="ff0000">*</font></h6>
            </label>
            <input
              class="form-control"
              id="JournalName"
              required
              name="jour_name"
            ></input>
          </div>

          <div class="col-md-12 jour">
            <label for="SJR Rating" class="form-label">
              <h6>SJR Rating</h6>
            </label>
            <br />

            <select class="form-control selectpicker" name="sjr">
              <option value="Q1">Q1</option>
              <option value="Q2">Q2</option>
              <option value="Q3">Q3</option>
              <option value="Q4">Q4</option>
            </select>
          </div>

          <div class="col-md-12 jour">
            <label for="ISSN" class="form-label"
              ><h6>ISSN Number<font color="ff0000">*</font></h6>
            </label>
            <input
              class="form-control"
              id="ISSN"
              required
              name="issn"
            ></input>
          </div>

          <div class="col-md-12">
            <button type="submit" class="btn btn-success" id="submit" name="submit" value="submit">Submit</button>
          </div>
        </form>
      </div>
      <!-- footer -->

      <div class="container-fluid bg-black py-2 mt-5">
        <div class="row">
          <div class="col-md-4 pt-3">
            <p class="text-white-50 text-center">
              © 2022 MIST. All rights reserved
            </p>
            <p></p>
          </div>

          <div class="col-md-4 pt-3">
            <p class="text-white-50 text-center">
              <i class="bi bi-telephone"></i>+880 176 902 3806
            </p>
          </div>
          <div class="col-md-4 pt-3">
            <p class="text-white-50 text-center">
              <i class="bi bi-envelope"></i> info@mist.ac.bd
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- footer ends -->

    <!-- Back to top button -->
    <button type="button" class="btn btn-success btn-floating" id="btn-back-to-top">
      <i class="fas fa-arrow-up"></i>
    </button>

    <script src="assets/js/main.js"></script>

    <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
