<!-- すべてのページのフッタ部分を記載 -->
            <footer class="footer" id="footer">
                <div class="footerContents">
                    <div class="footer-navi">
                        <nav class="footer-navi">
                        <?php
                        wp_nav_menu(
                            array (
                                'theme_location' => 'footer-navi',
                            )
                            );
                        ?>
                        </nav>
                    </div><!-- footer-navi -->
                </div><!-- footerContents -->
            </footer>
        </div> <!-- container -->
        <?php wp_footer(); ?>
    </body>
</html>

