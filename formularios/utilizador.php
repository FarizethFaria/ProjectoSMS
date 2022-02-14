<?php ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="button" form="form-utilizador" title="Salvar Utilizador" name="Salvar" id="Salvar" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="Retroceder" class="btn btn-default"><i class="fa fa-reply"></i></a>
      </div>
      <h1><?php echo $title; ?></h1>
<ul class="breadcrumb">
    <li><a href="">Principal</a></li>
    <li><a href="<?php echo $actual;?>"><?php echo $title; ?></a></li>
</ul>
</div>
</div>
<div class="container-fluid info">
    <?php if(isset($error)) { ?>
        <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error; ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    <?php } ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_form; ?></h3>
        </div>
        <div class="panel-body">
            <form method="post" enctype="multipart/form-data" name="form-utilizador" id="form-utilizador" class="form-horizontal">
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="nome">Nome Completo</label>
                    <div class="col-sm-6">
                        <input type="text" name="nome" value="<?=$nome; ?>" placeholder="Nome Completo do Funcionário" id="nome" class="form-control" />
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="utilizador">Nome de Utilizador</label>
                    <div class="col-sm-6">
                        <input type="text" name="utilizador" value="<?= $utilizador; ?>" placeholder="Nome de Utilizador" id="utilizador" class="form-control" />
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" style="font-weight: bold">Níveis de Acesso</label>
                    <div class="col-sm-6">
                        <div class="well well-sm" style="height: 90px">
                            <div class="checkbox">
                                <?php foreach($usuariosObj ->usuariosNiveis() as $niveil){
                                    if($niveil['id']>=$usuariosObj->logado($_SESSION['on-sap'])[2]): ?>
                                    <label style="margin-left: 10px">
                                        <?php if($niveil['id']==$nivel): ?>
                                            <input type="radio" class="nivel" checked name="nivel[]" id="nivel[]" value="<?=$niveil['id'];?>"/><?=' '.$niveil['descricao'];?>
                                        <?php else: ?>
                                            <input type="radio" class="nivel" name="nivel[]" id="nivel[]" value="<?=$niveil['id'];?>"/><?=' '.$niveil['descricao'];?>
                                        <?php endif; ?>
                                    </label>
                                <?php endif; } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    $('#Salvar').on('click', function() {
        var codigo = '<?php echo $codigo; ?>';
        var button =  $("#Salvar").submit;
        $.ajax({
            url: 'raiz/control/operacoes.php?usuario='+button+'&id='+codigo,
            type: 'post',
            dataType: 'json',
            data: new FormData($('#form-utilizador')[0]),
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('#Salvar i').replaceWith('<i class="fa fa-circle-o-notch fa-spin"></i>');
                $('#Salvar').prop('disabled', true);
            },
            complete: function () {
                $('#Salvar i').replaceWith('<i class="fa fa-save"></i>');
                $('#Salvar').prop('disabled', false);
            },
            success: function (json) {
                if(codigo==''){
                    window.location.reload();
                    $('.alert, .text-danger').remove();
                    $('#content > .info').prepend('<div class="alert alert-success"><i class="fa fa-check-circle"></i>'+json+'<button type="button" class="close" title="Fechar Janela" data-dismiss="alert">&times;</button></div>');
                }else{
                    window.location.href='<?php echo $cancel;?>&sucesso='+json;
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                $('.alert, .text-danger').remove();
                $('#content > .info').prepend('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i>'+xhr.responseText+'<button type="button" data-toggle="tooltip" class="close" title="Fechar Caixa de Informação" data-dismiss="alert">&times;</button></div>');
            }
        });
    });

    $("#nome").keyup(function(){
      var nome     = $(this).val();
      var newnome  = nome.trim();
      var userArray= newnome.split(" ");
      var userPri  = userArray.shift();
      var apelido  = userArray.pop();
      var usuario  = userPri+"."+apelido;
      if(apelido===undefined || apelido == ""){
        $( "#utilizador").val(userPri);
      }else{
        $( "#utilizador").val(usuario);
      }
    });
</script>
