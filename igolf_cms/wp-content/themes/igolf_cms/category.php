<?php get_header(); ?>
<body>
	<div id="body-content">
		<div id="wrapper">
        	<?php get_header('top'); ?>
            <?php $mo = detectmobile();
            		 ?>
            <div id="content">
            	<div id="main-content">
                	<?php
                		if($mo==true){
                		while(have_posts()) : the_post();
						?>
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
						
					<?php endwhile;?>
                		
                	<?php }else{
						if(have_posts()) : while(have_posts()) : the_post(); ?>
							<article class='listpost'>
								<h2><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h2>
                                <div class="newsDate">
                                	bởi <span class="newsAuthor"><?php the_author() ?></span>
                                    lúc <span class="newsTime"><?php the_time() ?></span>
                                </div>
                                <div class="newsContent">
                                	<p class="thumbnail"><a href="<?php the_permalink()?>"><?php if(has_post_thumbnail()){the_post_thumbnail();} ?></a></p>
                                    <?php the_content(); ?>
                                </div>
							</article>
				  <?php endwhile;
						endif;
                	}
					?>
                </div>
                 <?php 
            		
                    if($mo==false){get_sidebar();}?>   
            </div>
            
            <?php get_footer() ?>
        </div>
    </div>
</body>  
</html>