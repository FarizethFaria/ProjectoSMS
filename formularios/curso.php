<?php  ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="button" form="form-curso" title="Salvar Curso" name="Salvar" id="Salvar" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?=$cancel;?>" data-toggle="tooltip" title="Retroceder" class="btn btn-default"><i class="fa fa-reply"></i></a>
      </div>
    <h1><?=$title; ?></h1>
    <ul class="breadcrumb">
      <li><a href="">Principal</a></li>
      <li><a href="<?=$actual;?>"><?=$title; ?></a></li>
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
            <form method="post" name="form-curso" id="form-curso" class="form-horizontal">
                <div class="form-group required">
                    <label class="col-sm-3 control-label" for="curso">Turma</label>
                    <div class="col-sm-6">
                        <input type="text" name="curso" id="curso" value="<?= $curso; ?>" placeholder="Curso"  class="form-control" />
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-3 control-label" for="cordenador">Coodenador do Curso</label>
                    <div class="col-sm-6">
                        <select name="cordenador" id="cordenador" class="form-control">
                            <?php if($cordenador_id!=''):
                                echo '<option selected="selected" value="'.$cordenador_id.'">'.$cordenador.'</option>';
                            endif;?>
                            <option value="">Coodenador do Curso</option>
                            <?php
                            foreach($professorObj->pesquisarAll('1=1') as $result) { ?>
                            <option value="<?= $result['codigo']; ?>"><?= $result['nome']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="responsavel">Responsavel pelo Estágio</label>
                    <div class="col-sm-6">
                        <select name="responsavel" id="responsavel" class="form-control">
                            <?php if($responsavel_id!=''):
                            echo '<option selected="selected" value="'.$responsavel_id.'">'.$responsavel.'</option>';endif;?>
                            <option value="">Responsavel pelo Estágio</option>
                            <?php foreach($professorObj->pesquisarAll('1=1') as $result) { ?>
                            <option value="<?= $result['codigo']; ?>"><?= $result['nome']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <hr style="border:1px #CCC solid">
            </form>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    $('#Salvar').on('click', function() {
        var codigo = '<?=$codigo?>';
        var button =  $("#Salvar").submit;
        $.ajax({
            url: 'raiz/control/operacoes.php?curso-save='+button+'&id='+codigo,
            type: 'post',
            dataType: 'json',
            data: new FormData($('#form-curso')[0]),
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
                    window.location.href='<?= $cancel;?>&sucesso='+json;
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                $('.alert, .text-danger').remove();
                $('#content > .info').prepend('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i>'+xhr.responseText+'<button type="button" data-toggle="tooltip" class="close" title="Fechar Caixa de Informação" data-dismiss="alert">&times;</button></div>');
            }
        });
    });
</script>
