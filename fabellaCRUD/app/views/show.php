<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
</head>
<body>
    <h1>Welcome to Show View</h1>
    <table border="1">
         <tr>
            <th>ID</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Email</th>
            <th>Action</th>
            <?php foreach (html_escape($users) as $user):?>
               <tr>
                   <td><?=$user['id'];?></td>
                   <td><?=$user['last_name'];?></td>
                   <td><?=$user['first_name'];?></td>
                   <td><?=$user['email'];?></td>
                   <td>
                    <a href="<?=site_url('users/update/'.$user['id']);?>">Update</a> |
                    <a href="<?=site_url('users/delete/'.$user['id']);?>">Delete</a>
                   </td>
               </tr>
            <?php endforeach;?>
         </tr>
    </table>
    <a href="<?=site_url('users/create');?>">Create Record</a>
</body>
</html>