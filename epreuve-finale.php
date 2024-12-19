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
  </section>
</main>
<?php get_footer(); ?>