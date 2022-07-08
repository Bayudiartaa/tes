
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/third-party/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/node_modules/@fortawesome/fontawesome-free/css/all.min.css')}}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{asset('assets/node_modules/bootstrap-social/bootstrap-social.css')}}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/assets/css/components.css')}}">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary">
                            <div class="card-header"><h4>Login</h4></div>
                                <div class="card-body">
                                    @if(session('errors'))
                                        <div class="alert alert-danger error">
                                            {{session('errors')}}

                                            {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <ul>
                                            @foreach ($error->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                            </ul> --}}
                                        </div>
                                    @endif
                                    <form method="POST" action="{!! route('login') !!}" class="needs-validation" novalidate="">
                                        @csrf
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input id="username" type="text" class="form-control" name="username" placeholder="Username" tabindex="1" required autofocus>
                                            <div class="invalid-feedback">
                                                Please fill in your Username
                                            </div>
                                        </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Password</label>
                                        <div class="input-group">
                                            <input id="password" type="password" class="form-control" name="password" placeholder="Password" tabindex="2" required>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-eye-slash" id="eye"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback">
                                            Please fill in your Password
                                        </div>
                                    </div>
                                    {{-- <div class="form-group row">
                                        <label for="captcha" class="col-md-4 col-form-label text-md-right">Captcha</label>
                                        <div class="col-md-6 captcha">
                                            <span>{!! captcha_img() !!}</span>
                                            <button type="button" class="btn btn-danger" class="reload" id="reload">
                                            &#x21bb;
                                            </button>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <label for="captcha" class="col-md-4 col-form-label text-md-right">Enter Captcha</label>
                                        <div class="col-md-6">
                                            <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                                        </div>
                                    </div> --}}
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                        <label class="custom-control-label" for="remember-me">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                        Copyright &copy; {{ date('Y') }} <div class="bullet"></div> Development By <a href="https://nauval.in/">Byu</a>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{asset('assets/third-party/jquery.js')}}"></script>
    <script src="{{asset('assets/third-party/popper.js')}}"></script>
    <script src="{{asset('assets/third-party/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/third-party/nicescroll.js')}}"></script>
    <script src="{{asset('assets/third-party/moment.js')}}"></script>
    <script src="{{asset('assets/assets/js/stisla.js')}}"></script>

    <!-- Template JS File -->
    <script src="{{asset('assets/assets/js/scripts.js')}}"></script>
    <script src="{{asset('assets/assets/js/custom.js')}}"></script>

</body>
</html>

<script>
    $('#eye').click(function (){
        if($(this).hasClass('fa-eye-slash')) {
            $(this).removeClass('fa-eye-slash');
            $(this).addClass('fa-eye');
            $('#password').attr('type', 'text');
        } else {
            $(this).removeClass('fa-eye');
            $(this).addClass('fa-eye-slash');
            $('#password').attr('type', 'password');
        }
    })
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
