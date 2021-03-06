<?php
session_start();
include 'db_conn.php';
if(isset($_SESSION['acc_id'])) echo "<script>console.log('logged in');</script>";
else echo "<script>console.log('logged out');</script>";

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

    <title>Home</title>
  </head>
  <body>
    <!-- navbar starts -->
    <div id="nav-placeholder"></div>
    <script> $(function(){ $("#nav-placeholder").load("navbar.php"); }); </script>
    <!-- navbar ends -->

    <div class="container px-4 pt-5">
      <div class="row gx-5">
        <!-- LEFT BAR -->
        <div class="col-xxl-9 col-12" style="margin-top: -3rem;">

          


          <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

        
        

        <div class="section-title">
                  <h2>Top Researchers of MIST</h2>
                  <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
          

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide" onclick="document.location.href='facultyprofile.html'">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="img/nazrul.jpeg" class="testimonial-img" alt="">
                <h3>Lt Col Muhammad Nazrul Islam</h3>
                <h4>Associate Professor (Instructor Class-A), Department of Computer Science & Engineering (CSE)</h4>
              </div>
            </div><!-- End testimonial item -->
  
            <div class="swiper-slide" onclick="document.location.href='facultyprofile.html'">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="img/rania.jpeg" class="testimonial-img" alt="">
                <h3>Sharifa Rania Mahmud </h3>
                <h4>Asst. Professor,Department of Computer Science & Engineering (CSE)</h4>
              </div>
            </div><!-- End testimonial item -->
            <div class="swiper-slide" onclick="document.location.href='facultyprofile.html'">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="img/muhaimin.jpeg
                " class="testimonial-img" alt="">
                <h3>Muhaimin Bin Munir</h3>
                <h4>Lecturer,Department of Computer Science & Engineering (CSE)</h4>
              </div>
            </div>
            <div class="swiper-slide" onclick="document.location.href='facultyprofile.html'">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Enim nisi quem export duis labore cillum quae magna kljkh nklnkj kjjijb knml gvyy cedfrc enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="img/nafiz.jpeg" class="testimonial-img" alt="">
                <h3>Nafiz Imtiaz Khan</h3>
                <h4>Lecturer,Department of Computer Science & Engineering (CSE)</h4>
              </div>
            </div>

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section>

    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

        
        

        <div class="section-title">
                  <h2>Top Papers of MIST</h2>
                  <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
          

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide" onclick="document.location.href='paper_details.php'">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <!-- <img src="img/nazrul.jpeg" class="testimonial-img" alt=""> -->
                <h3>Writing good software engineering research papers</h3>
                <h4>Lt Col Md Nazrul Islam</h4>
              </div>
            </div><!-- End testimonial item -->
  
            <div class="swiper-slide" onclick="document.location.href='paper_details.php'">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <!-- <img src="img/rania.jpeg" class="testimonial-img" alt=""> -->
                <h3>Writing best software engineering research papers</h3>
                <h4>Sharifa Rania Mahmud</h4>
              </div>
            </div><!-- End testimonial item -->
            <div class="swiper-slide" onclick="document.location.href='paper_details.php'">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <!-- <img src="img/muhaimin.jpeg
                " class="testimonial-img" alt=""> -->
                <h3>A Designers Companion</h3>
                <h4>Muhaimin Bin Munir</h4>
              </div>
            </div>
            <div class="swiper-slide" onclick="document.location.href='paper_details.php'">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <!-- <img src="img/nafiz.jpeg" class="testimonial-img" alt=""> -->
                <h3>Writing outstanding software engineering research papers</h3>
                <h4>Nafiz Imtiaz Khan</h4>
              </div>
            </div>

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section>

    <!-- domain cards -->
    <section id="research-domains" class="research-domains">

      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Research Domains</h2>
        </div>

        <div class="row">
          <div class="col-md-6 col-xl-4 my-4 ">
            <a href="paper.php" class="text-decoration-none text-black ">
              <div class="border-3 border border-success card mx-auto  rounded " style="width: 18rem">
                <img src="img/AI.jpg" class="card-img-top" alt="..." style="width: 285px; height: 176px;" />
                <div class="card-body">
                  <h5 class="card-title text-center">Artificial Intelligence</h5>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-xl-4 my-4">
            <a href="paper.php" class="text-decoration-none text-black">
              <div class="border-3 border border-success card mx-auto rounded " style="width: 18rem">
                <img src="img/ml.jpg" class="card-img-top" alt="..." style="width: 285px; height: 176px;"/>
                <div class="card-body">
                  <h5 class="card-title text-center">Machine Learning</h5>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-xl-4 my-4">
            <a href="paper.php" class="text-decoration-none text-black">
              <div class="border-3 border border-success card mx-auto rounded " style="width: 18rem">
                <img src="img/ar.jpg" class="card-img-top" alt="..." style="width: 285px; height: 176px;" />
                <div class="card-body">
                  <h5 class="card-title text-center">Augmented Reality</h5>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-xl-4 my-4">
            <a href="paper.php" class="text-decoration-none text-black">
              <div class="border-3 border border-success card mx-auto rounded " style="width: 18rem">
                <img src="img/cryptography.jpg" class="card-img-top" alt="..." style="width: 285px; height: 176px;" />
                <div class="card-body">
                  <h5 class="card-title text-center">Cryptography</h5>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-xl-4 my-4">
            <a href="paper.php" class="text-decoration-none text-black">
              <div class="border-3 border border-success card mx-auto rounded " style="width: 18rem">
                <img src="img/robotics.jpg" class="card-img-top" alt="..." style="width: 285px; height: 176px;" />
                <div class="card-body">
                  <h5 class="card-title text-center">Robotics</h5>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-xl-4 my-4">
            <a href="paper.php" class="text-decoration-none text-black">
              <div class="border-3 border border-success card mx-auto rounded  rounded " style="width: 18rem">
                <img src="img/networking.jpg" class="card-img-top" alt="..." style="width: 285px; height: 176px;" />
                <div class="card-body">
                  <h5 class="card-title text-center">Networking</h5>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- domain cards -->

        </div>
        <!-- LEFT BAR ends -->
        <!-- Right BAR -->

        <!-- Notice Board Start -->
        <div class="col-xxl-3 col-12 mb-5">
          <!-- <h5 class="card-header text-white bg-info ">Notice Board</h5> -->
   
               <h5 class="card-header text-white bg-success">Upcoming Conferences</h5>
               <?php
                $sql = "select * FROM CONFERENCE WHERE START_DATE <=  ADD_MONTHS(SYSDATE,4)";
                $stid = oci_parse($conn, $sql);
                $r = oci_execute($stid);
                while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) 
                {
          
                    echo '
          <div class="col_one_third nobottommargin col_last border bg-white border border-1  border-success  ">
            <div class="nobottommargin p-3">
              
                <!-- Notice Item-->
                    <div class="spost clearfix">
                        <div class="entry-image">
                            <div class="event_date">
                                <span class="date">'. $row['START_DATE'] .'</span>
                                <!--<span class="month">May</span> -->
                            </div>
                        </div>
                        <div class="entry-c">
                            <div class="entry-title">
                                <h4><a href="'. $row['WEBSITE_LINK'] .'">'. $row['CONFERENCE_NAME'] .'</a></h4>
                            </div>
                            <ul class="entry-meta">
                                <li><i class="bi bi-calendar3"></i> Ends on '. $row['END_DATE'] .'</li>

                            </ul>
                        </div>
                    </div>
            </div>
          </div>
            
                    ';
                   
                }
        ?> 
        
        <div class="col_half col_last tright nobottommargin mt-3">
                    <a href="conferences.php" class="text-success">See All ???</a>
                </div>
          
        <br><br>
        <h5 class="card-header text-white bg-success ">Notice Board</h5>
        <div class="col_one_third nobottommargin col_last border bg-white border border-1  border-success  ">
          <div class="nobottommargin p-3">
            
              <!-- Notice Item-->
                  <div class="spost clearfix">
                      <div class="entry-image">
                          <div class="event_date">
                              <span class="date">31</span>
                              <span class="month">May</span>
                          </div>
                      </div>
                      <div class="entry-c">
                          <div class="entry-title">
                              <h4><a href="#">Inter Department Volleyball Competition 2022</a></h4>
                          </div>
                          <ul class="entry-meta">
                              <li><i class="bi bi-calendar3"></i> 31st May 2022</li>

                          </ul>
                      </div>
                  </div>
                  <!--Notice Item End-->

                  



                  <div class="spost clearfix">
                      <div class="entry-image">
                          <div class="event_date">
                              <span class="date">24</span>
                              <span class="month">May</span>
                          </div>
                      </div>
                      <div class="entry-c">
                          <div class="entry-title">
                              <h4><a href="#">Registration Open for Information Security Assessment and Penetration Testing Course | MIST Cyber Ra...</a></h4>
                          </div>
                          <ul class="entry-meta">
                              <li><i class="bi bi-calendar3"></i> 24th May 2022</li>

                          </ul>
                      </div>
                  </div>
                  <!--Notice Item End-->
                  <div class="spost clearfix">
                      <div class="entry-image">
                          <div class="event_date">
                              <span class="date">17</span>
                              <span class="month">May</span>
                          </div>
                      </div>
                      <div class="entry-c">
                          <div class="entry-title">
                              <h4><a href="#">Faculty Recruitment Circular at CE Department</a></h4>
                          </div>
                          <ul class="entry-meta">
                              <li><i class="bi bi-calendar3"></i> 17th May 2022</li>

                          </ul>
                      </div>
                  </div>
                  <!--Notice Item End-->
                  <div class="spost clearfix">
                      <div class="entry-image">
                          <div class="event_date">
                              <span class="date">16</span>
                              <span class="month">May</span>
                          </div>
                      </div>
                      <div class="entry-c">
                          <div class="entry-title">
                              <h4><a href="#">Bangabandhu Inter Department Cultural Competition 2022</a></h4>
                          </div>
                          <ul class="entry-meta">
                              <li><i class="bi bi-calendar3"></i> 16th May 2022</li>

                          </ul>
                      </div>
                  </div>
                  <!--Notice Item End-->
                  <div class="col_half col_last tright nobottommargin mt-3">
                  <a href="#" class="text-success">See All Notice ???</a>
              </div>
          </div>
      </div> 



        
      </div>
      <!-- Notice Board End -->


      




        <!-- Right BAR ends -->
    </div>
    </div>
      <!-- card section -->

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
