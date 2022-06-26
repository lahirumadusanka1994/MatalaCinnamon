<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include "./head.php"?>
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
        <!-- header inner start-->
        <nav class="navbar navbar-expand-lg navbar-dark  fixed-top">
  <!-- <a class="navbar-brand" href="#"> <b>මාතලා CINNAMON</b></a> -->
  <a class="navbar-brand" href="#"> <img  class = "log" src="images/logo.png" alt="#"/> <b>CINNAMON</b> </a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="products.php">Product </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="about.php">About US </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="contact.php">Contact Us </a>
      </li>
      
    </ul>
    
  </div>
</nav>
         <!-- header inner-end -->
      </header>
      <!-- end header inner -->
      <!-- end header -->
 
      <!-- about -->
      <div class="about">
         <div class="container">
        
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                 
                     
                  </div>
               </div>
            </div>
            <div class="row">
              <div class="col-md-4 about_contact" >
              <img src="images/logo.png" alt="#"/>
              </div>
              <div class="col-md-8 about_contact">
                <div class="textabout">
              <p><b><h7>Matala Cinnamon is a subsidiary of Sandali Ceylon Pvt Ltd, which exports 100% organic cinnamon to Sri Lanka. 
              Currently Sandali Ceylon Pvt Ltd has several businesses.The main objective of this company is to introduce the highest quality cinnamon
               in Sri Lanka to the world under the Matala Cinnamon brand. Launched in 2022, Sandali Ceylon Pvt Ltd currently owns a large area of cinnamon plantations.
               Sandali Ceylon is a Pvt Ltd registered business in Sri Lanka under Company No PV 00252812. It is our intention to export 100% organic cinnamon grown in the Central Highlands of Sri Lanka in a very clean manner.
               Our vision is to be the best spice exporter in the island in the future by providing excellent customer service. We are currently looking to launch four products under the Matala Cinnamon brand.
               We also hope to export cinnamon in bulk in Sri Lanka in the future.<br><p></h7>
               </div>
              </div>
            </div>
             <div class="row">
              <div class="col-md-4 about_contact">
              <img src="images/slide-8.jpg" alt="#"/>
             
              </div>
              <div class="col-md-8 about_contact">
            
              </div>
            </div> 
         </div>
        
      </div>
      <!-- end about -->
      </div>
      <!--  footer -->
         <?php include "./footer.php"?>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>