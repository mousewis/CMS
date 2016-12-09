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
  $action = $action == 'update' ? $action.'/'.$posts->post_id : $action; 
?>
<form action="<?= url('posts/'.$action) ?>" method="POST" class="form-horizontal">
<?= $method ?>
	<fieldset>
    		<div class="form-group"><label class="control-label">Post Title</label>
		<input type="text" name="post_title" value ="<?= isset($posts) ? $posts->post_title : ''?>" required ='required' class="col-md-4 form-control" placeholder="Post Title"></div>
		<div class="form-group"><label class="control-label">Post Image</label>
		<input type="text" name="post_image" value ="<?= isset($posts) ? $posts->post_image : ''?>" required ='required' class="col-md-4 form-control" placeholder="Post Image"></div>
		<div class="form-group"><label class="control-label">Post Content</label>
		<textarea name="post_content" rows=10 cols=45 class="col-md-4 form-control" required ='required'><?= isset($posts) ? $posts->post_content : '' ?></textarea></div>
		<div class="form-group"><label class="control-label">Post Tags</label>
		<input type="text" name="post_tags" value ="<?= isset($posts) ? $posts->post_tags : ''?>" required ='required' class="col-md-4 form-control" placeholder="Post Tags"></div>
		<div class="form-group"><label class="control-label">Post Status</label>
		<input type="number" name="post_status" value ="<?= isset($posts) ? $posts->post_status : ''?>" required ='required' class="col-md-4 form-control" placeholder="Post Status"></div>
		<div class="form-group"><label class="control-label">Post Created At</label>
		<input type="datetime" name="post_created_at" value ="<?= isset($posts) ? $posts->post_created_at : ''?>" required ='required' class="col-md-4 form-control" placeholder="Post Created At"></div>
		<div class="form-group"><label class="control-label">Post Updated At</label>
		<input type="datetime" name="post_updated_at" value ="<?= isset($posts) ? $posts->post_updated_at : ''?>" required ='required' class="col-md-4 form-control" placeholder="Post Updated At"></div>
		<div class="form-group"><label class="control-label">Post Category</label>
		<input type="text" name="post_category" value ="<?= isset($posts) ? $posts->post_category : ''?>" required ='required' class="col-md-4 form-control" placeholder="Post Category"></div>
		<div class="form-group"><label class="control-label">Post Author</label>
		<input type="text" name="post_author" value ="<?= isset($posts) ? $posts->post_author : ''?>" required ='required' class="col-md-4 form-control" placeholder="Post Author"></div>

		<div class="form-group">
			<label class="control-label">&nbsp;</label>
			<input type="submit" value="Save" class="btn btn-primary">
		</div>
	</fieldset>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>