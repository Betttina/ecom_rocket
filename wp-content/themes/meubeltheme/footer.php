<?php if(!empty(get_option("store_message"))) : ?>
            <div class="site-message">
        <p> <?= get_option("store_message"); ?></p>
    </div>
    <?php endif;?>


<footer>

    <div class="footer-section">

        <div class="column-big">
            <h4>No title</h4>

            <?php if(!empty(get_option("address_field"))) : ?>
                <div class="address_field">
                    <p> <?= get_option("address_field"); ?></p>
                </div>
            <?php endif;?>


        </div>

        <div class="column-small">
            <h4>Links</h4>
            <div class="links-menu">
            <?php
            $menu= array(
                'theme_location' => 'primary_menu',
                'menu_id' => 'primary_menu',
                'container' => 'nav',
                'container_class' => 'menu'
            );

            wp_nav_menu($menu);
            ?>
            </div>

        </div>

        <div class="column-small">
            <h4>Help</h4>
        </div>

        <div class="column-big">
            <h4>Newsletter</h4>

            <!-- Newsletter form -->
            <form action="din_behandlings_url" method="post">
                <label for="newsletter-email"></label>
                <input type="email" id="newsletter-email" name="email" placeholder="Enter Your Email Address">
                <input type="submit" value="SUBSCRIBE">
            </form>
        </div>


    </div>



</footer>





</body>
</html>