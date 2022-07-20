<?php
session_start();
include 'db_conn.php';
?>

<nav
      class="navbar navbar-expand-xxl navbar-light border-bottom border-5 border-success fixed-top"
      id="mainNav"
      >
      <div class="container-fluid">
        <button
          class="navbar-toggler mb-3"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <a href="index.php" class="navbar-brand">
          <img class="ms-md-5 ms-1" src="img/navlogo.png" alt="logo"
        /></a>

        <div
          class="collapse navbar-collapse mx-5 fw-bold"
          id="navbarSupportedContent"
        >
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item mx-3">
              <a
                class="nav-link active text-success fw-bolder"
                aria-current="page"
                href="index.php"
                >Home</a
              >
            </li>
            <li class="nav-item mx-3">
              <a class="nav-link" href="paper.php">Papers</a>
            </li>
            <li class="nav-item mx-3">
              <a class="nav-link" href="funds.php"
                >Funds</a
              >
            </li>
            <li class="nav-item mx-3">
              <a class="nav-link" href="conferences.php">Conferences</a>
            </li>
            <li class="nav-item mx-3">
              <a class="nav-link" href="faq.html">FAQs</a>
            </li>
            <li class="nav-item mx-3">
              <a class="nav-link" href="forum.html">Forum</a>
            </li>
            <li class="nav-item mx-3">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
          </ul>
          <a href="#">
            <img class="ms-3" src="img/profile.png" alt="profile"
          /></a>
          <a href=
          <?php 
            if(isset($_SESSION['acc_id'])) {
              if($_SESSION['acc_id'][0]=='D') {
                echo "admin_dashboard.html";
              }
              else {
                echo "studentprofile.php";
              }
            }
            else echo "#"; 
            ?>
           class="text-decoration-none text-black">
            <h6 class="mt-2 mx-3">
            <?php 
            if(isset($_SESSION['acc_id'])) {
              if($_SESSION['acc_id'][0]=='D') {
                echo "Admin Dashboard";
              }
              else {
                echo $_SESSION['name'];
              }
            }
            else echo 'Not logged in'; 
            ?>
            </h6></a>

          <a href=
          <?php 
            if(isset($_SESSION['acc_id'])) echo "logout.php";
            else echo "login.php"; 
            ?> 
            class="text-decoration-none"
            ><button type="button" class="btn 
            <?php 
            if(isset($_SESSION['acc_id'])) echo "btn-danger";
            else echo "btn-success"; 
            ?> mx-3">
            <?php 
            if(isset($_SESSION['acc_id'])) echo "Log Out";
            else echo "Log In"; 
            ?>
            </button></a
          >
        </div>
      </div>
    </nav>
    <div style="margin-top: 7rem;"></div>
    <script>
      console.log('navbar loaded');

      let navlinks = document.getElementsByClassName('nav-link');
      for(let navlink_i=0;navlink_i<navlinks.length;navlink_i++){
    if(navlinks[navlink_i].innerHTML=='Home'){
      navlinks[navlink_i].classList.remove('active');
      navlinks[navlink_i].classList.remove('text-success');
      navlinks[navlink_i].classList.remove('fw-bolder');
    }
    if(navlinks[navlink_i].innerHTML==document.getElementsByTagName('title')[0].innerHTML){
      navlinks[navlink_i].classList.add('active');
      navlinks[navlink_i].classList.add('text-success');
      navlinks[navlink_i].classList.add('fw-bolder');
    }
  }
    </script>