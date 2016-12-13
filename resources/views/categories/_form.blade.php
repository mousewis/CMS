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
  $action = $action == 'update' ? $action.'/'.$categories->cate_id : $action; 
?>
<form action="<?= url(((session('user_id')&&(session('user_role')=='admin'))?'admin/':'').'categories/'.$action) ?>" method="POST" class="form-horizontal">
<?= $method ?>
	<fieldset>
    		<div class="form-group"><label class="control-label">Tên chuyên mục</label>
		<input type="text" name="cate_name" value ="<?= isset($categories) ? $categories->cate_name : ''?>" required ='required' class="col-md-4 form-control" placeholder="Tên chuyên mục"></div>

		<div class="form-group">
			<label class="control-label">&nbsp;</label>
			<input type="submit" value="Save" class="btn btn-primary">
		</div>
	</fieldset>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>