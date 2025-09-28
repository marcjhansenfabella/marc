<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home | System Console</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --color-bg: #f9fafb;
      --color-card: #ffffff;
      --color-text: #1f2937;
      --color-accent: #2563eb; /* Modern blue */
      --color-accent-hover: #1e40af;
      --color-border: #e5e7eb;
      --radius: 12px;
      --shadow: 0 4px 20px rgba(0,0,0,0.06);
      --font-main: 'Inter', sans-serif;
    }

    body {
      background-color: var(--color-bg);
      font-family: var(--font-main);
      color: var(--color-text);
      margin: 0;
      padding: 2rem;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .container {
      width: 100%;
      max-width: 480px;
      background: var(--color-card);
      border: 1px solid var(--color-border);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      padding: 2.5rem;
      text-align: center;
      animation: fadeSlideUp 0.6s ease forwards;
    }

    h1 {
      font-weight: 700;
      font-size: clamp(1.5rem, 5vw, 2.2rem);
      margin-bottom: 2rem;
      color: var(--color-accent);
    }

    .btn-group {
      display: flex;
      flex-direction: column;
      gap: 1.2rem;
      margin-top: 1.5rem;
    }

    .main-btn {
      display: block;
      width: 100%;
      padding: 0.9rem;
      text-decoration: none;
      border-radius: var(--radius);
      font-weight: 600;
      font-size: 1rem;
      border: 1px solid var(--color-accent);
      background-color: var(--color-accent);
      color: #fff;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .main-btn:hover {
      background-color: var(--color-accent-hover);
      transform: translateY(-2px);
    }

    /* Animation */
    @keyframes fadeSlideUp {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 480px) {
      body { padding: 1rem; }
      .container { padding: 2rem 1.5rem; }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Student Management</h1>
    <div class="btn-group">
      <a href="<?=site_url('users/show');?>" class="main-btn">View Students List</a>
      <a href="<?=site_url('users/create');?>" class="main-btn">Add Students</a>
    </div>
  </div>
</body>
</html>
