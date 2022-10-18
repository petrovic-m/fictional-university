<?php get_header(); ?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg ') ?>)"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title">
                Past Events
            </h1>
            <div class="page-banner__intro">
                <p>A recap of our past events</p>
            </div>
        </div>
    </div>
    <div class="container container--narrow page-section">
        <?php
        $today = date('Ymd');
        $pastEvents = new WP_Query([
            'paged' => get_query_var('paged', 1),
            'posts_per_page' => 1,
            'post_type' => 'event',
            'orderBy'=> 'rand',
            'order' => 'ASC',
            'meta_query' => [
                [
                    'key' => 'event_date',
                    'compare' => '<',
                    'value' => $today,
                    'type' => 'numberic'
                ]
            ]
        ]);
        while($pastEvents -> have_posts()):
            $pastEvents -> the_post();
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
        <?php endwhile; ?>
        <?php echo paginate_links([
            'total' => $pastEvents->max_num_pages
        ]); ?>
    </div>
<?php get_footer(); ?>