<?php get_header(); ?>
<body>
	<div id="body-content">
		<div id="wrapper">
        	<?php get_header('top'); ?>
            <?php
            	$mo = detectmobile();
            	$mo = true;
            	if($mo == false){ 
            		include(TEMPLATEPATH.'/newspages.php');
            	}
            ?>
            
            <div id="content">
            	 <?php 
                 	if($mo==false){?>
            	<div id="main-content">
                    
                    <?php
						$cats = get_categories('exclude=1,2&hide_empty=0&parent=0&orderby=name');
						foreach($cats as $cat){
							$cat_id = $cat->term_id;
							echo "<article class='block'>";
							echo "<h2 class='block-titles'>".$cat->name."</h2>";
							query_posts("cat=$cat_id&post_per_page=5");
							echo "<div class='block-content'>";
							$post_counter = 0;
							query_posts("showposts=6&cat=$cat_id");
							if(have_posts()):while(have_posts()):the_post();
								if(!$post_counter){
										//first post in category?>
									<div class="content-feature">
                                        <a href="<?php the_permalink()?>">
                                            <?php if(has_post_thumbnail()){the_post_thumbnail();}else{?><img src="<?php echo get_first_image(); ?>" /><?php } ?>
                                            <h3><?php the_title()?></h3>
                                            <div class="content-intro">
                                                <?php the_excerpt();?>
                                            </div>	
                                        </a>                            
                                    </div>	
							<?php	}else{?>
									 <p class="list-title"><a href="<?php the_permalink()?>"><?php the_title() ?></a></p>
                                    
						<?php	}
							$post_counter+=1;	
							endwhile;
							 wp_reset_postdata();
							endif;?>
							<a href="<?php echo esc_url(get_category_link($cat_id)); ?>" class="view-more">Xem thêm <?php echo $cat->name ?> </a>
						<?php	echo "</article>";
						}
					
					?>
                 </div>
                <?php
                	 get_sidebar();
					}else{
					echo "<div id='main-content'>";
					$paged = get_query_var('paged');
					query_posts('posts_per_page=2&paged=$paged');
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
						
				<?php
					endwhile;
					echo "</div>";
					if(function_exists('wp_paginate')) {
						wp_paginate();
					}
										
					}	
                 ?>   
                 
            </div>
            
            <?php get_footer() ?>
        </div>
    </div>
</body>
