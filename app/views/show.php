<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data Grid | System Console</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
/* Body background & centering */
body {
  display: flex;
  justify-content: center;
  align-items: flex-start;
  min-height: 100vh;
  background: #f9fafb;
  font-family: 'Roboto Mono', monospace;
  margin: 0;
  padding: 2rem;
}

/* Card container */
.container {
  width: 100%;
  max-width: 1000px;
  background: #ffffff;
  padding: 2rem;
  border-radius: 16px;
  box-shadow: 0 8px 30px rgba(0,0,0,0.1);
  text-align: center;
}

/* Title */
.container h1 {
  margin-bottom: 1rem;
  font-size: 1.4rem;
  font-weight: bold;
}

/* Search box styling */
.search-container {
  margin-bottom: 1rem;
  text-align: right;
}

.search-container input {
  padding: 0.5rem 1rem;
  border: 1px solid #d1d5db;
  border-radius: 8px;
  outline: none;
  font-size: 0.9rem;
}

.search-container button {
  margin-left: 0.5rem;
  padding: 0.5rem 1rem;
  border-radius: 8px;
  border: none;
  cursor: pointer;
  background: linear-gradient(135deg, #06b6d4, #9333ea);
  color: #fff;
  font-weight: 600;
}

/* Table styling */
.table-responsive {
  margin-top: 1rem;
  overflow-x: auto;
}

#studentsTable {
  width: 100%;
  border-collapse: collapse;
}

#studentsTable th,
#studentsTable td {
  border: 1px solid #e5e7eb;
  padding: 0.75rem;
  text-align: center;
}

#studentsTable th {
  background: #f3f4f6;
  font-weight: 700;
  text-transform: uppercase;
}

#studentsTable tr:nth-child(even) {
  background: #f9fafb;
}

/* Action buttons */
.action-links a {
  display: inline-block;
  padding: 0.4rem 0.8rem;
  border-radius: 999px;
  font-weight: 600;
  font-size: 0.85rem;
  text-decoration: none;
  color: #fff;
  background: linear-gradient(135deg, #3b82f6, #1e40af);
  margin: 0 0.25rem;
  transition: all 0.2s ease;
}

.action-links a:hover {
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(37, 99, 235, 0.5);
}

.action-links a.delete-link {
  background: linear-gradient(135deg, #ec4899, #db2777);
}

.action-links a.delete-link:hover {
  box-shadow: 0 4px 12px rgba(236, 72, 153, 0.6);
}

/* Pagination */
.pagination-container {
  margin-top: 1.5rem;
}

.pagination-container a,
.pagination-container strong {
  display: inline-block;
  padding: 0.6rem 1.2rem;
  border-radius: 999px;
  font-weight: 700;
  font-size: 0.9rem;
  color: #fff;
  text-decoration: none;
  margin: 0 0.25rem;
  background: linear-gradient(135deg, #06b6d4, #9333ea);
  box-shadow: 0 3px 10px rgba(147, 51, 234, 0.5);
  transition: all 0.2s ease;
}

.pagination-container a:hover {
  transform: translateY(-2px);
  box-shadow: 0 5px 16px rgba(147, 51, 234, 0.6);
}

.pagination-container strong {
  background: linear-gradient(135deg, #9333ea, #06b6d4);
}

/* Create new record button */
.create-record-btn {
  display: inline-block;
  margin-top: 1.5rem;
  padding: 0.75rem 1.5rem;
  border-radius: 12px;
  background: linear-gradient(135deg, #08db72ff, #08db79ff, #059669);
  color: #fff;
  font-weight: 600;
  text-decoration: none;
  transition: all 0.2s ease;
}

.create-record-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 5px 16px rgba(75, 253, 75, 0.5);
}
    </style>
</head>
<body>
    <div class="container">
        <h1> Student Dashboard </h1>

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