<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sofia’s Magic Users</title>
  <link rel="stylesheet" href="<?= base_url(); ?>/public/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

  <style>
    /* Top actions container */
    .top-actions {
      display: flex;
      justify-content: center; /* Center search bar */
      align-items: center;
      position: relative;
      margin-bottom: 20px;
      padding: 10px;
    }

    /* Search form in the center */
    .search-form {
      width: 100%;
      max-width: 500px; /* Keeps it neat */
    }

    /* Buttons container (still at the right corner) */
    .action-buttons {
      position: absolute;
      right: 0;
      display: flex;
      gap: 12px;
    }

    /* Shared button style */
    .btn-action {
      background: #ffd966;
      color: #4b0082;
      font-weight: bold;
      padding: 8px 16px;
      border-radius: 20px;
      text-decoration: none;
      box-shadow: 0 3px 6px rgba(0,0,0,0.2);
      transition: all 0.2s ease-in-out;
    }

    .btn-action:hover {
      background: #f4c542;
      transform: scale(1.05);
    }

    /* Logout different color */
    .btn-logout {
      background: #ff7b7b;
      color: white;
    }
    .btn-logout:hover {
      background: #e85a5a;
    }
  </style>
</head>

<body>

<div class="top-actions">
  <!-- 🔮 Server-side search in the middle -->
  <form action="<?=site_url('users/view');?>" method="get" class="search-form d-flex mx-auto">
    <?php
    $q = '';
    if(isset($_GET['q'])) {
      $q = $_GET['q'];
    }
    ?>
    <input class="form-control me-2" name="q" type="text" 
        placeholder="🔮 Search..." id="searchInput" value="<?=html_escape($q);?>">
    <button type="submit" class="btn btn-primary">Search</button>
  </form>

  <!-- Action buttons (Add + Logout) on right -->
  <div class="action-buttons">
    <a href="<?= site_url('users/add_User'); ?>" class="btn-action btn-add">+ Add User</a>
    <a href="<?=site_url('auth/logout');?>" class="btn-action btn-logout">🚪 Logout</a>
  </div>
</div>

<div class="table-container">
  <table class="magic-table" id="magic-table">
    <thead>
      <tr>
        <th><img class="wand" src="<?= base_url(); ?>/public/images/wand.png"> ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
  <?php if (!empty($all)): ?>
      <?php foreach (html_escape($all) as $user): ?>
        <tr>
          <td><?= $user['id']; ?></td>
          <td><?= $user['username']; ?></td>
          <td><?= $user['email']; ?></td>
          <td><?= $user['role']; ?></td>
          <td>
            <a href="<?= site_url('users/update_User/'.$user['id']); ?>" class="btn btn-edit">Edit</a> | 
            <a href="<?= site_url('users/delete/'.$user['id']); ?>" 
               onclick="return confirm('Are you sure you want to delete this user?');" 
               class="btn btn-delete">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
  <?php else: ?>
      <tr>
        <td colspan="5" style="text-align:center; font-weight:bold; color:#6a0dad;">
          ✨ No users found ✨
        </td>
      </tr>
  <?php endif; ?>
</tbody>

  </table>

  <?php echo $page; ?>
</div>

</body>
</html>
