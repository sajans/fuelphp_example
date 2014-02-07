<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Title', 'title', array('class'=>'control-label')); ?>

				<?php  echo Form::input('title', Input::post('title', isset($comment) ? $comment->title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Title')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Message', 'message', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('message', Input::post('message', isset($comment) ? $comment->message : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Message')); ?>

		</div>
		<div class="form-group">
			<?php  //Form::label('Message id', 'message_id', array('class'=>'control-label')); ?>

				<?php  //Form::hidden('message_id', Input::post('message_id', isset($comment) ? $comment->message_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Message id')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>