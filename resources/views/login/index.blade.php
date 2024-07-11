<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>

    <link rel="shortcut icon" href="{{ asset('assets-admin/compiled/svg/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets-admin/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/compiled/css/style.css') }}"> {{-- css buat sendiri --}}
    <link rel="stylesheet" href="{{ asset('assets-admin/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/compiled/css/auth.css') }}">

    <script src="{{ asset('assets-admin/static/js/initTheme.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>

    <div id="auth">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-lg-5 col-12">
                <div id="auth-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="auth-logo">
                                <a href="#"><img src="{{ asset('assets-admin/compiled/png/logo-bpbd.png') }}" alt="Logo"></a>
                            </div>
                            <h1 class="auth-title">LOGIN</h1>
                            <h6 class="auth-item">Masukkan username dan password</h6>
                            <form id="login-form">
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" id="username" class="form-control form-control" placeholder="Username" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="password" id="password" class="form-control form-control" placeholder="Password" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-shield-lock"></i>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('login-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            axios.post('http://127.0.0.1:8080/api/login', {
                username: username,
                password: password
            })
            .then(function(response) {
                const data = response.data;
                alert('Login successful!');
                // Store the token for future requests
                localStorage.setItem('token', data.access_token);
                // Redirect to a different page if needed
                window.location.href = '/preview';
            })
            .catch(function(error) {
                console.error('There was an error!', error);
                alert('Invalid username or password');
            });
        });
    </script>
</body>

</html>
