<h2>Listing <span class='muted'>Posts</span></h2>
<br>
<?php if ($posts): ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Posts</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $item): ?>		<tr>

                    <td><?php echo $item->title; ?></td>
                    <td><?php echo $item->message; ?></td>
                    <td>
                        <div class="btn-toolbar">
                            <div class="btn-group">
                                <?php echo Html::anchor('posts/view/' . $item->id ,$comment_links[$item->id],array('class' => 'btn btn-small')) ; ?>	
                                <?php if (Auth::instance()->check()) : ?>
                                <?php echo Html::anchor('posts/edit/' . $item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-small')); ?>						
                                <?php echo Html::anchor('posts/delete/' . $item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>
                                 <?php endif; ?>
                                 <?php echo Html::anchor('comments/create/' . $item->id, '<i class="icon-eye-open"></i> Comment Now', array('class' => 'btn btn-small')); ?>
                            </div>
                        </div>

                    </td>
                </tr>
            <?php endforeach; ?>	</tbody>
    </table>

<?php else: ?>
    <p>No Posts.</p>

<?php endif; ?>
<p>
    <?php if (Auth::instance()->check()) : ?>
        <?php echo Html::anchor('posts/create', 'Add new Post'); ?>
    <?php endif; ?>
</p>
