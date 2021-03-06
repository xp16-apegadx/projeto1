
<h5 class="card-title text-center">Inscreva-se</h5>
<form id="form-cadastro" method="POST">
    <div class="form-label-group">
        <label for="inputNome">Nome</label>
        <input type="text" id="inputNome" class="form-control" placeholder="Seu nome" required />                
    </div>
    <div class="form-label-group mb-3 mt-3">
        <label for="inputEmail">E-mail</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Seu melhor e-mail" required />                
    </div>
    <div class="form-check-inline">
        <label class="form-check-label" for="inputB2C">
            <input type="radio" class="form-check-input" id="inputB2C" name="tipo" value="B2C" checked />Sou motorista
        </label>
    </div>
    <div class="form-check-inline">
        <label class="form-check-label" for="inputB2B">
            <input type="radio" class="form-check-input" id="inputB2B" name="tipo" value="B2B" />Sou transportadora
        </label>
    </div>                        
    <br/>
    <button class="btn btn-success btn-block mt-4" id="btn-cadastrar" onclick= "cadastrarUsuario()">Quero receber novidades</button>
</form>
