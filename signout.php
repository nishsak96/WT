<?php
	setcookie('login',0,time()-10);

	echo '<script>window.location.href="signin.php"</script>';
?>