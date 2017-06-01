<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gardensanctuaries
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        
	</header><!-- .entry-header -->

	<div class="entry-content">
<?php if(is_page('about')): ?>
        <div class="row-flex">
            <div class="row-element big-quote"><?php the_field("big_quote");?></div>
            <div class="row-element description"><?php the_field("about_us_description");?></div>
        </div>
        <div class="row-flex bios">
            <?php while ( have_rows('bio') ) : the_row(); ?>
            <div class="bio-col">
                <div class="bio-pic">
                    <?php $bioimage = get_sub_field('picture'); ?>
                    <?php if( !empty($bioimage) ): ?>
                        <img src="<?php echo $bioimage['url'];?>" alt="<?php echo $bioimage['alt']; ?>"/>
                    <?php endif; ?>
                </div>
                <div class="bio-name"><?php the_sub_field('name'); ?></div>
                <div class="bio-line"></div>
                <div class="bio-desc">
                    <?php the_sub_field('description'); ?>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <div class="about-mission">
        <?php the_field("mission_statement");?></div>

        
<?php elseif(is_page('services')): ?>
        
        <?php
        $flip = 1; 
        while ( have_rows('big_features') ) : the_row();?>
        
            <div class="row-flex bigfeatures <?php 
                        if ($flip == 1){
                            $flip = 0; 
                            echo "nonflipped";
                        }
                        else{
                            $flip = 1; 
                            echo "flipped";
                        }
                        ?>">
                <div class="bf-descblock">
                    <div class="bf-icon" style="background-image:url(<?php $bficon = get_sub_field('feature_icon'); echo $bficon['url'];?>);"></div>
                    <div class="bf-name"><?php the_sub_field('feature_name'); ?></div>
                    <div class="bf-desc"><?php the_sub_field('feature_description'); ?></div>
                </div>
                <div class="bf-picblock" style="background-image:url(<?php 
                                        $bfpic = get_sub_field('feature_picture');      
                                        if (!empty($bfpic)){
                                            echo $bfpic['url'];
                                        }?>);">test
                </div>
        
        </div>
        <?php endwhile; ?>
        <div class="fullservices-title">OUR FULL LIST OF SERVICES</div>
        <div class="flex_row_4elements">
            <?php while ( have_rows('all_other_features') ) : the_row();?>
            <div class="of_block">
                <div class="of_img" style="background-image:url(<?php $ofimg = get_sub_field('feature_image');echo $ofimg['url'];?>)"><?php $ofimg = get_sub_field('feature_image'); ?></div>
                <div class="of_title"><div class="of_title_inner"></div><?php the_sub_field('feature_title');?></div></div>
            <?php endwhile; ?>
        </div>
        
<?php elseif(is_page('home')): ?>
        <div class="home-slideshow-wrapper">
            <div class="home-slideshow-images">
                <ul>
                    <?php while ( have_rows('splash_pictures') ) : the_row();?>
                        <li><?php $splashimg = get_sub_field('picture'); ?>
                            <?php if( !empty($splashimg) ): ?>
                                <div class="rotating-slides" style="background-image:url(<?php echo $splashimg['url'];?>)"></div>
                            <?php endif; ?></li>
                    <?php endwhile;?>
                </ul>
            </div>
            <div class="home-slideshow-overlay"><div class="overlaytext"><?php the_field('front_splash_words');?></div></div>
        </div>
        
        <a class="a-main-features" href="<?php echo get_permalink( get_page_by_title( 'services' ) );?>">
        <div class="home-main-features">
            <div class="intro-row">WE DESIGN AND INSTALL</div>
            <div class="middle-row">
                <?php $row = 1; while ( have_rows('features') ) : the_row();?>
                    <?php if ($row != 1): ?>
                    <div class="middle-row-separator"></div>
                    <?php endif; ?>
                    <div class="middle-row-feature">
                    <div class="home-features-icon" style="background-image:url(<?php $homefeaticon = get_sub_field('icon'); echo $homefeaticon['url'];?>);"></div>
                    <div class="home-features-name"><?php the_sub_field('title');?></div>
                    </div>
                <?php $row++;endwhile;?>
            </div>
            <div class="end-row">AND MORE &rarr; </div>
        </div>
        </a>
        <div class="home-blog-posts">
        
         <?php
            $args = array( 'numberposts' => '3','post_status' => 'publish' );
            $recent_posts = wp_get_recent_posts( $args );
            foreach( $recent_posts as $recent ){
                echo '<div class="single-blog">';
                    if (has_post_thumbnail( $recent["ID"] ) ){
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $recent["ID"] ), 'single-post-thumbnail' ); 
                        echo '<div class="single-blog-featurepic" style="background-image: url('.$image[0].')"></div>';
                    }else{
                        echo '<div class="single-blog-featurepic no-pic" style="background-image: url('.get_template_directory_uri().'/assets/img/picture.svg)"></div>';
                    }
                    echo '<div class="single-blog-text">';
                    echo '<div class="single-blog-date">'.date('F jS, Y',strtotime($recent["post_date"])).'</div>';
                    echo '<div class="single-blog-title">'.$recent["post_title"].'</div>';
                    $content = get_post_field('post_content',$recent["ID"]);
                        $content = strip_tags($content);
                    echo '<div class="single-blog-excerpt">'.wp_trim_words( $recent['post_content'],20).'</div>';
                    echo '<div class="single-blog-btn"><a href='.get_permalink($recent["ID"]).'>READ MORE</a></div>';
                    echo '</div>';
                echo '</div>';
            }
            wp_reset_query();
        ?>   

            
            
        </div>
        
        <div class="home-slideshow-testimonials-wrapper">
        <div class="testimonials-title">Testimonials</div>
        <div class="home-slideshow-testimonials">
            <ul>
                    <?php while ( have_rows('testimonials') ) : the_row();?>
                        <li><?php the_sub_field('testimonial'); ?></li>
                    <?php endwhile;?>
            </ul>
        </div>
        </div>
<?php else:
                the_content();
endif; 
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gardensanctuaries' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
