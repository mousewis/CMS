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
$action = $action == 'update' ? $action . '/' . $posts->post_id : $action;
?>
<form action="<?= url(((session('user_id')&&(session('user_role')=='admin'))?'admin/':'').'posts/' . $action) ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
    <?= $method ?>
    <fieldset>
        <div class="form-group"><label class="control-label">Tựa đề</label>
            <input type="text" name="post_title" value="<?= isset($posts) ? $posts->post_title : ''?>"
                   required='required' class="col-md-4 form-control" placeholder="Tựa đề"></div>
        <div class="product-image-wrapper">
            <div class="productinfo text-center">
                <img id="post_image_preview" src="{{url(isset($posts) ? 'images/'.$posts->post_image : 'images/blank.jpg')}}" style="width: 20%;height: 20%;">
            </div>
        </div>
        <div class="form-group"><label class="control-label">Hình ảnh</label>
            <input type="file" id="post_image" name="post_image" value="<?= isset($posts) ? $posts->post_image : ''?>"
                   <?= isset($posts) ? '' : 'required'?> class="col-md-4 form-control" ></div>
        <div class="form-group"><label class="control-label">Nội dung</label>
            <textarea id="post_content" name="post_content" rows=10 cols=45 class="col-md-4 form-control"
                      required='required'><?= isset($posts) ? $posts->post_content : '' ?></textarea></div>
        <div class="form-group"><label class="control-label">Thẻ bài viết</label>
            <input id="post_tags" name="post_tags" value="<?= isset($posts) ? $posts->post_tags : ''?>"
                   required='required' class="col-md-4 form-control" placeholder="Post Tags"></div>
        <div class="form-group"><label class="control-label">Trạng thái</label>
            <select name="post_status" required class="col-md-4 form-control">
                <option value="0" <?= isset($posts) ? (($posts->post_status=='0')?'selected':''): ''?> >Hạn chế</option>
                <option value="1" <?= isset($posts) ? (($posts->post_status=='1')?'selected':''): ''?> >Công khai</option>
            </select>
            </div>
            <div class="form-group"><label class="control-label">Chuyên mục</label>
                <select name="post_category" required class="col-md-4 form-control">
                <?php if (isset($categories)): ?>
                <?php foreach ($categories as $item):?>
                <option value="<?= $item->cate_id?>" <?= isset($posts) ? (($posts->post_category==$item->cate_id)?'selected':''): ''?> ><?= $item->cate_name ?></option>
                <?php endforeach; ?>
                <?php endif; ?>
                </select>
                </div>
            <div class="form-group">
                <label class="control-label">&nbsp;</label>
                <input type="submit" value="Lưu" class="btn btn-primary">
            </div>
    </fieldset>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>