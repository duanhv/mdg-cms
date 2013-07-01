<?php get_header(); ?>
<body>
	<div id="body-content">
		<div id="wrapper">
        	<?php get_header('top'); ?>
            <div id="content">
            	<div id="main-content">
					<div class="search-box listpost">
					<h2>Kết quả tìm kiếm</h2>
					<h3>Kết quả cho tìm kiếm từ khóa: <span><?php echo $s ?></span></h3>
                	<?php
						if(have_posts()) : while(have_posts()) : the_post(); ?>
							<article class='search_listpost'>
								<h4><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h4>
                                
                                <div class="newsContent_intro">
                                	<p><a href="<?php the_permalink()?>"><?php if(has_post_thumbnail()){the_post_thumbnail();} ?></a></p>
                                    <?php the_content(); ?>
									<div class="newsDate_intro">
										bởi <span class="newsAuthor"><?php the_author() ?></span>
										lúc <span class="newsTime"><?php the_time() ?></span>
									</div>
                                </div>
								
							</article>
				  <?php endwhile;
						endif;
					
					?>
					</div>
                </div>
                 <?php get_sidebar()?>   
            </div>
            
            <?php get_footer() ?>
        </div>
    </div>
</body>  