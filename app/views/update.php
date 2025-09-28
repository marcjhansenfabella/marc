<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update User | System Console</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: "Inter", sans-serif;
      margin: 0;
      padding: 0;
      background: #f9fafb;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .form-container {
      background: #ffffff;
      padding: 2rem;
      border-radius: 16px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.1);
      text-align: center;
      width: 100%;
      max-width: 380px; /* narrower box */
    }

    h1 {
      font-size: 1.6rem;
      font-weight: 700;
      margin-bottom: 1.5rem;
      color: #111827;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 1rem;
      align-items: center; /* center form fields */
    }

    .form-group {
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: flex-start; /* left align label */
}

label {
  font-size: 0.85rem;
  font-weight: 600;
  margin-bottom: 0.3rem;
  color: #374151;
  text-align: left;
  margin-left: 10%; /* aligns with input since inputs are centered at 80% width */
}

input[type="text"],
input[type="email"] {
  width: 80%; /* keep the same input length */
  padding: 0.7rem 0.8rem;
  border: 1px solid #d1d5db;
  border-radius: 8px;
  font-size: 0.95rem;
  color: #111827;
  background: #f9fafb;
  transition: border-color 0.2s ease;
  margin: 0 auto; /* keep centered */
  display: block;
}

    input:focus {
      border-color: #6366f1;
      outline: none;
      background: #ffffff;
    }

    button[type="submit"] {
      margin-top: 1rem;
      width: 80%; /* smaller button */
      padding: 0.9rem 0;
      border: none;
      border-radius: 30px;
      font-size: 1rem;
      font-weight: 600;
      color: #fff;
      cursor: pointer;
      background: linear-gradient(90deg, #06b6d4, #9333ea);
      transition: opacity 0.3s ease;
    }

    button[type="submit"]:hover {
      opacity: 0.9;
    }

    .back-link {
      display: inline-block;
      margin-top: 1rem;
      text-decoration: none;
      font-size: 0.9rem;
      font-weight: 600;
      color: #374151;
      transition: color 0.2s ease;
    }

    .back-link:hover {
      color: #9333ea;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h1>Update User</h1>
    <form action="<?=site_url('users/update/'.$user['id']);?>" method="post">
      <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" name="last_name" value="<?=html_escape($user['last_name']);?>" required>
      </div>

      <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" value="<?=html_escape($user['first_name']);?>" required>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?=html_escape($user['email']);?>" required>
      </div>

      <button type="submit">Update Record</button>
    </form>
    <a href="<?=site_url('users/show');?>" class="back-link">← Back to Dashboard</a>
  </div>
</body>
</html>
