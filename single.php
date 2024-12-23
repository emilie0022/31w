<?php get_header(); ?>

<main class="principal">
  <section class="global">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article class="destination">

      <header class="destination__header">
        <h1 class="destination__title"><?php the_title(); ?></h1>
      </header>

      <section class="destination__content">
        <?php the_content(); ?>
        <?php echo do_shortcode('[carrousel]'); ?>
      </section>

      <section class="destination__link">
        <a href="<?php echo get_category_link(get_the_category()[0]->term_id); ?>" class="destination__filter-link">
          Voir toutes les destinations
        </a>
      </section>
    </article>
    <?php endwhile; else : ?>
      <p>Aucune destination trouvée.</p>
    <?php endif; ?>
  </section>
</main>

<?php get_footer(); ?>
