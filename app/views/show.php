<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data Grid | System Console</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        :root {
            --color-bg-primary: #0a0a0a;
            --color-bg-secondary: rgba(18, 18, 18, 0.7);
            --color-text-primary: #f0f0f0;
            --color-accent-neon: #00ff80;
            --color-accent-pink: #ff3366;
            --color-border: #333;
            --color-input-bg: #181818;
            --color-table-header-bg: #1e1e1e;
            --color-table-row-hover: #1e1e1e;
            --font-display: 'Orbitron', sans-serif;
            --font-mono: 'Roboto Mono', monospace;
            --shadow-neon: 0 0 10px rgba(0, 255, 128, 0.5);
            --shadow-neon-pink: 0 0 10px rgba(255, 51, 102, 0.5);
        }

        body {
            background-color: var(--color-bg-primary);
            color: var(--color-text-primary);
            font-family: var(--font-mono);
            margin: 0;
            padding: 2rem 1rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            background-image:
                linear-gradient(to right, rgba(0, 255, 128, 0.07) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(0, 255, 128, 0.07) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        @keyframes fadeSlideUp {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin-top: 2rem;
            background: var(--color-bg-secondary);
            backdrop-filter: blur(8px);
            border: 1px solid var(--color-border);
            box-shadow: var(--shadow-neon);
            padding: 2.5rem;
            border-radius: 12px;
            position: relative;
            animation: fadeSlideUp 1s ease forwards;
        }

        h1 {
            font-family: var(--font-display);
            font-size: clamp(1.5rem, 5vw, 2.5rem);
            font-weight: 700;
            text-align: center;
            margin-bottom: 2rem;
            color: var(--color-accent-neon);
            text-shadow: var(--shadow-neon);
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        /* Search */
        .search-container {
            display: flex;
            justify-content: center;
            margin-bottom: 1.5rem;
            width: 100%;
            animation: fadeSlideUp 1s ease forwards;
            animation-delay: 0.2s;
            opacity: 0;
        }

        .search-container form {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            width: 100%;
            align-items: center;
        }

        #searchBox {
            flex: 1;
            padding: 0.7rem 1rem;
            border-radius: 6px;
            border: 1px solid var(--color-border);
            background: var(--color-input-bg);
            color: var(--color-text-primary);
            font-family: var(--font-mono);
            font-size: 1rem;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        #searchBox:focus {
            outline: none;
            border-color: var(--color-accent-neon);
            box-shadow: 0 0 5px var(--color-accent-neon);
        }

        .search-btn {
            padding: 0.7rem 1.2rem;
            border: 2px solid var(--color-accent-neon);
            background: transparent;
            color: var(--color-accent-neon);
            font-family: var(--font-display);
            font-weight: 700;
            text-transform: uppercase;
            border-radius: 6px;
            cursor: pointer;
            text-shadow: 0 0 5px var(--color-accent-neon);
            box-shadow: 0 0 10px rgba(0, 255, 128, 0.4);
            transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
        }

        .search-btn:hover {
            background-color: var(--color-accent-neon);
            color: var(--color-bg-primary);
            box-shadow: 0 0 20px var(--color-accent-neon);
        }

        /* Table */
        .table-responsive { width: 100%; overflow-x: auto; }
        table { width: 100%; min-width: 600px; border-collapse: collapse; text-align: left; font-size: 0.95rem; border-radius: 8px; }
        th, td { padding: 1rem; border-bottom: 1px solid var(--color-border); }
        thead { background-color: var(--color-table-header-bg); }
        th { font-weight: 700; color: var(--color-accent-neon); text-transform: uppercase; }
        tbody tr:hover { background-color: var(--color-table-row-hover); box-shadow: inset 2px 0 0 0 var(--color-accent-neon); }

        .action-links a {
            text-decoration: none;
            color: var(--color-accent-neon);
            font-weight: 700;
            padding: 0.25rem 0.5rem;
            border: 1px solid transparent;
            transition: all 0.2s ease-in-out;
        }
        .action-links a:hover { border-color: var(--color-accent-neon); box-shadow: 0 0 5px var(--color-accent-neon); }
        .action-links a.delete-link { color: var(--color-accent-pink); }
        .action-links a.delete-link:hover { border-color: var(--color-accent-pink); box-shadow: var(--shadow-neon-pink); }

        /* Create button */
        .create-record-btn {
            display: inline-block;
            margin-top: 2rem;
            padding: 0.75rem 1.5rem;
            background-color: transparent;
            color: var(--color-accent-neon);
            text-decoration: none;
            border: 2px solid var(--color-accent-neon);
            border-radius: 8px;
            font-weight: 700;
            font-family: var(--font-display);
            transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
            text-shadow: 0 0 5px var(--color-accent-neon);
            box-shadow: 0 0 10px rgba(0, 255, 128, 0.4);
            text-transform: uppercase;
        }
        .create-record-btn:hover { background-color: var(--color-accent-neon); color: var(--color-bg-primary); box-shadow: 0 0 20px var(--color-accent-neon); }

        /* Pagination */
        .pagination-container {
            margin-top: 20px;
            text-align: center;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 0.5rem;
        }
        .pagination-container a,
        .pagination-container strong {
            display: inline-block;
            padding: 0.6rem 1rem;
            border: 2px solid var(--color-accent-neon);
            background: transparent;
            color: var(--color-accent-neon);
            font-family: var(--font-display);
            font-weight: 700;
            text-transform: uppercase;
            border-radius: 6px;
            text-decoration: none;
            text-shadow: 0 0 5px var(--color-accent-neon);
            box-shadow: 0 0 10px rgba(0, 255, 128, 0.4);
            transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
        }
        .pagination-container a:hover { background-color: var(--color-accent-neon); color: var(--color-bg-primary); box-shadow: 0 0 20px var(--color-accent-neon); }
        .pagination-container strong { background-color: var(--color-accent-neon); color: var(--color-bg-primary); box-shadow: 0 0 20px var(--color-accent-neon); cursor: default; }

        /* Responsive: keep buttons inline, just smaller */
        @media (max-width: 768px) {
            .pagination-container a,
            .pagination-container strong { padding: 0.4rem 0.8rem; font-size: 0.85rem; }
        }
        @media (max-width: 480px) {
            .pagination-container a,
            .pagination-container strong { padding: 0.35rem 0.7rem; font-size: 0.8rem; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Data Grid // Access Terminal</h1>

        <div class="search-container">
            <form action="<?= site_url('users/show'); ?>" method="get">
                <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
                <input type="text" name="q" placeholder="Search records..." value="<?= html_escape($q); ?>" id="searchBox">
                <button type="submit" class="search-btn">Search</button>
            </form>
        </div>

        <div class="table-responsive">
            <table id="studentsTable">
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
                    <?php foreach (html_escape($users) as $user): ?>
                        <tr>
                            <td><?= $user['id']; ?></td>
                            <td><?= $user['last_name']; ?></td>
                            <td><?= $user['first_name']; ?></td>
                            <td><?= $user['email']; ?></td>
                            <td class="action-links">
                                <a href="<?= site_url('users/update/'.$user['id']); ?>">Update</a> |
                                <a href="<?= site_url('users/delete/'.$user['id']); ?>" class="delete-link" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination links -->
        <div class="pagination-container">
            <?php if (isset($page)) echo $page; ?>
        </div>

        <div style="text-align: center;">
            <a href="<?= site_url('users/create'); ?>" class="create-record-btn">Create New Record</a>
        </div>
    </div>
</body>
</html>