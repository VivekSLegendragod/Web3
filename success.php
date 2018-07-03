<?php
    // Start the session
    ob_start();
    session_start();

    // Check to see if actually logged in. If not, redirect to login page
    if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
        header("Location: indi.php");
    }

?>
<?php 
include('header.php');
?>

<link rel="stylesheet" href="css/calendar.css">

<div class="container">	
	<h2>Event Calendar</h2>	
	<div class="page-header">
		<div class="pull-right form-inline">
			<div class="btn-group">
				<button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
				<button class="btn btn-default" data-calendar-nav="today">Today</button>
				<button class="btn btn-primary" data-calendar-nav="next">Next >></button>
			</div>
			<div class="btn-group">
				<button class="btn btn-warning" data-calendar-view="year">Year</button>
				<button class="btn btn-warning active" data-calendar-view="month">Month</button>
				<button class="btn btn-warning" data-calendar-view="week">Week</button>
				<button class="btn btn-warning" data-calendar-view="day">Day</button>
			</div>
		</div>
		<h3></h3>
		
	</div>
	<div class="row">
		<div class="col-md-9">
			<div id="showEventCalendar"></div>
		</div>
		<div class="col-md-3">
			<h4>All Events List</h4>
			<ul id="eventlist" class="nav nav-list"></ul>
		</div>
	</div>	
	<div style="margin:50px 0px 0px 0px;">
		
<button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Add Event</button>

<div id="id02" class="lodal">
  
  <form class="lodal-content animate" action="index.php">

    <div class="container">
      <label for="title"><b>Event:</b></label>
      <input type="text" placeholder="Enter Event" id="title" name="title" required>

      <label for="day"><b>Day:</b></label>
      <input type="text" placeholder="Enter Day" id="day" name="day" required>

      <label for="start"><b>Start Time:</b></label>
      <input type="text" placeholder="Enter Start Time" id="start" name="start" required>

      <label for="over"><b>End Time:</b></label>
      <input type="text" placeholder="Enter End Time" id="over" name="over" required>

      <button type="submit" id="enter">Enter</button>
     
    </div>
  </form>
</div>

<script>
// Get the lodal
var lodal = document.getElementById('id02');
var ental = document.getElementById('enter');

// When the user clicks anywhere outside of the lodal, close it
window.onclick = function(event) {
    if (event.target == lodal) {
        lodal.style.display = "none";
    }
}

ental.onclick(){
<?php
/* Database connection start */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_database";
$conne = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$sql1 = "INSERT INTO members (id, title, day, start, over)
VALUES (id, title, day, start, over)";

if (mysqli_query($conne, $sql1)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conne);
}

mysqli_close($conne);
?>}
</script>
	
	</div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/events.js"></script>
<?php include('footer.php');?>


<h1>Logged In!</h1>
<form method="post" action="logout.php">
    <input type="submit" value="Logout">
</form>