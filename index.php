    <?php include('front-parts/menu.php'); ?>

    <!-- Food search section containing search text box and search button -->

    <section class="food-search text-center">
        <div class="container">
            
<!--       form for searching food-->
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Your Favourite Food..." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- Food Search Section End -->

    <?php 
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    ?>

    <!-- Food Categories Section -->

    <section class="categories">
        <div class="container">
            <h2 class="text-center"> Eat What Makes You Happy!! </h2>

            <?php 
            
                // Create SQL Query to Display Categories from Database
                
                $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
                
                //Execute the Query
                $res = mysqli_query($conn, $sql);
                
                //Count rows to check if the category is available 
                $count = mysqli_num_rows($res);

                if($count > 0)
                {
                    //Categories Available
                    while($row = mysqli_fetch_assoc($res))
                    {
                        //Get the Values like id, title, image_name
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php 
                                    //Check if Image is available
                                    if($image_name == "")
                                    {
                                        //If image is not available the display the message Image not available
                                        echo "<div class='error'>Image not Available</div>";
                                    }
                                    else
                                    {
                                        //If image is available then display the image
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Image Unavailable" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                

                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>
                        </a>

                        <?php
                    }
                }
                else
                {
                    //If Category is not in Database then display category not found
                    echo "<div class='error'>Category not Found.</div>";
                }
            ?>


            <div class="clearfix"></div>
        </div>
    </section>

    <!-- Categories Section End -->

    <!-- Food Menu Section Start -->

    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
            
            //Getting Foods from Database 
            //Create SQL Query
            $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 6";

            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);

            //Count Rows
            $count2 = mysqli_num_rows($res2);

            //Check whether food available or not
            if($count2>0)
            {
                //Food Available
                while($row=mysqli_fetch_assoc($res2))
                {
                    //Get all the values
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>

                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php 
                                //Check whether image available or not
                                if($image_name=="")
                                {
                                    //Image not Available
                                    echo "<div class='error'>Image not available.</div>";
                                }
                                else
                                {
                                    //Image Available
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Image Unavailable" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                            
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price"> <b>Rs.</b> <?php echo $price; ?></p>
                            <p class="food-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>

                    <?php
                }
            }
            else
            {
                //Food Not Available 
                echo "<div class='error'>Food not available.</div>";
            }
            
            ?>

            <div class="clearfix"></div>        

        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>

    <!-- Food Menu Section End -->

    
    <?php include('front-parts/footer.php'); ?>