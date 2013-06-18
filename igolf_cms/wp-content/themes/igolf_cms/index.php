<?php get_header(); ?>
<body>
	<div id="body-content">
		<div id="wrapper">
        	<?php get_header('top'); ?>
            <?php include(TEMPLATEPATH.'/newspages.php');?>
            
            <div id="content">
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
							query_posts("showposts=6");
							if(have_posts()):while(have_posts()):the_post();
								if(!$post_counter){
										//first post in category?>
									<div class="content-feature">
                                        <a href="<?php the_permalink()?>">
                                            <?php if(has_post_thumbnail()){the_post_thumbnail();} ?>
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
                 <?php get_sidebar()?>   
            </div>
            
            <?php get_footer() ?>
        </div>
    </div>
</body>