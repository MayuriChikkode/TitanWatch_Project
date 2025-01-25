<!--header-->
<?php include_once('header.php');
include('hms/include/config.php');

?>

 <!--Caroucel slide show-->

 <div class="section3">
    
        <div class="row">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="images/mensslider.webp" class="d-block w-100" alt="...">
                  </div>
                </div>
            </div>
        </div>
 </div>

 <!--Adding CArds with images,watch name and price-->

 <div class="section4">
            
                <div class="row">
                <?php
           if(isset($_GET['viewid'])){
            $catid=$_GET['viewid'];
            $query=mysqli_query($con,"select catslug from category where id='$catid'");
            while($query1=mysqli_fetch_array($query))
{
 $catslug= $query1['catslug'];
}
$sql=mysqli_query($con,"select * from product where procat='$catslug' ");

           }else{
            $sql=mysqli_query($con,"select * from product");

           }


while($row=mysqli_fetch_array($sql))
{ 
?>
                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                  <div class="card mb-4" style="width: 18rem;">
                    
                    <div class="pdp-link">
                      <img src="hms/images/<?php echo $row['proimg'];?>"  class="card-img-top"><br>
                    <p>
                    <?php echo $row['proname'];?> 
</p> 
                    </div>
                    
                    <div class="price" >
                    <span>
                    <input type="hidden" class="salesPriceValue" value="120">
                    <span class="sales ">
                    <span class="value price-text " content="120">
                    ₹ <?php echo $row['proprice'];?>
                    </span>  
                    </span>
                    </span>
                    <form class="form-submit">
                                       <input type="hidden" class="pname" value="<?php echo $row['proname'];?>">
                                        <input type="hidden" class="pprice" value="<?php echo $row['proprice'];?>">
                                        <input type="hidden" class="pimage" value="<?php echo $row['proimg'];?>">
                                        <input type="hidden" class="pcode" value="<?php echo $row['id'];?>">

                                        <button id="addItem" class="btn-primary btn button">Add To Cart</button>
                                                                              <div class="alert-message"></div>

                                      </form>
                    </div>
                  </div>
                  </div>
<?php } ?>
</div>
              
            </div><br>
<!--footer-->

<script>
  $(document).ready(function(){
 $(document).on('click','#addItem',function(e){
e.preventDefault();
var form=$(this).closest(".form-submit");
var pcode=form.find('.pcode').val();
var pname=form.find('.pname').val();
var pimage=form.find('.pimage').val();

var pprice=form.find('.pprice').val();
//var $this = $(this);
var alertmsg=form.find('.alert-message');
$.ajax({
url:'action.php',
method:'post',
data:{pcode:pcode,pname:pname,pimage:pimage,pprice:pprice},
success:function(response){
  console.log(response);
  alertmsg.html(response);

  // $this.closest('.alert-message').html(response)
  //$(this).closest('.alert-message').html(response);
 //alertmsg.html(response);
  //window.scrollto(0,0);
  load_cart_item_number();
}
});

 });

  load_cart_item_number();
function load_cart_item_number(){
  $.ajax({
url:'action.php',
method:'get',
data:{cartItem:"cart_item"},
success:function(response){

  $("#cart-item").html(response);
  
}
});
}

  });
 
</script>


<?php include_once('footer.php');?>