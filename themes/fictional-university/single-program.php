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
                <a class="metabox__blog-home-link" href="<?php echo site_url('index.php/programs') ?>">
                    <i class="fa fa-home" aria-hidden="true"></i> Programs
                </a> <span class="metabox__main"><?php the_title(); ?></span>
            </p>
        </div>
        <div class="generic-content"><?php the_content(); ?></div>

        <?php
        $relatedProfessors= new WP_Query([
            'posts_per_page' => -1,
            'post_type' => 'professor',
            'orderBy'=> 'title',
            'order' => 'ASC',
            'meta_query' => [
                [
                    'key' => 'related_programs',
                    'compare' => 'LIKE',
                    'value' => '"' . get_the_ID() . '"'
                ]
            ]
        ]);
        if($relatedProfessors->have_posts()):
            echo '<hr class="section-break">';
            echo '<h2 class="headline headline--medium"> '.get_the_title().' Profesors</h2>';
            echo '<ul class="professor-cards">';
            while($relatedProfessors->have_posts()):
                $relatedProfessors->the_post();
                ?>
                <li class="professor-card__list-item">
                    <a class="professor-card" href="<?php the_permalink(); ?>">
                        <img class="professor-card__image" src="<?php the_post_thumbnail_url(); ?>" alt="">
                        <span class="professor-card__name"><?php the_title(); ?></span>
                    </a>
                </li>
            <?php endwhile;
                echo '</ul>';
                endif;
                wp_reset_postdata();
            ?>


        <?php
        $today = date('Ymd');
        $homepageEvents = new WP_Query([
            'posts_per_page' => 2,
            'post_type' => 'event',
            'orderBy'=> 'rand',
            'order' => 'ASC',
            'meta_query' => [
                [
                    'key' => 'event_date',
                    'compare' => '>=',
                    'value' => $today,
                    'type' => 'numberic'
                ],
                [
                    'key' => 'related_programs',
                    'compare' => 'LIKE',
                    'value' => '"' . get_the_ID() . '"'
                ]
            ]
        ]);
        if($homepageEvents->have_posts()):
        echo '<hr class="section-break">';
        echo '<h2 class="headline headline--medium">Upcoming '.get_the_title().' Events</h2>';
        while($homepageEvents->have_posts()):
            $homepageEvents->the_post();
            ?>
            <div class="event-summary">
                <a class="event-summary__date t-center" href="<?php echo site_url(); ?>">
                        <span class="event-summary__month"><?php
                            $date = new DateTime(get_field('event_date'));
                            echo $date->format('Y');
                            ?></span>
                    <span class="event-summary__month"><?php
                        $date = new DateTime(get_field('event_date'));
                        echo $date->format('M');
                        ?></span>
                    <span class="event-summary__day"><?php
                        echo $date->format('j')?></span>
                </a>
                <div class="event-summary__content">
                    <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                    <p><?php if(has_excerpt()){the_excerpt();}else {echo wp_trim_words(get_the_content(), 18);} ?><a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>
                </div>
            </div>
        <?php endwhile;endif; ?>

    </div>
<?php endwhile;
get_footer();
?>