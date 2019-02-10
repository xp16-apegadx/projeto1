<?php require_once("includes/header.php")?>
<div class="bg-gradient">
    <div class="container">
        <div class="row align-items-center justify-content-center" style="min-height: 100vh">
        <div class="col-md-5 col-12">
        <img src="<?=WWW?>img/logo-pack-log.png" alt="Logo Pack Log" title="Logo Pack Log" class="mx-auto d-block mb-3" />
            <div class="card card-signin">                        
                <div class="card-body">
                    <h5 class="card-title text-center">Login</h5>
                    <form class="form-signin">
                    <div class="form-label-group">
                        <label for="inputEmail">E-mail</label>
                        <input type="email" id="inputEmail" class="form-control" placeholder="E-mail" required autofocus />                
                    </div>
                    <div class="form-label-group mt-2">
                        <label for="inputPassword">Senha</label>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required />                
                    </div>
                    <button class="btn btn-primary btn-block text-uppercase mt-3" type="submit">Entrar</button>
                    </form>
                </div>          
            </div>
            <p class="text-center text-white mt-2">by APEGADX - XP#16<i class="fa fa-user"></i></p>
        </div>      
        <!-- /.col-12 -->
        </div>
        <!-- /.row -->

    </div>
</div>

<?php require_once("includes/footer.php")?>