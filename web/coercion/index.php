<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet"><link rel="stylesheet" href="style.css">
<script src="jquery.min.js"></script>
</head>

<body class="align">

  <div class="grid">

    <form  method="POST" class="form login">
                <h2>Login Here</h2>

                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
      <div class="form-group">
                           
        <input autocomplete="username" id="uname" type="text" name="uname" class="form-control" placeholder="Username" required>
      </div>



      <div class="form-group">
       
        <input id="password" type="password" name="password" class="form-control" placeholder="Password" required>
      </div>



      <div class="form-group">
        <input type="submit" value="Sign In" id="login_submit">
      </div>

    </form>

    <div class="result" id="result">
                <h2>Result Page</h2>
                <p id="message"></p>
                <p style="font-size: medium;" id="flag"></p>
                <p style="font-size: small;" id="token"></p>
             </div>

  </div>

  <svg xmlns="http://www.w3.org/2000/svg" class="icons">
    <symbol id="icon-arrow-right" viewBox="0 0 1792 1792">
      <path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z" />
    </symbol>
    <symbol id="icon-lock" viewBox="0 0 1792 1792">
      <path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z" />
    </symbol>
    <symbol id="icon-user" viewBox="0 0 1792 1792">
      <path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z" />
    </symbol>
  </svg>

</body>
<script>
$(document).ready(function(){
    $("#result").hide();
    $('#login_submit').click(function()
    {
        var formData = JSON.stringify($("#login").serializeArray());
        $.ajax({
            type: "POST",
                url: "login.php",
                dataType: "json",
                data: '{"username": "' + $('#uname').val() + '", "password" : "' + $('#password').val() + '"}',
                contentType: 'application/json',
                cache:false,
                success : function(result) {
                        console.log(result);
                    $("#login-form").hide();
                    $("#result").show();
                    if(result.status === "success" ){
                        $('#message').html(result.message);
                        $('#message').addClass('alert alert-success');
                                                              } else {
                        $('#message').html(result.message);
                        $('#message').addClass('alert alert-danger');
                    }

                }
        });
        return false; 
    });
});
</script>
</html>
