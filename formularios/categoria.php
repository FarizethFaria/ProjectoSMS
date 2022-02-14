<?php

;

$ordem     ='';
$nome      ='';
$titulo    ='';
$link      ='';
$icone     ='';
$uri       = $_SERVER['HTTP_REFERER'];
$codigo    = '';
$permissao = array();
if(isset($_REQUEST['categoria'])):
    $codigo    = $_REQUEST['categoria'];
    foreach ($configur->CategoriaId($codigo) as $value);
    $ordem     = $value['ordem'];
    $nome      = $value['nome'];
    $titulo    = $value['titulo'];
    $icone     = $value['icone'];
    $link      = $value['link'];
endif;
?>
<div id="modal-dialog" class="modal-dialog">
  <div id="content" class="modal-content">
    <div class="modal-header">
      <button type="button" title="Fechar" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title"><i class="fa fa-cog"></i> Formulário da Categoria</h4>
    </div>
    <div class="container-fluid" style=" padding-right: 15px;
  padding-top: 10px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;">
          <div class="pull-right">
              <button type="button" id="save" style="cursor: pointer" class="btn btn-info" form="anosave"><i class="fa fa-save"></i></button>
          </div>
          <h1><?php echo $_REQUEST['title'];?> Pagina</h1>
        </div>
        <div class="container-fluid">
          <form method="post" id="anosave" class="form-horizontal">
              <div class="form-group required">
                  <label class="col-sm-3 control-label">Ordem</label>
                  <div class="col-sm-8">
                      <input type="txt" name="ordem" placeholder="Ordem" value="<?php echo $ordem;?>" class="form-control" />
                  </div>
              </div>
              <div class="form-group required">
                  <label class="col-sm-3 control-label">Nome da Categoria</label>
                  <div class="col-sm-8">
                      <input type="txt" name="nome" placeholder="Nome da Categoria" value="<?php echo $nome;?>" class="form-control" />
                  </div>
              </div>
              <div class="form-group required">
                  <label class="col-sm-3 control-label">Título</label>
                  <div class="col-sm-8">
                      <input type="txt" name="titulo" placeholder="Título da Categoria" value="<?php echo $titulo;?>" class="form-control" />
                  </div>
              </div>
              <div class="form-group required">
                  <label class="col-sm-3 control-label">Icone</label>
                  <div class="col-sm-8">
                      <input type="text" name="icone" placeholder="ICONE" value="<?php echo $icone;?>" class="form-control" />
                  </div>
              </div>

              <div class="form-group required">
                  <label class="col-sm-3 control-label">Url</label>
                  <div class="col-sm-8">
                      <input type="text" name="link" placeholder="Link" value="<?php echo $link;?>" class="form-control" />
                  </div>
              </div>
          </form>
      </div>
  </div>
</div>
<script type="text/javascript">
  $('#save').on('click', function() {
    var pagina = "<?php echo $codigo; ?>";
    var button =  $("#save").submit;
    $.ajax({
      url: 'raiz/control/categoria.php?btn='+button+'&codigo='+pagina,
      type: 'post',
      dataType: 'json',
      data: new FormData($('#anosave')[0]),
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
</script>
