<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Magic User</title>
    <link rel="stylesheet" href="<?=base_url();?>/public/css/style.css">
</head>
<body>
    <!-- Main Content -->
    <div class="main-content">
        <div class="center-box">
            <h1>✨ Register Magic User</h1>

            <form method="post" action="<?=site_url('users/add_User');?>">
                <!-- Username -->
                <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" name="username" placeholder="Enter username" required>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" placeholder="Enter email address" required>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" placeholder="Enter password" required>
                </div>

                <!-- Role -->
                <div class="form-group">
                    <label for="role">Role</label>
                    <select id="role" name="role" required>
                        <option value="fairy">Fairy</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <!-- Submit -->
                <button type="submit" class="submit-btn">✨ Register</button>
            </form>

            <!-- Navigation Links -->
            <p style="margin-top: 15px;">
                <a href="<?=site_url('users/view');?>" class="back-btn">← Go Back</a>
            </p>

           
        </div>
    </div>
</body>
</html>
