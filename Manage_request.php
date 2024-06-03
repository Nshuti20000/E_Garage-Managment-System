<?php
// Database connection
include 'db_connection.php';

// Start the session and check if the user is logged in
//session_start();
// if (!isset($_SESSION["user_id"])) {
//     // Redirect to the login page if the user is not logged in
//     header("Location: garage_owner_login.php");
//     exit();
// }

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
$sql = "SELECT r.*, c.name AS client_name
        FROM requests r
        INNER JOIN clients c ON r.client_id = c.id
        WHERE r.garage_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $garage_id);
$stmt->execute();
$result = $stmt->get_result();

$stmt->close();
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
                  <a href="#" style="color:#fff;">LOGOUT</a>  

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
                   

                    <li>
                        <a href="Manage_request.php"><i class="fa fa-table "></i>Manage Request </a>
                    </li>
                 
                    
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Client Requests</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    
                   
                   

                </div>
                <!-- /. ROW  -->
               
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                    <?php
                            // include('db_connection.php');
                            // $username=$_SESSION['id'];
                            // $sql="SELECT clients.name as Names,clients.phone,garages.name,garages.address,requests.car_details,requests.issue,requests.status,garage_owners.name from requests,clients,garages,garage_owners WHERE ((requests.client_id=clients.id AND requests.garage_id =garages.id) AND garage_owners.email=mbonimpaegide@gmail.com)";
                            // $result=$conn->query($sql);
                           
                        ?>
                        
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Client Name</th>
                                    <th>Client Phone Number</th>
                                    <th>Garage Name</th>
                                    <th>Garage Address</th>
                                    <th>Car Details</th>
                                    <th>Issues</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
        while ($request = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $request["client_name"] . "</td>"; // Use client_name instead of client_name
            echo "<td>" . $request["car_details"] . "</td>";
            echo "<td>" . $request["issue"] . "</td>";
            echo "<td>" . $request["status"] . "</td>";
            echo "<td>
                <a href='accept_request.php?id=" . $request["id"] . "'>Accept</a>
                <a href='pend_request.php?id=" . $request["id"] . "'>Pend</a>
                <a href='cancel_request.php?id=" . $request["id"] . "'>Cancel</a>
            </td>";
            
            echo "</tr>";
            
        }
        ?>
                                
                      
                               
                            </tbody>
                        </table>

                    </div>
                  


               

            </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">
      
    
             <div class="row">
                <div class="col-lg-12" >
                    &copy; 2024| Design by: <a href="http://binarytheme.com" style="color:#fff;"  target="_blank">Group</a>
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