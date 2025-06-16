<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Exception;

class UsuarioController extends Controller
{
    //
    public function cadastrar()
    {
        return view('usuarios.cadastroUsuario');
    }

    /**
     * Manipula a requisição POST para criar um novo usuário.
     *
     * Valida e processa os dados recebidos da requisição, criptografa a senha
     * e tenta criar um novo registro de usuário no banco de dados.
     * Em caso de sucesso, redireciona para a rota home.
     * Em caso de falha, retorna uma mensagem de erro.
     *
     * @param \Illuminate\Http\Request $request A requisição HTTP contendo os dados do usuário.
     * @return \Illuminate\Http\RedirectResponse|string Redireciona para home em caso de sucesso ou retorna uma mensagem de erro em caso de falha.
     */
    public function postUsuario(Request $request)
    {
        $dados = [
            'id' => $request->id,
            'nome' => $request->nome,
            'email' => $request->email,
            'password' => bcrypt($request->senha) // Criptografando a senha
        ];

        try {
            $usuario = Usuario::create($dados);
            $usuario->save();
            return redirect(route('home'));
        } catch (Exception $e) {
            return 'Erro ao cadastrar usuário: ' . $e->getMessage();
        }
    }

    /**
     * Exibe o formulário de edição para um usuário específico.
     *
     * @param int $id O ID do usuário a ser editado.
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     *     Redireciona para a página inicial com mensagem de erro se o usuário não for encontrado,
     *     ou exibe a view de edição de usuário com os dados do usuário.
     */
    public function edicao($id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return redirect(route('home'))->withErrors(['Usuário não encontrado.']);
        }

        $dados = [
            'id' => $usuario->id,
            'nome' => $usuario->nome,
            'email' => $usuario->email,
            'senha' => '' // Senha não é exibida por motivos de segurança
        ];

        return view('usuarios.editar', ['dados' => $dados]);
    }

    /**
     * Atualiza as informações de um usuário existente.
     *
     * Recebe os dados do usuário via requisição POST, incluindo id, nome, email e senha.
     * Busca o usuário pelo id informado. Caso não seja encontrado, redireciona para a home com mensagem de erro.
     * Atualiza o nome e email do usuário. Se uma nova senha for fornecida, ela é criptografada antes de ser salva.
     * Salva as alterações no banco de dados e redireciona para a home.
     * Em caso de erro, retorna uma mensagem de erro.
     *
     * @param  \Illuminate\Http\Request  $request  Requisição contendo os dados do usuário a serem atualizados.
     * @return \Illuminate\Http\RedirectResponse|string  Redireciona para a home ou retorna mensagem de erro.
     */
    public function postEdicao(Request $request)    {
        $usuario_update = $request->only(['id', 'nome', 'email', 'senha']);

        try {
            $usuario = Usuario::find($usuario_update['id']);
            if (!$usuario) {
                return redirect(route('home'))->withErrors(['Usuário não encontrado.']);
            }
            $usuario->nome = $usuario_update['nome'];
            $usuario->email = $usuario_update['email'];
            if (!empty($usuario_update['senha'])) {
                $usuario->password = bcrypt($usuario_update['senha']); // Criptografando a nova senha
            }
            $usuario->save();
            return redirect(route('home'));
        } catch (Exception $e) {
            return "Erro ao editar usuário: " . $e->getMessage();
        }
    }

    /**
     * Remove o usuário especificado do armazenamento.
     *
     * @param  int  $id  O ID do usuário a ser excluído.
     * @return \Illuminate\Http\RedirectResponse|string
     *
     * Tenta excluir o usuário com o ID fornecido. Em caso de sucesso, redireciona para a rota home.
     * Em caso de falha, retorna uma mensagem de erro com os detalhes da exceção.
     */
    public function delete($id)
    {
        $usuario = Usuario::find($id);
        try {
            $usuario->delete();
            return redirect(route('home'));
        } catch (Exception $e) {
            return "Erro ao excluir usuário." . $e->getMessage();
        }
    }


    /**
     * Exibe a lista de usuários cadastrados.
     *
     * Recupera todos os usuários do banco de dados e os passa para a view 'usuarios.index'.
     *
     * @return \Illuminate\View\View
     */
    public function listar()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', ['usuarios' => $usuarios]);
    }
}
