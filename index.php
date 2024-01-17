<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    ob_start();
    include('header.php');
    include('admin/db_connect.php');

	$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	foreach ($query as $key => $value) {
		if(!is_numeric($key))
			$_SESSION['setting_'.$key] = $value;
	}
    ob_end_flush();
    ?>

    <!-- <style>
    	header.masthead {
		  background: url(assets/img/;
		  background-repeat: no-repeat;
		  background-size: cover;
		}
    </style> -->
    <body id="page-top">
        <!-- Navigation-->
        <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body text-white">
        </div>
      </div>
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="header_white_section">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="header_information">
                           <ul>
                              <li><img src="ass/images/1.png" alt="#"/> 145.street road new York</li>
                              <li><img src="ass/images/2.png" alt="#"/> +71  5678954378</li>
                              <li><img src="ass/images/3.png" alt="#"/> Demo@hmail.com</li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo"> <a href="index.html"><img src="ass/images/logo.png" height="250" width="250" alt="#"></a> </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <div class="menu-area">
                        <div class="limit-box">
                           <nav class="main-menu">
                              <ul class="menu-area-main">
                              <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home">Home</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=flights"></span>Flight List</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=about">About</a></li>
                        
                     
                              </ul>
                           </nav>

                           <div id="ww_f906a60690a3b" v='1.3' loc='auto' a='{"t":"ticker","lang":"en","sl_lpl":1,"ids":[],"font":"Arial","sl_ics":"one_a","sl_sot":"celsius","cl_bkg":"image","cl_font":"#FFFFFF","cl_cloud":"#FFFFFF","cl_persp":"#81D4FA","cl_sun":"#FFC107","cl_moon":"#FFC107","cl_thund":"#FF5722"}'><a href="https://weatherwidget.org/" id="ww_f906a60690a3b_u" target="_blank">Weather Widget</a></div><script async src="https://app2.weatherwidget.org/js/?id=ww_f906a60690a3b"></script>
                           
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end header inner -->
      </header>
      <!-- end header -->
      <section >
         <div class="banner-main">
            <img src="ass/images/travel-cover.jpg" />
            <div class="container">
               <div class="text-bg">
  </br>
                  <h1>AeroNav Pro<br><strong class="white" style="font-size:3rem;">fly with us</strong></h1>
                  <div class="button_section"> <a class="main_bt" href="#">Read More</a>  </div>
                  <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4 page-title">
                        <hr class="divider my-4" />
                    <div class="col-md-12 mb-2 text-left">
                        <div class="card">
                            <div class="card-body">
                                <form id="manage-filter" action="index.php?page=flights" method="POST">
                                    <div class="row form-group">
                                        <div class="col-sm-3">
                                            <label for="" class="control-label">From</label>
                                            <select name="departure_airport_id" id="departure_location" class="custom-select browser-default select2">
                                                <option value=""></option>
                                            <?php
                                                $airport = $conn->query("SELECT * FROM airport_list order by airport asc");
                                            while($row = $airport->fetch_assoc()):
                                            ?>
                                                <option value="<?php echo $row['id'] ?>" <?php echo isset($departure_airport_id) && $departure_airport_id == $row['id'] ? "selected" : '' ?>><?php echo $row['location'].", ".$row['airport'] ?></option>
                                            <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="" class="control-label">To</label>
                                            <select name="arrival_airport_id" id="arrival_airport_id" class="custom-select browser-default select2">

                                                <option value=""></option>

                                            <?php
                                                $airport = $conn->query("SELECT * FROM airport_list order by airport asc");
                                            while($row = $airport->fetch_assoc()):
                                            ?>
                                                <option value="<?php echo $row['id'] ?>" <?php echo isset($arrival_airport_id) && $arrival_airport_id == $row['id'] ? "selected" : '' ?>><?php echo $row['location'].", ".$row['airport'] ?></option>
                                            <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="" class="control-label">Departure Date</label>
                                            <input type="date" class="form-control input-sm datetimepicker2" name="date" autocomplete="off">
                                        </div>
                                        <div class="col-sm-3" id="rdate" style="display: none">
                                            <label for="" class="control-label">Return Date</label>
                                            <input type="date" class="form-control input-sm datetimepicker2" name="date_return" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-2 text-center">
                                            <div class="form-check">
                                              <input class="form-check-input" type="radio" name="trip" id="onewway" value="1" checked>
                                              <label class="form-check-label" for="onewway"></br>
                                                One-way
                                              </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 text-center">
                                            <div class="form-check">
                                              <input class="form-check-input" type="radio" name="trip" id="rtrip" value="2">
                                              <label class="form-check-label" for="rtrip"></br>
                                               Round Trip
                                              </label>
                                            </div>
                                        </div>
                                        <div class="button_section"> 
                                            <button class="main_bt" type="submit"><i class="fa fa-plane-departure"></i> Find Flights</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>                        
                    </div>
                    
                </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
                                            </br>
                                            </br>
     
        <?php 
        $page = isset($_GET['page']) ?$_GET['page'] : "home";
        include $page.'.php';
        ?>
       <div id="about" class="about">
         <div class="container">
            <div class="row">
               <div class="col-md-12 ">
                  <div class="titlepage">
                     <h2>About AeroNav Pro</h2>
                     <span><q>Aero Nav Pro: Where Air Traffic Control, Weather Forecasting, and Booking Excellence Converge!"</q></span>
                  </div>
               </div>
            </div>
         </div>
         <div class="bg">
            <div class="container">
               <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                     <div class="about-box">
                        <p> <span>
                           
Aero Nav Pro is an advanced system developed by Natnael Sendeku to enhance the efficiency and safety of airports. It enables effective air traffic control, real-time flight data, and accurate weather forecasting. With a focus on innovation and excellence, Aero Nav Pro aims to streamline operations, reduce delays, and ensure a high level of safety. For more information, reach out to Natnael Sendeku at natnaelsendeku@gmail.com.                        <div class="palne-img-area">
                           <img src="ass/images/plane-img.png" alt="images">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <a href="#">Read More</a>
         </div>
      </div>

<div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fa fa-arrow-righ t"></span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      </div>
    </div>
    <div>
      
    </div>
  </div>
  <div class="lol">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
               <iframe src="https://www.planeflighttracker.com/2014/07/flightradar24.html" frameborder="1" width="100%" height="580px"></iframe>

               </div>
            </div>
         </div>
      </div>
     
        
        <footer>
         <div id="contact" class="footer">
            <div class="container">
               <div class="row pdn-top-30">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                     <ul class="location_icon">
                        <li> <a href="#"><img src="icon/facebook.png"></a></li>
                        <li> <a href="#"><img src="icon/Twitter.png"></a></li>
                        <li> <a href="#"><img src="icon/linkedin.png"></a></li>
                        <li> <a href="#"><img src="icon/instagram.png"></a></li>
                     </ul>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                     <div class="Follow">
                        <h3>CONTACT US</h3>
                        <span>123 Second Street Fifth <br>Avenue,<br>
                        Manhattan, New York<br>
                        +987 654 3210</span>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                     <div class="Follow">
                        <h3>ADDITIONAL LINKS</h3>
                        <ul class="link">
                           <li> <a href="#">About us</a></li>
                           <li> <a href="#">Terms and conditions</a></li>
                           <li> <a href="#"> Privacy policy</a></li>
                           <li> <a href="#">News</a></li>
                           <li> <a href="#"> Contact us</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                     <div class="Follow">
                        <h3> Contact</h3>
                        <div class="row">
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                              <input class="Newsletter" placeholder="Name" type="text">
                           </div>
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                              <input class="Newsletter" placeholder="Email" type="text">
                           </div>
                           <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                              <textarea class="textarea" placeholder="comment" type="text">Comment</textarea>
                           </div>
                        </div>
                        <button class="Subscribe">Submit</button>
                     </div>
                  </div>
               </div>
               <div class="copyright">
                  <div class="container">
                     <p>Copyright 2023 All Right Reserved By <span class="ladada">Natnael Sendeku</span></p>
                  </div>
               </div>
            </div>
         </div>
      </footer>    </body>

    <?php $conn->close() ?>

</html>
