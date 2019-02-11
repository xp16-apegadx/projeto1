<?php require_once("includes/header.php")?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-signin py-3">  
                <div class="card-body">
                    <h5 class="card-title text-center">Cadastrar e-mail</h5>
                    <form id="form-cadastro" method="POST">
                        <div class="form-label-group">
                            <label for="inputNome">E-mail</label>
                            <input type="text" id="inputNome" class="form-control" placeholder="Seu nome" required />                
                        </div>
                        <div class="form-label-group mb-3">
                            <label for="inputEmail">E-mail</label>
                            <input type="email" id="inputEmail" class="form-control" placeholder="E-mail" required />                
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label" for="inputB2C">
                                <input type="radio" class="form-check-input" id="inputB2C" name="tipo" value="B2C" checked />Consumidor
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label" for="inputB2B">
                                <input type="radio" class="form-check-input" id="inputB2B" name="tipo" value="B2B" />Empresa
                            </label>
                        </div>                        
                        <br/>
                        <button class="btn btn-success mt-2" id="btn-cadastrar" onclick= "cadastrarUsuario()">Cadastrar</button>
                    </form>
                </div>      
            </div>
        </div>
    </div>
</div>

<?php require_once("includes/footer.php")?>