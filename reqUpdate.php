<?php
session_start();
include "conn.php";

if(empty($_SESSION['register'])) {
    ?>
    <script>
        alert("Session expired\nPlease login again.");
        window.location.href = "admin_login.html";
    </script>
    <?php
    } else {
        $email = $_SESSION['register'];
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>SNNCare | Records</title>

        <!-- icon -->
        <link rel="icon" type="icon" href="logo/SNNCARE.png">

        <!-- Fonts --> 
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,200;1,400&display=swap"
            rel="stylesheet"
        />

        <!-- Bootstrap -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Font Awesome -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        />

        <!-- Bootstrap CSS --> 
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <style>
            :root {
                --bs-blue: #0d6efd;
                --bs-indigo: #6610f2;
                --bs-purple: #6f42c1;
                --bs-pink: #d63384;
                --bs-red: #dc3545;
                --bs-orange: #fd7e14;
                --bs-yellow: #ffc107;
                --bs-green: #198754;
                --bs-teal: #20c997;
                --bs-cyan: #0dcaf0;
                --bs-black: #000;
                --bs-white: #fff;
                --bs-gray: #6c757d;
                --bs-gray-dark: #343a40;
                --bs-gray-100: #f8f9fa;
                --bs-gray-200: #e9ecef;
                --bs-gray-300: #dee2e6;
                --bs-gray-400: #ced4da;
                --bs-gray-500: #adb5bd;
                --bs-gray-600: #6c757d;
                --bs-gray-700: #495057;
                --bs-gray-800: #343a40;
                --bs-gray-900: #212529;
            }
            body {
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                background-attachment: fixed;
                background: var(--bs-gray-200);
            }
            .flex {
                display: flex;
                align-items: center;
            }
            .offcanvas {
                background: whitesmoke;
            }
            .nav-item .nav-link {
                color: #343a40;
                padding: 5px 20px;
                border-radius: 5px;
            }
            .nav-item .nav-link:hover {
                background: #343a40;
                color: #fff;
            }
            .logo {
                height: auto;
                width: 50px;
                border-radius: 50%;
            }
            .fa-solid {
                margin-right: 5px;
            }
            .navbar-toggler {
                margin: 0px auto auto 20px;
            }
            .logout {
                float: right;
            }
            .btn:focus {
                box-shadow: none;
            }
            /* Main-content */
            .main-content {
                padding-bottom: 100px;
            }
            .main-title {
                font-weight: bold;
                font-size: 3rem;
            }
            .tables {
                display: flex;
                justify-content: space-around;
                align-items: center;
            }
            .footer {
                display: block;
                justify-content: center;
                align-items: center;
                text-align: center;
                background: #212529;
                color: #fff;
                padding: 20px;
            }
            .rights {
                font-weight: 300;
            }
        </style>
    </head>
    <body>
                    <div class="offcanvas collapse offcanvas-start" id="offcanvas">
                        <div class="offcanvas-header">
                            <h1 class="container offcanvas-title">
                                SNNCare: Sto. Nino Health Care Center
                            </h1>
                            <button
                                class="btn-close text-reset"
                                type="button"
                                data-bs-dismiss="offcanvas"
                            ></button>
                        </div>
                        
                        <nav class="navbar" id="navbar">
                            <div class="container-fluid">
                                <ul class="navbar-nav ps-3 w-100">
                                    <hr>
                                    <li class="nav-item">
                                        <a href="home.php" class="nav-link"
                                            ><i class="fa-solid fa-house"></i>
                                            Home</a
                                        >
                                    </li>
                                    <li class="nav-item">
                                        <a
                                            href="records.php"
                                            class="nav-link active"
                                            ><i
                                                class="fa-solid fa-clipboard"
                                            ></i>
                                            Records</a
                                        >
                                    </li>
                                    <li class="nav-item">
                                        <a
                                            href="requirements.php"
                                            class="nav-link"
                                            ><i
                                                class="fa-sharp fa-solid fa-file"
                                            ></i>
                                            Requirements</a
                                        >
                                    </li>
                                    <li class="nav-item">
                                        <a href="schedule.php" class="nav-link"
                                            ><i
                                                class="fa-solid fa-calendar"
                                            ></i>
                                            Schedule</a
                                        >
                                    </li>
                                    <li class="nav-item">
                                        <a
                                            href="suggestion.php"
                                            class="nav-link"
                                            ><i
                                                class="fa-solid fa-lightbulb"
                                            ></i>
                                            Suggestions</a
                                        >
                                    </li>
                                    <hr>
                                    <li class="nav-item"><a href="profile.php" class="nav-link"><i class="fa-solid fa-user"></i> Profile</a></li>
                                    <li class="nav-item"><a href="reqUpdate.php" class="nav-link"><i class="fa-solid fa-pen-to-square"></i>Update Requests</a></li>
                                    <li class="nav-item"><a href="addRequest.php" class="nav-link"><i class="fa-sharp fa-solid fa-plus"></i>Pending Records</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                <div class="container-fluid main-content">
                    <div class="container">
                    <hr />
                    <div class="container-fluid">
                    <img src="logo/SNNCARE.png" alt="Logo" class="logo">
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvas"
                    >
                        <span class="fa-solid fa-bars"></span> Dashboard
                    </button>
                    <button type="button" class="btn btn-dark logout justify-content-end"><a href="logout.php" style="text-decoration: none; color: #fff; ">Log out</a></button>
                    </div>
                    <hr />
                    </div>
                    <div class="container">
                        <div class="header">
                            <h1 class="main-title">
                                Record Modification
                            </h1>
                            <br />
                        </div>
                            <br>
                            <br />
                            <div class="tables">
                                <div class="current">
                                    <h1>Current Records</h1>
                                    <table class="table">
                                        <tr>
                                            <th>ID</th>
                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            <th>Sex</th>
                                            <th>Age</th>
                                            <th>Condition</th>
                                            <th>Status</th>
                                        </tr>
                                        <tr>
                                            <?php
                                            include "conn.php";
                                                $records = "SELECT * FROM req_update";

                                                $result = mysqli_query($conn, $records);
                                                if($result) {
                                                    while($row = mysqli_fetch_array($result)) {

                                                        $current_id = $row['id'];
                                                        $current_lastname = $row['current_lname'];
                                                        $current_firstname = $row['current_fname'];
                                                        $current_sex = $row['current_sex'];
                                                        $current_age = $row['current_age'];
                                                        $current_con = $row['current_condition'];
                                                        $current_status = $row['current_status'];

                                                        echo "<tr>";
                                                        echo "<td>".$current_id."</td>";
                                                        echo "<td>".$current_lastname."</td>";
                                                        echo "<td>".$current_firstname."</td>";
                                                        echo "<td>".$current_sex."</td>";
                                                        echo "<td>".$current_age."</td>";
                                                        echo "<td>".$current_con."</td>";
                                                        echo "<td>".$current_status.'</td>
                                                        </tr>';
                                                    }
                                                }
                                            ?>
                                        </tr>
                                    </table>
                                </div>
                                <div class="new">
                                    <h1>New Records</h1>
                                    <table class="table">
                                        <tr>
                                            <th>ID</th>
                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            <th>Sex</th>
                                            <th>Age</th>
                                            <th>Condition</th>
                                            <th>Status</th>
                                        </tr>
                                        <tr>
                                            <?php
                                            include "conn.php";
                                                $records = "SELECT * FROM req_update";

                                                $result = mysqli_query($conn, $records);
                                                if($result) {
                                                    while($row = mysqli_fetch_array($result)) {

                                                        $id = $row['id'];
                                                        $lastname = $row['new_lname'];
                                                        $firstname = $row['new_fname'];
                                                        $sex = $row['new_sex'];
                                                        $age = $row['new_age'];
                                                        $con = $row['new_condition'];
                                                        $status = $row['new_status'];

                                                        echo "<tr>";
                                                        echo "<td>".$id."</td>";
                                                        echo "<td>".$lastname."</td>";
                                                        echo "<td>".$firstname."</td>";
                                                        echo "<td>".$sex."</td>";
                                                        echo "<td>".$age."</td>";
                                                        echo "<td>".$con."</td>";
                                                        echo "<td>".$status.'</td>
                                                        </tr>';
                                                    }
                                                }
                                            ?>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
        <footer>
            <div class="footer fixed-bottom">
                <h5 class="footer-title">SNNCare: Sto. Nino Norte Health Care Center</h5>
                <small>&copy; 2023 Copyright | <span class="rights">All Rights Reserved</span></small>
            </div>
        </footer>
    </body>
</html>
