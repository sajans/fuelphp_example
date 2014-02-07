<h2>Viewing <span class='muted'>#<?php echo $comment->id; ?></span></h2>

<p>
	<strong>Title:</strong>
	<?php echo $comment->title; ?></p>
<p>
	<strong>Message:</strong>
	<?php echo $comment->message; ?></p>
<p>
	<strong>Message id:</strong>
	<?php echo $comment->message_id; ?></p>

<?php echo Html::anchor('comments/edit/'.$comment->id, 'Edit'); ?> |
<?php echo Html::anchor('comments', 'Back'); ?>