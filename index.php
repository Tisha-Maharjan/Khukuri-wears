<?php
  include 'header-before.php';
  $_SESSION['rand_id']= rand(1,9999);
?>

<body>
  <!-- <div class="curved-doodle"></div> -->
  <!-- <div id="cursor-circle"></div> -->

  <main>


    <section class="section-hero">
      <div class="hero">
        <div class="hero-text-box">
          <h1 class="heading-primary">
            Elevate Your Style, Define Your Strength: Khukuri Wears
          </h1>
          <p class="hero-description">
            Discover timeless style and modern trends at our men's wear website, where quality meets fashion. From
            sophisticated essentials to casual essentials, elevate your wardrobe with our curated collection of
            versatile and on-trend pieces.
          </p>
          <a href="#mens-wear" class="btnn btn--full margin-right-sm">Start shopping</a>
          <a href="user-login.php" class="btnn btn--outline">Learn more &darr;</a>


        </div>

        <div class="hero-img-box">

          <picture>
            <source srcset="khukuriwears/hero.webp" type="image/webp" />
            <source srcset="khukuriwears/hero.png" type="image/png" />

            <img src="khukuriwears/hero.png" alt="Showcasing outfits" class="hero-img" />
          </picture>
        </div>
      </div>
    </section>



    <section class="section-mens" id="mens-wear">

      <div class="container center-text ">
        <h2 class="heading-secondary">
          Men's Wear
        </h2>
      </div>
      <div class="category margin-bottom-md  ">
        <?php
    
    //get category title based on category id
    $sql="SELECT * from category WHERE active='Yes'";
  
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

          <a href="products-before.php?category_title=<?php echo $title; ?>"> <img
              src="<?php echo $home; ?>img/category/<?php echo $image_name; ?>" alt="Image"
              class="img-responsive img-curve category-img" /></a>

          <?php
      }
        ?>

          <div class="mens-content">
            <p class="mens-title"><?php echo $title; ?></p>

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


    <section class="section-contact" id="contact">
      <div class="contact-container">
        <span class="subheading">Contact Us</span>
        <h2 class="heading-secondary-contact">Get in Touch - We're All Ears!</h2>

        <div class="contact-form">
          <form action="" method="post"> 


          <div class="form-group">
            <label for="name">Fullame</label>
            <input name="name" id="name" class="form-control" type="text" />
          </div>

          <div class="form-group">
          <label for="email">Email</label>
            <input name="email" id="email" class="form-control" type="email" />          
            </div>

          <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" class="form-textarea" rows="6" cols="50"></textarea>
          </div>

          <div class="contact-btn">
          <a href="user-login.php"><button class="contact-submit">Submit</button></a>
          </div>
  </form>

        </div>

        
        <div class="map-container">
        <!-- Embedding the Google Map using an iframe -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.4817416088244!2d85.31384667123524!3d27.67150187450098!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19e127e37d6f%3A0x33b7d23ae04ac9d1!2sKhukuri%20Wears!5e0!3m2!1sen!2snp!4v1708172945248!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>


        </div>
      </div>

      <div class="gallery" id="gallery">
        <figure class="gallery-item">
          <img src="khukuriwears/gallery/gallery-1.jpg" alt="Photo of men's wear" />
        </figure>

        <figure class="gallery-item">
          <img src="khukuriwears/gallery/gallery-2.jpg" alt="Photo of men's wear" />
        </figure>

        <figure class="gallery-item">
          <img src="khukuriwears/gallery/gallery-3.jpg" alt="Photo of men's wear" />
        </figure>

        <figure class="gallery-item">
          <img src="khukuriwears/gallery/gallery-4.jpg" alt="Photo of men's wear" />
        </figure>

        <figure class="gallery-item">
          <img src="khukuriwears/gallery/gallery-5.jpg" alt="Photo of men's wear" />
        </figure>

        <figure class="gallery-item">
          <img src="khukuriwears/gallery/gallery-6.jpg" alt="Photo of men's wear" />
        </figure>

        <figure class="gallery-item">
          <img src="khukuriwears/gallery/gallery-7.jpg" alt="Photo of men's wear" />
        </figure>

        <figure class="gallery-item">
          <img src="khukuriwears/gallery/gallery-8.jpg" alt="Photo of men's wear" />
        </figure>

        <figure class="gallery-item">
          <img src="khukuriwears/gallery/gallery-9.jpg" alt="Photo of men's wear" />
        </figure>

        <figure class="gallery-item">
          <img src="khukuriwears/gallery/gallery-10.jpg" alt="Photo of men's wear" />
        </figure>

        <figure class="gallery-item">
          <img src="khukuriwears/gallery/gallery-11.jpg" alt="Photo of men's wear" />
        </figure>

        <figure class="gallery-item">
          <img src="khukuriwears/gallery/gallery-12.jpg" alt="Photo of men's wear" />
        </figure>
      </div>
    </section>
    
  </main>

  <?php
  include 'footer.php';
  ?>

</body>