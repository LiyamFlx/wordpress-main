<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <h1><?php the_title(); ?></h1>
    <div class="post-content">
        <?php the_content(); ?>
    </div>

    <?php if (function_exists('the_field')) : ?>
        <div class="custom-fields">
            <p><strong>Author:</strong> <?php the_field('author'); ?></p>
            <p><strong>Published Date:</strong> <?php the_field('published_date'); ?></p>
            <p><strong>Source URL:</strong> <a href="<?php the_field('source_url'); ?>"><?php the_field('source_url'); ?></a></p>
        </div>
    <?php endif; ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
