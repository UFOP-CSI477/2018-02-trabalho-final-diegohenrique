<?php 
 include_once('funcoes.php');
 cabecalho();
 ?>
      <section class="jumbotron">
        <div class="container">
          <h1>Bem vindo ao BrasFut</h1>
          <p>Sua loja de Camisas Online.</p>
        </div>  
      </section>
		
		<section>
			<div class="container">
				   
				<div class="page-header">
				    <h1>Formulário de Contato</h1>
				</div>

				<div class="row">
				     
				    <div class="col-md-8">
				       <h4>Informe corretamente seus dados para entrar em contato</h4>
				       
				       <form method="POST" action="enviarEmail.php">				         
				         <div class="form-group">
				           <label for="nome">Nome</label>
				           <input type="text" class="form-control" id="nome" placeholder="Digite seu nome">
				         </div>

				         <div class="form-group">
				           <label for="email">Email</label>
				           <input type="email" class="form-control" id="email" placeholder="example@example.com" required>
				         </div>
							
						<div class="form-group">
						  <label for="assunto">Assunto</label>
						  <input type="text" class="form-control" id="assunto" placeholder="Assunto">
						</div>

				         <div class="form-group">
				           <label for="mensagem">Mensagem:</label>
				           <textarea class="form-control" rows="5" id="mensagem" required></textarea>
				         </div>

						<input type="submit" class="btn btn-primary" value="Enviar" required>

						</form>
					</div>
				</div>
			</div>
		</section>			
	<?php 
		rodape();
	 ?>