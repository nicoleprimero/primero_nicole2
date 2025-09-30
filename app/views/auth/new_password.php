<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Password</title>
    <link rel="stylesheet" href="<?=base_url();?>/public/css/style.css">
</head>
<body>
    <!-- Main Content -->
    <div class="main-content">
        <div class="center-box">
            <h1>🔑 Set New Password</h1>

            <!-- Note -->
            <p style="font-size: 14px; color: #666; margin-bottom: 15px;">
                Password must be at least <b>8 characters</b> and contain one special character (!@£$%^&*-_+=?), 
                a number, uppercase and lowercase letters.
            </p>

            <?php flash_alert(); ?>

            <form id="myForm" method="post" action="<?=site_url('auth/set-new-password');?>">

                <!-- CSRF Protection -->
                <?php csrf_field(); ?>

                <!-- Hidden Reset Token -->
                <input type="hidden" name="token" value="<?php !empty($_GET['token']) && print $_GET['token'];?>">

                <!-- New Password -->
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input id="password" type="password" name="password" placeholder="Enter new password" required>
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="re_password">Confirm Password</label>
                    <input id="re_password" type="password" name="re_password" placeholder="Confirm new password" required>
                </div>

                <!-- Submit -->
                <button type="submit" class="submit-btn">✅ Proceed</button>
            </form>

            <!-- Navigation -->
            <p style="margin-top: 15px;">
                <a href="<?=site_url('auth/login');?>">✨ Back to Login</a>
            </p>
            <a href="<?=site_url('/');?>" class="back-btn">← Go Home</a>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" 
            integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" 
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script>
        $(function() {
            var myForm = $("#myForm");
            if (myForm.length) {
                myForm.validate({
                    rules: {
                        password: {
                            required: true,
                            minlength: 8
                        },
                        re_password: {
                            required: true,
                            minlength: 8,
                            equalTo: "#password"
                        }
                    },
                    messages: {
                        password: {
                            required: "Please input your password",
                            minlength: jQuery.validator.format("Password must be at least {0} characters.")
                        },
                        re_password: {
                            required: "Please confirm your password",
                            minlength: jQuery.validator.format("Password must be at least {0} characters."),
                            equalTo: "Passwords do not match"
                        }
                    }
                });
            }
        });
    </script>
</body>
</html>
