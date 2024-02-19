<?php /*if(!empty(get_option("store_message"))) : */?><!--
            <div class="site-message">
        <p> <?php /*= get_option("store_message"); */?></p>
    </div>
    --><?php /*endif;*/?>




<div class="banner-pink">
    <div class="col-pink">
        <h3>Free Delivery</h3>
        <p>
            For all oders over $50, consectetur adipim scing elit.
        </p>
    </div>

    <div class="col-pink">
        <h3>90 Days Return</h3>
        <p>
            If goods have problems, consectetur adipim scing elit.
        </p>

    </div>

    <div class="col-pink">
        <h3>Secure Payment</h3>
        <p>100% secure payment, consectetur adipim scing elit.</p>
    </div>

</div>


<footer>


<div class="footer-big">
    <div class="footer-section">

        <div class="column-big">


            <?php if(!empty(get_option("address_field"))) : ?>
                <div class="address_field">
                    <p> <?= get_option("address_street"); ?> <br>
                        <?= get_option("address_city"); ?>, <br>
                        <?= get_option("address_zip"); ?> <br></p>
                </div>
            <?php endif;?>


        </div>

        <div class="column-small">

            <div class="links-menu">
                <h4>Links</h4>
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

            <div class="help-menu">
                <h4>Help</h4>
            <?php
            $menu= array(
                'theme_location' => 'footer_help',
                'menu_id' => 'footer_help',
                'container' => 'nav',
                'container_class' => 'help-menu'
            );

            wp_nav_menu($menu);
            ?>
            </div>

        </div>

        <div class="column-big">

            <!-- Newsletter form -->
            <div class="newsletter-form-container">
                <h4>Newsletter</h4>
            <form action="form.php" method="post">
                <label for="newsletter-email"></label>
                <input type="email" id="newsletter-email" name="email" placeholder="Enter Your Email Address"
                       class="newsletter_email">
                <input type="submit" value="SUBSCRIBE" class="newsletter_submit">
            </form>
            </div>
        </div>


    </div>

    <div class="copyright-field">
        <div class="copyright-box">
            <p><?= get_option("copyright_year"); ?>
                <?= get_option("blogname"); ?>. All rights reserved</p>
        </div>
    </div>

</div>

</footer>

<div class="hero-banner">
    <img src="https://s3-alpha-sig.figma.com/img/1461/f3d6/ff74c027a1888544144abe4be6e02cbf?Expires=1708905600&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=bMhobuS~UJYiyn~Qhp7vxkCGnv3RsOfQudrOx~lT7JxNUrdpMRouasYD2VE0DmUuPZHf6-bkmRjef5cWVc5uRxGTjM6LtdemWVHRIStG7lp1CCgPmkntJrX20f0fa8yYX4htmiXasFC2iP2T4cs1IsBSev-5GnDCQzEYS9CTub242cblhOTjuiLKig0MgFQqA1jgmL8hYsRdNexJLuUr0GpNuPQTBrhnNRQ7XVLuLPBOMTpzwzjGKmplxZfqtDXGbFKYfY9ZAgIV3N6sQyrrG~Wiv-vohXGnNxTxbWN7qhm1qOXomTPewjAuZouNmjThO~yHRrVHbFmGJsVYvPhf3Q__ " alt="pic">

</div>



</body>
</html>