function welcome(){
if (linker=="") {
	window.open("https://www.patriotismclubs.org.ug/")
}
	else{
		window.open("https://www.npcu.wordpress.com");
	}
}
/** Login form functions */
function welcome(){
	let username=document.getElementById('username').value;
	let userpassword=document.getElementById('userpass').value;
	if (username=="") {
		alert(" Please Input your Username");
	}else if (userpassword=="") {
		alert(" Please Input your password");
		}
		else{
			window.open("index.php");
		}
	}