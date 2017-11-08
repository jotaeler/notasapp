<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'AppNotes';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('../font-awesome-4.7.0/css/font-awesome.min.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <!--h1><a href=""><?= $this->fetch('title') ?></a></h1-->
                <h1><a href="/notas">Notes App</a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul>
                <?php if (isset($current_user)){?>
                    <li><a href="/notas/notes/owned">My Notes</a></li>
                    <li><a href="/notas/notes/add">New Note</a></li>
                    <!--
                    <li><a href="/notas/users/changePassword">ChangePassword</a></li>
                    -->
                <?php } ?>
            </ul>
            <ul class="right">
                <?php if (isset($current_user)) {?>
                    <li><p>Hi, <?=$current_user['name']?></p></li>
                <?php } ?>
                <?php if (isset($current_user)) {?>
                    <li><a href="/notas/users/edit" class="button">User configuration</a></li>
                    <li><a href="/notas/users/logout" class="button">Logout</a></li>
                <?php } ?>
                <?php if (!isset($current_user)) {?>
                    <li><a href="/notas/users/logout" class="button">Login</a></li>
                <?php } ?>

            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
