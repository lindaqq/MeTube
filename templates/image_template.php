
<div class="row">
    <h1>Article Thumbnails</h1>
    <p>Use it to your news site, feature a article.</p>
</div>
    <div class="row">
		<div class="col-sm-6 col-md-6 col-lg-6">
            <div class="row">
			<!-- artigo em destaque -->
			<div class="featured-article">
				<a href="#">
					<img src="http://placehold.it/482x350" alt="" class="thumb">
				</a>
				<div class="block-title">
					<h2>Lorem ipsum dolor asit amet</h2>
					<p class="by-author"><small>By Jhon Doe</small></p>
				</div>
			</div>
            </div>
            
            <div class="row">
            <div class="col-sm-2 col-md-2 col-lg-2">
                <div class="thumbnail">
                    <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                </div><!-- /thumbnail -->
            </div><!-- /col-sm-1 -->

                <div class="col-sm-10 col-md-10 col-lg-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>myusername</strong> <span class="text-muted">commented 5 days ago</span>
                        </div>
                        <div class="panel-body">
                            Panel content ..............................................................
                            .................................................................
                        </div><!-- /panel-body -->
                    </div><!-- /panel panel-default -->
                </div><!-- /col-sm-5 -->
            
            
            
            </div>
			<!-- /.featured-article -->
		</div>
		<div class="col-sm-4 col-md-4 col-lg-4 col-md-offset-1 col-lg-offset-1">
			<ul class="media-list main-list">
                <?php
                for($i=0; $i < 10; $i++){
                    echo <<<_END
                    <li class="media">
			    <a class="pull-left" href="#">
			      <img class="media-object" src="http://placehold.it/150x90" alt="...">
			    </a>
			    <div class="media-body">
			      <h4 class="media-heading">Lorem ipsum dolor asit amet</h4>
			      <p class="by-author">By Jhon Doe</p>
			    </div>
                  </li>
_END;
                }
                
                
                ?>
			</ul>
		</div>
