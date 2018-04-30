<div class="users view large-10 medium-9 columns">
    <h2><?= h($user->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Nombre de usuario') ?></h6>
            <p><?= h($user->username) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Rol') ?></h6>
            <p><?= h($user->role) ?></p>
        </div>
    </div>
</div>

