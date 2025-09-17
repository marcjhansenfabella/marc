<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-50 via-white to-emerald-100 font-sans text-gray-800 p-6">
  
  <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
    <h1 class="text-2xl font-bold text-emerald-700 mb-6 text-center">CRUDero Update Records</h1>
    
    <form action="<?=site_url('users/update/'.$user['id']);?>" method="post" class="space-y-5">
      
      <div>
        <label for="last_name" class="block text-left text-sm font-semibold text-gray-700">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?=html_escape($user['last_name']);?>"
          class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-400 focus:outline-none transition"/>
      </div>

      <div>
        <label for="first_name" class="block text-left text-sm font-semibold text-gray-700">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?=html_escape($user['first_name']);?>"
          class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-400 focus:outline-none transition"/>
      </div>

      <div>
        <label for="email" class="block text-left text-sm font-semibold text-gray-700">Email:</label>
        <input type="email" id="email" name="email" value="<?=html_escape($user['email']);?>"
          class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-400 focus:outline-none transition"/>
      </div>

      <button type="submit" 
        class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-3 rounded-lg shadow-md transition">
        Update
      </button>

      <div class="text-center">
        <a href="<?=site_url('users/show');?>" 
           class="inline-block mt-4 text-red-500 font-medium hover:underline">
          ← Back to Show
        </a>
      </div>
    </form>
  </div>

</body>
</html>
