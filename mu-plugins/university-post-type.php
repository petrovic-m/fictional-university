<?php
    function university_post_types() {

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    // post_type = 'event'
=======
>>>>>>> 4da94bc (Add files via upload)
=======
=======
    // post_type = 'event'
>>>>>>> 5271197 (Changes are mostly on sigle-program and single-professor)
>>>>>>> origin/novaIzmena
=======
=======
    // post_type = 'event'
>>>>>>> 5271197 (Changes are mostly on sigle-program and single-professor)
>>>>>>> 8425a7e (Changes are mostly on sigle-program and single-professor)
    register_post_type('event', [
        'supports'=>['title', 'editor', 'excerpt'],
        'rewrite' => [
            'slug'=>'events'
        ],
        'has_archive'=>true,
        'public'=>true,
        'labels'=>[
            'name'=>'Events',
            'add_new_item' => 'Add new Event',
            'edit_item' => 'Edit Event',
            'all_items' => 'All Events',
            'singular_name' => 'Event'
        ],
    'menu_icon'=>'dashicons-calendar'
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
    ]);}
=======
>>>>>>> origin/novaIzmena
=======
    ]);}
=======
>>>>>>> 8425a7e (Changes are mostly on sigle-program and single-professor)
    ]);
    // post_type = 'event'

    // post_type = 'program'
    register_post_type('program', [
        'supports'=>['title', 'editor'],
        'rewrite' => [
            'slug'=>'programs'
        ],
        'has_archive'=>true,
        'public'=>true,
        'labels'=>[
            'name'=>'Programs',
            'add_new_item' => 'Add new Program',
            'edit_item' => 'Edit Program',
            'all_items' => 'All Programs',
            'singular_name' => 'Program'
        ],
        'menu_icon'=>'dashicons-awards'
    ]);
    // post_type = 'event'

    register_post_type('professor', [
        'supports'=>['title', 'editor', 'thumbnail'],
        'public'=>true,
        'labels'=>[
            'name'=>'Professors',
            'add_new_item' => 'Add New Professor',
            'edit_item' => 'Edit Professor',
            'all_items' => 'All Professors',
            'singular_name' => 'Professor'
        ],
        'menu_icon'=>'dashicons-welcome-learn-more'
    ]);
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======
    ]);}
>>>>>>> 4da94bc (Add files via upload)
=======
>>>>>>> 5271197 (Changes are mostly on sigle-program and single-professor)
>>>>>>> origin/novaIzmena
=======
>>>>>>> 5271197 (Changes are mostly on sigle-program and single-professor)
>>>>>>> 8425a7e (Changes are mostly on sigle-program and single-professor)

    add_action('init', 'university_post_types');
?>