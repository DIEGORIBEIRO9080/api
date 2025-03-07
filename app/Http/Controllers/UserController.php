<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $client;
    protected $jsonServerUrl = 'http://localhost:3000/users'; // URL da API do JSON Server

    public function __construct()
    {
        // Inicializa o cliente Guzzle
        $this->client = new Client();
    }

    // Cadastrar um usuário
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'dataNascimento' => 'required|date',
            'email' => 'required|email|unique:users,email',
            'cpf' => 'required|string|size:11|unique:users,cpf',
            'fone' => 'required|string|max:20',
            'rua' => 'required|string|max:255',
            'cep' => 'required|string|size:8',
            'bairro' => 'required|string|max:255',
            'numero' => 'required|string|max:10',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|size:2',
        ]);

        // Envia a requisição para o JSON Server
        $response = $this->client->post($this->jsonServerUrl, [
            'json' => $validatedData
        ]);

        $data = json_decode($response->getBody(), true);

        return response()->json(['message' => 'Usuário cadastrado com sucesso!', 'data' => $data], 201);
    }

    // Listar todos os usuários
    public function index()
    {
        $response = $this->client->get($this->jsonServerUrl);
        $data = json_decode($response->getBody(), true);

        return view('user.index', ['users' => $data]);
    }

    // Exibir um usuário específico
    public function show($id)
    {
        $response = $this->client->get("{$this->jsonServerUrl}/{$id}");
        $data = json_decode($response->getBody(), true);

        return view('user.show', ['user' => $data]);
    }

    // Editar um usuário
    public function edit($id)
    {
        $response = $this->client->get("{$this->jsonServerUrl}/{$id}");
        $data = json_decode($response->getBody(), true);

        return view('user.edit', ['user' => $data]);
    }

    // Atualizar um usuário
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'dataNascimento' => 'required|date',
            'email' => 'required|email|unique:users,email,' . $id,
            'cpf' => 'required|string|size:11|unique:users,cpf,' . $id,
            'fone' => 'required|string|max:20',
            'rua' => 'required|string|max:255',
            'cep' => 'required|string|size:8',
            'bairro' => 'required|string|max:255',
            'numero' => 'required|string|max:10',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|size:2',
        ]);

        // Envia a requisição para o JSON Server
        $response = $this->client->put("{$this->jsonServerUrl}/{$id}", [
            'json' => $validatedData
        ]);

        $data = json_decode($response->getBody(), true);

        return redirect()->route('user.show', ['id' => $id])->with('success', 'Usuário atualizado com sucesso!');
    }

    // Deletar um usuário
    public function destroy($id)
    {
        $response = $this->client->delete("{$this->jsonServerUrl}/{$id}");

        return redirect()->route('user.index')->with('success', 'Usuário deletado com sucesso!');
    }
}
