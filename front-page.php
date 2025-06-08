<?php get_header();
?>

<section id="home" class="section-hero">
    <div class="section-hero__content-box">
        <div class="section-hero__text-box">
            <h1 class="display-text">Hello I'am <span class="text-xbold">Mark G. Nim</span></h1>
            <h1 class="display-text"><span class="text-xbold">Wordpress</span> <span class="display-text--outlined">Developer</span></h1>
            <h1 class="display-text">Base in <span class="text-xbold">Philippines.</span></h1>
        </div>

        <p class="paragraph--2">Hi, I'm Mark Nim, a 27-years-old WordPress developer based in the Philippines. I specialize in building custom WordPress themes with a strong focus on clean code, responsive design, and user-friendly interfaces.</p>

        <div class="section-hero__icon-box">
            <a href="https://www.facebook.com/mark.nim.5/" class="icon-link" target="_blank" rel="noopener">
                <svg class="social-icon">
                    <use xlink:href="<?= get_theme_file_uri('/images/icomoon-sprites.svg#icon-facebook') ?>"></use>
                </svg>
            </a>
            <a href="https://profile.indeed.com/?hl=en_PH&co=PH&from=gnav-homepage" class="icon-link">
                <svg class="social-icon">
                    <use xlink:href="<?= get_theme_file_uri('/images/icomoon-sprites.svg#icon-indeed') ?>"></use>
                </svg>
            </a>

            <a href="https://www.linkedin.com/in/mark-nim-969048348/" class="icon-link" target="_blank" rel="noopener">
                <svg class="social-icon">
                    <use xlink:href="<?= get_theme_file_uri('/images/icomoon-sprites.svg#icon-linkedin') ?>"></use>
                </svg>
            </a>

        </div>

    </div>

    <div class="section-hero__image-box">
        <img class="section-hero__image" src="<?= get_theme_file_uri('/images/hero-banner.webp') ?>" alt="">
    </div>
</section>

<section id="skills" class="section-skills">
    <h1 class="display-text text-center margin-bottom-lg">My <span class="text-xbold">Skills</span></h1>

    <div class="section-skills__content-box">

        <?php
        $homepageSkill = new WP_Query(array(
            'post_per_page' => -1,
            'post_type' => 'skill',
            'orderby' => 'title',
            'order' => 'ASC'
        ));

        while ($homepageSkill->have_posts()) {
            $homepageSkill->the_post();
            $svg = get_field('svg_image');
            $skillImage = $svg ? get_attached_file($svg['ID']) : null;
        ?>
            <div class="skill-card__item">
                <?php if ($skillImage && file_exists($skillImage)): ?>
                    <?= file_get_contents($skillImage) ?>
                <?php else: ?>
                    <p>svg not found</p>
                <?php endif; ?>
                <h5 class="heading-5 font-bold text-center"><?= the_title(); ?></h5>
            </div>
        <?php
        }
        wp_reset_postdata();
        ?>
    </div>
</section>

<section id="experience" class="section-exp">
    <div class="section-exp__content-box">
        <h1 class="display-text text-center margin-bottom-md">My <span class="text-xbold">Experience</span></h1>

        <?php
        $today = date('Ymd');
        $homepageWorkExp = new WP_Query(array(
            'post_per_page' => -1,
            'post_type' => 'work-experience',
            'meta_key' => 'date_ended',
            'orderby' => 'meta_value_num',
            'order' => 'DSC',
            'meta_query' => array(array(
                'key' => 'date_ended',
                'compare' => '<=',
                'value' => $today,
                'type' => 'numeric'
            ))

        ));

        while ($homepageWorkExp->have_posts()) {
            $homepageWorkExp->the_post();
            $workExpDesc = get_field('main_body_content');
            $dateStarted = new DateTime(get_field('date_started'));
            $dateEnded = new DateTime(get_field('date_ended'));
            $currentlyWorking = 'Present';
        ?>
            <div class="section-exp__content-box--item">
                <div class="section-exp__title-box">
                    <div class="wrapper">
                        <svg class="title-icon">
                            <use xlink:href="<?= get_theme_file_uri('/images/icomoon-sprites.svg#icon-briefcase') ?>"></use>
                        </svg>
                        <h4 class="heading-4 mr-auto"><?= the_title() ?></h4>
                    </div>


                    <h6 class="working-years heading-6"><span><?= $dateStarted->format('M Y'); ?></span>
                        -
                        <?php
                        if (isset($dateEnded)) { ?>
                            <span><?= $dateEnded->format('M Y'); ?></span>
                        <?php
                        } else { ?>
                            <span><?= $currentlyWorking; ?></span>
                        <?php
                        }
                        ?>

                    </h6>
                </div>
                <div class="section-exp__desc-box paragraph--2 font-color__zinc-300">
                    <?= $workExpDesc; ?>
                </div>
            </div>
        <?php
        }
        wp_reset_postdata();
        ?>
    </div>
