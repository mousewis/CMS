@extends('layouts.app')
@section('content')
    <div class="col-sm-12">
        <h2>Chỉnh sửa thông tin website</h2>
        <hr>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('message'))
            <div class="alert alert-success">
                <ul>
                    <li>{{ session('message') }}</li>
                </ul>
            </div>
        @endif
        @if (session('error-message'))
            <div class="alert alert-danger">
                <ul>
                    <li>{{ session('error-message') }}</li>
                </ul>
            </div>
        @endif
        <form action="<?= url('admin/_options') ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
            <fieldset>
                <div class="form-group"><label class="control-label">Tên website</label>
                    <input type="text" name="opt_blog_name" value="<?= isset($opt_blog_name) ? $opt_blog_name : ''?>"
                           required='required' class="col-md-4 form-control"></div>
                <div class="form-group"><label class="control-label">Giới thiệu website</label>
                    <input type="text" name="opt_blog_intro" value="<?= isset($opt_blog_intro) ? $opt_blog_intro : ''?>"
                           required='required' class="col-md-4 form-control"></div>
                <div class="product-image-wrapper">
                    <div class="productinfo text-center">
                        <img id="opt_blog_logo_preview"
                             src="{{url(isset($opt_blog_logo) ? 'images/'.$opt_blog_logo : 'images/logo-1.png')}}"
                             style="width: 20%;height: 20%;">
                    </div>
                </div>
                <div class="form-group"><label class="control-label">Logo website</label>
                    <input type="file" id="opt_blog_logo" name="opt_blog_logo">
                </div>
                <div class="product-image-wrapper">
                    <div class="productinfo text-center">
                        <img id="opt_blog_avatar_preview"
                             src="{{url(isset($opt_blog_avatar) ? 'images/'.$opt_blog_avatar : 'images/avatar.png')}}"
                             style="width: 20%;height: 20%;">
                    </div>
                </div>
                <div class="form-group"><label class="control-label">Hình đại diện</label>
                    <input type="file" id="opt_blog_avatar" name="opt_blog_avatar">
                </div>
                <div class="form-group">
                    <label class="control-label">&nbsp;</label>
                    <input type="submit" value="Lưu" class="btn btn-primary">
                </div>
            </fieldset>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
@endsection