    <!-- get footer -->
    <div id="footer">
        <div class="px-8 py-2 lg:px-24 4xl:px-96 lg:flex items-center justify-between text-white bg-steam-darkblue text-xs">
            <!-- add widget_2 -->
            <?php if (is_active_sidebar('sub-footer')) : ?>
                <?php dynamic_sidebar('sub-footer'); ?>
            <?php endif; ?>
        </div>
    </div>

    <?php wp_footer(); ?>

</body>

</html>