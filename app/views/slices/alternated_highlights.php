<div class="alternated-highlights">

  <?php $index = 0; ?>

  <?php foreach($slice->getValue()->getArray() as $item) { ?>

    <?php 
    $odd = ($index % 2 == 0);
    $thumbnail = $item->get('thumbnail') ? $item->get('thumbnail')->getMain() : null;
    $illustration = $item->get('illustration') ? $item->get('illustration')->getMain() : null;
    ?>

    <div class="item <?= $odd ? "alternate" : ""; ?>">
      <?php if(!$odd) { ?>
        <div class="image-container centered">
          <img src="<?= $illustration ? $illustration->getUrl() : '' ?>" />
        </div>
      <?php } ?>

      <div class="text-wrapper">
        <div class="head-text">
          <div class="thumbnail" style="<?= $thumbnail ? 'background-image: url(\'' . $thumbnail->getUrl() . '\')' : '' ?>"></div>
          <?= $item->getStructuredText('title')->asHtml() ?>
        </div>
          <?= $item->getStructuredText('summary')->asHtml(); ?>
      </div>

     <?php if($odd) { ?>
       <div class="image-container centered">
        <img src="<?= $illustration ? $illustration->getUrl() : '' ?>" />
      </div>
    <?php } ?>

  <?php $index++; ?>
  </div>
  <?php } ?>
</div>