<?php
  include 'header-before.php';
?>

<section class="section-mens" id="mens-wear">

  <div class="container center-text ">
    <h2 class="heading-secondary">
      Men's Wear
    </h2>
  </div>
  <div class="category margin-bottom-md  ">
    <?php
    
    //get category title based on category id
    $sql="SELECT * from category WHERE active='Yes' AND featured='Yes'";
  
    //execute query
    $res=mysqli_query($conn, $sql);

    //count rows
    $count=mysqli_num_rows($res);
    
    //check whether products available or not
    if($count>0){
      //products available
      while($row=mysqli_fetch_assoc($res)){
?>



    <div class="mens">
      <?php
        //get values
        $id=$row['id'];
        $title=$row['title'];
        $image_name=$row['image_name'];

        //check whether image is available or not
      if($image_name==""){
        //image not available
        echo "<div class='error'>Image not available</div>";
        
      }
      else{
        //image available
        ?>

      <a href="products-before.php?category_title=<?php echo $title; ?>"><img
          src="<?php echo $home; ?>img/category/<?php echo $image_name; ?>" alt="Image"
          class="img-responsive img-curve category-img" /></a>

      <?php
      }
        ?>

      <div class="mens-content">
        <p class="mens-title"><a
            href="<?php echo $home?>products-before.php?category_title=<?php echo $title;?>"><?php echo $title; ?></a>
        </p>

      </div>
    </div>


    <?php
    }
    }
  
    else{
    //products not available
    echo "<div class='error'>Categories not added</div>";
    }

    ?>
  </div>
</section>

<?php
  include 'footer.php';
?>