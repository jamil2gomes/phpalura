<h1>Tarefa: <?=$tarefa['nome']?></h1>

<p>
    <strong>Concluída:</strong>
    <?=traduz_concluida($tarefa['concluida'])?>
</p>

<p>
    <strong>Descrição:</strong>    
    <?=$tarefa['descricao']?>
</p>

<p>
    <strong>Prazo:</strong>   
    <?=traduz_data_para_exibir($tarefa['prazo'])?>
</p>

<p>
    <strong>Prioridade:</strong>    
    <?=traduz_prioridade($tarefa['prioridade'])?>
</p>

<p>
    <?php if (count($anexos) > 0) : ?>  
      <p><strong>Atenção!</strong> Esta tarefa contém anexos!</p>
    <?php endif; ?>
</p>

<p>
    Tenha um bom dia!
</p>