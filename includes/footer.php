<footer id="footer">
  <div class="container-fluid pt-4">
    <div class="row">
      <div class="col-md-4">
        <a href="/">
            <img src="<?=WWW?>img/logo_cabecalho.png" alt="Blog do Frete" title="Blog do Frete"  class="img-footer mb-3" />
        </a>
        <p class="text-white">O Blog do Frete vem com a missão de te manter atualizado sobre todas as novidades do transporte rodoviário de cargas no Brasil, com um olhar especial em carga fracionada!<br/>Acompanhe nosso conteúdo e esteja por dentro de todas as novidades desse setor!</p>
        
      </div>
      <div class="col-md-4">
        <h3 class="titulo-footer">SIGA-NOS</h3>
        <div class="separador"></div>
        <div class="justify-content-center">
          <a title="" href="https://www.facebook.com/Blog-do-Frete-313637669290024/?ref=br_rs" target="_blank" rel="noopener"><div class="fundo_icone_social">
            <img src="<?=WWW?>img/icon-f.png" class="icone_sociais" alt="Facebook Blog do Frete" title="Acesse nosso Facebook" />
          </div></a>
          <!-- <a title="" href="https://www.instagram.com/"><div class="fundo_icone_social">
            <img src="<?=WWW?>img/icon-i.png" class="icone_sociais" alt="" title="" />
          </div></a> -->
        </div>
      </div>
      <div class="col-md-4">
        <div>
          <h3 class="titulo-footer">INSCREVA-SE PARA RECEBER NOVIDADES!</h3>          
          <div class="separador"></div>          
            <a href="#" class="btn btn-primary" id="go-top" class="btn btn-primary">Inscreva-se</a>
            <a class="text-white d-block mt-4" href="mailto:contato@blogdofrete.com.br"  title="Envie-nos um e-mail"><i class="fa fa-envelope"></i> contato@blogdofrete.com.br</a>
        </div>
      </div>
    </div>
  </div>
</footer>

<script src="<?=WWW?>dist/app.js"></script>

<!-- Inivio script do firebase -->
<script src="https://www.gstatic.com/firebasejs/5.8.2/firebase.js"></script>
<script>
    function getUserIP(onNewIP) { //  onNewIp - your listener function for new IPs
        //compatibility for firefox and chrome
        var myPeerConnection = window.RTCPeerConnection || window.mozRTCPeerConnection || window.webkitRTCPeerConnection;
        var pc = new myPeerConnection({
            iceServers: []
        }),
        noop = function() {},
        localIPs = {},
        ipRegex = /([0-9]{1,3}(\.[0-9]{1,3}){3}|[a-f0-9]{1,4}(:[a-f0-9]{1,4}){7})/g,
        key;

        function iterateIP(ip) {
            if (!localIPs[ip]) onNewIP(ip);
            localIPs[ip] = true;
        }

        //create a bogus data channel
        pc.createDataChannel("");

        // create offer and set local description
        pc.createOffer(function(sdp) {
            sdp.sdp.split('\n').forEach(function(line) {
                if (line.indexOf('candidate') < 0) return;
                line.match(ipRegex).forEach(iterateIP);
            });

            pc.setLocalDescription(sdp, noop, noop);
        }, noop); 

        //listen for candidate events
        pc.onicecandidate = function(ice) {
            if (!ice || !ice.candidate || !ice.candidate.candidate || !ice.candidate.candidate.match(ipRegex)) return;
            ice.candidate.candidate.match(ipRegex).forEach(iterateIP);
        };
    }


    function setIpInLocalStorage(){
        getUserIP(function(ip){
            localStorage.setItem("ipAddress", ip);
        });
    }

    setIpInLocalStorage();    
    
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
  
    var ref = firebase.database().ref("usuario/");

    function cadastrarUsuario() {
        var campoNome = $("#inputNome");
        var nome = campoNome.val();
        var campoEmail = $("#inputEmail");
        var email = campoEmail.val();
        var campoTipo = $("input[name='tipo']");
        var tipo = campoTipo.val();
        var now = new Date();
        var ano = now.getFullYear();
        var mes = now.getMonth()+1;
        var dia = now.getDate();
        var hora = now.getHours();
        var minuto = now.getMinutes();
        var segundo = now.getSeconds();
        var data = `${ano}-${mes}-${dia} ${hora}:${minuto}:${segundo}`;
        var ip = localStorage.getItem("ipAddress");

        var usuario = {
            nome: nome,
            email: email,
            tipo: tipo,
            data: data,
            ip: ip
        }        
        
        if(nome != "" && email != ""){            
            ref.push(usuario).then(function() {
                window.location.href = "http://blogdofrete.com.br/sucesso.php";
            });
        } else{
            alert("Campos não podem ser vazios!");
        }
    }
    
    function getUserIP(onNewIP) {
	    var myPeerConnection = window.RTCPeerConnection || window.mozRTCPeerConnection || window.webkitRTCPeerConnection;
	    var pc = new myPeerConnection({
	    	iceServers: []
	    }),
	    noop = function() {},
	    localIPs = {},
	    ipRegex = /([0-9]{1,3}(\.[0-9]{1,3}){3}|[a-f0-9]{1,4}(:[a-f0-9]{1,4}){7})/g,
	    key;

	    function iterateIP(ip) {
	    	if (!localIPs[ip]) onNewIP(ip);
	    	localIPs[ip] = true;
	    }

	     //create a bogus data channel
	     pc.createDataChannel("");

	    // create offer and set local description
	    pc.createOffer().then(function(sdp) {
	    	sdp.sdp.split('\n').forEach(function(line) {
	    		if (line.indexOf('candidate') < 0) return;
	    		line.match(ipRegex).forEach(iterateIP);
	    	});
	    	
	    	pc.setLocalDescription(sdp, noop, noop);
	    }).catch(function(reason) {
	    	alert("Falha de conexão");
	    });

	    //listen for candidate events
	    pc.onicecandidate = function(ice) {
	    	if (!ice || !ice.candidate || !ice.candidate.candidate || !ice.candidate.candidate.match(ipRegex)) return;
	    	ice.candidate.candidate.match(ipRegex).forEach(iterateIP);
	    };
	}

	getUserIP(function(ip){
		return ip;
    });
    
    document.addEventListener("DOMContentLoaded", function () {
        
    });
    $('#go-top').click(function(){
        $('html, body').animate({scrollTop : 0},900);
        return false;
    });
</script>
<!-- fim script do firebase -->
<script>
  (function (w,i,d,g,e,t,s) {w[d] = w[d]||[];t= i.createElement(g);
    t.async=1;t.src=e;s=i.getElementsByTagName(g)[0];s.parentNode.insertBefore(t, s);
  })(window, document, '_gscq','script','//widgets.getsitecontrol.com/175470/script.js');
</script>
</body>
</html> 
