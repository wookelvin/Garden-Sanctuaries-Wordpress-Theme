<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gardensanctuaries
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<div class="main-footer">
                <a href="<?php echo get_home_url();?>"><img src="<?php echo get_template_directory_uri();?>/assets/img/logo-footer.svg"></a>
                <div class="footer-social">
                    <?php $social_facebook = get_field('facebook', 'option');  if (!empty($social_facebook)):?>
                        <a href="<?php echo $social_facebook;?>" target="_blank"><img src="<?php echo get_template_directory_uri();?>/assets/img/social-facebook.svg"></a>
                    <?php endif;?>
                    
                    <?php $social_twitter = get_field('twitter', 'option');  if (!empty($social_twitter)):?>
                        <a href="<?php echo $social_twitter;?>" target="_blank"><img src="<?php echo get_template_directory_uri();?>/assets/img/social-twitter.svg"></a>
                    <?php endif;?>
                    
                    <?php $social_instagram = get_field('instagram_link', 'option');  if (!empty($social_instagram)):?>
                        <a href="<?php echo $social_instagram;?>" target="_blank"><img src="<?php echo get_template_directory_uri();?>/assets/img/social-instagram.svg"></a>
                    <?php endif;?>
                    
                    <?php $social_pinterest = get_field('pinterest', 'option');  if (!empty($social_pinterest)):?>
                        <a href="<?php echo $social_pinterest;?>" target="_blank"><img src="<?php echo get_template_directory_uri();?>/assets/img/social-pinterest.svg"></a>
                    <?php endif;?>
                    
                    <?php $social_houzz = get_field('houzz_link', 'option');  if (!empty($social_houzz)):?>
                        <a href="<?php echo $social_houzz;?>" target="_blank"><img src="<?php echo get_template_directory_uri();?>/assets/img/social-houzz.svg"></a>
                    <?php endif;?>
                </div>
                <div class="footer-copyright-info">Content Copyright 2017. Garden Sanctuaries Landscaping. All Rights Reserved.</div>
            </div>
            
            
            <!-- Begin MailChimp Signup Form -->
<div id="mc_embed_signup" class="signup-footer">
    <div class="signup-pic"><img src="<?php echo get_template_directory_uri();?>/assets/img/signup-icon.svg" /></div>
    <div class="signup-title">SIGN-UP</div>
    <div class="signup-desc">Announcements, Newsletters And Offers</div>
    <div class="signup-form">
                        
                        
        <form action="//gardensanctuarieslandscaping.us15.list-manage.com/subscribe/post?u=ad86abfdebc0c559f05aa909d&amp;id=b47a1b9ec1" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            
            <div class="mc-field-group signup-field">
                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Your Email">
            </div>
            <div id="mce-responses" class="clear">
                <div class="response" id="mce-error-response" style="display:none"></div>
                <div class="response" id="mce-success-response" style="display:none"></div>
            </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_ad86abfdebc0c559f05aa909d_b47a1b9ec1" tabindex="-1" value=""></div>
            <div class="clear signup-submit"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
            
        </form>
    </div>
</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
