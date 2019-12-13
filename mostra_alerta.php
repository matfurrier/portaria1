<?php
session_start();

function mostraAlerta($tipo) {
	if(isset($_SESSION[$tipo])) {
?>
	<p class="text-center alert-<?= $tipo ?>"><?= $_SESSION[$tipo]?></p>
<?php
		unset($_SESSION[$tipo]);
	}
}