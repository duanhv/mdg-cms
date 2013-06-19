<div id="header">
        		<a href="<?php echo home_url( '/' ); ?>" title="<?php esc_attr(get_bloginfo('name','display')) ?>"><h1 id="logo">Igolf.vn News</h1></a>
                
                <!--<span class="more-services">Toogle</span>-->
                <ul class="services">
                	<li><a href="#">News</a></li>
                	<li><a href="#">Social</a></li>
                    <li><a href="#">Shop</a></li>
                </ul>
                <?php get_search_form()?>
                <div id="navigation">
                	<?php
                wp_nav_menu(array('theme_location' => 'primary-menu','fallback_cb' => 'alert_menu','container'=>'','items_wrap' => '<ul id="nav">%3$s</ul>','menu_id'=> '',));
            		?>
                </div><!-- End #navigation -->
                
                <div id="login-content">
                	<a href="#" class="login">Sign in</a><span>//</span> <a href="#">Creat account?</a>
                    
                </div><!-- #login-content -->
                <div id="login-block">
                <div id="login">
                		<span class="close">X</span>
                    	<h2>Đăng nhập iGolf.vn</h2>
                    	<form name="loginform" id="loginform" action="http://localhost:88/igolf_cms/wp-login.php" method="post">
                        	<p>
                            	<label>Username: </label><br />
                                <input type="text" name="log" id="log" tabindex="1" class="txt" />
                            </p>
                            <p>
                            	<label>Password: </label><br />
                                <input type="text" name="pwd" id="pwd" tabindex="2" class="txt" />
                            </p>
                            <p class="submit">
                            	<input type="submit" name="submit" id="submit" value="Đăng nhập iGolf.vn" />
                                <input type="hidden" name="redirect_to" value="wp-admin/" />
                            </p>
                        </form>
                        <a href="http://locahost:88/igolf_cms/wp-login?action=lostpassword">Quên mật khẩu?</a>
                    </div>
                    </div>
        	</div><!-- #header -->