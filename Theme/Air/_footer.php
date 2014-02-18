<?php
/**
 * This comment block is used just to make IDE suggestions to work
 * @var $this \Ip\View
 */
?>
<footer class="clearfix">
    <div class="col_12">
        <?php echo ipSlot('text', array('id' => 'themeName', 'tag' => 'div', 'default' => __('Theme "Air"', 'Air', false), 'class' => 'left')) ?>
        <div>
            <?php echo sprintf(__('Drag & drop with %s', 'Air'), '<a href="http://www.impresspages.org">' . __('ImpressPages CMS', 'Air') . '</a>'); ?>
        </div>
    </div>
</footer>
</div>
<?php echo ipJs(); ?>

</body>
</html>