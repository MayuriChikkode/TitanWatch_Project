<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Titan World</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/index.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="section1">
        <div class="container">
            <div class="row">
                
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                    <header>
                    <img src="images/titanlogo1.jfif" height="80px" width="100px">
                    </header>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                <!-- Add this code where you want the search bar to appear, such as in your header or homepage -->
<form method="get" action="search.php">
    <input type="text" name="search" placeholder="Search for watches... (e.g., men, women, kids, fastrack)"  style="width: 500px; height: 35px; border: radius 2%; border:solid 2px;">
    <button type="submit" style="height: 35px; border: radius 2%; border:solid 2px;">Search</button>
</form>



                    <!--<header>
                    <nav class="navbar navbar-light ">
                        <form class="form-inline" action="search.php">
                          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </nav>
                    </header>-->
                </div>

            <!--<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <header>
                    <nav class="navbar navbar-expand-lg navbar-light ">
                        <div class="account">
                          <i class="fa-regular fa-user" width="30px" height="50px"></i>
                            
                        </div>
                        
                        <div class="cart" >
                          <i class="fa-solid fa-basket-shopping"></i>
                        </div> 
                    </nav>
                    </header>
                </div>-->
                    
            </div>
        </div>
    
    </div>

<!--navbar menu-->

    <div class="section2">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-expand-lg  ">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                      <div class="navbar-nav">
                        <a class="nav-link active" href="index.php">HOME <span class="sr-only">(current)</span></a>
                        <a class="nav-link " href="men.php">MEN</a>
                        <a class="nav-link" href="women.php">WOMEN</a>
                        <a class="nav-link" href="kid.php">KIDS</a>
                        
                        <a class="nav-link" href="clocks.php">CLOCKS</a>
                        <a class="nav-link" href="Contact-Us.php">Contact-Us</a>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle btn btn-primary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Register
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="hms/registration.php">Admin Registration</a>
                            <a class="dropdown-item" href="hms/user_registration.php">User Registration</a>
                          </div>
                        </li>
                        <li> 
           <a class="nav-link" href="cart.php"> <i class="fa fa-shopping-cart" aria-hidden="true"></i>
<span id='cart-item'> </span></a>
          </li>
                        
                      </div>
                    </div>
                 </nav>
            </div>
        </div>
    </div>



   