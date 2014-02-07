<h2>Editing <span class='muted'>Comment</span></h2>
<br>

<?php echo render('comments/_form'); ?>
<p>
	<?php echo Html::anchor('comments/view/'.$comment->id, 'View'); ?> |
	<?php echo Html::anchor('comments', 'Back'); ?></p>
