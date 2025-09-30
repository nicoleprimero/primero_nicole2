<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="<?=base_url();?>/public/css/style.css">

      <style>
        .invalid-feedback {
            color: #dc3545;
            font-size: 0.9em;
            margin-top: 5px;
        }
        .valid-feedback {
            color: #28a745;
            font-size: 0.9em;
            margin-top: 5px;
        }
      
    
    </style>
</head>
<body>
    <!-- Main Content -->
    <div class="main-content">
        <div class="center-box">
            <h1>🔒 Reset Password</h1>
            <?php $LAVA =& lava_instance(); $session = $LAVA->session; ?>

            <form method="post" action="<?=site_url('auth/password-reset');?>">

                <!-- CSRF Protection -->
                <?php csrf_field(); ?>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input id="email" type="email" name="email" placeholder="Enter your email" required>
                    
                   <?php if($session->flashdata('alert') == 'is-invalid'): ?>
                        <span class="invalid-feedback" role="alert">
                            <strong>We can't find a user with that email address.</strong>
                        </span>
                    <?php elseif($session->flashdata('alert') == 'is-valid'): ?>
                        <span class="valid-feedback" role="alert">
                            <strong>Reset password link was sent to your email.</strong>
                        </span>
                    <?php endif; ?>
                </div>

                <!-- Submit -->
                <button type="submit" class="submit-btn">📩 Send Reset Link</button>
            </form>

            <!-- Back to Login -->
            <p style="margin-top: 15px;">
                Remembered your password? <a href="<?=site_url('auth/login');?>">✨ Login here</a>
            </p>

            
        </div>
    </div>
</body>
</html>
