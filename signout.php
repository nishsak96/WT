<?php
	setcookie('login',0,time()-10);
	setcookie('add',0,time()-10);
	setcookie('name',0,time()-10);

	echo '<script>window.location.href="signin.php"</script>';
?>