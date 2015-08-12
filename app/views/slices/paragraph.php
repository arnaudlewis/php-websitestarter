<div class="paragraph">

<?php 
  $label = $slice->getLabel();
  $position = "col-8-sm-pt";
  if($label == "col-2") $position .= " col-6"; elseif ($label == "col-3")  $position .= " col-6"; else $position .= " col-12";
?>
  <?php foreach($slice->getValue()->getArray() as $item) { ?>

      <div class="container <?= $position ?>">
          <?= $item->getStructuredText('block')->asHtml() ?>
      </div>

  <?php } ?>