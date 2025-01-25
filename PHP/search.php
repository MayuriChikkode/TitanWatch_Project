<?php 
include_once('header.php');
include('hms/include/config.php');
?>
<div class="section4">
    <div class="row">
    
<?php
// Capture the search term from the search bar (URL parameter)
$search_query = isset($_GET['search']) ? mysqli_real_escape_string($con, $_GET['search']) : '';

// Validate the search query and map it to a category
if ($search_query == 'men' || $search_query == 'men_watch') {
    $procat = 'men_watch';
} elseif ($search_query == 'women' || $search_query == 'women_watch') {
    $procat = 'women_watch';
} elseif ($search_query == 'kids' || $search_query == 'kids_watch') {
    $procat = 'kids_watch';
} elseif ($search_query == 'smart' || $search_query == 'smart_watch') {
    $procat = 'smart_watch';
} elseif ($search_query == 'clocks' || $search_query == 'clock_watch') {
    $procat = 'clock_watch';
} elseif ($search_query == 'titan' || $search_query == 'titan_watch') {
    $procat = 'titan_watch';
} elseif ($search_query == 'sonata' || $search_query == 'sonata_watch') {
    $procat = 'sonata_watch';
} elseif ($search_query == 'police' || $search_query == 'police_watch') {
    $procat = 'police_watch';
} elseif ($search_query == 'zoop' || $search_query == 'zoop_watch') {
    $procat = 'zoop_watch';
} elseif ($search_query == 'coach' || $search_query == 'coach_watch') {
    $procat = 'coach_watch';
} elseif ($search_query == 'nebula' || $search_query == 'nebula_watch') {
    $procat = 'nebula_watch';
} elseif ($search_query == 'kennethcole' || $search_query == 'kennethcole_watch') {
    $procat = 'kennethcole_watch';
} elseif ($search_query == 'fastrack' || $search_query == 'fastrack_watch') {
    $procat = 'fastrack_watch';
} else {
    $procat = ''; // Empty if no valid category found
}

// If a valid category is found, execute the query
if ($procat != '') {
    $sql = mysqli_query($con, "SELECT * FROM product WHERE procat='$procat'");
    
    // Check if any results were returned
    if (mysqli_num_rows($sql) > 0) {
        // Display the results
        while ($row = mysqli_fetch_array($sql)) {
?>
<div class="card mb-4" style="width: 18rem;">
    <img src="hms/images/<?php echo $row['proimg'];?>" class="card-img-top" alt="...">
    <div class="card-body">
        <a href="#"><p class="card-text"><?php echo $row['proname'];?></p></a>
    </div>
    <?php 
    $cat = $row['procat'];
    $sql2 = mysqli_query($con, "SELECT catname FROM category WHERE catslug='$cat'");
    while ($row1 = mysqli_fetch_array($sql2)) {
        $catn = $row1['catname'];
    }
    ?>
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

<?php 
        }  // End of while loop for fetching products
    } else {
        echo "No results found for your search.";
    }
} else {
    echo "Invalid search category.";
}
?>

    </div> <!-- End of row -->
</div> <!-- End of section4 -->

<!-- AJAX script for adding to cart -->
<script>
  $(document).ready(function(){
    // On click event for add to cart button
    $(document).on('click','#addItem',function(e){
      e.preventDefault();
      var form = $(this).closest(".form-submit");
      var pcode = form.find('.pcode').val();
      var pname = form.find('.pname').val();
      var pimage = form.find('.pimage').val();
      var pprice = form.find('.pprice').val();
      var alertmsg = form.find('.alert-message');

      // AJAX request to add product to cart
      $.ajax({
        url:'action.php',
        method:'post',
        data:{pcode:pcode,pname:pname,pimage:pimage,pprice:pprice},
        success:function(response){
          console.log(response);
          alertmsg.html(response);
          load_cart_item_number();
        }
      });
    });

    // Load cart item number
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
