<h2>Listing <span class='muted'>Comments</span></h2>
<br>
<?php if ($comments): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Message</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($comments as $item): ?>		<tr>

			<td><?php echo $item->title; ?></td>
			<td><?php echo $item->message; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('comments/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('comments/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('comments/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Comments.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('comments/create', 'Add new Comment', array('class' => 'btn btn-success')); ?>

</p>
