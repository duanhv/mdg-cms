  <div id="latest-news">
            	
                
                
                <?php 
					query_posts("showpost=5&cat=2&orderby=desc");
					while(have_posts()):the_post();
				?>		
					<div class="news-block">
                	<a href="<?php the_permalink()?>">
                    	<?php
							if(has_post_thumbnail()){the_post_thumbnail();}
						?>
                        <h2 class="news-title"><?php the_title(); ?></h2>
                    </a>
                </div>
                    	
				<?php	endwhile;
				
				?>
                
            
            </div><!-- latest-news-->