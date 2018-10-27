@extends("layouts.app")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card border-0 bg-ligth px-4 py-2">
                    <form action="{{ route("login") }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Correo</label>
                                <input class="form-control" type="email" name="email" placeholder="Ingresar Correo">
                            </div>
                            <div class="form-group">
                                <label>Contraseña</label>
                                <input class="form-control" type="password" name="password" placeholder="Ingresar Contraseña">
                            </div>

                        </div>
                        <button class="btn btn-primary btn-block" id="login-btn">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection