<?php
/*
Template Name: Epreuve Finale
*/
?>
<?php get_header(); ?>
<main class="principal">
  <section class="global">
    <h2>Destination par pays</h2>
    <p>Decouvrez les plus belles destinations à travers le monde, classées par pays. Nous avons soigneusements sélectionné les pays les plus populaires pour vous offrir une expérience unique et inoubliable.</p>
    <div class="principal__conteneur">
      <?php if (have_posts()): ?>
        <?php while (have_posts()) :  the_post(); ?>
          <article class="principal__article">
            <p><?php the_content() ?></p>
          </article>
        <?php endwhile; ?>
    </div>
  <?php endif ?>

      <div class="pays-champs">
      <?php 

        $participants = get_post_meta(get_the_ID(), 'nombre_participants', true);
        $date_depart = get_post_meta(get_the_ID(), 'date_depart', true);
        $date_retour = get_post_meta(get_the_ID(), 'date_retour', true);
      ?>
      <p>Nombre de participants : <?php echo esc_html($participants); ?></p>
      <p>Date de départ : <?php echo esc_html($date_depart); ?></p>
      <p>Date de retour : <?php echo esc_html($date_retour); ?></p>
    </div>
    
    <?php echo do_shortcode('[filtre_pays]'); ?>
  </section>
</main>
<?php get_footer(); ?>