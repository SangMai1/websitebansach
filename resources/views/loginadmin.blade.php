<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="/css/admin/login.css">
</head>
<body>
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->

      <!-- Login Form -->
      <form action="{{ url('/api/logintest') }}" method="post">
        @csrf
        <input type="email" id="login" class="fadeIn second" name="email" placeholder="email">
        <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
        <input type="submit" class="fadeIn fourth" value="Log In">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <input type="checkbox" name="" id=""> <label>Nhớ mật khẩu</label>
      </div>

    </div>
  </div>
</body>
</html>