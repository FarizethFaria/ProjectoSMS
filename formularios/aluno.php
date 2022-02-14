<?php
";

$codigo    = '';
$nome      ='';
$bi        ='';
$genero    ='';
$dataNasc  ='';
$curso_id  ='';
$curso     ='';
$utilizador='';
$nivel     ='';
$uri       = $_SERVER['HTTP_REFERER'];

if(isset($_REQUEST['prof'])):
    $codigo    = $_REQUEST['prof'];
    foreach ($alunoObj -> pesquisarId($codigo) as $value);
    $nome        = $value['nome'];
    $genero      = $value['genero'];
    $bi          = $value['bi'];
    $dataNasc    = $value['data_nascimento'];
	$curso_id    = $value['curso'];
	$curso       = $value['CR'];
endif;

?>
<div id="modal-dialog" class="modal-dialog">
  <div id="content" class="modal-content">
    <div class="modal-header">
      <button type="button" title="Fechar" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title"><i class="fa fa-cog"></i> Formulário do Aluno</h4>
    </div>
    <div class="container-fluid" style="padding-right:15px;padding-top:10px; padding-left:15px;margin-right: auto;margin-left: auto;">
          <div class="pull-right">
              <button type="button" id="save" style="cursor: pointer" class="btn btn-info" form="form-professor"><i class="fa fa-save"></i></button>
          </div>
          <h1><?=$_REQUEST['title'];?> Aluno</h1>
        </div>
        <div class="container-fluid">
          <form method="post" id="form-professor" class="form-horizontal">
              <div class="form-group required">
                  <label class="col-sm-3 control-label">Nome Completo</label>
                  <div class="col-sm-8">
                      <input type="txt" name="nome" id="nome" placeholder="Aluno" value="<?=$nome;?>" class="form-control" />
                  </div>
              </div>
              <div class="form-group required">
                  <label class="col-sm-3 control-label">Género</label>
                      <div class="col-sm-8">
                        <div class="radio">
                          <?php if($genero==''){ ?>
                          <label><input type="radio" class="genero" name="genero" value="M" checked="checked"/> Masculino</label>
                          <label><input type="radio" class="genero" name="genero" value="F" /> Feminino</label>
                          <?php } else{ ?>
                          <?php if($genero=='M'){ ?>
                          <label><input type="radio" id="genero" name="genero" value="M" checked="checked"/> Masculino</label>
                          <label><input type="radio" id="genero" name="genero" value="F" /> Feminino</label>
                          <?php } else{ ?>
                          <label><input type="radio" id="genero" name="genero" value="M" /> Masculino</label>
                          <label><input type="radio" id="genero" name="genero" value="F" checked="checked"/> Feminino</label>
                        <?php }} ?>
                    </div>
                  </div>
              </div>
              <div class="form-group">
              <label class="col-sm-3 control-label" for="dataNasc">Data de Nascimento</label>
                <div class="col-sm-8">
                    <div class="input-group date">
                      <input type="text" name="dataNasc" value="<?= $dataNasc; ?>" placeholder="Data de Nascimento" data-date-format="DD-MM-YYYY" id="dataNasc" class="form-control" />
                      <span class="input-group-btn">
                      <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button></span>
                    </div>
                </div>
              </div>
              <div class="form-group required">
                  <label class="col-sm-3 control-label">BI</label>
                  <div class="col-sm-8">
                      <input type="txt" name="bi" placeholder="Bilhete de Identidade" value="<?=$bi;?>" class="form-control" />
                  </div>
              </div>
			  <div class="form-group required">
                   <label class="col-sm-3 control-label">Curso</label>
			       <div class="col-sm-8">
                     <select name="curso" id="curso" class="form-control" required="required">
                     <?php if ($curso_id!='') { ?>
                     <option value="<?=$curso_id;?>" selected="selected" ><?=$curso?></option>
                     <?php }  ?>
                     <option value="">Curso</option>
                     <?php foreach($cursoObj->Cursos() as $itens) { ?>
                     <option value="<?=$itens['id']?>"><?=$itens['nome']?></option>
                     <?php } ?>
                     </select>
                   </div>
              </div>
			  <div class="form-group required">
                    <label class="col-sm-3 control-label" for="utilizador">Nome de Utilizador</label>
                    <div class="col-sm-8">
                        <input type="text" name="utilizador" value="<?= $utilizador; ?>" placeholder="Nome de Utilizador" id="utilizador" class="form-control" />
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-3 control-label" style="font-weight: bold">Níveis de Acesso</label>
                    <div class="col-sm-8">
                        <div class="well well-sm" style="height: 50px">
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
<script type="text/javascript">
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

  $('#save').on('click', function() {
    var codigo = "<?= $codigo; ?>";
    var button =  $("#save").submit;
    $.ajax({
      url: 'raiz/control/operacoes-aluno.php?aluno-save='+button+'&codigo='+codigo,
      type: 'post',
      dataType: 'json',
      data: new FormData($('#form-professor')[0]),
      cache: false,
      contentType: false,
      processData: false,
      beforeSend: function () {
        $('#save i').replaceWith('<i class="fa fa-circle-o-notch fa-spin"></i>');
        $('#save').prop('disabled', true);
      },
      complete: function () {
        $('#save i').replaceWith('<i class="fa fa-edit"></i>');
        $('#save').prop('disabled', false);
      },
      success: function (json) {
        window.location.reload();
        $('.alert, .text-danger').remove();
        $('#content > .modal-header').prepend('<div class="alert alert-success"><i class="fa fa-check-circle"></i>'+json+'<button type="button" class="close" title="Fechar Janela" data-dismiss="alert">&times;</button></div>');
      },
      error: function(xhr, ajaxOptions, thrownError) {
        $('.alert, .text-danger').remove();
        $('#content > .modal-header').prepend('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i>'+xhr.responseText+'<button type="button" data-toggle="tooltip" class="close" title="Fechar Caixa de Informação" data-dismiss="alert">&times;</button></div>');
      }
    });
  });

  $('.date').datetimepicker({
    pickTime: false,
    language:"pt-PT"
});
</script>
