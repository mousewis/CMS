@extends ('layouts.plane')
@section ('content')
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
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
            <br /><br /><br />
                        <form action="{{url('admin/_login')}}" method="post" role="form">
                            <fieldset>
                                <h3>Đăng nhập</h3>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Tên đăng nhập" name="user_id" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mật khẩu" name="user_password" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">Đăng nhập</button>
                            </fieldset>
                            <input type="hidden" name="_token"  value="{{csrf_token()}}">
                        </form>
                </div>
        </div>
    </div>
@endsection