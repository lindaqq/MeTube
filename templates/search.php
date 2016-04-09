<?php include "includes/db.php"?>
<?php include "templates/header.php"?>

			<div class="container">
				<div class="one">
					<div class="three-fourth">
					<?php
                    $search = $_GET['search'];
                    $query = "select * from post p join user u on p.user_id = u.id where title like '%$search%'";

                    $select_all_posts = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_all_posts)) {
                        $post_title = $row['title'];
                        $post_author = $row['username'];
				echo	"<div class='blog-post layout-2'>
							<div class='media-holder'>
								<div class='item-wrapp'>
									<div class='blog-item small'>
										<a href='detail.php' class='item-permalink'><i class='icon-link'></i></a>
										<a href='images/blog/blog-small-01.jpg' data-rel='prettyPhoto' class='item-preview'><i class='icon-zoom-in'></i></a>
										<img src='images/blog/blog-small-01.jpg' alt=''/>
									</div>
								</div>
							</div>
							<div class='permalink'>
								<h4><a href='blog-post.html'>{$post_title}</a></h4>
							</div>
							<ul class='post-meta'>
								<li><i class='icon-time'></i> 2 July, 2013 </li>
								<!-- Date -->
								<li><i class='icon-user'></i><a href='#'>{$post_author}</a></li>
								<!-- Author -->
								<li><i class='icon-tags'></i><a href='#'>Web Development</a></li>
								<!-- Category -->
								<li><i class='icon-comments'></i><a href='#'>32 Comments</a></li>
								<!-- Comments -->
							</ul>
							<!-- End post-meta -->
							<div class='post-intro'>
								<p>
									 Morbi placerat bibendum eget dolor pellentesque sed consectetur pulvinar pellentesque bibendum. Vestibulum varius hendrerit turpis quiseam cursus. Donec bibendum vestibulum gravida.
								</p>
								<br/>
								<p>
									<a href='blog-post.html' class='button simple-grey small round'>Read More</a>
								</p>
							</div>
						</div>";
                    }
						?>

						<!-- Pagination -->
						<nav class="pagination">
						<ul>
							<li><a href="#">Previous</a></li>
							<li><a href="#">1</a></li>
							<li><a href="#" class="current">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">Next</a></li>
						</ul>
						<div class="clearfix">
						</div>
						</nav>
						<!-- End pagination -->
					</div>


					<div class="one-fourth sidebar right">

						<div class="widget">
							<h4 class="widget-title">About Our Writing</h4>
							<p>
								 Lorem ipsum dolor sit amet nec, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes. Lorem ipsum dolor sit amet nec, consectetuer adipiscing elit. Aenean commodo ligula eget dolor
							</p>
						</div>




						<div class="widget">
							<h4 class="widget-title">Archive</h4>
							<ul class="sidebar-nav">
								<li><a href="#" title="Some Title"><i class="icon-angle-right"></i>July 2013</a></li>
								<li><a href="#" title="Some Title"><i class="icon-angle-right"></i>June 2013</a></li>
								<li><a href="#" title="Some Title"><i class="icon-angle-right"></i>May 2013</a></li>
								<li><a href="#" title="Some Title"><i class="icon-angle-right"></i>April 2013</a></li>
								<li><a href="#" title="Some Title"><i class="icon-angle-right"></i>March 2013</a></li>
								<li><a href="#" title="Some Title"><i class="icon-angle-right"></i>February 2013</a></li>
								<li><a href="#" title="Some Title"><i class="icon-angle-right"></i>January 2013</a></li>
								<li><a href="#" title="Some Title"><i class="icon-angle-right"></i>December 2012</a></li>
								<li><a href="#" title="Some Title"><i class="icon-angle-right"></i>November 2012</a></li>
							</ul>
						</div>



                <?php include "includes/wordCloud.php"?>
						<div class="widget">
							<h4 class="widget-title">Flicrk Photos</h4>
							<div class="flickr-widget inner">
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
    </div>
<?php include "templates/footer.php"?>
