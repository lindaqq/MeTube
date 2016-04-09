			<div class="container">
				<ul id="filterable">
				    <?php
                    $query = "select * from category";
                    $select_all_categories = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($select_all_categories)) {
                        $cat_title = $row['name'];
                        echo "<li><a data-categories={$cat_title}>{$cat_title}</a></li>";

                    }
                    ?>
				</ul>

				<ul id="portfolio-container" class="four-columns">
				    <?php
                    $query = "select title, username, name from post p join category c on p.category_id = c.id
                        join user u on u.id = p.user_id";
                    $select_all_posts = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($select_all_posts)) {
                        $post_title = $row['title'];
                        $cat_title = $row['name'];
                        $post_author = $row['username'];

                    echo "<li class='isotope-item' data-categories={$cat_title}
                        <div class='item-wrapp'>
                                <div class='portfolio-item'>

                                <video  width='210' height='120'>
                                    <source src='media/Jurassic World.mp4' type='video/mp4'>
                                Your browser does not support the video tag.
                                </video>

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
            </div>
