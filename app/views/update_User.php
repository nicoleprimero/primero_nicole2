<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Magic User</title>
    <link rel="stylesheet" href="<?=base_url();?>/public/css/style.css">
   
       
</head>
<body>
   
    <!-- Main Content -->
    <div class="main-content">
        <div class="center-box">
            <h1>✨ Update User</h1>
            <form action="<?=site_url('users/update_User/'.$user['id']);?>" method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value="<?=$user['username'];?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?=$user['email'];?>" required>
                </div>
                <div class="form-group">
                    <label for="role">Role:</label>
                    <select id="role" name="role"  required>
                        <option value="" disabled selected>Choose role</option>
                        <option value="Admin" <?=$user['role']=='admin'?'selected':'';?>>Admin</option>
                        <option value="Fairy" <?=$user['role']=='fairy'?'selected':'';?>>Fairy</option>
                    </select>
                </div>
                <input type="submit" value="Update" class="submit-btn">
            </form>
            <a href="<?=site_url('users/view');?>" class="back-btn">← Go Back</a>
        </div>
    </div>
</body>
</html>
