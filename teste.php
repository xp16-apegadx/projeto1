<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <form class="form-signin" id="form-cadastro" method="POST">
        <div class="form-label-group">
            <label for="inputNome">E-mail</label>
            <input type="text" id="inputNome" class="form-control" placeholder="Seu nome" required />                
        </div>
        <div class="form-label-group">
            <label for="inputEmail">E-mail</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="E-mail" required />                
        </div>
        <button class="btn btn-success mt-2" onclick="cadastrarUsuario()">Cadastrar</button>
    </form>

    <script src="https://www.gstatic.com/firebasejs/5.8.2/firebase.js"></script>
    <script>
    // Initialize Firebase
    var config = {
        apiKey: "AIzaSyAjzbgFnaWCdL4lGwuR8aW4wq1MQN6LemU",
        authDomain: "gama-xp16.firebaseapp.com",
        databaseURL: "https://gama-xp16.firebaseio.com",
        projectId: "gama-xp16",
        storageBucket: "gama-xp16.appspot.com",
        messagingSenderId: "212765571398"
    };
    firebase.initializeApp(config);
    </script>

    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
    
    var ref = firebase.database().ref("usuario/");
    var nome = $("#teste").val();
    var nome = $("#inputNome").val();
    var email = $("#inputEmail").val();

    function cadastrarUsuario() {
        var usuario = {
            nome: "Ernane Cipriano",
            email: "teste2@gmail.com"
        }
        alert(nome, email)

        // ref.child(usuario.nome).set(usuario)
        //     .then(function() {
        //         console.log(usuario);
        //     });
    }
    </script>
</body>
</html>