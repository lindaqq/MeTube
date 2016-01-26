<?php include "includes/db.php"?>
<?php include "includes/header.php"?>
			
			<div class="container">
				<ul id="filterable">
				    <?php
                    $query = "select * from categories";
                    $select_all_categories = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($select_all_categories)) {
                        $cat_title = $row['cat_title'];
                        echo "<li><a data-categories={$cat_title}>{$cat_title}</a></li>";
    
                    }
                    ?>
				</ul>
				 
				<ul id="portfolio-container" class="four-columns">
				    <?php
                    $query = "select * from posts";
                    $select_all_posts = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($select_all_posts)) {
                        $post_title = $row['post_title'];
                        $post_cat_id = $row['post_cat_id'];
                        $post_author = $row['post_author'];
                    
                    echo "<li class='isotope-item' data-categories={$post_cat_id}
                        <div class='item-wrapp'>
                                <div class='portfolio-item'>
                                    <a href='detail.php' class='item-permalink'><i class='icon-link'></i></a>
                                    <a href='images/portfolio/portfolio-item-1.jpg' data-rel='prettyPhoto' class='item-preview'><i class='icon-zoom-in'></i></a>
                                    <img src='images/portfolio/portfolio-item-1.jpg' alt=''/>
                                </div>
                                <div class='portfolio-item-title'>
                                    <a href='detail.php'>{$post_title}</a>
                                    <p>
                                         {$post_author}
                                    </p>
                                </div>
                            </div>
                    </li>";                 
    
                    }?>
				</ul>
				 

					<!-- Pagination -->
						<nav class="pagination">
						<ul>
							<li><a href="#">Previous</a></li>
							<li><a href="#" class="current">1</a></li>
							<li><a href="#" >2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">Next</a></li>
						</ul>
						 
						</nav>
					<!-- End pagination -->
<?php include "includes/footer.php"?>