<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Magic User</title>
    <link rel="stylesheet" href="<?=base_url();?>/public/css/style.css">
</head>
<body>
    <!-- Main Content -->
    <div class="main-content">
        <div class="center-box">
            <h1>✨ Login Magic User</h1>

            <form method="post" action="<?=site_url('auth/login');?>">
                <!-- Username -->
                <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" name="username" placeholder="Enter username" required>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" placeholder="Enter password" required>
                </div>

                <!-- Submit -->
                <button type="submit" class="submit-btn">✨ Log In</button>
            </form>

                 <div class="form-group" style="margin-top: 10px; text-align: center;">
                    <a href="<?=site_url('auth/password-reset');?>">Forgot Your Password?</a>
                </div>

            <!-- Navigation Links -->
            <p style="margin-top: 15px;">
                Don’t have an account? <a href="<?=site_url('auth/register');?>">✨ Register here</a>
            </p>

            <!-- Back Button -->
            <a href="<?=site_url('/');?>" class="back-btn">← Go Back</a>
        </div>
    </div>
</body>
</html>
