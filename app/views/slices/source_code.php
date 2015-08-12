<div class="source-code">

  <?php foreach($slice->getValue()->getArray() as $item) { ?>

  <div class="text-wrapper">
    <?= $item->getStructuredText('title')->asHtml() ?>
    <?= $item->getStructuredText('summary')->asHtml() ?>
  </div>

    <pre>
      <code>

      <?= $item->getStructuredText('source')->asText() ?>

      </code>
    </pre>

    <?php } ?>

</div>