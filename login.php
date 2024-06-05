<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">
  <title>LOGIN PAGE</title>
  <!-- Simple bar CSS -->
  <link rel="stylesheet" href="css/simplebar.css">
  <!-- Fonts CSS -->
  <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- Icons CSS -->
  <link rel="stylesheet" href="css/feather.css">
  <!-- Date Range Picker CSS -->
  <link rel="stylesheet" href="css/daterangepicker.css">
  <!-- App CSS -->
  <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
  <!-- <link rel="stylesheet" href="css/app-dark.css" id="darkTheme" disabled> -->
  <style>
    body {
      background: url('images/background.jpg') no-repeat center center fixed; 
      background-size: cover;
      opacity: 0; /* Initially hide the body */
      animation: fadeIn 1s ease forwards; /* Fade-in animation */
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    .form-container {
      background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
      padding: 20px;
      border-radius: 8px;
      opacity: 0; /* Initially hide the form */
      animation: slideIn 1s ease forwards; /* Slide-in animation */
    }

    @keyframes slideIn {
      from {
        opacity: 0;
        transform: translateY(-50px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body class="light">
  <div class="wrapper vh-100">
    <div class="row align-items-center h-100">
      <div class="col-lg-6 d-none d-lg-flex">
        <!-- You can add additional content here if needed -->
      </div>
      <div class="col-lg-6">
        <div class="w-50 mx-auto form-container">
          <form class="text-center" action="loginauth.php" method="post">
            <h1 class="h6 mb-3">Sign in</h1>
            <div class="form-group">
              <label for="inputEmail" class="sr-only">Email address</label>
              <input type="email" id="inputEmail" name="email" class="form-control form-control-lg" placeholder="Email address" required autofocus>
            </div>
            <div class="form-group">
              <label for="inputPassword" class="sr-only">Password</label>
              <input type="password" id="inputPassword" name="password" class="form-control form-control-lg" placeholder="Password" required>
            </div>
            <div class="checkbox mb-3">
              <label>
                <input type="checkbox" name="remember-me" value="remember-me"> Stay logged in
              </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Let me in</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/moment.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/simplebar.min.js"></script>
  <script src='js/daterangepicker.js'></script>
  <script src='js/jquery.stickOnScroll.js'></script>
  <script src="js/tinycolor-min.js"></script>
  <script src="js/config.js"></script>
  <script src="js/apps.js"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
  </script>
</body>
</html>
