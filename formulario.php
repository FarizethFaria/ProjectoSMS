<html>
    <head>
        <link rel="stylesheet" href="css/estilo.css" type="text/css">
    	
        <title>Formulário de Cadastro</title>
    </head>
    <body>
	<div class="topo">
            <h1 class="centro">Formulário de Cadastro</h1>
		</div>
		<div class="menu">
			<ul class ="ul dir">
                <li><a href="./index.php">Iniciar sessão</a></li>
                <li><a href="formsap.php">Cadastrar</a></li>
            </ul>
		</div>
		<div class="form">
			<form action="" method="post" enctype="multipart/form-data" id="form-aluno" class="form-horizontal">
                    <div class="form-group">
                      <h3>Aluno</h3>
                        <label class="col-sm-2 control-label" for="nome">Nome:</label>
                        <label><input type="text" name="nome" value="" placeholder="Nome" id="nome" class="form-control" required/></label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="nome">Encarregado:</label>
                        <label><input type="text" name="encarregado" value="" placeholder="Encarregado" id="encarregado" class="form-control" required/></label>
                    </div>
                      <div class="form-group"><div class="form-group">
                        <label class="col-sm-2 control-label">Contactos:</label>
                        <label><input type="radio" class="contacto" name="contacto" value="1" checked="checked"/>Contacto 1</label>
                        <label><input type="radio" class="contacto" name="contacto" value="2" />Contacto 2</label>
                        </div>
                        <div class="form-group"><div class="form-group">
                          <label class="col-sm-2 control-label">Classe:</label>
                          <label><input type="radio" class="classe" name="classe" value="10" checked="checked"/>10ª</label>
                          <label><input type="radio" class="classe" name="classe" value="11" />11ª</label>
                          <label><input type="radio" class="classe" name="classe" value="12" />12ª</label>
                          <label><input type="radio" class="classe" name="classe" value="13" />13ª</label>
                        </div>
                          <div class="form-group required">
                          <label class="col-sm-2 control-label">Curso:</label>
                          <label><input type="radio" class="curso" name="curso" value="INF" checked="checked"/> Técnico de Informática</label>
                          <label><input type="radio" class="curso" name="curso" value="CG" /> Contabilidade e Gestão</label>
                          <label><input type="radio" class="curso" name="curso" value="OCC" /> Obras de Contrução Cívil</label>
                        </div>
                      </div>
                      <div class="form-group">
                          <input type="submit" name="enviar" value="Enviar" id="enviar" class="form-control" />
                      </div>
</form>
<form action="" method="post" enctype="multipart/form-data" id="form-aluno" class="form-horizontal">
                      <div class="form-group required">
                        <h3>Curso</h3>
                          <label class="col-sm-2 control-label">Curso</label>
                          <label><input type="radio" class="curso" name="curso" value="INF" checked="checked"/> Técnico de Informática</label>
                          <label><input type="radio" class="curso" name="curso" value="CG" /> Contabilidade e Gestão</label>
                          <label><input type="radio" class="curso" name="curso" value="OCC" /> Obras de Contrução Cívil</label>
                        </div>
                      <div class="form-group">
                          <input type="submit" name="enviar" value="Enviar" id="enviar" class="form-control" />
                      </div>
</form>
<form action="" method="post" enctype="multipart/form-data" id="form-aluno" class="form-horizontal">
                    <div class="form-group">
                      <h3>Funcionário</h3>
                        <label class="col-sm-2 control-label" for="nome">Nome:</label>
                        <label><input type="text" name="nome" value="" placeholder="Nome" id="nome" class="form-control" required/></label>
                    </div>
                    <div class="form-group">

                        <label class="col-sm-2 control-label" for="nome">Categoria:</label>

                          <select name="categoria" id="categoria">

                            <option value="direccao">Direcção</option>
                            <option value="limpeza">Limpeza</option>
                            <option value="aux_educ">Auxiliar Educativo</option>
                            <option value="motorista">Motorista</option>
                            <option value="professor">Professor</option>
                            <option value="seguraca">Segurança</option>
                            
                          </select>
                    </div>
                      <div class="form-group"><div class="form-group">
                        <label class="col-sm-2 control-label">Contactos:</label>
                        <label><input type="radio" class="contacto" name="contacto" value="1" checked="checked"/>Contacto 1</label>
                        <label><input type="radio" class="contacto" name="contacto" value="2" />Contacto 2</label>
                        </div>
                      <div class="form-group">
                          <input type="submit" name="enviar" value="Enviar" id="enviar" class="form-control" />
                      </div>