</section>

<section id="about" class="section-about">
    <div class="section-about__image-box">
        <img class="section-about__img" src="<?= get_theme_file_uri('/images/about-img.webp') ?>" alt="About image">
    </div>

    <div class="section-about__content-box">
        <h1 class="display-text margin-bottom-md">About <span class="text-xbold">Me</span></h1>
        <div class="section-about__content paragraph--2 ">
            <p>
                Hi, I'm Mark Nim, a WordPress developer based in the Philippines. I specialize in building custom WordPress themes with a strong focus on clean code, responsive design, and user-friendly interfaces.
            </p>
            <p>
                With 1 year and 6 months of hands-on experience, I’ve worked on various WordPress projects, from e-commerce sites using WooCommerce, to dynamic websites powered by Elementor and Advanced Custom Fields (ACF). My skill set includes HTML, CSS, SASS, JavaScript, and PHP, which I use to bring unique and functional designs to life.
            </p>

            <p>
                Whether it's developing from scratch or enhancing existing websites, I’m passionate about crafting tailored solutions that align with each client's goals.
            </p>
        </div>


    </div>
</section>

<section id="projects" class="section-projects">
    <div class="section-projects__content-box">
        <h1 class="display-text text-center text-white margin-bottom-md">My <span class="text-xbold">Projects</span></h1>

        <?php
        $homePageProject = new WP_Query(array(
            'post_per_page' => -1,
            'post_type' => 'project',
            'orderby' => 'title',
            'order' => 'ASC'
        ));

        while ($homePageProject->have_posts()) {
            $homePageProject->the_post();
            $projectNum = get_field('project_number');
            $projectImage = get_field('project_image');
            $projectDesc = get_field('main_body_content');

        ?>
            <div class="section-projects__item">
                <div class="section-projects__item--img-box">
                    <?php
                    if ($projectImage) { ?>
                        <img src="<?= esc_url($projectImage['url']); ?>" alt="">
                    <?php
                    }
                    ?>
                </div>
                <div class="section-projects__item--content text-white">
                    <h1 class="display-text text-xbold"><?= $projectNum ?></h1>
                    <h2 class="heading-2 text-bold"><?= the_title() ?></h2>
                    <div class="paragraph--2 font-color__zinc-500">
                        <?= $projectDesc ?>
                    </div>

                    <a class="icon-link" href="<?= esc_url(get_field('project_url')) ?>" target="_blank" rel="noopener">
                        <svg class="icon__new-tab">
                            <use xlink:href="<?= get_theme_file_uri('/images/icomoon-sprites.svg#icon-new-tab') ?>"></use>
                        </svg>
                    </a>
                </div>
            </div>
        <?php

        }

        ?>

    </div>
</section>



<section id="contact-me" class="section-form">
    <div class="section-form__box">
        <?= do_shortcode('[contact-form-7 id="b53bf16" title="Home Page Contact Form"]'); ?>
    </div>
    <div class="section-form__content-box">
        <h1 class="display-text text-xbold">
            Let's <span class="display-text--outlined">talk</span>
            for<br>Something special
        </h1>

        <p class="paragraph--2">Have a project in mind or need help with your WordPress site? I’d love to hear from you! Feel free to reach out and I’ll get back to you as soon as possible.</p>

        <h3 class="heading-3 heading-3--sbold">
            <span class="section-form__email">nimmark98@gmail.com</span>
            <span class="section-form__number">+639265443721</span>
        </h3>
    </div>
</section>

<?php
get_footer();
