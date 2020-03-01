<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="css/homeStyle.css">
    <link rel="stylesheet" href="/css/card.css">
    <meta charset="utf-8">
    <title></title>


  </head>
  <body>
    <br>
    <center>
      <div class="container" id="imageCon">
        <img class="slide" src="images/Users.png">
        <img class="slide" src="images/venues.png" >
        <img class="slide" src="images/sessions.png">
        <img class="slide" src="images/events.png">
        <img class="slide" src="images/attendees.jpg">

      </div>
    </center>
  <br>

  <center>
  <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);transition: 0.3s;width: 33.3%;float:left;">
    <img src="images/users.png" alt="images/users.png" style="width:100%">
      <div class="container" id="cardid" style="padding: 2px 16px;">
        <h4><b>USERS
</b></h4>
        <p>Manage users</p>
        <p style="margin-right:12px"><a type="button" id="footbut" href="index.php" style="text-decoration:none;align:center; background-color: 1E90FF">Update</a></p>
      </div>
  </div>
  <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);transition: 0.3s;width: 33.33%;float:left">
    <img src="images/venues.png" alt="images/venues.png" style="width:100%">
      <div class="container" id="cardid" style="padding: 2px 16px;">
        <h4><b>Venues</b></h4>
        <p>Manage Venues</p>
        <p style="margin-right:12px"><a type="button" id="footbut" href="venues.php" style="text-decoration: none; background-color: 1E90FF">Update</a></p>
      </div>
  </div>

  <div class="card" style="box-shadow: 2px 4px 8px 2px rgba(0,0,0,0.2);transition: 0.3s;width: 33.33%;float:left;">
    <img src="images/events.jpg" alt="images/events.jpg" style="width:100%">
      <div class="container" id="cardid" style="padding: 2px 16px;">
        <h4><b>Events</b></h4>
        <p>Manage events</p>
        <p style="margin-right:12px"><a type="button" id="footbut" href="events.php" style="text-decoration: none; background-color: 00BFFF">Update</a></p>
      </div>
  </div>

  <br><br>
  <div class="card" style="alignbox-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);transition: 0.3s;width: 33.33%;float:left">
    <img src="images/sessions.jpg" alt="images/sessions.jpg" style="width:100%">
      <div class="container" id="cardid" style="padding: 2px 16px;">
        <h4><b>Sessions</b></h4>
        <p>Manage Sessions</p>
        <p style="margin-right:12px"><a type="button" id="footbut" href="sessions.php" style="text-decoration: none; background-color: 1E90FF;">Update</a></p>
      </div>
  </div>
  <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);transition: 0.3s;width: 33.33%;float:left">
    <img src="images/attendees.jpg" alt="images/attendees.jpg" style="width:100%">
      <div class="container" id="cardid" style="padding: 2px 16px;">
        <h4><b>Attendees</b></h4>
        <p>Manage Attendees</p>
        <p style="margin-right:12px"><a type="button" id="footbut" href="attendees.php" style="text-decoration: none;">Update</a></p>
      </div>
  </div>
  <br><br><br>
  
  <p>
    <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
    <script src="script/slide.js"></script>
  </body>
</html>
