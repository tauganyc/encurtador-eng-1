<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Página de Cadastro</title>

    <style>
        /* Cor de fundo */
        body {
            background-color: #13459C;
        }

        /* Ajuste de altura mínima para centralizar verticalmente */
        .min-vh-100 {
            min-height: 100vh;
        }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-12 col-md-8 col-lg-6"> <!-- Tornando o card responsivo -->
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-4">
                <h4 class="card-title text-center mb-4 fw-bold">{{ __('Cadastro') }}</h4>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="nome" class="form-label">{{ __('Nome') }}</label>
                        <input id="nome" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('E-mail') }}</label>
                        <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="senha" class="form-label">{{ __('Senha') }}</label>
                        <input id="senha" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password" />
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="senha_confirmation" class="form-label">{{ __('Confirmar Senha') }}</label>
                        <input id="senha_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" required autocomplete="new-password" />
                        @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a class="text-decoration-none small text-muted" href="{{ route('login') }}">
                            Já está cadastrado?
                        </a>
                        <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill">
                            Cadastrar
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
