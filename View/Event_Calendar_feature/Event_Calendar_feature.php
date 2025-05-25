<?php
    session_start();
    if(isset($_SESSION['status'])||isset($_COOKIE['status'])){
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link rel="stylesheet" href="../../asset/CSS/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />
    <script src="../../asset/Javascript/index.js"></script>
  </head>
  <body>
    <!--Header-->
    <header>
      <nav>
        <div class="nav-container">
          <div class="nav-logo">
            <a href="../Landing_Page_feature/landing_page.html">EvenBoo</a>
          </div>
          <div class="right-nav">
            <div class="user-info">
              <span>Welcome</span>
              <a href="../Profile_Management_feature/profilemanagement.html">
              <span class="user">
              <?php echo isset($_SESSION['fname']) ? $_SESSION['fname'] : 'User'; ?>
              </span>
              </a>
            </div>
            <div class="nav-icon">
              <a href="#"><i class="fa-solid fa-bell"></i></a>
              <a href="#"><i class="fa-solid fa-gear"></i></a>
              <a href="../../controller/logout.php"
                ><i class="fa-solid fa-right-from-bracket"></i
              ></a>
            </div>
          </div>
        </div>
      </nav>
    </header>

    <section class="profile-content">
      <!--Upcomming Events Section-->

      <div class="left-filter">
        <div class="filter-top">
          <span>Filter</span>
          <input type="button" name="" id="" value="Reset Filter" />
        </div>
        <div class="filter">
          <div class="filter-category">
            <p>Category</p>
            <input type="checkbox" name="" id="" />
            <label for="">Late Night Party</label><br />
            <input type="checkbox" name="" id="" />
            <label for="">Late Night Concert</label><br />
            <input type="checkbox" name="" id="" />
            <label for="">Day Long Concert</label><br />
            <input type="checkbox" name="" id="" />
            <label for="">Reunion</label><br />
            <input type="checkbox" name="" id="" />
            <label for="">Conference</label><br />
            <hr />
          </div>
          <div class="weekday">
            <p>Weekday</p>
            <input type="checkbox" name="" id="" />
            <label for="">Saturday</label><br />
            <input type="checkbox" name="" id="" />
            <label for="">Sunday</label><br />
            <input type="checkbox" name="" id="" />
            <label for="">Monday</label><br />
            <input type="checkbox" name="" id="" />
            <label for="">Tuesday</label><br />
            <input type="checkbox" name="" id="" />
            <label for="">Wednesday</label><br />
            <input type="checkbox" name="" id="" />
            <label for="">Thursday</label><br />
            <input type="checkbox" name="" id="" />
            <label for="">Friday</label><br />
          </div>
        </div>
      </div>

      <div class="right_content">
        <span class="r-title">Upcomming Events</span>

        <div class="filtered-event">
          <div class="event-card-horizontal">
            <div class="event-card-image">
              <img src="../../asset/image/cart-img-1.jpg" alt="Event Image" />
            </div>

            <div class="event-card-content">
              <div class="event-card-content-inner">
                <div class="event-card-schedule">
                  <div class="event-date">
                    <p>OCT</p>
                    <span>19</span>
                  </div>
                  <span>7PM</span>
                </div>

                <div class="event-details">
                  <h4>Blues on the Beach</h4>
                  <h6>📍Santa Cruz Boardwalk</h6>

                  <div class="event-price">
                    <h4>$45 - $130</h4>
                    <input
                      type="button"
                      value="Book Now"
                      class="book-now-button"
                      onclick="window.location.href='../Venue_Details_feature/venuedetails.html';"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="event-card-horizontal">
            <div class="event-card-image">
              <img src="../../asset/image/cart-img-1.jpg" alt="Event Image" />
            </div>

            <div class="event-card-content">
              <div class="event-card-content-inner">
                <div class="event-card-schedule">
                  <div class="event-date">
                    <p>OCT</p>
                    <span>19</span>
                  </div>
                  <span>7PM</span>
                </div>

                <div class="event-details">
                  <h4>Blues on the Beach</h4>
                  <h6>📍Santa Cruz Boardwalk</h6>

                  <div class="event-price">
                    <h4>$45 - $130</h4>
                    <input
                      type="button"
                      value="Book Now"
                      class="book-now-button"
                      onclick="window.location.href='../Venue_Details_feature/venuedetails.html';"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="event-card-horizontal">
            <div class="event-card-image">
              <img src="../../asset/image/cart-img-1.jpg" alt="Event Image" />
            </div>

            <div class="event-card-content">
              <div class="event-card-content-inner">
                <div class="event-card-schedule">
                  <div class="event-date">
                    <p>OCT</p>
                    <span>19</span>
                  </div>
                  <span>7PM</span>
                </div>

                <div class="event-details">
                  <h4>Blues on the Beach</h4>
                  <h6>📍Santa Cruz Boardwalk</h6>

                  <div class="event-price">
                    <h4>$45 - $130</h4>
                    <input
                      type="button"
                      value="Book Now"
                      class="book-now-button"
                      onclick="window.location.href='../Venue_Details_feature/venuedetails.html';"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="event-card-horizontal">
            <div class="event-card-image">
              <img src="../../asset/image/cart-img-1.jpg" alt="Event Image" />
            </div>

            <div class="event-card-content">
              <div class="event-card-content-inner">
                <div class="event-card-schedule">
                  <div class="event-date">
                    <p>OCT</p>
                    <span>19</span>
                  </div>
                  <span>7PM</span>
                </div>

                <div class="event-details">
                  <h4>Blues on the Beach</h4>
                  <h6>📍Santa Cruz Boardwalk</h6>

                  <div class="event-price">
                    <h4>$45 - $130</h4>
                    <input
                      type="button"
                      value="Book Now"
                      class="book-now-button"
                      onclick="window.location.href='../Venue_Details_feature/venuedetails.html';"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
<?php
    }else{
        header('location: ../User_Authentication_feature/login.html');
    }

?>
