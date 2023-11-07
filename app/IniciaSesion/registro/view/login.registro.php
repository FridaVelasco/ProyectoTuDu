<?php 
    if (isset($fallo)) {
        echo "
            <div class='error-container'>
                <div id='alerta' class='alert alert-danger fade show'>
                    <strong>Calale de nuevo perro: </strong>{$fallo}
                </div>
            </div>
        ";
    }
?>	
	<link rel="stylesheet" href="./style.css">
	<!-- <img  src="/mvc/descarga.jpeg" > -->
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form  action ="" method="POST">
					<label for="chk" aria-hidden="true">Sign up</label>
					<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ingresa tu nombre: </h4>
					<input type="text" name="txt" placeholder="NOMBRE DE USUARIO" required="">
					<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ingresa tu correo: </h4>
					<input type="email" name="email" placeholder="CORREO" required="">
					<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ingresa tu contraseña: </h4>
					<input type="password" name="pswd" placeholder="CONTRASEÑA" required="">
					<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Confirma tu contraseña: </h4>
                    <input type="password" name="confirmar" placeholder="CONFIRMA CONTRASEÑA" required="">
					<a href="/MVC/login"><button type ="submit">Sign Up</button></a>
				
					<div class="centrarTexto">
					<a href="/MVC/login">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Inicia sesión aquí&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
					</div>
				</form>
			</div>
			
	</div>

	<script>
	setTimeout(()=>{

let alerta = document.getElementById('alerta');
if (alerta) {
	
	alerta.remove();
}
},4000);

</script>