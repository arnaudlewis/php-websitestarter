<div class="accordions">
    <?php foreach($slice->getValue()->getArray() as $item) { ?>
      <div class="item">
        <label>
          <input  type="checkbox" />
          <span>
            <?= $item->getStructuredText('title')->asHtml() ?>
          </span>
          <i class="accordion-arrow"></i>
        </label>
        <div class="summary">
          <?= $item->getStructuredText('summary')->asHtml(); ?>
        </div>
      </div>
      <?php } ?>
</div>