<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet">
  <title>Login</title>
  <style>
    :root {
      --white: #FFFFFF;
      --black: #000000;
      --very-light-pink: #C7C7C7;
      --text-input-field: #F7F7F7;
      --hospital-green: #8D081A;
      --sm: 14px;
      --md: 16px;
      --lg: 18px;
      --bckgbody: #072B3E;
    }
    body {
      margin: 0;
      font-family: 'Quicksand', sans-serif;
      background-color: var(--black);
    }
    .login {
      width: 100%;
      height: 100vh;
      display: grid;
      place-items: center;
    }
    .form-container {
      display: grid;
      grid-template-rows: auto 1fr auto;
      width: 300px;
    }
    .logo {
      width: 150px;
      margin-bottom: 48px;
      justify-self: center;
      /*display: none;*/
    }
    .form {
      display: flex;
      flex-direction: column;
    }
    .form a {
      color: var(--hospital-green);
      font-size: var(--sm);
      text-align: center;
      text-decoration: none;
      margin-bottom: 52px;
    }
    .label {
      font-size: var(--sm);
      font-weight: bold;
      margin-bottom: 4px;
    }
    .input {
      background-color: var(--text-input-field);
      border: none;
      border-radius: 8px;
      height: 30px;
      font-size: var(--md);
      padding: 6px;
      margin-bottom: 12px;
    }
    .input-email {
      margin-bottom: 22px;
    }
    .primary-button {
      background-color: var(--hospital-green);
      border-radius: 8px;
      border: none;
      color: var(--white);
      width: 100%;
      cursor: pointer;
      font-size: var(--md);
      font-weight: bold;
      height: 50px;
    }
    .secondary-button {
      background-color: var(--hospital-green);
      border-radius: 8px;
      border: 1px solid var(--hospital-green);
      color: var(--white);
      width: 100%;
      cursor: pointer;
      font-size: var(--md);
      font-weight: bold;
      height: 50px;
    }
    .login-button {
      margin-top: 14px;
      margin-bottom: 30px;
    }
    @media (max-width: 640px) {
      .logo {
        display: block;
      }
    }
  </style>
</head>
<body>
  <div class="login">
    <div class="form-container">
      <img src="./images/img.jpeg" alt="logo" class="logo">

      <form action="class/logic_login.php" class="form" method="POST">
        <label for="email" class="label">Correo Electronico</label>
        <input type="text" id="email" name="email" placeholder="nombre de usuario" class="input input-email">

        <label for="password" class="label">Contraseña</label>
        <input type="password" id="password" name="password" placeholder="*********" class="input input-password">

        <input type="submit" value="Iniciar Sesion" class="primary-button login-button">
       
      </form>

     
    </div>
  </div>
</body>
</html>