<?php
include 'db.php';

$sql = "SELECT id, pincode, issue_type, description, status, submitted_at FROM reports ORDER BY submitted_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CleanTrack – View Waste Reports</title>
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
    background-color: #f7f7f7;
  }

  .resolved {
    color: green;
    font-weight: bold;
  }

  .pending {
    color: orange;
    font-weight: bold;
  }
</style>

</head>
<body>
  <h2>📢 CleanTrack – Community Waste Reports</h2>

  <p>Below are recent waste issue reports submitted by citizens. Resolved issues are marked accordingly.</p>

  <table border="1" cellpadding="8" cellspacing="0">
    <thead>
      <tr>
        <th>ID</th>
        <th>Pincode</th>
        <th>Issue Type</th>
        <th>Description</th>
        <th>Status</th>
        <th>Reported On</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td>#<?= $row['id'] ?></td>
            <td><?= $row['pincode'] ?></td>
            <td><?= $row['issue_type'] ?></td>
            <td><?= nl2br(htmlspecialchars($row['description'])) ?></td>
            <td class="<?= $row['status'] === 'Resolved' ? 'resolved' : 'pending' ?>">
  <?= $row['status'] === 'Resolved' ? '✅ Resolved' : '⏳ Pending' ?></td>
            <td><?= $row['submitted_at'] ?></td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr><td colspan="6">No reports available yet.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>

  <p><a href="index.html">Submit a new report</a></p>
</body>
</html>
