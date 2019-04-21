<?php
$con=mysqli_connect("localhost","root","","hmsdb");
if(isset($_POST['search_submit'])){
  $contact=$_POST['contact'];
 $query="select * from appointmenttb where contact='$contact';";
 $result=mysqli_query($con,$query);
 ?>
 <!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body style="background-color:#3498DB;color:white;text-align:center;padding-top:50px;">
      <div class="container" style="text-align:left;">
      <center><h3>Search Results</h3></center><br>
      <table class="table table-hover">
      <thead>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Contact</th>
          <th>Doctor</th>
          <th>Payment</th>
        </tr>
      </thead>
    <tbody>
  <?php
  while($row=mysqli_fetch_array($result)){
    $fname=$row['fname'];
    $lname=$row['lname'];
    $email=$row['email'];
    $contact=$row['contact'];
    $doctor=$row['doctor'];
    $payment=$row['payment'];
    echo '<tr>
      <td>'.$fname.'</td>
      <td>'.$lname.'</td>
      <td>'.$email.'</td>
      <td>'.$contact.'</td>
      <td>'.$doctor.'</td>
      <td>'.$payment.'</td>
    </tr>';
  }
?>
  </tbody></table></div> 
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php
}
?>