<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Toko Management</title>
    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">
</head>

<body>
    <div id="auth">

        <div class="row">
            <div class="col-12 col-lg-6">
                <div id="auth-left" class="d-flex justify-content-center mt-5">
                    <div class="card shadow-lg p-4 bg-light">
                        <div class="card-body">
                            <form method="POST" need-validation action="{{ route('login') }}">
                                @csrf
        
                                <div class="text-center">
                                    <h5>
                                        <div class="text-center">
                                            <i class="bi bi-box "
                                                style="font-size:40px;"></i>
        
                                        </div>
                                        <div class="text-center mb-5" style="font-size:30px;">
        
                                            Toko Management
                                        </div>
                                    </h5>
                                </div>
        
        
                                <div class="form-group position-relative has-icon-left mb-0">
                                    <input asp-for="email" type="email" name="email"
                                        class="form-control form-control-xl @error('email') is-invalid @enderror"
                                        placeholder="email">
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                </div>
                                @error('email')
                                    <div class="mt-1">
                                        <span class="text-danger" asp-validation-for="email">
                                            {{ $message }}
                                        </span>
                                    </div>
                                @enderror
                                <div class="form-group position-relative has-icon-left mt-4 mb-0">
                                    <input asp-for="password" type="password" name="password"
                                        class="form-control form-control-xl  @error('password') is-invalid @enderror"
                                        placeholder="Password">
                                    <div class="form-control-icon">
                                        <i class="bi bi-shield-lock"></i>
                                    </div>
                                </div>
                                @error('password')
                                    <div class="mt-1">
                                        <span class="text-danger" asp-validation-for="password">
                                            {{ $message }}
                                        </span>
                                    </div>
                                @enderror
                                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                            </form>
                        </div>
                    </div>
                   
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <div id="auth-right">

                    <img src="images/bg/login.jpg" width="800px" height="600px">
                </div>
            </div>
        </div>

    </div>
</body>

</html>
