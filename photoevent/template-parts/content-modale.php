<?php
/**
 * Contenu de la modal
 *
 * Ce bloc représente le contenu de la modal qui affiche un formulaire de contact.
 * un formulaire de contact intégré à l'aide du shortcode Contact Form 7.
 *
 * @package WordPress
 * @subpackage Thème de nathalie-mota
 */
?>


<div id="myModal" class="modal show">
    <div class="modal-content">
        <div class="modal-header">
            <img class="img-contact" src="<?php echo get_template_directory_uri(); ?>'/assets/images/Contact-header.svg'" alt="contact">
        </div>
        <p>
        <?php
            echo do_shortcode('[contact-form-7 id="edb68ed" title="Formulaire de contact 1"]');
         ?>
         </p>
    </div>
</div>