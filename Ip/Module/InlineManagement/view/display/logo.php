<div class="logo <?php echo empty($cssClass) ? '' : $cssClass ?>">
<?php if (isset($type) && $type == 'image') { ?>
    <a href="<?php echo isset($link) ? $link : '' ?>" style="<?php echo !empty($color) ? 'color: '.htmlspecialchars($color).';' : '' ?> <?php echo !empty($font) ? 'font-family: '.htmlspecialchars($font).';' : '' ?>">
        <img src="<?php echo ($this->esc(!empty($image) ? \Ip\Config::baseUrl($image) : \Ip\Config::coreModuleUrl('InlineManagement/public/empty.gif'))) ?>" alt="<?php echo $this->escPar('Config.name'); ?>" />
    </a>
<?php } else { ?>
    <a href="<?php echo isset($link) ? $link : '' ?>" style="<?php echo !empty($color) ? 'color: '.htmlspecialchars($color).';' : '' ?> <?php echo !empty($font) ? 'font-family: '.htmlspecialchars($font).';' : '' ?>">
        <?php echo nl2br($this->esc(isset($text) ? $text : '')) ?>
    </a>
<?php } ?>
</div>