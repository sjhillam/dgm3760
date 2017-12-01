<?php
	
// Delete Cookies
setcookie('username',' ',time()-3600);
setcookie('firstname',' ',time()-3600);
setcookie('lastname',' ',time()-3600);

// Redirect 
header('Location: login.php');

?>
