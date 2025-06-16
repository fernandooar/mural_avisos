<?php

namespace App\Http\Controllers;

use App\Models\Aviso;
use Exception;
use Illuminate\Http\Request;

class AvisoController extends Controller
{
    /**
     * Dentro do controller diversas operações de crud e redirecionamento para as views
     * e também validações
     */
    public function cadastro()
    {
        return view('avisos.cadastrar');
    }

    /**
     * Manipula a requisição POST para criar um novo "Aviso".
     *
     * Valida e recupera os dados do formulário da requisição, cria um novo registro de Aviso
     * e redireciona para a rota home em caso de sucesso. Se ocorrer uma exceção durante o
     * processo, retorna uma mensagem de erro com os detalhes da exceção.
     *
     * @param  \Illuminate\Http\Request  $request  A requisição HTTP contendo os dados do aviso.
     * @return \Illuminate\Http\RedirectResponse|string  Redireciona para home em caso de sucesso ou retorna uma mensagem de erro em caso de falha.
     */
    public function postCadastro(Request $request)
    {
        $dados = [
            'titulo' => $request->titulo, 
            'descricao' => $request->descricao,
            'link' => $request->link,
            'id_usuario' =>1
        ];

        try {
            $aviso = Aviso::create($dados);
            $aviso->save();
            return redirect(route('home'));
        } catch (Exception $e) {
            return "Erro ao cadastrar aviso." . $e->getMessage();
        }
    }

    /**
     * Exibe o formulário de edição para um aviso específico.
     *
     * @param int $id O ID do aviso a ser editado.
     * @return \Illuminate\View\View A view de edição do aviso com os dados preenchidos.
     */
    public function edicao($id)
    {
        $aviso = Aviso::find($id);
     
        
        $dados = [
            'id' => $aviso->id,
            'titulo' => $aviso->titulo,
            'descricao' => $aviso->descricao,
            'link' => $aviso->link,
            'id_usuario' => $aviso->id_usuario
        ];
        
        return view('avisos.editar', ['dados' => $dados]);
    }


  
    /**
     * Manipula a requisição POST para editar um "Aviso" existente.
     *
     * Este método recebe os dados da requisição, encontra o Aviso correspondente pelo ID,
     * atualiza o título, descrição e link, e salva as alterações no banco de dados.
     * Se a atualização for bem-sucedida, redireciona para a rota home.
     * Se ocorrer um erro durante o processo de atualização, retorna uma mensagem de erro.
     *
     * @param \Illuminate\Http\Request $request A requisição HTTP contendo os dados do aviso a serem atualizados.
     * @return \Illuminate\Http\RedirectResponse|string Redireciona para home em caso de sucesso ou retorna uma mensagem de erro em caso de falha.
     */
    public function postEdicao (Request $request)
    {
        $aviso_update = $request->only(['id', 'titulo', 'descricao', 'link', 'id_usuario']);
        
        try {           
            $aviso = Aviso::find($aviso_update['id']);
            $aviso->titulo = $aviso_update['titulo'];
            $aviso->descricao = $aviso_update['descricao'];
            $aviso->link = $aviso_update['link'];
            $aviso->save();

            return redirect(route('home'));
        } catch (Exception $e) {
            return "Erro ao atualizar aviso." . $e->getMessage();
        }
    }

    /**
     * Remove o aviso especificado do banco de dados.
     *
     * @param  int  $id  O ID do aviso a ser excluído.
     * @return \Illuminate\Http\RedirectResponse|string
     *
     * Tenta encontrar e excluir o aviso com o ID fornecido.
     * Em caso de sucesso, redireciona para a rota home.
     * Em caso de falha, retorna uma mensagem de erro com os detalhes da exceção.
     */
    public function delete($id)
    {
        $aviso = Aviso::find($id);
        try {
            $aviso->delete();
            return redirect(route('home'));

        } catch (Exception $e) {
            return "Erro ao excluir aviso." . $e->getMessage();
        }
    }

}
