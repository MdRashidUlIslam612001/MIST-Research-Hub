<?php
 // this NEEDS TO BE AT THE TOP of the page before any output etc
 session_start();
 include 'db_conn.php';
 $accountID=$_SESSION['acc_id'];
echo $accountID;



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

    <title>Profile</title>
  </head>
  <body>
    <!-- navbar starts -->
    <div id="nav-placeholder"></div>
    <script> $(function(){ $("#nav-placeholder").load("navbar.php"); }); </script>
    <!-- navbar ends -->

      
    <!-- middle part starts -->
    <div class="bg-light">
         <!-- project head -->
         
      <?php
      
      
      $sql = "select * from USER_INFO_VIEW  where ACC_ID ='$accountID' "; //change korbo to $account_id
      $stid = oci_parse($conn, $sql);
      $r = oci_execute($stid);
      
      while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) 
         {
            echo'
            <div class="container pt-5">
         <div class="card">
          <div class="card-body bg-success p-4">
            <div class="row">
              <div class="col-md-6"> 
                <h1 class="d-inline-block text-white ms-4">Student Profile</h1>
              </div>
              <div class="col-md-2"></div>
              <div class="col-md-4" style="text-align: right;">
                  <a href="#" button type="button" class="btn-lg btn-warning my-auto" style="text-decoration: none;">Update my account</a>
              </div>
            </div>
          </div>
        </div>
      </div>
            
      
      <div class="container pt-5">
            <div class="card-body bg-white">
               
             <div class="row">
                 <div class="col-lg-4 col-12 my-auto">
                    <img src="img/studentpic.jpg" class="my-autorounded my-3 mx-auto d-block border border-3 border-success rounded " style="width: 60%;" alt="...">
                 
                  </div>
                 
                 
               
               
                <div class="col-12 col-lg-8 ">
                      
                  <div class="p-3 mt-3  mx-auto border border-3 border-success rounded ">
                    <h2 class="mb-1 ">'. $row['NAME'].'</h2>
                  
                    <h6 class="mb-0">'. $row['ACC_ID'].'</h6>
                  
                        <ul class="mt-2">
                            <li>
                            <h6 class="d-inline-block"> Department: </h6> '. $row['DEPARTMENT'].'
                            </li>
                            <li>
                            <h6 class="d-inline-block">Research Interest:  </h6>'. $row['RESEARCH_INTEREST'].'
                            </li>
                            <li>
                            <h6 class="d-inline-block">Number of Researches:  </h6> '. $row['NUMBER_OF_RESEARCHES'].'
                            </li>
                           
                            <li>
                            <h6 class="d-inline-block">Contact No:  </h6>'. $row['PHONE_NUMBER'].'
                            </li>
                            <li>
                            <h6 class="d-inline-block">Email Address:  </h6>'. $row['EMAIL'].'
                            </li>
                            <li>
                            <h6 class="d-inline-block">Attended Conferences:  </h6> '. $row['ATTENDED_CONFERENCE'].'
                            </li>
                        </ul>
                
                   
                </div>
                </div>
             </div>
             <div class="row">
             <div class="col-lg-6 col-12 my-auto">
             <!--  <div align="center">
               <a href="#" class="btn btn-primary btn-lg">
                  <i class="fa fa-facebook"></i>
                  Alumni</a>
                 </div>-->
            </div>
            </div>
            </div>
        </div>';

          

             if( $accountID[0]== 'S'){
 
             $sql = "select * from USER_INFO_VIEW U , STUDENT S where U.ACC_ID ='$accountID' AND U.ACC_ID=S.ACC_ID  "; //change korbo to $account_id
             $stid = oci_parse($conn, $sql);
             $r = oci_execute($stid);
            
             while ($rowS = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {

                echo'
              <div class="container pt-3">
              <div class="row border bg-white m-0">
              <!-- left part starts  -->
              <div class="col-12 col-lg-4 side-nav p-3 ">
              <div class="info-card p-2 border border-3 border-success m-3 rounded  ">
                <h4>Student ID:</h4>
                <p>'. $rowS['STUDENT_ID'] .'</p>
                </div>
                 <div class="info-card p-2 border border-3 border-success m-3 rounded ">
                  <h4>Institute: </h4>
                  <p>'. $rowS['INSTITUTION'] .'</p>
                </div>
                <div class="info-card p-2 border border-3 border-success m-3 rounded ">
                  <h4>CGPA</h4>
                  <p>'. $rowS['CGPA'] .'</p>
                </div>
                </div>

         ';
             }
             
        }
        if( $accountID[0]== 'F'){
 
          $sql = "select * from USER_INFO_VIEW U , FACULTY S where U.ACC_ID ='$accountID' AND U.ACC_ID=S.ACC_ID  "; //change korbo to $account_id
          $stid = oci_parse($conn, $sql);
          $r = oci_execute($stid);
         
          while ($rowS = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {

             echo'
           <div class="container pt-3">
           <div class="row border bg-white m-0">
           <!-- left part starts  -->
           <div class="col-12 col-lg-4 side-nav p-3 ">
           <div class="info-card p-2 border border-3 border-success m-3 rounded  ">
             <h4>Designation:</h4>
             <p>'. $rowS['DESIGNATION'] .'</p>
             </div>
              <div class="info-card p-2 border border-3 border-success m-3 rounded ">
               <h4>Institute: </h4>
               <p>'. $rowS['INSTITUTION'] .'</p>
             </div>
             <div class="info-card p-2 border border-3 border-success m-3 rounded ">
               <h4>CGPA</h4>
               <p>'. $rowS['QUALIFICATION'] .'</p>
             </div>
             </div>

      ';
          }
          
     }

     if( $accountID[0]== 'A'){
 
      $sql = "select * from USER_INFO_VIEW U , ALUMNI S where U.ACC_ID ='$accountID' AND U.ACC_ID=S.ACC_ID  "; //change korbo to $account_id
      $stid = oci_parse($conn, $sql);
      $r = oci_execute($stid);
     
      while ($rowS = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {

         echo'
       <div class="container pt-3">
       <div class="row border bg-white m-0">
       <!-- left part starts  -->
       <div class="col-12 col-lg-4 side-nav p-3 ">
       <div class="info-card p-2 border border-3 border-success m-3 rounded  ">
         <h4>Student ID:</h4>
         <p>'. $rowS['STUDENT_ID'] .'</p>
         </div>
         
          <div class="info-card p-2 border border-3 border-success m-3 rounded ">
           <h4>Batch </h4>
           <p>'. $rowS['BATCH'] .'</p>
         </div>
         <div class="info-card p-2 border border-3 border-success m-3 rounded ">
           <h4>Currently at:</h4>
           <p>'. $rowS['CURRENT_JOB'] .'</p>
         </div>
         <div class="info-card p-2 border border-3 border-success m-3 rounded ">
           <h4>Enroll Year:</h4>
           <p>'. $rowS['ENROLL_YEAR'] .'</p>
         </div>
         <div class="info-card p-2 border border-3 border-success m-3 rounded ">
           <h4>Graduation Year:</h4>
           <p>'. $rowS['GRAD_YEAR'] .'</p>
         </div>
         </div>


         

  ';
      }
    }
      
    echo'<!-- Project head ends-->
    <!-- firstcontainer starts -->
    
<!--         
         <div class="row">
          <div class="col-lg-6 col-12 my-auto">
            <div align="center">
            <a href="#" class="btn btn-primary btn-lg">
               <i class="fa fa-facebook"></i>
               Alumni</a>
              </div>
         </div>
         </div>
            
          </div>
    </div> -->
   
      <!-- left parts ends  -->

      <!-- right parts starts  -->
      <div class="col-lg-8 col-12 p-4 pt-4 mt-2 ">

        <!-- Awards -->
        <div class="card mb-5   border border-3 border-success rounded ">
          <h5 class="card-header bg-success m-0  text-white">Awards</h5>
          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active p-3">
                <img src="img/ach1.gif" class="d-block  my-3 mx-auto"  style="width: 100%; height: 400px;" alt="...">
                <div class="carousel-caption  d-md-block fw-bolder " >
                  <h5 class=" fw-bolder">IEEE award</h5>
                  <p class=" fw-bolder">Some representative placeholder content for the second slide.</p>
                </div>
              </div>
              <div class="carousel-item p-3">
                <img src="img/ach2.jpg" class="d-block my-3 mx-auto"  style="width: 100%; height: 400px;" alt="...">
                <div class="carousel-caption  d-md-block fw-bolder ">
                  <h5 class=" fw-bolder">IEEE awars</h5>
                  <p class=" fw-bolder">Some representative placeholder content for the second slide.</p>
                </div>
              </div>
              <div class="carousel-item p-3">
                <img src="img/ach3.jpg" class="d-block  rounded my-3 mx-auto"  style="width: 100%; height: 400px;" alt="...">
                <div class="carousel-caption  d-md-block fw-bolder ">
                  <h5 class=" fw-bolder">Conference winner</h5>
                  <p class=" fw-bolder">Some representative placeholder content for the third slide.</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        
        
        <div class="card mb-5 border border-3 border-success  rounded ">
             <div class="card-header text-white bg-success ">
               <div class="row">
                 <div class="col-md-6">
                   <h5>My Research Papers </h5>
                 </div>
                 <div class="col-md-2"></div>
                 <div class="col-md-4" style="text-align: right;">
                     <a href="researchPaperform.html" button type="button" class="btn btn-warning">Add New Research Paper</a>
                 </div>
               </div>
             </div>';


        if( $accountID[0]== 'S'){
 
          $sql = "select * from USER_INFO_VIEW U , STUDENT S , STUDENT_RESEARCH SR , RESEARCH R  where U.ACC_ID ='$accountID' AND U.ACC_ID=S.ACC_ID AND S.STUDENT_ID=SR.STUDENT_ID AND SR.RESEARCH_ID=R.RESEARCH_ID"; //change korbo to $account_id
          $stid = oci_parse($conn, $sql);
          $r = oci_execute($stid);
         
          while ($rowRE = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {

             echo'
             

             <div class="card-body bg-white">
               <a
                 href="'.$rowRE['PAPER_LINK'].'"
                 class="text-decoration-none text-black">
                 <div class="p-3 mt-2 mb-2 border border border-2  border-success">
                   <h4 class="mb-3">'.$rowRE['PAPER_TITLE'].'</h4>

                   <p class="m-0 p-2">
                    <h6 class="d-inline-block">Approve Status:</h6> '.$rowRE['APPROVE_STATUS'].'<br>
                    <h6 class="d-inline-block">'.$rowRE['PUBLISH_STATUS'].'</h6><BR>
                    <h6 class="d-inline-block"> Paper Abstract: </h6> '.$rowRE['PAPER_ABSTRACT'].'<br>
                    <h6 class="d-inline-block"> Authors: </h6>
                    ';

                    $r_id= $rowRE['RESEARCH_ID'];

                    
                   $countt=1;
                  $sql = "select * from Research R , Faculty_Research FR , FACULTY F , USER_INFO_VIEW U  where R.Research_id = '$r_id' AND FR.Research_id=R.Research_id AND F.FACULTY_ID=FR.FACULTY_ID AND U.ACC_ID=F.ACC_ID";
                  $stid = oci_parse($conn, $sql);
                  $r = oci_execute($stid);
                  while ($row1 = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) 
                    {
                      if($rowRE['NAME']==$row1['NAME']) continue;
                      if($countt==1)
                      {
                        echo '
                
                        '. $row1['NAME'] .'  ';
                                        
                      }
                  else{
                      echo '
                
                        , '. $row1['NAME'] .'
                       
                      ';
                  }
                  $countt++;

                    }


               
              $sql = "select * from Research R , Student_Research SR , STUDENT S , USER_INFO_VIEW U  where R.Research_id = '$r_id' AND SR.Research_id=R.Research_id AND S.STUDENT_ID=SR.STUDENT_ID AND U.ACC_ID=S.ACC_ID";
              $stid = oci_parse($conn, $sql);
              $r = oci_execute($stid);
              while ($row1 = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) 
                {
                  if($rowRE['NAME']==$row1['NAME']) continue;
                  if($countt==1)
                  {
                    echo '
            
                    '. $row1['NAME'] .'  ';
                                    
                  }
              else{
                  echo '
            
                    , '. $row1['NAME'] .'
                   
                  ';
              }
              $countt++;
                }


            $sql = "select * from Research R , Alumni_Research AR , Alumni A , USER_INFO_VIEW U  where R.Research_id = '$r_id' AND AR.Research_id=R.Research_id AND A.STUDENT_ID=AR.STUDENT_ID AND U.ACC_ID=A.ACC_ID";
            $stid = oci_parse($conn, $sql);
            $r = oci_execute($stid);
            while ($row1 = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) 
              {
                if($rowRE['NAME']==$row1['NAME']) continue;
                if($countt==1)
                {
                  echo '
          
                  '. $row1['NAME'] .'  ';
                                  
                }
            else{
                echo '
          
                  , '. $row1['NAME'] .'
                 
                ';
            }
            $countt++;
              }
  
          echo'     </p>
                 </div></a>
             </div>
             </div>  
             
             <div>
             <div class="card mb-5   border border-3 border-success rounded">
               <div class="card-header text-white bg-success">
                 <div class="row">
                   <div class="col-md-6">
                     <h5>Consulted By</h5>
                   </div>
                   <div class="col-md-2"></div>
                   <div class="col-md-4" style="text-align: right;">
                       <a href="request_consultancy.html" button type="button" class="btn btn-warning">Request Consultancy</a>
                   </div>
                 </div>
               </div>

               <div class="row mx-auto" >';


             $sql = "select * from USER_INFO_VIEW U , STUDENT S , CONSULTS CS , FACULTY F , USER_INFO_VIEW UR where U.ACC_ID ='S000003' AND U.ACC_ID=S.ACC_ID AND S.STUDENT_ID=CS.STUDENT_ID AND CS.FACULTY_ID=F.FACULTY_ID AND F.ACC_ID=UR.ACC_ID";
             $stid = oci_parse($conn, $sql);
             $r = oci_execute($stid);
            
             while ($rowCS = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
  
              echo '
          
                    <a class="col-md-3 col-6 py-4 border border-success border-2 m-3 mx-auto text-black" style="text-decoration: none;" href="facultyprofile.html">
                      <img
                        style="width: 60%;" class="mx-auto d-block"
                        src="https://faces-img.xcdn.link/image-lorem-face-6688.jpg"
                        alt=""
                      />
                      <h5 class="mt-3 text-center">'.$rowCS['NAME'].'</h5>
                      <p class="m-0 text-center">'.$rowCS['DESIGNATION'].'</p>

                      <p >Field of Research: '.$rowCS['FIELD_OF_RESEARCH'].'</p>

                    </a>
                    
              ';

             }

             echo '
             </div>
                    </div>
                    </div>
             ';
      
          }
          
     }





    //FACULTY R JONNE

    if( $accountID[0]== 'F'){
 
      $sql = "select * from USER_INFO_VIEW U , FACULTY S , FACULTY_RESEARCH SR , RESEARCH R  where U.ACC_ID ='$accountID' AND U.ACC_ID=S.ACC_ID AND S.FACULTY_ID=SR.FACULTY_ID AND SR.RESEARCH_ID=R.RESEARCH_ID"; //change korbo to $account_id
      $stid = oci_parse($conn, $sql);
      $r = oci_execute($stid);
     
      while ($rowRE = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {

         echo'
         

         <div class="card-body bg-white">
           <a
             href="'.$rowRE['PAPER_LINK'].'"
             class="text-decoration-none text-black">
             <div class="p-3 mt-2 mb-2 border border border-2  border-success">
               <h4 class="mb-3">'.$rowRE['PAPER_TITLE'].'</h4>

               <p class="m-0 p-2">
                <h6 class="d-inline-block">Approve Status:</h6> '.$rowRE['APPROVE_STATUS'].'<br>
                <h6 class="d-inline-block">'.$rowRE['PUBLISH_STATUS'].'</h6><BR>
                <h6 class="d-inline-block"> Paper Abstract: </h6> '.$rowRE['PAPER_ABSTRACT'].'<br>
                <h6 class="d-inline-block"> Authors: </h6>
                ';

                $r_id= $rowRE['RESEARCH_ID'];

                
               $countt=1;
              $sql = "select * from Research R , Faculty_Research FR , FACULTY F , USER_INFO_VIEW U  where R.Research_id = '$r_id' AND FR.Research_id=R.Research_id AND F.FACULTY_ID=FR.FACULTY_ID AND U.ACC_ID=F.ACC_ID";
              $stid = oci_parse($conn, $sql);
              $r = oci_execute($stid);
              while ($row1 = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) 
                {
                  if($rowRE['NAME']==$row1['NAME']) continue;
                  if($countt==1)
                  {
                    echo '
            
                    '. $row1['NAME'] .'  ';
                                    
                  }
              else{
                  echo '
            
                    , '. $row1['NAME'] .'
                   
                  ';
              }
              $countt++;

                }


           
          $sql = "select * from Research R , Student_Research SR , STUDENT S , USER_INFO_VIEW U  where R.Research_id = '$r_id' AND SR.Research_id=R.Research_id AND S.STUDENT_ID=SR.STUDENT_ID AND U.ACC_ID=S.ACC_ID";
          $stid = oci_parse($conn, $sql);
          $r = oci_execute($stid);
          while ($row1 = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) 
            {
              if($rowRE['NAME']==$row1['NAME']) continue;
              if($countt==1)
              {
                echo '
        
                '. $row1['NAME'] .'  ';
                                
              }
          else{
              echo '
        
                , '. $row1['NAME'] .'
               
              ';
          }
          $countt++;
            }


        $sql = "select * from Research R , Alumni_Research AR , Alumni A , USER_INFO_VIEW U  where R.Research_id = '$r_id' AND AR.Research_id=R.Research_id AND A.STUDENT_ID=AR.STUDENT_ID AND U.ACC_ID=A.ACC_ID";
        $stid = oci_parse($conn, $sql);
        $r = oci_execute($stid);
        while ($row1 = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) 
          {
            if($rowRE['NAME']==$row1['NAME']) continue;
            if($countt==1)
            {
              echo '
      
              '. $row1['NAME'] .'  ';
                              
            }
        else{
            echo '
      
              , '. $row1['NAME'] .'
             
            ';
        }
        $countt++;
          }

      echo'     </p>
             </div></a>
         </div>
         </div>  
         
         <div>
         <div class="card mb-5   border border-3 border-success rounded">
           <div class="card-header text-white bg-success">
             <div class="row">
               <div class="col-md-6">
                 <h5>Consulting:</h5>
               </div>
               <div class="col-md-2"></div>
               <div class="col-md-4" style="text-align: right;">
                   <a href="request_consultancy.html" button type="button" class="btn btn-warning">Request Consultancy</a>
               </div>
             </div>
           </div>

           <div class="row mx-auto" >';


         $sql = "select * from USER_INFO_VIEW U , FACULTY F  , CONSULTS CS , STUDENT S , USER_INFO_VIEW UR where U.ACC_ID ='$accountID' AND U.ACC_ID=F.ACC_ID AND S.STUDENT_ID=CS.STUDENT_ID AND CS.FACULTY_ID=F.FACULTY_ID AND S.ACC_ID=UR.ACC_ID";
         $stid = oci_parse($conn, $sql);
         $r = oci_execute($stid);
        
         while ($rowCS = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {

          echo '
      
                <a class="col-md-3 col-6 py-4 border border-success border-2 m-3 mx-auto text-black" style="text-decoration: none;" href="facultyprofile.html">
                  <img
                    style="width: 60%;" class="mx-auto d-block"
                    src="https://faces-img.xcdn.link/image-lorem-face-6688.jpg"
                    alt=""
                  />
                  <h5 class="mt-3 text-center">'.$rowCS['NAME'].'</h5>
                  <p class="m-0 text-center">'.$rowCS['STUDENT_ID'].'</p>

                  <p >Field of Research: '.$rowCS['FIELD_OF_RESEARCH'].'</p>

                </a>
                
          ';

         }

         echo '
         </div>
                </div>
                </div>
         ';
  
      }
      
 }


 ///ALUMNI

 if( $accountID[0]== 'A'){
 
  $sql = "select * from USER_INFO_VIEW U , ALUMNI S , ALUMNI_RESEARCH SR , RESEARCH R  where U.ACC_ID ='$accountID' AND U.ACC_ID=S.ACC_ID AND S.STUDENT_ID=SR.STUDENT_ID AND SR.RESEARCH_ID=R.RESEARCH_ID"; //change korbo to $account_id
  $stid = oci_parse($conn, $sql);
  $r = oci_execute($stid);
 
  while ($rowRE = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {

     echo'
     

     <div class="card-body bg-white">
       <a
         href="'.$rowRE['PAPER_LINK'].'"
         class="text-decoration-none text-black">
         <div class="p-3 mt-2 mb-2 border border border-2  border-success">
           <h4 class="mb-3">'.$rowRE['PAPER_TITLE'].'</h4>

           <p class="m-0 p-2">
            <h6 class="d-inline-block">Approve Status:</h6> '.$rowRE['APPROVE_STATUS'].'<br>
            <h6 class="d-inline-block">'.$rowRE['PUBLISH_STATUS'].'</h6><BR>
            <h6 class="d-inline-block"> Paper Abstract: </h6> '.$rowRE['PAPER_ABSTRACT'].'<br>
            <h6 class="d-inline-block"> Authors: </h6>
            ';

            $r_id= $rowRE['RESEARCH_ID'];

            
           $countt=1;
          $sql = "select * from Research R , Faculty_Research FR , FACULTY F , USER_INFO_VIEW U  where R.Research_id = '$r_id' AND FR.Research_id=R.Research_id AND F.FACULTY_ID=FR.FACULTY_ID AND U.ACC_ID=F.ACC_ID";
          $stid = oci_parse($conn, $sql);
          $r = oci_execute($stid);
          while ($row1 = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) 
            {
              if($rowRE['NAME']==$row1['NAME']) continue;
              if($countt==1)
              {
                echo '
        
                '. $row1['NAME'] .'  ';
                                
              }
          else{
              echo '
        
                , '. $row1['NAME'] .'
               
              ';
          }
          $countt++;

            }


       
      $sql = "select * from Research R , Student_Research SR , STUDENT S , USER_INFO_VIEW U  where R.Research_id = '$r_id' AND SR.Research_id=R.Research_id AND S.STUDENT_ID=SR.STUDENT_ID AND U.ACC_ID=S.ACC_ID";
      $stid = oci_parse($conn, $sql);
      $r = oci_execute($stid);
      while ($row1 = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) 
        {
          if($rowRE['NAME']==$row1['NAME']) continue;
          if($countt==1)
          {
            echo '
    
            '. $row1['NAME'] .'  ';
                            
          }
      else{
          echo '
    
            , '. $row1['NAME'] .'
           
          ';
      }
      $countt++;
        }


    $sql = "select * from Research R , Alumni_Research AR , Alumni A , USER_INFO_VIEW U  where R.Research_id = '$r_id' AND AR.Research_id=R.Research_id AND A.STUDENT_ID=AR.STUDENT_ID AND U.ACC_ID=A.ACC_ID";
    $stid = oci_parse($conn, $sql);
    $r = oci_execute($stid);
    while ($row1 = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) 
      {
        if($rowRE['NAME']==$row1['NAME']) continue;
        if($countt==1)
        {
          echo '
  
          '. $row1['NAME'] .'  ';
                          
        }
    else{
        echo '
  
          , '. $row1['NAME'] .'
         
        ';
    }
    $countt++;
      }

 /* echo'     </p>
         </div></a>
     </div>
     </div>  
     
     <div>
     <div class="card mb-5   border border-3 border-success rounded">
       <div class="card-header text-white bg-success">
         <div class="row">
           <div class="col-md-6">
             <h5>Consulting:</h5>
           </div>
           <div class="col-md-2"></div>
           <div class="col-md-4" style="text-align: right;">
               <a href="request_consultancy.html" button type="button" class="btn btn-warning">Request Consultancy</a>
           </div>
         </div>
       </div>

       <div class="row mx-auto" >';
*/

    //  $sql = "select * from USER_INFO_VIEW U , FACULTY F  , CONSULTS CS , STUDENT S , USER_INFO_VIEW UR where U.ACC_ID ='$accountID' AND U.ACC_ID=F.ACC_ID AND S.STUDENT_ID=CS.STUDENT_ID AND CS.FACULTY_ID=F.FACULTY_ID AND S.ACC_ID=UR.ACC_ID";
    //  $stid = oci_parse($conn, $sql);
    //  $r = oci_execute($stid);
    
    //  while ($rowCS = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {

    //   echo '
  
    //         <a class="col-md-3 col-6 py-4 border border-success border-2 m-3 mx-auto text-black" style="text-decoration: none;" href="facultyprofile.html">
    //           <img
    //             style="width: 60%;" class="mx-auto d-block"
    //             src="https://faces-img.xcdn.link/image-lorem-face-6688.jpg"
    //             alt=""
    //           />
    //           <h5 class="mt-3 text-center">'.$rowCS['NAME'].'</h5>
    //           <p class="m-0 text-center">'.$rowCS['STUDENT_ID'].'</p>

    //           <p >Field of Research: '.$rowCS['FIELD_OF_RESEARCH'].'</p>

    //         </a>
            
    //   ';

    //  }

     echo '
     </div>
            </div>
            </div>
     ';

  }
  
}
      
      }
        ?>
       
      
            
              <!-- Research Papers -->
             

              <!-- Conferences 
              <div class="card mb-5 border border-3 border-success  rounded ">
                <h5 class="card-header text-white bg-success ">Attended Conferences</h5>
                <div class="card-body bg-white ">
                  <a
                    href="#"
                    class="text-decoration-none text-black"
                    ><div class="p-1 mt-1 mb-1 border  border-success border-2 rounded ">
                      <h4 class="mb-2">Autonomous System</h4>
                    <div class="d-flex align-items-center text-black">
                        <p class="m-0 p-2">
                          <h6 class="d-inline-block">Paper Domain</h6>
                          | 2019-2020
                        </p>
                        <a href="form.html" class="ms-auto inline-block btn btn-dark"
                          >Edit <i class="fa fa-edit"></i
                        ></a>
                      </div> 
                      </div>
                    </a>
                </div>
                <div class="card-body bg-white ">
                  <a
                    href="#"
                    class="text-decoration-none text-black"
                    ><div class="p-1 mt-1 mb-1 border  border-success border-2 rounded ">
                      <h4 class="mb-2">Autonomous System</h4>-->
                  <!--    <div class="d-flex align-items-center text-black">
                        <p class="m-0 p-2">
                          <h6 class="d-inline-block">Paper Domain</h6>
                          | 2019-2020
                        </p>
                        <a href="form.html" class="ms-auto inline-block btn btn-dark"
                          >Edit <i class="fa fa-edit"></i
                        ></a>
                      </div> -->
                      </div>
                    </a>
                </div>
              </div>

              <!-- Consultancy -->
            
              
            
            
          
          </div>

          <!-- right parts ends  -->

         
          
        </div>
      </div>
      
      <!-- second container ends  -->
      <!-- footer -->

      <div class="container-fluid bg-black py-2 mt-5">
        <div class="row">
          <div class="col-md-4 col-12 pt-3">
            <p class="text-white-50 text-center">
              © 2022 MIST. All rights reserved
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

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
