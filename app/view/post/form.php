<?php if(!defined('PATH')) exit('Path error'); ?>
<?= form_tag_open(CONTROLLER_PATH, 'POST') ?>
<?= label_tag('title') ?>
<?= input_tag('title') ?><br />
<?= label_tag('body') ?>
<?= input_tag('body') ?><br />
<?= submit_tag('Submit') ?><br />
<?= form_tag_close() ?>
