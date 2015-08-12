<div class="illustration <?= $slice->getLabel() ?>">

  <?php
    $item = $slice->getValue();

    $illustrationUrl = $item->getMain() ? $item->getMain()->getUrl() : null;
  ?>
  <img src="<?= $illustrationUrl ? $illustrationUrl : '' ?>" />

</div>