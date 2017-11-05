<div class="users view large-10 medium-9 columns">
  <?php foreach ($notes as $note) {?>
    <div class="large-5 columns strings">
        <h6 class="subheader"><?= __($note->title) ?></h6>
        <?= h($note->content) ?>
        <br></br>
        <p> Autor: <?= h($note->user->name) ?></p> 
    </div>
  <?php } ?>
</div>
