<?php

/**
 * index.php - Le modèle par défaut de wordpress
 */

$hero_title = get_field('hero_title');
$hero_description = get_field('hero_description');
$hero_button_text = get_field('hero_button_text');
$hero_image = get_field('hero_image');
$hero_address = get_field('hero_address');
$hero_email = get_field('hero_email');
$hero_phone = get_field('hero_phone');
$hero_facebook = get_field('hero_facebook');
$hero_instagram = get_field('hero_instagram');
?>
<?php get_header() ?>

<main class="principal">
  <section class="global">
    <section class="hero" style="background-image: url('<?php echo esc_url($hero_image['url']); ?>');">
        <div class="hero__overlay">
            <h1><?php echo esc_html($hero_title); ?></h1>
            <p><?php echo esc_html($hero_description); ?></p>
            <a href="#inscription" class="hero__button"><?php echo esc_html($hero_button_text); ?></a>
            <div>
                <p><strong>Adresse :</strong> <?php echo esc_html($hero_address); ?></p>
                <p><strong>Email :</strong> <a href="mailto:<?php echo esc_html($hero_email); ?>" class="hero__email"><?php echo esc_html($hero_email); ?></a></p>
                <p><strong>Téléphone :</strong> <?php echo esc_html($hero_phone); ?></p>
            </div>
            <div class="hero__ms">
                <a href="#"><img src="<?php echo esc_url($hero_facebook['url']); ?>" alt="<?php echo esc_attr($hero_facebook['alt']); ?>"></a>
                <a href="#"><img src="<?php echo esc_url($hero_instagram['url']); ?>" alt="<?php echo esc_attr($hero_instagram['alt']); ?>"></a>
            </div>
        </div>
    </section>
<section class="favories">
    <h2>Destinations Favorites</h2>
    <div class="favories__destination">
        <?php
        $favorites_query = new WP_Query(array(
            'category_name' => 'favorites', // Slug de la catégorie
        ));

        if ($favorites_query->have_posts()) :
            while ($favorites_query->have_posts()) : $favorites_query->the_post(); ?>
                <div class="favories__info">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium'); ?>
                        <?php endif; ?>
                        <h3><?php the_title(); ?></h3>
                        <p><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                    </a>
                </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
        <?php else : ?>
            <p>Aucun article favori trouvé.</p>
        <?php endif; ?>
    </div>
</section>
  
  </section>
</main>
<?php get_footer() ?>