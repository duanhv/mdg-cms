<?php 
/*     This is comment.phps by Christian Montoya, http://www.christianmontoya.com

    Available to you under the do-whatever-you-want license. If you like it, 
    you are totally welcome to link back to me. 
    
    Use of this code does not grant you the right to use the design or any of the 
    other files on my site. Beyond this file, all rights are reserved, unless otherwise noted. 
    
    Enjoy!
*/
?>

<!-- Comments code provided by christianmontoya.com -->

<?php if (!empty($post->post_password) && $_COOKIE['wp-postpass_'.COOKIEHASH]!=$post->post_password) : ?>
    <p id="comments-locked">Input your password to view comments.</p>
<?php return; endif; ?>

<?php //if (pings_open()) : ?>
    <!--<p id="respond"><span id="trackback-link">
        <a href="<?php trackback_url() ?>" rel="trackback">Get a Trackback link</a>
    </span></p> -->
<?php //endif; ?>

<?php if ($comments) : ?>

<?php 

    /* Author values for author highlighting */
    /* Enter your email and name as they appear in the admin options */
    $author = array(
            "highlight" => "highlight",
            "email" => "Your Email",
            "name" => "Your Name"
    ); 

    /* Count the totals */
    $numPingBacks = 0;
    $numComments  = 0;

    /* Loop throught comments to count these totals */
    foreach ($comments as $comment) {
        if (get_comment_type() != "comment") { $numPingBacks++; }
        else { $numComments++; }
    }
    
    /* Used to stripe comments */
    $thiscomment = 'odd'; 
?>

<?php

    /* This is a loop for printing pingbacks/trackbacks if there are any */
    if ($numPingBacks != 0) : ?>

    <h2 class="comments-header"><?php _e($numPingBacks); ?> Trackbacks/Pingbacks</h2>
    <ol id="trackbacks">
    
<?php foreach ($comments as $comment) : ?>
<?php if (get_comment_type()!="comment") : ?>

    <li id="comment-<?php comment_ID() ?>" class="<?php _e($thiscomment); ?>">
    <?php comment_type(__('Comment'), __('Trackback'), __('Pingback')); ?>: 
     <?php comment_author_link(); ?> on <?php comment_date(); ?>
    </li>
    
    <?php if('odd'==$thiscomment) { $thiscomment = 'even'; } else { $thiscomment = 'odd'; } ?>
    
<?php endif; endforeach; ?>

    </ol>

<?php endif; ?>

<?php 

    /* This is a loop for printing comments */
    if ($numComments != 0) : ?>

    <h2 class="comments-header"><?php _e($numComments); ?> Comments</h2>
    <ol id="comments">
    
    <?php foreach ($comments as $comment) : ?>
    <?php if (get_comment_type()=="comment") : ?>
    
        <li id="comment-<?php comment_ID(); ?>" class="<?php 
        
        /* Highlighting class for author or regular striping class for others */
        
        /* Get current author name/e-mail */
        $this_name = $comment->comment_author;
        $this_email = $comment->comment_author_email;
        
        /* Compare to $author array values */
        if (strcasecmp($this_name, $author["name"])==0 && strcasecmp($this_email, $author["email"])==0)
            _e($author["highlight"]); 
        else 
            _e($thiscomment); 
        
        ?>">
             <div class="avatar"><?php echo get_avatar($author_email, $size, $default_avatar ); ?>  </div>
            <div class="comment-meta">
<?php /* If you want to use gravatars, they go somewhere around here */ ?>
                <span class="comment-author"><?php comment_author_link() ?></span>, 
                <span class="comment-date"><?php comment_date() ?></span>:
            </div>
            <div class="comment-text">
<?php /* Or maybe put gravatars here. The typical thing is to float them in the CSS */ 
    /* Typical gravatar call: 
        <img src="<?php gravatar("R", 80, "YOUR DEFAULT GRAVATAR URL"); ?>" 
        alt="" class="gravatar" width="80" height="80">
    */ ?>
    	       
                <?php comment_text(); ?>
                
            </div>
             
        </li>
        
    <?php if('odd'==$thiscomment) { $thiscomment = 'even'; } else { $thiscomment = 'odd'; } ?>
    
    <?php endif; endforeach; ?>
    
    </ol>
    
    <?php endif; ?>
    
<?php else : 

    /* No comments at all means a simple message instead */ 
?>

    <h2 class="comments-header">No Comments</h2>

    <p>Let's first person comments into this article!</p>
    
<?php endif; ?>

<?php if (comments_open()) : ?>

<?php /* This would be a good place for live preview... 
    <div id="live-preview">
        <h2 class="comments-header">Live Preview</h2>
        <?php live_preview(); ?>
    </div>
 */ ?>

    <div id="comments-form">
    
    <h2 id="comments-header">Comments</h2>
    
    <?php if (get_option('comment_registration') && !$user_ID ) : ?>
        <p id="comments-blocked">You need<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=
        <?php the_permalink(); ?>">Login</a> to comments.</p>
    <?php else : ?>

    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

    <?php if ($user_ID) : ?>
    
    <p>You're login with <a href="<?php echo get_option('siteurl<img src="C:/Users/luuducthuy/Desktop/hotline.png" />'); ?>/wp-admin/profile.php">
        <?php echo $user_identity; ?></a>. 
        <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" 
        title="Ä�Äƒng xuáº¥t khá»�i tÃ i khoáº£n nÃ y">Logout</a>
    </p>
    
    <?php else : ?>
    	<label for="author">Tên<?php if ($req) _e(' (required)'); ?></label></p>
        <p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" />
        
        <label for="email">E-mail (will not be published)<?php if ($req) _e(' (required)'); ?></label></p>
        <p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" />
        
        <label for="url">Địa chỉ website</label></p>
        <p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" />
        
    
    <?php endif; ?>

    <?php /* You might want to display this: 
        <p>XHTML: You can use these tags: <?php echo allowed_tags(); ?></p> */ ?>

        <p><textarea name="comment" id="comment" rows="5" cols="30"></textarea></p>
        
        <?php /* Buttons are easier to style than input[type=submit], 
                but you can replace: 
                <button type="submit" name="submit" id="sub">Submit</button>
                with: 
                <input type="submit" name="submit" id="sub" value="Submit" />
                if you like */ 
        ?>
		<?php global $CommentAvatarsFrontend; if ( isset( $CommentAvatarsFrontend ) ) $CommentAvatarsFrontend->select(); ?>
        
        <p><button type="submit" name="submit" id="sub">Submit</button>
        <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>"></p>
    
    <?php do_action('comment_form', $post->ID); ?>

    </form>
    </div>
<!--	<div id="allow_tags"><?php //echo allowed_tags(); ?>  </div> -->
<?php endif; // If registration required and not logged in ?>

<?php else : // Comments are closed ?>
    <p id="comments-closed">Xin lá»—i! BÃ¬nh luáº­n vá»� bÃ i viáº¿t nÃ y Ä‘Ã£ bá»‹ khÃ³a.</p>
<?php endif; ?> 