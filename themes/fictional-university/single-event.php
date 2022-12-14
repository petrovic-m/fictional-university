<?php get_header(); ?>
<?php
while(have_posts()):
    the_post(); ?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg ') ?>)"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php the_title(); ?></h1>
            <div class="page-banner__intro">
                <p>------ MESSAGE -----</p>
            </div>
        </div>
    </div>

    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="<?php echo site_url('index.php/events') ?>">
                    <i class="fa fa-home" aria-hidden="true"></i> Event
                </a> <span class="metabox__main"><?php the_title(); ?></span>
            </p>
        </div>
        <div class="generic-content"><?php the_content(); ?></div>
        <?php
        $relatedPrograms = get_field('related_programs');
        if($relatedPrograms): ?>
        <hr class="section-break">
        <h2 class="headline headline--medium">Related Programs(s)</h2>
        <?php
        foreach ($relatedPrograms as $program):
            ?>
        <ul class="link-list min-list">
            <li><a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program);?>
                </a></li>
        </ul>
        <?php endforeach; endif;?>




<!--            <ul class="link-list min-list">-->
<!--                <li><a href="--><?php //the_permalink(); ?><!--">--><?php //echo get_the_title($relatedPrograms) ?><!--</a></li>-->
<!--            </ul>-->
    </div>
<?php endwhile;
get_footer();
?>