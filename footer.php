<?php
/**
 * The footer for our theme
 */
?>
</main>

<footer>
    <div class="footer-content">
        <div class="footer-section">
            <h4>About Vinz Ideas</h4>
            <p>Premium budget travel guides and sustainable tourism experiences for adventurers and explorers.</p>
        </div>
        
        <div class="footer-section">
            <h4>Popular Destinations</h4>
            <ul>
                <li><a href="#">Southeast Asia</a></li>
                <li><a href="#">Budget Travel Tips</a></li>
                <li><a href="#">Sustainable Travel</a></li>
                <li><a href="#">Travel Guides</a></li>
            </ul>
        </div>
        
        <div class="footer-section">
            <h4>Resources</h4>
            <ul>
                <li><a href="#">Travel Blog</a></li>
                <li><a href="#">B2B Partnerships</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
        
        <div class="footer-section">
            <h4>Connect</h4>
            <ul>
                <li><a href="#">Instagram</a></li>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Newsletter</a></li>
            </ul>
        </div>
    </div>
    
    <div class="footer-bottom">
        <p>&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
