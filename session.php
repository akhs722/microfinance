<?php

if(isset($_SESSION['admin']))
  {
	if(isset($_SESSION['timea']))
	{
		if(time()- $_SESSION['timea']>900)
		{
			alert("Session Expired Login again...","-2");
		}
		else
			$_SESSION['timea'] = time();
	}
	else
		$_SESSION['timea'] = time();
}
else if(isset($_SESSION['username']))
{
	if(isset($_SESSION['timeu']))
	{
		if(time()- $_SESSION['timeu']>1200)
		{
			alert("Session Expired Login again...","-2");
		}
		else
			$_SESSION['timeu'] = time();
	}
	else
		$_SESSION['timeu'] = time();
}
else
{
  alert("Login first redirecting...","-1");	
}

?>