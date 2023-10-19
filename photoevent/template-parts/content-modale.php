<div id="myModal" class="modal show">
    <div class="modal-content">
        <div class="modal-header">
            <img class="img-contact" src="<?php echo get_template_directory_uri(); ?>'/assets/images/Contact-header.svg'" alt="contact">
        </div>
   
        <p><?php
            $shortcode_output = do_shortcode('[contact-form-7 id="edb68ed" title="Formulaire de contact 1"]');
            echo $shortcode_output
            ?></p>
    </div>
</div>