<?php foreach($slice->getValue()->getArray() as $item) { ?>
  
  <?php
    $background = $item->get('background') ? $item->get('background')->getMain() : null;
    $illustration = $item->get('illustration') ? $item->get('illustration')->getMain() : null;
    $readMore = $item->get('read_more');
    $readMoreLabel = $item->get('read_more_label');
  ?>

  <div class="section-header <?= $slice->getLabel() ?>" <?= $background ? 'style="background-image: url('.$background->getUrl().')"' : '' ?>>

   <div class="text-wrapper">
     <?= $item->getStructuredText('title')->asHtml() ?>
     <?= $item->getStructuredText('summary')->asHtml() ?>

     <?php if ($readMoreLabel) { ?>
        <?php $url = $readMore ? $linkResolver->resolve($readMore) : null ?>
        <a class="button" <?= $url ? 'href="'.$url.'"' : '' ?>>
          <?= $readMoreLabel->asText() ?>
        </a>
      <?php } ?>

   </div>

   <?php if($illustration) { ?>
   <div class="image-container centered">
   <img src="<?= $illustration->getUrl() ?>" />
  </div>
  <?php } ?>

  </div>
<?php } ?>