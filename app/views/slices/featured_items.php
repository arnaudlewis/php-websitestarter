<div class="featured-items">

  <?php foreach($slice->getValue()->getArray() as $item) { ?>

    <?php 
    $illustration = $item->get('illustration'); 
    $position = $slice->getLabel() == "col-2" ? "twice col-4-lg col-6-xl col-8-sm-pt col-6-sm-ls" : "col-4-lg col-6-xl col-8-sm-pt col-6-sm-ls";
    ?>

    <div class="item centered <?= $position ?>">
        <div class="thumbnail" <?= $illustration ? 'style="background-image: url('.$illustration->getView("icon")->getUrl().')"' : '' ?>></div>
        <div class="text-wrapper">

          <?= $item->getStructuredText('title')->asHtml() ?>
          <?= $item->getStructuredText('summary')->asHtml() ?>

          <?php $readMore = $item->get('read-more'); ?>
          <?php $readMoreLabel = $item->get('read-more-label'); ?>

          <?php if ($readMoreLabel): ?>
            <?php $url = $readMore ? $linkResolver->resolve($readMore) : null ?>
            <a class="button" <?= $url ? 'href="'.$url.'"' : '' ?>>
              <?= $readMoreLabel->asText() ?>
            </a>
          <?php endif ?>
        </div>
    </div>
  <?php } ?>
</div>