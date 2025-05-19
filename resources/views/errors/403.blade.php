<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>{{ __('Forbidden') }}</title>
  <link rel="stylesheet" href={{ asset("custom/admins_side/common/css/403.css") }} />
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
</head>


<body class="hold-transition login-page">
  <div class="message">You are not authorized.
  </div>
  <div class="message2">Your account has been deactivated from the super admin side please contact your super admin to activate the account. <a href='{{route("admin.logout")}}' class="logout">Logout</a></div>
  <div class="container">
    <div class="neon">403</div>
    <div class="door-frame">
      <div class="door">
        <div class="rectangle">
        </div>
        <div class="handle">
        </div>
        <div class="window">
          <div class="eye">
          </div>
          <div class="eye eye2">
          </div>
          <div class="leaf">
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src={{ asset("custom/admins_side/common/js/403.js") }} />
</body>

</html>