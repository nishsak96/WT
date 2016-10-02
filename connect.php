<?php
	ob_start();
	$dbconnnect=@mysql_connect('localhost','root','');
	if(!$dbconnnect)
	{
		die("Not connected");
	}
	
	$dbselect=@mysql_select_db('reservationportal',$dbconnnect);
	if(!$dbselect)
	{
		die("Database cannot be accessed!");
	}
?>