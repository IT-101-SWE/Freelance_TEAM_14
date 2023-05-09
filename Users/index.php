<?php
session_start();


    //read the data from data.json
    $dataFile = file_get_contents("../resources/data.json");

    //decode data

    $userData = json_decode($dataFile,true);

?>
<!doctype html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible"  content="ie=edge">

    <!--page Name-->
    <title>Users</title>

    <!--css file-->
    <link rel="stylesheet" href="style.css">

    <!--js file  -->
    <script src="script.js"></script>
    
    </head>


    <body>
        <!--page Name box-->
        <div id="pageName"></div>

        <!-- container of navigation bar (menu) and login and search and logo -->
        <div class="container1">
            <!-- logo icon container -->
            <div class="logo">
                <img alt="page Logo" src="resources/iti-logo.png">
            </div>

            <!-- menu container -->
            <div class="menu_warp">

                <div class="menu">Menu</div>
                <div class="menuList">
                    <ul>
                        <li  id="home"><div>Home</div></li>
                        <li  id="about_us"><div>About Us</div></li>
                        <li  id="jobs"><div>Jobs</div></li>
                        <?php if(isset($_SESSION['uid'])){

                            if($_SESSION['uState'] == 1)
                            {
                                echo '<li  id="cv"  ><div>CV</div></li>';
                            }else
                            {
                                echo '<li  id = "users" ><div > Users</div ></li >';
                            }



                        }
                        ?>

                    </ul>
                </div>

            </div>

             <!-- search bar container -->
                        <div class="search_warp">
                            <!--search Icon -->

                            <div class="searchIcon">
                            <svg height="50" width="50">
                            <circle cx="20" cy="20" r="10" stroke="black" stroke-width="3" fill="transparent"></circle>
                            <svg height="50" width="50">
                            <line x1="30" y1="30" x2="40" y2="40" style="stroke:rgb(0,0,0);stroke-width:5"></line>
                            </svg>
                            </svg>
                            </div>
                            <form action=<?php echo $_SERVER['PHP_SELF']?> method="get" id="searchForm">
                                <!--search field-->
                                <!--arial-label is defining what the input do-->
                                <input type="search"   placeholder="Search by Job Title" name="search" id="search_bar" aria-label="Search jobs by Job Title">
                                <!--search button-->
            <!--                    <div class="search_btn">-->
                                    <input type="submit" name="submit"  value="Search"  id="search_btn">
            <!--                    </div>-->
                            </form>
                        </div>
            
            <!-- login container -->
            <div class="login_warp">
                <!-- login buttons -->
                <div class="loginButtons">
                    <ul>
                        <?php
                        if(isset($_SESSION['uid']))
                        {
                            echo '<li id="logOut" ><div onclick=window.location.href="/logout.php">Log Out</div></li>';
                        }
                        else
                        {
                            echo '<li id="login"  ><div>Login</div></li>
                                    <li id="signUp"  ><div>Sign Up</div></li>';
                        }

                        ?>
                    </ul>
                </div>

            </div>
        </div>

        <!-- container of the main content of the page -->
        <div class="container2">
            <div class="userWarp">

                <!--head of the list container -->
                <div class="userHead">
                    <div class="infoHead">Name</div>
                    <div class="infoHead">Job Title</div>
                    <div class="infoHead">Job Applied In</div>
                    <div class="infoHead">CV</div>
                </div>

                <!--list users container -->
                <div class="userList">

                    <?php

                    //loop on data to set users
                    foreach ($userData['user'] as $user)
                    {
                        if(isset($_GET['search']))
                        {
                            if($_GET['search'] == $user['jobt'])
                            {
                                echo '<div class="user">';
                                echo '<div class="userInfo">'.$user["name"].'</div>';
                                echo '<div class="userInfo">'.$user["jobt"].'</div>';
                                echo '<div class="userInfo">'.$user["joba"].'</div>';
                                echo '<div class="viewCv" >
                                                   <form action="./CV/" method="POST">
                                                       <ul>
                                                           <li><input type="hidden" name="jobID" value="'.$user["userId"].'"></li>
                                                           <li class="viewCvBtn"><input type="submit" value="View"></li>
                                                       </ul>
                                               </form>
                                               </div>';
                                echo '</div>';
                            }
                            else
                            {
                                continue;
                            }
                        }
                        else {
                            if ($user['uState'] != 1)
                            {
                                continue;
                            }
                            echo '<div class="user">';

                            echo '<div class="userInfo">' . $user["name"] . '</div>';
                            echo '<div class="userInfo">' . $user["jobt"] . '</div>';
                            echo '<div class="userInfo">' . $user["joba"] . '</div>';
                            echo '<div class="viewCv" >
                                                   <form action="./CV/" method="POST">
                                                       <ul>
                                                           <li><input type="hidden" name="jobID" value="' . $user["userId"] . '"></li>
                                                           <li class="viewCvBtn"><input type="submit" value="View"></li>
                                                       </ul>
                                               </form>
                                               </div>';
                            echo '</div>';
                        }

                    }

                    ?>


                </div>

            </div>
        </div>

        <!-- container of the footer -->
        <div class="container3">
            <div class="social">
                <div class="facebook"><a href="https://facebook.com" target="_blank"><img alt="facebook logo" src="resources/facebook.jpg"></a></div>
                <div class="linkedin"><a href="https://linkedin.com" target="_blank"><img alt="linkedin logo" src="resources/linkedin.png"></a></div>
            </div>
            <footer>
                <div>All Rights Are Preserved&copy;</div>
            </footer>
        </div>
    </body>


</html>



