<div class="users view large-10 medium-9 columns">
  <?php if (isset($username)) {?>
    <a href="/notas/users/logout" class="button">Logout</a>
  <?php } ?>

  <?php if (!isset($username)) {?>
    <a href="/notas/users/login" class="button">Login</a>
  <?php } ?>

  <?php foreach ($notes as $note) {?>
    <div class="large-5 columns strings">
        <h6 class="subheader"><?= __($note->title) ?></h6>
        <?= h($note->content) ?>
        <br></br>
        <p> Autor: <?= h($note->user->name) ?></p>
    </div>
  <?php } ?>
</div>
