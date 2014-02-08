<strong>Content:</strong>
<?php echo $message->message; ?></p>
<?php
if ($message->title == Auth::instance()->get_screen_name())
{
    echo Html::anchor('posts/edit/'.$message->id, 'Edit');
    echo ' | ';
}
echo Html::anchor('../public', 'Back');
?>
<h3>Comments</h3>
<ul>
<?php foreach ($comments as $comment) : ?>
    <li>
    <ul>
        <li><strong>Name:</strong> <?php echo $comment->title; ?></li>
        <li><strong>Comment:</strong><br /><?php echo $comment->message; ?></li>
        <li><?php if (Auth::instance()->check()) : ?>
    <li><p><?php //echo Html::anchor('comments/edit/'.$comment->id.'/'.$message->id, 'Edit'); ?>|
    <?php //echo Html::anchor('comments/delete/'.$comment->id.'/'.$message->id, 'Delete', array('onclick'=> "return confirm('Are you sure?')")); ?></li>
<?php endif; ?></li>
    </ul>
    </li>
<?php endforeach; ?>
</ul>