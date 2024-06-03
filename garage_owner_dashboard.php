<?php

// Database connection
include 'db_connection.php';

// Start the session and check if the user is logged in
session_start();
if (!isset($_SESSION["user_id"])) {
    // Redirect to the login page if the user is not logged in
    header("Location: adminlogin.php");
    exit();
}

// Retrieve the garage owner's information
$user_id = $_SESSION["user_id"];
$sql = "SELECT * FROM garage_owners WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$garage_owner = $result->fetch_assoc();

// Retrieve the garage information
$garage_id = $garage_owner["garage_id"];
$sql = "SELECT * FROM garages WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $garage_id);
$stmt->execute();
$result = $stmt->get_result();
$garage = $result->fetch_assoc();

// Retrieve all service requests for the garage
$sql_all_requests = "SELECT * FROM requests WHERE garage_id = ?";
$stmt_all_requests = $conn->prepare($sql_all_requests);
$stmt_all_requests->bind_param("i", $garage_id);
$stmt_all_requests->execute();
$result_all_requests = $stmt_all_requests->get_result();
$num_all_requests = $result_all_requests->num_rows;

// Retrieve the service requests with different statuses for the garage
$sql = "SELECT r.*, c.name AS client_name
        FROM requests r
        INNER JOIN clients c ON r.client_id = c.id
        WHERE r.garage_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $garage_id);
$stmt->execute();
$result = $stmt->get_result();

// Initialize variables for counting request statuses
$num_accepted = $num_pending = $num_cancelled = 0;



while ($request = $result->fetch_assoc()) {
    // Trim the status to remove any leading or trailing whitespace
    $status = trim($request["status"]);



    // Use case-insensitive comparison
    if (strcasecmp($status, "Accepted") === 0) {
        $num_accepted++;
    } elseif (strcasecmp($status, "Pending") === 0) {
        $num_pending++;
    } elseif (strcasecmp($status, "canceled") === 0) {
        $num_cancelled++;
    }
}


$stmt->close();
$stmt_all_requests->close();
$conn->close();
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Garage Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
     
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                   
                    
                </div>
              
                <span class="logout-spn" >
                  <a href="logout.php" style="color:#fff;">LOGOUT</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 


                    <li class="active-link">
                        <a href="garage_owner_dashboard.php" ><i class="fa fa-desktop "></i>Dashboard </a>
                    </li>
                   
<!-- 
                    <li>
                        <a href="Manage_request.php"><i class="fa fa-table "></i>Manage Request </a>
                    </li> -->
                 
                    
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2>GARAGE DASHBOARD</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                             <strong>Welcome  <?php echo $garage_owner["username"]; ?> ! </strong> 
                        </div>
                       
                    </div>
                    </div>
                  <!-- /. ROW  --> 
                            <div class="row text-center pad-top">
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="blank.html" >
                            <i class="fa fa-circle-o-notch fa-5x"></i>
                      <h4>All Requests</h4>
                      <h5><?php echo $num_all_requests; ?></h5>
                      </a>
                      </div>
                     
                     
                  </div> 
                 
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="blank.html" >
                            <i class="fa fa-circle-o-notch fa-5x"></i>
                      <h4>Accepted Requests</h4>
                      <h5><?php echo $num_accepted; ?></h5>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="blank.html" >
                            <i class="fa fa-circle-o-notch fa-5x"></i>
                      <h4>Pending Requests</h4>
                      <h5><?php echo $num_pending; ?></h5>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="blank.html" >
                            <i class="fa fa-circle-o-notch fa-5x"></i>
                      <h4>Cancelled Requests</h4>
                      <h5><?php echo $num_cancelled; ?></h5>
                      </a>
                      </div>
                     
                     
                  </div>
                  
              </div>
              <hr>
              <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <table class="table table-striped table-bordered table-hover">
                        <?php
// Database connection
include 'db_connection.php';

// Start the session and check if the user is logged in
//session_start();
if (!isset($_SESSION["user_id"])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}

// Retrieve the garage owner's information
$user_id = $_SESSION["user_id"];
$sql = "SELECT * FROM garage_owners WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$garage_owner = $result->fetch_assoc();

// Retrieve the garage information
$garage_id = $garage_owner["garage_id"];
$sql = "SELECT * FROM garages WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $garage_id);
$stmt->execute();
$result = $stmt->get_result();
$garage = $result->fetch_assoc();

// Retrieve the service requests for the garage with client names
$sql = "SELECT r.*, c.name AS client_name,c.phone As client_phone,c.email As client_email,g.name As G_name,g.address AS G_address
        FROM requests r
        INNER JOIN clients c ON r.client_id = c.id
        INNER JOIN garages g ON r.garage_id = g.id
        WHERE r.garage_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $garage_id);
$stmt->execute();
$result = $stmt->get_result();

$stmt->close();
$conn->close();
?>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Client Name</th>
                                    <th>Client Phone Number</th>
                                    <th>Client Email</th>
                                    <th>Garage Name</th>
                                    <th>Garage Address</th>
                                    <th>Car Details</th>
                                    <th>Car Location</th>
                                    <th>Issues</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            while ($request = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo"<td>".$i++."</td>";
                                echo "<td>" . $request["client_name"] . "</td>";
                                echo "<td>" . $request["client_phone"] . "</td>"; 
                                echo "<td>" . $request["client_email"] . "</td>"; 
                                echo "<td>" . $request["G_name"] . "</td>"; // Use client_name instead of client_name
                                echo "<td>" . $request["G_address"] . "</td>";
                                echo "<td>" . $request["car_details"] . "</td>";
                                echo "<td>" . $request["car_location"] . "</td>";
                                echo "<td>" . $request["issue"] . "</td>";
                                echo "<td>" . $request["status"] . "</td>";
                                echo "<td>
                                    <a href='accept_request.php?id=" . $request["id"] . "& email=".$request["client_email"]."& garage=".$request["G_name"]." & address=".$request["G_address"]."' class='btn btn-primary'>Accept</a>
                                   
                                    <a href='cancel_request.php?id=" . $request["id"] . "& email=".$request["client_email"]." & garage=".$request["G_name"]."& address=".$request["G_address"]."' class='btn btn-danger'>Cancel</a>
                                </td>";
                                
                                echo "</tr>";
            
        }
        ?>
                                
                      
                               
                            </tbody>
                        </table>

                    </div>
                  


               

            </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">
      
    
            <div class="row">
                <div class="col-lg-12" >
                    &copy;  2024| Design by: <a href="http://binarytheme.com" style="color:#fff;" target="_blank">Group</a>
                </div>
            </div>
        </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
