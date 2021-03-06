<?php
    if(isset($_GET['id'])){
        $id = intval($_GET['id']);
        $dados = Painel::select("tb_site.servico", 'id = ?',$id);
    }else{
        Painel::alert('erro', 'Ocorreu Um Erro');
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-servico'); 
    }
?>

<div class="box-container w100">
    <h2 class="title"><i class="far fa-edit"></i> Editar Depoimento</h2>
    <hr>

    <form action="" method="post" enctype="multipart/form-data" id="editar-usuario">
 <?php
    if(isset($_POST['acao'])){
        if(Painel::update($_POST)){
           Painel::alert('sucesso', 'Depoimento Editado com Sucesso');
           $dados = Painel::select("tb_site.servico", 'id = ?',$id);
        }else{
            Painel::alert('erro', 'Ocorreu um Erro ao Editado'); 
        }
        
    }
 ?>
 <?php
    
    ?>
        <div class="box-form">
            <label for="nome">Nome:</label>
            <input type="text" name="servico" id="nome" value="<?php echo $dados['servico'] ?>">
        </div>
        <div class="box-form">
            <label for="mensagem">Mensagem:</label>
            <textarea name="descricao" id="mensagem" cols="30" rows="10" ><?php echo $dados['descricao'] ?></textarea>
        </div>
        
        <div class="box-form">
            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>"> 
            <input type="hidden" name="nome_tabela" value="tb_site.servico">        
            <input type="submit" name="acao" value="Editar">
        </div>
    </form>
</div>

