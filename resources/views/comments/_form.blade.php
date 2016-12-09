@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<?php
  $method = $action == 'update' ? '<input type="hidden" name="_method" value="PUT">' : '';
  $action = $action == 'update' ? $action.'/'.$comments->comm_id : $action; 
?>
<form action="<?= url('comments/'.$action) ?>" method="POST" class="form-horizontal">
<?= $method ?>
	<fieldset>
    		<div class="form-group"><label class="control-label">Comm Post</label>
		<input type="number" name="comm_post" value ="<?= isset($comments) ? $comments->comm_post : ''?>" required ='required' class="col-md-4 form-control" placeholder="Comm Post"></div>
		<div class="form-group"><label class="control-label">Comm Created At</label>
		<input type="datetime" name="comm_created_at" value ="<?= isset($comments) ? $comments->comm_created_at : ''?>" required ='required' class="col-md-4 form-control" placeholder="Comm Created At"></div>
		<div class="form-group"><label class="control-label">Comm Email</label>
		<input type="text" name="comm_email" value ="<?= isset($comments) ? $comments->comm_email : ''?>" required ='required' class="col-md-4 form-control" placeholder="Comm Email"></div>
		<div class="form-group"><label class="control-label">Comm Name</label>
		<input type="text" name="comm_name" value ="<?= isset($comments) ? $comments->comm_name : ''?>" required ='required' class="col-md-4 form-control" placeholder="Comm Name"></div>
		<div class="form-group"><label class="control-label">Comm Content</label>
		<input type="text" name="comm_content" value ="<?= isset($comments) ? $comments->comm_content : ''?>" required ='required' class="col-md-4 form-control" placeholder="Comm Content"></div>

		<div class="form-group">
			<label class="control-label">&nbsp;</label>
			<input type="submit" value="Save" class="btn btn-primary">
		</div>
	</fieldset>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>