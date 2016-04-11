						<div class="widget">
							<h4 class="widget-title">pular Tags</h4>
							<ul class="popular-tags">
            <?php
              foreach($keywords as $word) {
                        echo <<<_END
                <li><a href="#"><i class="icon-tag"></i>$word</a></li>
_END;
              }
            ?>
							</ul>
						</div>
