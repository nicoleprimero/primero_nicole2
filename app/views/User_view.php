<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Welcome</title>
	<link rel="icon" type="image/png" href="<?=base_url();?>public/img/favicon.ico"/>
    <link href="<?=base_url();?>public/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="main-content">
        <div class="center-box">
            <h1>🌸 Welcome, <?= $LAVA->session->userdata('username'); ?>!</h1>
            <p style="color:#4b0082; font-size:1.1rem; margin-bottom:20px;">
                You have successfully logged in. ✨  <br>
                Enjoy exploring your magical dashboard!
            </p>

            <div style="margin-top:20px;">
            
                <a href="<?=site_url('auth/logout');?>" class="back-btn">🚪 Logout</a>
            </div>
        </div>
    </div>
</body>
</html>
