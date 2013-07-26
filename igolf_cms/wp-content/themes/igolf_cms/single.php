<?php get_header(); ?>
<body>
<div id="fb-root"></div>
	<div id="body-content">
		<div id="wrapper">
        	<?php get_header('top'); ?>
            
            <div id="content">
            	<div id="main-content">
            	<?php 
            	$mo = detectmobile();
            	$mo = true;
            	if($mo==true){
					
					while(have_posts()) : the_post();?>
						<article class='homepost'>
							<h2><a href="<?php the_permalink()?>"><?php the_title();?></a></h2>	
							<ul class="postmetadata">
								<li class='postmetadata_date'><?php the_date('M d Y');?></li>
								<li class='postmedata_category'><?php the_category(',')?></li>
								<li class='postmetadata_comments'><?php comments_number( 'no responses', 'one response', '% responses' ); ?></li>
							</ul>
							<div class="homepost-content">
								<?php if(has_post_thumbnail()){the_post_thumbnail();}else{?><img src="<?php echo get_first_image(); ?>" /><?php } ?>
							    <?php  the_excerpt();?>
							</div>
						</article>						
						
				<?php
					endwhile;?>
					</div>		
					<div id="comment-template">

						<?php  comments_template(); ?>
            
           		   </div><!-- End #comment-template -->
					
            	<?php }else{?>
            	<div id="main-content">
                	<?php
						if(have_posts()) : while(have_posts()) : the_post(); ?>
							<article class='listpost'>
								<h2><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h2>
                                <div class="newsDate">
                                	bởi <span class="newsAuthor"><?php the_author() ?></span>
                                    lúc <span class="newsTime"><?php the_time() ?></span>
                                    <!--<div class="social">
                                        
                                        <a class="" name="zm_share" type="button" title="Chia sẻ lên Zing Me"></a>
                                        <script src="http://stc.ugc.zdn.vn/link/js/lwb.0.7.js" type="text/javascript"></script>
                                        <a title="Hot!" href="http://linkhay.com/submit"><img src="http://linkhay.com/templates/images/guide/button4.jpg" width="62" height="20" alt="Hot!" /></a>
                                        <div class="g-plus" data-action="share" data-annotation="bubble"></div>
                                        <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                                         <div class="fb-like" data-send="true" data-width="250" data-show-faces="false"></div>
                                    </div>-->
                                </div>
                                <div class="newsContent">
                                	<p class="thumbnail"><a href="<?php the_permalink()?>"><?php if(has_post_thumbnail()){the_post_thumbnail();} ?></a></p>
                                    <?php the_content(); ?>
                                </div>
							</article>
                     <?php endwhile;
						endif;
						wp_reset_query();
					?>
                    <!-- Comments -->
                    <div id="comment-template">

						<?php  comments_template(); ?>
            
           		   </div><!-- End #comment-template -->
                </div>
                <?php  } ?>
                  <?php 
                    if($mo==false){get_sidebar();}?> 
            </div>
            
            <?php get_footer() ?>
        </div>
    </div>
</body>  