</form>
<form action="" method="post" enctype="multipart/form-data" id="form-aluno" class="form-horizontal">
                    <div class="form-group">
                      <h3>Encarregado</h3>
                        <label class="col-sm-2 control-label" for="nome">Nome:</label>
                        <label><input type="text" name="nome" value="" placeholder="Nome" id="nome" class="form-control" required/></label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="nome">Aluno:</label>
                        <label><input type="text" name="aluno" value="" placeholder="Aluno" id="aluno" class="form-control" required/></label>
                    </div>
                      <div class="form-group"><div class="form-group">
                        <label class="col-sm-2 control-label">Contactos:</label>
                        <label><input type="radio" class="contacto" name="contacto" value="1" checked="checked"/>Contacto 1</label>
                        <label><input type="radio" class="contacto" name="contacto" value="2" />Contacto 2</label>
                        </div>
                      <div class="form-group">
                          <input type="submit" name="enviar" value="Enviar" id="enviar" class="form-control" />
                      </div>     
</form>
<form action="" method="post" enctype="multipart/form-data" id="form-aluno" class="form-horizontal">
                    <div class="form-group">
                      <h3>Contactos</h3>
                      <div class="form-group"><div class="form-group">
                        
                        <label>Contacto 1: <input type="tel" class="contacto" name="contacto" value="+244" checked="checked"/></label>
                        <label>Contacto 2: <input type="tel" class="contacto" name="contacto" value="+244" /></label>
                        </div>
                      <div class="form-group">
                          <input type="submit" name="enviar" value="Enviar" id="enviar" class="form-control" />
                      </div>     
</form>
<form action="" method="post" enctype="multipart/form-data" id="form-aluno" class="form-horizontal">
                      <div class="form-group">
                    </div>  
                      <div class="form-group">
                      <h3>Fornecedor</h3>
                        <label class="col-sm-2 control-label" for="nome">Nome:</label>
                        <label><input type="text" name="nome" value="" placeholder="Nome" id="nome" class="form-control" required/></label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="nome">Descrição:</label>
                        <label><input type="text" name="descricao" value="" placeholder="Descrição" id="descricao" class="form-control" required/></label>
                    </div>
                      <div class="form-group"><div class="form-group">
                       
                        <label>Contacto 1: <input type="tel" class="contacto" name="contacto" value="+244" checked="checked"/></label>
                        <label>Contacto 2: <input type="tel" class="contacto" name="contacto" value="+244" /></label>
                        </div>
                      <div class="form-group">
                          <input type="submit" name="enviar" value="Enviar" id="enviar" class="form-control" />
                      </div>     
</form>
<form action="" method="post" enctype="multipart/form-data" id="form-aluno" class="form-horizontal">
                    <div class="form-group">
                    </div>
                    <div class="form-group">
                    <h3>Nível de Acesso</h3>
                        <label class="col-sm-2 control-label" for="nome">Nível</label>

                          <select name="categoria" id="categoria">

                            <option value="administrador">Administrador</option>
                            <option value="basico">Básico</option>
                          </select>
                    </div>
                    <div class="form-group">
                          <input type="submit" name="enviar" value="Enviar" id="enviar" class="form-control" />
                      </div> 
</form>
<form action="" method="post" enctype="multipart/form-data" id="form-aluno" class="form-horizontal">
                    <div class="form-group">
                    </div>
                    <div class="form-group">
                    <h3>Modelo de mensagem</h3>
                        <label class="col-sm-2 control-label" for="nome">Modelo</label>

                          <select name="categoria" id="categoria">

                            <option value="convocatoria">Convocatoria</option>
                            <option value="comunicado">Comunicado</option>
                            <option value="convite">Convite</option>
                          </select>
                    </div>
                    <textarea name="sms" id="sms" placeholder="Digite a sua mensagem" cols="30" rows="10"></textarea>
                    <div class="form-group">
                          <input type="submit" name="enviar" value="Enviar" id="enviar" class="form-control" />
                      </div> 
</form>

    </body>
</html> 
