<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Show</title>
  <style>
    body {
      background: #f9fafb;
      color: #1f2937;
      font-family: "Inter", Arial, sans-serif;
      padding: 40px;
      text-align: center;
    }

    h1 {
      font-size: 2rem;
      font-weight: 700;
      color: #4338ca;
      margin-bottom: 30px;
    }

    .table-container {
      overflow-x: auto;
    }

    table {
      width: 90%;
      margin: 0 auto;
      border-collapse: collapse;
      background: #fff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    thead {
      background: #4f46e5;
      color: white;
      text-transform: uppercase;
      font-size: 0.85rem;
      letter-spacing: 0.05em;
    }

    th, td {
      padding: 14px 18px;
      text-align: left;
    }

    tbody tr:nth-child(even) {
      background: #f3f4f6;
    }

    tbody tr:hover {
      background: #eef2ff;
      transition: 0.3s;
    }

    .btn {
      display: inline-block;
      padding: 6px 14px;
      font-size: 0.9rem;
      font-weight: 500;
      border-radius: 6px;
      text-decoration: none;
      color: white;
      transition: background 0.3s;
    }

    .btn-update {
      background: #10b981;
    }

    .btn-update:hover {
      background: #059669;
    }

    .btn-delete {
      background: #ef4444;
    }

    .btn-delete:hover {
      background: #dc2626;
    }

    .btn-create {
      margin-top: 30px;
      background: #4f46e5;
      padding: 12px 28px;
      font-size: 1rem;
      font-weight: 600;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      transition: background 0.3s, transform 0.2s;
      text-decoration: none;
      color: white;
      display: inline-block;
    }

    .btn-create:hover {
      background: #4338ca;
      transform: translateY(-2px);
    }
  </style>
</head>
<body>

  <h1>Welcome to Student List</h1>

  <div class="table-container">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Last Name</th>
          <th>First Name</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach (html_escape($users) as $user):?>
        <tr>
          <td><?=$user['id'];?></td>
          <td><?=$user['last_name'];?></td>
          <td><?=$user['first_name'];?></td>
          <td><?=$user['email'];?></td>
          <td>
            <a href="<?=site_url('users/update/'.$user['id']);?>" class="btn btn-update">Update</a>
            <a href="<?=site_url('users/delete/'.$user['id']);?>" class="btn btn-delete">Delete</a>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>

  <a href="<?=site_url('users/create');?>" class="btn-create">Create Record</a>

</body>
</html>
