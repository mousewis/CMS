@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@if (session('error-message'))
	<div class="alert alert-danger">
		<ul>
				<li>{{session('error-message')}}</li>

		</ul>
	</div>
	@endif
	@if (session('message'))
	<div class="alert alert-success">
		<ul>
				<li>{{session('message')}}</li>

		</ul>
	</div>
	@endif
@endif
<div style="height:40px;"></div>
<div class="assessment-container container">
	<div class="row">
		<div class="col-md-6 form-box">
			<form role="form" class="registration-form" action="{{url('_setup')}}" method="post">
				<fieldset>
					<div class="form-top">
						<div class="form-top-left">
							<h3><span><i class="fa fa-calendar-check-o" aria-hidden="true"></i></span>Thiết lập các thông tin cần thiết</h3>
							<p>Vui lòng cung cấp đầy đủ thông tin người dùng
							</p>
						</div>
					</div>
					<div class="form-bottom">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Tên đăng nhập" name="user_id" id="user_id" required>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" placeholder="Mật khẩu" name="user_password" id="user_password" required>
							</div>
						<div class="form-group">
							<input type="email" class="form-control" placeholder="Email" name="user_email" id="user_email" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Họ tên" name="user_name" id="user_name" required>
						</div>
						<button type="button" class="btn btn-next">Tiếp tục</button>
					</div>
				</fieldset>
				<fieldset>
					<div class="form-top">
						<div class="form-top-left">
							<h3><span><i class="fa fa-calendar-check-o" aria-hidden="true"></i></span> Thiết lập các thông tin cần thiết</h3>
							<p>Vui lòng cung cấp cấu hình website
							</p>
						</div>
					</div>
					<div class="form-bottom">
						<div class="form-group">
                            <input type="text" class="form-control" placeholder="Tên website" name="opt_blog_name" required>
						</div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Giới thiệu website" name="opt_blog_intro" required>
                        </div>
						<button type="button" class="btn btn-previous">Quay lại</button>
						<button type="submit" class="btn">Hoàn tất</button>
					</div>
				</fieldset>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
			</form>
		</div>
	</div>
</div>