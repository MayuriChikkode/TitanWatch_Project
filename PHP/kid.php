<!--header-->

<?php include_once('header.php');
include('hms/include/config.php');
?>

 <!--Adding CArds with images,watch name and price-->

 <div class="section4">
  
    <div class="row">
    <?php
             $procat='kids_watch';
$sql=mysqli_query($con,"select * from product where procat='$procat'");


while($row=mysqli_fetch_array($sql))
{ 
?>


      <div class="card mb-4" style="width: 18rem;">
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

      <form class="form-submit">
                                       <input type="hidden" class="pname" value="<?php echo $row['proname'];?>">
                                        <input type="hidden" class="pprice" value="<?php echo $row['proprice'];?>">
                                        <input type="hidden" class="pimage" value="<?php echo $row['proimg'];?>">
                                        <input type="hidden" class="pcode" value="<?php echo $row['id'];?>">

                                        <button id="addItem" class="btn-primary btn button">Add To Cart</button>
                                                                              <div class="alert-message"></div>

                                      </form>

      </div>
<?php } ?>



      
    </div>
</div>

<!--add to cart script-->
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

<!--footer-->

<?php include_once('footer.php');?>