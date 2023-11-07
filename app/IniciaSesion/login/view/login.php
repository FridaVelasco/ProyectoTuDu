<?php 
    if (isset($fallo)) {
        echo "
            <div class='error-container'>
                <div id='alerta' class='alert alert-danger fade show'>
                    <strong> Calale de nuevo perro:</strong>{$fallo}
                </div>
            </div>
        ";
    }
?>

	
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>

			<div class="login">
				<form action ="" method="POST">
					<label for="chk" aria-hidden="true">Login</label>
					<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ingresa tu correo: </h4>
					<input type="email" name="email" placeholder="CORREO" required="">
					<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ingresa tu contaseña: </h4>
					<input type="password" name="pswd" placeholder="CONTRASEÑA" required="">
					<button type ="submit">Login</button>
					<br>
					<br>
					<div class="centrarTexto">
						<a  text-aling="center" href="/MVC/signup" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Deseas Registrarte  Has Click Aqui&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
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