<?php
include 'db.php';

// Fetch all reports
$sql = "SELECT * FROM reports ORDER BY submitted_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CleanTrack – Admin Dashboard</title>
  <link rel="stylesheet" href="style.css">
  <style>
  .container {
    max-width: 95%;
    margin: 30px auto;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    font-size: 15px;
  }

  th, td {
    padding: 12px;
    border-bottom: 1px solid #ddd;
    text-align: left;
  }

  th {
    background-color: #2e8b57;
    color: white;
  }

  tr:hover {
    background-color: #f2f2f2;
  }

  .resolved {
    color: green;
    font-weight: bold;
  }

  form button {
    padding: 6px 12px;
    font-size: 14px;
    background-color: #2e8b57;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  form button:hover {
    background-color: #246b45;
  }
</style>
</head>
<body>
  <div class="container">
    <h2>🛠️ CleanTrack – Admin Dashboard</h2>
  <table border="1" cellpadding="8" cellspacing="0">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Pincode</th>
        <th>Issue Type</th>
        <th>Description</th>
        <th>Status</th>
        <th>Submitted At</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= $row['pincode'] ?></td>
            <td><?= $row['issue_type'] ?></td>
            <td><?= nl2br(htmlspecialchars($row['description'])) ?></td>
            <td><strong><?= $row['status'] ?></strong></td>
            <td><?= $row['submitted_at'] ?></td>
            <td>
              <?php if ($row['status'] === 'Pending'): ?>
                <form method="POST" action="update_status.php">
                  <input type="hidden" name="report_id" value="<?= $row['id'] ?>">
                  <button type="submit">Mark Resolved</button>
                </form>
              <?php else: ?>
                ✅ Resolved
              <?php endif; ?>
            </td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr><td colspan="8">No reports yet.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</body>
</html>
