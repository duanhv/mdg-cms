<?php get_header(); ?>
<body>
	<div id="body-content">
		<div id="wrapper">
        	<?php get_header('top'); ?>
            
            <div id="content">
            	<div id="main-content">
                	<?php
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
					
					?>
                </div>
                 <?php get_sidebar()?>   
            </div>
            
            <?php get_footer() ?>
        </div>
    </div>
</body>  