<?php
/**
 * The main template file
 */

get_header(); ?>

<?php if ( is_front_page() || ( is_home() && !is_paged() ) ) : ?>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1><?php bloginfo( 'name' ); ?></h1>
            <p><?php bloginfo( 'description' ); ?></p>
            <a href="#featured-stories" class="cta-button">Explore Our Stories</a>
        </div>
    </section>

    <!-- Featured Travel Stories -->
    <div class="container">
        <section class="featured-stories" id="featured-stories">
            <div class="section-title">
                <h2>Featured Travel Stories</h2>
            </div>
            
            <div class="stories-grid">
                <?php
                $featured_posts = new WP_Query( array(
                    'posts_per_page' => 3,
                    'post_type'      => 'post',
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                ) );

                if ( $featured_posts->have_posts() ) :
                    while ( $featured_posts->have_posts() ) :
                        $featured_posts->the_post();
                        ?>
                        <article class="story-card">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="story-image">
                                    <?php the_post_thumbnail( 'large' ); ?>
                                </div>
                            <?php else : ?>
                                <div class="story-image">
                                    <img src="https://via.placeholder.com/400x200?text=Travel+Story" alt="<?php the_title(); ?>">
                                </div>
                            <?php endif; ?>
                            
                            <div class="story-content">
                                <div class="story-meta">
                                    <?php echo get_the_date( 'M d, Y' ); ?>
                                </div>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p class="story-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
                                <a href="<?php the_permalink(); ?>" class="read-more">Read Full Story →</a>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p style="text-align: center; padding: 2rem; color: #999;">No posts found.</p>';
                endif;
                ?>
            </div>
        </section>

        <!-- B2B Partnership Section -->
        <section class="b2b-section">
            <div class="b2b-content">
                <h2>Sustainable Travel for Teams</h2>
                <p>Looking for expert guidance on sustainable travel experiences for your team? We partner with organizations to create meaningful, budget-conscious travel experiences that align with corporate social responsibility.</p>
                <div class="partnership-cta">
                    <a href="#contact" class="cta-button">Explore B2B Opportunities</a>
                </div>
            </div>
        </section>

        <!-- Latest Blog Posts -->
        <section class="blog-section">
            <div class="section-title">
                <h2>Latest From The Blog</h2>
            </div>
            
            <div class="posts-list">
                <?php
                $blog_posts = new WP_Query( array(
                    'posts_per_page' => 5,
                    'post_type'      => 'post',
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                ) );

                if ( $blog_posts->have_posts() ) :
                    while ( $blog_posts->have_posts() ) :
                        $blog_posts->the_post();
                        ?>
                        <article class="post-item">
                            <div class="meta"><?php echo get_the_date( 'M d, Y' ); ?></div>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo wp_trim_words( get_the_excerpt(), 30 ); ?></p>
                            <a href="<?php the_permalink(); ?>" class="read-more">Continue reading →</a>
                        </article>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </section>
    </div>

<?php elseif ( is_single() ) : ?>
    <!-- Single Post Template -->
    <div class="container">
        <main>
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                            <div class="entry-meta">
                                <?php echo get_the_date( 'M d, Y' ); ?> | By <?php the_author(); ?>
                            </div>
                        </header>

                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="entry-thumbnail">
                                <?php the_post_thumbnail( 'large' ); ?>
                            </div>
                        <?php endif; ?>

                        <div class="entry-content">
                            <?php
                            the_content();
                            wp_link_pages( array(
                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'vinz-ideas-theme' ),
                                'after'  => '</div>',
                            ) );
                            ?>
                        </div>
                    </article>
                    <?php
                endwhile;
            endif;
            ?>
        </main>
    </div>

<?php else : ?>
    <!-- Archive/Category Template -->
    <div class="container">
        <main>
            <h1><?php wp_title( '' ); ?></h1>
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
                            <div class="entry-meta">
                                <?php echo get_the_date( 'M d, Y' ); ?>
                            </div>
                        </header>
                        <div class="entry-content">
                            <?php echo wp_trim_words( get_the_excerpt(), 50 ); ?>
                            <a href="<?php the_permalink(); ?>" class="read-more">Continue reading →</a>
                        </div>
                    </article>
                    <?php
                endwhile;
            else :
                echo '<p>No posts found.</p>';
            endif;
            ?>
        </main>
    </div>

<?php endif; ?>

<?php get_footer(); ?>
