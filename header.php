<!DOCTYPE html>
<html <?= language_attributes(); ?>>

<head>
    <meta charset="<?= bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= wp_head(); ?>
</head>

<body <?= body_class(); ?>>

    <header class="site-header">
        <div class="site-header__container">
            <h5 class="heading-5 site-logo mr-auto"><a href="<?= site_url() ?>" class="site-logo__url--black">M.Nim</a></h5>
            <div class="site-header__menu">
                <nav class="site-header__main-nav">
                    <ul class="heading-5">
                        <li><a class="menu-link" href="#home">Home</a></li>
                        <li><a class="menu-link" href="#skills">Skills</a></li>
                        <li><a class="menu-link" href="#experience">Experience</a></li>
                        <li><a class="menu-link" href="#about">About</a></li>
                        <li><a class="menu-link" href="#projects">Projects</a></li>
                        <li><a class="menu-link" href="#contact-me">Contact Me</a></li>
                    </ul>
                </nav>
                <button class="btn">
                    <a href="https://docs.google.com/document/d/1n0XJbhwJyRr1uRWsiXbd6dxIY40gWhw-IlTzHNRBrVI/edit?usp=sharing" class="site-header__btn btn__link btn-text" target="_blank" rel="noopener">Resume</a>
                    <svg class="btn-icon">
                        <use xlink:href="<?= get_theme_file_uri('/images/icomoon-sprites.svg#icon-download') ?>"></use>
                    </svg></a>
                </button>
            </div>
            <i class="site-header__menu-trigger fa-solid fa-bars" aria-hidden="true"></i>
        </div>

    </header>