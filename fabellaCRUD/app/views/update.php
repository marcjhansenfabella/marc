<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <h1>Welcome to Update View</h1>
    <form action="<?=site_url('users/update/'.$user['id']);?>" method="post">
        <label for="last_name">Last Name:</label><br>
        <input type="text" id="last_name" name="last_name" value="<?=html_escape($user['last_name']);?>"><br>

        <label for="first_name">First Name:</label><br>
        <input type="text" id="first_name" name="first_name" value="<?=html_escape($user['first_name']);?>"><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?=html_escape($user['email']);?>"><br>

        <button type="submit">Submit</button>
        <a href="<?=site_url('users/show');?>">Back to Show</a>
    </form>
</body>
</html>