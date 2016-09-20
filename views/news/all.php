<?php foreach ($items as $item): ?>
    <h1><?php echo $item->title; ?></h1>
    <p><?php echo $item->text; ?></p>
    <p><?php echo $item->date; ?></p>
    <hr>
<?php endforeach; ?>

