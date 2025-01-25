
<?php include_once('header.php');
include('hms/include/config.php');
?>
 <!--Caroucel slide show-->

 <div class="section3">
    
        <div class="row">
          
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="images/slide11.webp" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item ">
                    <img src="images/Slide10.webp" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="images/slide14.webp" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="images/Slide13.webp" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="images/Slide15.webp" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="images/Slide16.webp" class="d-block w-100" alt="...">
                  </div>
                </div>
               <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </button>
              </div>
        </div>
 </div>

 <!--Adding bestseller CArds with images,watch name and price-->

 <div class="section4">
  
    <div class="row">
      <span style="padding: 30px;
      font-size: 30px;
      font-weight:550; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">BESTSELLERS</span>
    </div>

    <div class="row">

    <?php
$sql=mysqli_query($con,"select * from product LIMIT 4");

while($row=mysqli_fetch_array($sql))
{ 
?>
      <div class="card" style="width: 18rem;">
        <img src="hms/images/<?php echo $row['proimg'];?>" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="#"><p class="card-text"><?php echo $row['proname'];?></p></a>
        </div>
      <?php $cat=$row['procat']; $sql2=mysqli_query($con,"select catname from category where catslug='$cat'");

while($row1=mysqli_fetch_array($sql2)){
  $catn=$row1['catname'];
}?>
        <div class="category-name">
           <?php echo $catn; ?> Watch
        </div>
        <div class="price">
          <span class="price-value">₹ <?php echo $row['proprice'];?></span>
          
        </div>
        <!--<div class="btns">
          <a href="#" class="btn btn-primary">Add to cart</a>
        </div>-->
      </div>
<?php } ?>

      
    </div>
</div>

<!--Cards to shop by brands-->


<div class="section4">

              <div class="card-container"> 
                <h2 class="products">Watch Category</h2><br>               
                <div class="row">
                  
                  <?php
$sql=mysqli_query($con,"select * from category ");


while($row=mysqli_fetch_array($sql))
{ 
?>
               
                <div class="card mb-4" style="width: 18rem;">
                  <img src="hms/images/<?php echo $row['catimg'];?>"  class="card-img-top">
                    <h4><?php echo $row['catname'];?> 
                    </h4>
                    <div>
                      <a href="product.php?viewid=<?php echo $row['id'];?>"><button class="btn btn-primary" >View more</button></a>
                    </div>                    
                </div>

                <?php } ?>
                
                </div>
            </div>

            </div>



<!--
<div class="section5">
  <div class="row">
    <span class="brand">SHOP BY BRANDS</span>
  </div>

  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
    <img src="hms/images/<?php echo $row['proimg'];?>" class="card-img-top" alt="...">
    </div>




    
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
      <a href="sonata.php"><img class="w-100" src="images/ssonata.webp" alt=""></a>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
      <a href="police.php"><img class="w-100" src="images/spolice.webp" alt=""></a>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
      <a href="zoop.php"><img class="w-100"  src="images/szoop.webp" alt=""></a>
    </div>
  </div>

  <div class="row" style="margin-top: 20px;">
    
      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <a href="coach.php"><img class="w-100"  src="images/scoach.webp"></a>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <a href="fastrack.php"><img class="w-100" src="images/sfastrack.webp" alt=""></a>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <a href="nebula.php"><img class="w-100" src="images/nebula.webp" alt=""></a>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
       <a href="kenneth.php"> <img class="w-100"  src="images/skenneth.webp" alt=""></a>
    </div>

  </div>
</div>
-->



<!--footer-->
<?php include_once('footer.php');?>