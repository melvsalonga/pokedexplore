<!DOCTYPE html>
<html>
<head>
	<title>PokeDexplore</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="container" id="container">
<div class="form-container sign-up-container">

<form action="">
    <img src="resources/images/signup.png" alt="register" width="300" height="100">
	<input type="text" name="name" placeholder="Username" required>
	<input type="email" name="email" placeholder="Email" required>
	<input type="password" name="password" placeholder="Password" required>
	<button>Register</button>
</form>
</div>
<div class="form-container sign-in-container">
	<form action="login.php" method="POST">
    <img src="resources/images/login.png" alt="login" width="250" height="100">
	<input type="text" name= "uname" placeholder= "Username/Email" required>
	<input type="password"name="password" placeholder="Password" required>
	<a href="#">Forgot Your Password?</a>

	<button type="submit">Log In</button>
	</form>
</div>
<div class="overlay-container">
	<div class="overlay">
		<div class="overlay-panel overlay-left">
            <img src="resources/images/pokeball1.png" alt="pokeball" width="50" height="50">
			<h1>Welcome Back,<br>PokeDexplorer!</h1>
			<p>Already have an account? Log in with your personal info</p>
			<button class="ghost" id="signIn">Log In</button>
		</div>
		<div class="overlay-panel overlay-right">
            <img src="resources/images/pokeball1.png" alt="pokeball" width="50" height="50">
			<h1>Hello, PokeDexplorer!</h1>
			<p>Enter your details and start collecting pokemons!</p>
			<button class="ghost" id="signUp">Register</button>
		</div>
	</div>
</div>
</div>

<script type="text/javascript">
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});
	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});
</script>


</body>
</html>