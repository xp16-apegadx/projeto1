<script src="<?=WWW?>dist/app.js"></script>

<!-- Inivio script do firebase -->
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
        ip = getUserIP();

        var usuario = {
            nome: nome,
            email: email,
            tipo: tipo,
            data: data
            // ,
            // ip: ip
        }
        
        if(nome != "" && email != ""){
            
            ref.push(usuario).then(function() {
                window.location.href = "https://google.com.br";
            });
        } else{
            alert("Campos nao podem ser vazios!");
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
    
    /**
     * carregamento da DOM
     */
    document.addEventListener("DOMContentLoaded", function () {
        
    });
</script>
<!-- fim script do firebase -->

</body>
</html> 
