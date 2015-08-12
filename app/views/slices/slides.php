<div class="slider <?= $slice->getLabel() ?>">

  <?php foreach($slice->getValue()->getArray() as $item) { ?>

  <?php
  $illustration = $item->get('illustration') ? $item->get('illustration')->getMain() : null;
  $blankImage = the_skin() && the_skin()->getImage('skin.blank-image') ? the_skin()->getImage('skin.blank-image')->getMain() : null;
  $illustrationUrl = $illustration ? $illustration->getUrl() : ($blankImage ? $blankImage->getUrl() : '');
  $readMore = $item->get('read-more');
  $readMoreLabel = $item->get('read-more-label');
  ?>
  <div class="slide" data-image="<?= $illustrationUrl ? $illustrationUrl : '' ?>">
    <a href="#" class="arrow-prev"><i class="icon-arrow-prev"></i></a>
    <div class="slide-container">
      <div class="title"><?= $item->get('title') ? $item->get('title')->asHtml() : ''; ?></div>
      <?= $item->get('summary') ? $item->get('summary')->asHtml() : ''; ?>

      <?php if ($readMoreLabel): ?>
        <?php $url = $readMore ? $linkResolver->resolve($readMore) : null ?>
        <a class="button" <?= $url ? 'href="'.$url.'"' : '' ?>>
          <?= $readMoreLabel->asText() ?>
        </a>
      <?php endif ?>

    </div>
    <?php } ?>
    <a href="#" class="arrow-next"><i class="icon-arrow-next"></i></a>
  </div>
</div>
