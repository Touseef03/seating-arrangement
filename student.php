<!DOCTYPE html>
<html lang="en">

<head>
    <!-- header files are added here -->
    <title>View:: Seating Arrangement</title>
    <meta charset="utf-8" />
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Champion Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free web designs for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript">addEventListener("load", function () { setTimeout(hideURLbar, 0); }, false);

        function hideURLbar() { window.scrollTo(0, 1); } </script>
    <!-- //for-mobile-apps -->
    <!-- header files are added here -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="main1.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
    <!-- header -->
    <div class="header">
        <div class="container">
            <div class="header-nav">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="logo">
                            <a class="navbar-brand" href="index.html">Seating Arrangement <span>my first project</span></a>
                        </div>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="hvr-sweep-to-bottom active"><a href="index.html" class="scroll">About Project</a></li>

                            <li class="hvr-sweep-to-bottom active"><a href="login.html">Admin Login</a></li>
                            <li class="hvr-sweep-to-bottom"><a href="faculty.php" class="scroll">Faculty</a></li>
                            <li class="hvr-sweep-to-bottom"><a href="sview.html" class="scroll">Student</a></li>


                            <li class="hvr-sweep-to-bottom"><a href="register.html" class="scroll">Sign Up</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </nav>
            </div>
        </div>
    </div>
    <!-- //header -->

    <div class="con">
        <!-- Forms -->
        <div class="loginscene">
            <div class="page-header">
                <h1>Student</h1>

            </div>
            <div class="bs-example" data-example-id="simple-horizontal-form">
                <!-- Form will go here -->
            </div>
        </div>

        <?php
				require "connect.inc.php";
        
        // Commenting out the line below as including CSS directly in PHP is not standard practice.
        // include "style.css";
        $r = $_POST['rollno'];

        $n = 1;
        $rm = 1;
        $i = 1;
        $q = "SELECT * FROM student WHERE ROLL_NO=$r";
        $q2 = mysqli_query($conn, $q) or die(mysqli_error($conn));
        $ro = mysqli_fetch_array($q2);

        echo "Room:  $rm<br>";
        $q3 = "SELECT * FROM room$rm";
        $result = mysqli_query($conn, $q3) or die(mysqli_error($conn));
        $rows = mysqli_num_rows($result);
        $cols = mysqli_num_fields($result);

        echo "YOUR ALLOTTED SEAT IS IN <br>";
        echo "ROW:  ";
        while ($i < $cols) {
            $q5 = "SELECT * FROM room$rm WHERE col$i=$r";
            $q6 = mysqli_query($conn, $q5) or die(mysqli_error($conn));
            $rowno = mysqli_fetch_array($q6);

            echo $rowno['Rows'];
            if ($rowno) {
                echo "<br>COLUMN: col$i";
                $a = $i;
            }
            $i++;
        }

        if ($cols >= 4 && $cols <= 9) {
            echo "<table align='center' border='1'>
                    <tr>
                        <th>Rows</th>";
            for ($j = 1; $j <= $cols; $j++) {
                echo "<th>col$j</th>";
            }
            echo "</tr>";
            $t = 1;
            while ($t <= $rows) {
                $row = mysqli_fetch_array($result);
                echo "<tr>";
                echo "<td>" . $row['Rows'] . "</td>";
                for ($k = 1; $k <= $cols; $k++) {
                    echo "<td>" . $row["col$k"] . "</td>";
                }
                echo "</tr>";
                $t++;
            }
            echo "</table>";
        }
        ?>
    </div>
</body>

</html>
