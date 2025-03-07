<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>

    <!-- Adicionando Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to right, #00c6ff, #0072ff);
            font-family: 'Arial', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            padding: 15px; /* Diminuí o padding para compactar mais */
            max-width: 350px; /* Reduzi mais o tamanho da div */
            width: 100%;
            max-height: 90vh; /* Limitando a altura máxima */
            overflow-y: auto; /* Permite rolar o conteúdo */
        }

        .form-label {
            font-size: 1rem;
            font-weight: 600;
            color: #333;
        }

        .form-control {
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 10px; /* Reduzi o padding dos inputs */
            font-size: 1rem;
            margin-bottom: 12px; /* Ajustei o espaçamento entre os campos */
        }

        .form-control:focus {
            border-color: #0072ff;
            box-shadow: 0 0 10px rgba(0, 114, 255, 0.5);
        }

        .btn-primary {
            background-color: #0072ff;
            border: none;
            padding: 12px; /* Ajustei o padding do botão */
            font-size: 1rem;
            font-weight: 600;
            border-radius: 5px;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #005bb5;
            transition: background-color 0.3s ease;
        }

        .error-message {
            color: #ff4d4d;
            font-size: 0.9rem;
            margin-bottom: 12px;
        }

        h2 {
            text-align: center;
            color: #000000;
            margin-bottom: 15px; /* Diminuí a margem inferior */
        }

        .alert {
            margin-bottom: 15px; /* Ajustei o espaçamento da alerta */
        }

        .btn-back {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #0072ff;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-back:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>

    <div class="container">
        <h2>Editar Usuário</h2>

        <a href="{{ route('user.index') }}" class="btn-back">🔙 Voltar para Lista</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="error-message">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user-update', ['user' => $user['id']]) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nome -->
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo" value="{{ old('nome', $user['name'] ?? '') }}">
            </div>

            <!-- Data de Nascimento -->
            <div class="mb-3">
                <label for="dataNascimento" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" value="{{ old('dataNascimento', $user['dataNascimento'] ?? '') }}">
            </div>

            <!-- E-mail -->
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Melhor e-mail do usuário" value="{{ old('email', $user['email'] ?? '') }}">
            </div>

            <!-- CPF -->
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF do usuário" value="{{ old('cpf', $user['cpf'] ?? '') }}">
            </div>

            <!-- Telefone -->
            <div class="mb-3">
                <label for="fone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="fone" name="fone" placeholder="Telefone do usuário" value="{{ old('fone', $user['fone'] ?? '') }}">
            </div>

            <!-- Endereço -->
            <div class="mb-3">
                <label for="rua" class="form-label">Rua</label>
                <input type="text" class="form-control" id="rua" name="rua" placeholder="Rua" value="{{ old('rua', $user['rua'] ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" value="{{ old('cep', $user['cep'] ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="bairro" class="form-label">Bairro</label>
                <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" value="{{ old('bairro', $user['bairro'] ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="numero" class="form-label">Número</label>
                <input type="text" class="form-control" id="numero" name="numero" placeholder="Número da casa" value="{{ old('numero', $user['numero'] ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" value="{{ old('cidade', $user['cidade'] ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" value="{{ old('estado', $user['estado'] ?? '') }}">
            </div>

            <!-- Senha (opcional) -->
            <div class="mb-3">
                <label for="password" class="form-label">Nova Senha</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Senha mínima 6 caracteres">
            </div>

            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>

    <!-- Adicionando o JS do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
