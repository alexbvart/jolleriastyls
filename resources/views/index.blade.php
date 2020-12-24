<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Jolleriastyls</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body class="login">

    <div class="logo">

        <strong><p>Sistema de Ventas Jolleriastyls</p></strong>
    </div>
    <div class="content container py-4">

        <form method="POST" action="{{ route('login') }}">
            @csrf
            @method('POST')
            <h2 class="form-title">Inicio de Sesión</h2>

            <div class="form-group">
                <label class="control-label">Nombre:</label>
                <div class="input-icon">
                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                        placeholder="Ingrese su nombre de usuario" id="name" name="name" value="{{ old('name') }}" />
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="form-group">
                <label class="control-label">Contraseña:</label>
                <div class="input-icon">
                    <input class="form-control @error('password') is-invalid @enderror" type="password"
                        placeholder="Ingrese contraseña" id="password" name="password" value="{{ old('password') }}" />
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <hr />
            <div class="form-actions">
                <button class="btn btn-success btn-block btn-lg">
                    Ingresar
                </button>
            </div>
            <hr />
        </form>
    </div>
    <div class="copyright mt-2">
        2020 &copy; Sistema de Jolleria Styls.
    </div>





    <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/adminlte/dist/js/adminlte.min.js"></script>

</body>

</html>
