<?php
session_start();
$con=mysqli_connect("localhost","root","","hmsdb");

// check admin login
if(isset($_POST['login_submit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query="select * from logintb where username='$username' and password='$password';";
  $result=mysqli_query($con,$query);
  
	if(mysqli_num_rows($result)==1)
	{
		$_SESSION['username']=$username;
		header("Location:admin-panel.php");
	}
	else {
		header("Location:error.php");
  }
}

//updata the patient data
if(isset($_POST['update_data']))
{
	$contact=$_POST['contact'];
	$status=$_POST['status'];
	$query="update appointmenttb set payment='$status' where contact='$contact';";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:updated.php");
}

//display all doctors function
function display_docs()
{
	global $con;
	$query="select * from doctb";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
		$name=$row['name'];
		echo '<option value="'.$name.'">'.$name.'</option>';
	}
}
//display all doctors function
function display_pati()
{
	global $con;
	$query="select * from appointmenttb";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
    $fname    =$row['fname'];
    $lname    =$row['lname'];
    $contact  =$row['contact'];
    $doctor   =$row['doctor'];
    $payment  =$row['payment'];

    ?>
      <ul style='list-style:none'>
        <li style='padding:10px;background:#f5f5f5;border:1px solid #000; box-shadow:-1px -1px 15px 1px #aaa'>
          <p style='background:#555;color:#fff;'><span>patient name</span>  :<?php echo' '.$fname.' '.$lname; ?></p>
          <p><span>contact number</span>:<?php echo' '.$contact ?></p>
          <p style='background:#555;color:#fff;'><span>doctor name</span>   :<?php echo' '.$doctor ?></p>
          <p><span>payment statys</span>:<?php echo' '.$payment ?></p>
        </li>
      </ul>
    <?php
	}
}
// add new doctor
if(isset($_POST['doc_sub']))
{
	$name=$_POST['name'];
	$query="insert into doctb(name)values('$name')";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:adddoc.php");
}
// display_admin_panel function
function display_admin_panel(){
	?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">  
  </head>
  <style type="text/css">
      button:hover{cursor:pointer;}
      #inputbtn:hover{cursor:pointer;}
      p {
        text-transform: capitalize;
        padding:5px;
      }
      p span {
        display:inline-block;
        width:130px;
      }
  </style>
  <body style='padding-top:50px;'>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
      <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Global Hospital</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="post" action="search.php">
          <input class="form-control mr-sm-2" type="text" placeholder="enter contact number" aria-label="Search" name="contact">
          <input type="submit" class="btn btn-outline-light my-2 my-sm-0 btn btn-outline-light" id="inputbtn" name="search_submit" value="Search">
        </form>
      </div>
    </nav>
    <div class="jumbotron" id="ab1"  style='padding-top:50px;border-radius:0;
      background-image:url("images/head.jpeg");
      background-size:cover;
      height:400px; text-transform: capitalize;'></div>
      <div class="container-fluid" style="margin-top:50px;">
        <div class="row">
          <div class="col-md-4">
            <div class="list-group" id="list-tab" role="tablist">
              <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Appointment</a>
              <a class="list-group-item list-group-item-action" id="list-attend-list" data-toggle="list" href="#list-attend" role="tab" aria-controls="settings">Attendance</a>
              <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Payment Status</a>
              <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Doctors Section</a>
              <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Prescription</a>
            </div><br>
          </div>
        <div class="col-md-8">
          <div class="tab-content" id="nav-tabContent">
            <!--start appointment-->
            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
              <div class="container-fluid">
                <div class="card">
                  <div class="card-body">
                    <h4 style="text-align: center;">Create an appointment</h4><br>
                    <form class="form-group" method="post" action="appointment.php">
                      <div class="row">
                        <div class="col-md-4"><label>First Name:</label></div>
                        <div class="col-md-8"><input type="text" class="form-control" name="fname"></div><br><br>
                        <div class="col-md-4"><label>Last Name:</label></div>
                        <div class="col-md-8"><input type="text" class="form-control"  name="lname"></div><br><br>
                        <div class="col-md-4"><label>Email id:</label></div>
                        <div class="col-md-8"><input type="text"  class="form-control" name="email"></div><br><br>
                        <div class="col-md-4"><label>Contact Number:</label></div>
                        <div class="col-md-8"><input type="text" class="form-control"  name="contact"></div><br><br>
                        <div class="col-md-4"><label>Doctor:</label></div>
                        <div class="col-md-8">
                        <select name="doctor" class="form-control" >
                            <?php display_docs();?>
                        </select>
                        </div><br><br>
                        <div class="col-md-4"><label>Payment:</label></div>
                        <div class="col-md-8">
                          <select name="payment" class="form-control" >
                            <option value="Paid">Paid</option>
                            <option value="Pay later">Pay later</option>
                          </select>
                        </div><br><br><br>
                        <div class="col-md-4">
                          <input type="submit" name="entry_submit" value="Create new entry" class="btn btn-primary" id="inputbtn">
                        </div>
                        <div class="col-md-8"></div>                  
                      </div>
                    </form>
                  </div>
                </div>
              </div><br>
            </div>
            <!--end appointment-->
            <!--start payment status-->
            <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
              <div class="card">
                <div class="card-body">
                  <form class="form-group" method="post" action="func.php">
                    <input type="text" name="contact" class="form-control" placeholder="enter contact"><br>
                    <select name="status" class="form-control">
                      <option value="paid">paid</option>
                      <option value="pay later">pay later</option>
                    </select><br><hr>
                    <input type="submit" value="update" name="update_data" class="btn btn-primary">
                  </form>
                </div>
              </div><br><br>
            </div>
            <!--start  payment status-->
            
            <!--start docor section-->
            <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
              <form class="form-group" method="post" action="func.php">
                <label>Doctors name: </label>
                <input type="text" name="name" placeholder="enter doctors name" class="form-control">
                <br>
                <input type="submit" name="doc_sub" value="Add Doctor" class="btn btn-primary">
              </form>
            </div>
            <!--end docor section-->
            <!--start attendance-->
            <div class="tab-pane fade" id="list-attend" role="tabpanel" aria-labelledby="list-attend-list">
              <?php display_pati() ?>
            </div>
            <!--end attendance-->

            <!--start descriptiion-->
            <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
              <p class='lead'>this hospital consider the best hospital in our country and the doctors these work in it from the best doctors in this country and they are learned and worked in Outside the country before they worked here like DR.Ali he comes from canda,
                          DR.Mohamed he else comes from canda,DR.Mohamedy he comes from france,DR.Ibrahim he comes from England.</p>
            </div>
            <!--end descriptiion-->
          </div>
        </div>
      </div>
    </div>
  <!-- jQuery first, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php
}
?>