<?php
	setcookie('login',0,time()-10);
	setcookie('add',0,time()-10);
	setcookie('name',0,time()-10);
	setcookie('class',0,time()-10);
	setcookie('loginins',0,time()-10);
    setcookie('ins', 0, time()-10);
	echo '<script>window.location.href="signin.php"</script>';
?>