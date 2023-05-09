<?php session_start(); ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">

        <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

        <meta http-equiv="X-UA-Compatible"  content="ie=edge">

    <!--page Name-->
    <title>Home</title>

    <!--css file-->
    <link rel="stylesheet" href="style.css">

    <!--js file  -->
    <script src="script.js"></script>
    
    </head>


    <body>
        <!--page Name box-->
        <div style="display: none;" id="pageName"></div>

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
            <div style="display: none" class="search_warp">
                <!--search Icon -->

                <div class="searchIcon">
                <svg height="50" width="50">
                <circle cx="20" cy="20" r="10" stroke="black" stroke-width="3" fill="transparent"></circle>
                <svg height="50" width="50">
                <line x1="30" y1="30" x2="40" y2="40" style="stroke:rgb(0,0,0);stroke-width:5"></line>
                </svg>
                </svg>
                </div>
                <form id="searchForm">
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

            <div class="welcome">Welcome <?php if(isset($_SESSION['uname']))
            {
                echo $_SESSION['uname'];
            }?> </div>

            <div class="slide_show">
                <img id="slide_img" src="resources/images2.jpg" width="100%" height="100%" alt="site images" title="image slide show">
            </div>

            <div class="adCards">
                <div class="card">Adssssss1</div>
                <div class="card">Adddd2</div>
                <div class="card">addddd3</div>
                <div class="card">ad4eeees</div>
            </div>


        </div>

        <!-- container of the footer -->
        <div class="container3">
            <div class="social">
                <div class="facebook"><a href="https://facebook.com" target="_blank"><img title="our facebook page" alt="facebook logo" src="resources/facebook.jpg"></a></div>
                <div class="linkedin"><a href="https://linkedin.com" target="_blank"><img title="our linked in page" alt="linkedin logo" src="resources/linkedin.png"></a></div>
            </div>
            <footer>
                <div>All Rights Are Preserved&copy;</div>
            </footer>
        </div>
    </body>


</html>



