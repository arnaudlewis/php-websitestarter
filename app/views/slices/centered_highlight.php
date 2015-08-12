<div class="centered-highlight">
  <?php foreach($slice->getValue()->getArray() as $item) { ?>

<?php
    $thumbnail = $item->get('thumbnail'); 
    $illustration = $item->get('illustration');
?>

  <div class="underlay"></div>
  
  <div class="thumbnail" <?= $thumbnail ? 'style="background-image: url('.$thumbnail->getView("icon")->getUrl().')"' : '' ?>></div>

  <div class="text-wrapper">
    
    <?= $item->getStructuredText('title')->asHtml() ?>
    <?= $item->getStructuredText('summary')->asHtml() ?>
  
  </div>
  
  <img src="<?= $illustration->getView("main")->getUrl() ?>"/>
  <?php } ?>
</div>




