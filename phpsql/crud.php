<?php
include 'db.php';

$message = '';
$messageType = 'success';

function sanitize($value) {
    return trim(htmlspecialchars($value, ENT_QUOTES, 'UTF-8'));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['insert'])) {
        $id = intval($_POST['id'] ?? 0);
        $name = sanitize($_POST['name'] ?? '');
        $age = intval($_POST['age'] ?? 0);
        $gender = sanitize($_POST['gender'] ?? '');

        if ($id <= 0 || $name === '' || $age <= 0 || ($gender !== 'MALE' && $gender !== 'FEMALE')) {
            $message = 'Please provide valid student details.';
            $messageType = 'error';
        } else {
            $stmt = $conn->prepare('INSERT INTO student (id, name, age, gender) VALUES (?, ?, ?, ?)');
            $stmt->bind_param('isis', $id, $name, $age, $gender);
            if ($stmt->execute()) {
                $message = 'Student added successfully.';
            } else {
                $message = 'Insert failed: ' . $stmt->error;
                $messageType = 'error';
            }
            $stmt->close();
        }
    }

    if (isset($_POST['update'])) {
        $id = intval($_POST['id'] ?? 0);
        $name = sanitize($_POST['name'] ?? '');
        $age = intval($_POST['age'] ?? 0);
        $gender = sanitize($_POST['gender'] ?? '');

        if ($id <= 0 || $name === '' || $age <= 0 || ($gender !== 'MALE' && $gender !== 'FEMALE')) {
            $message = 'Please provide valid student details to update.';
            $messageType = 'error';
        } else {
            $stmt = $conn->prepare('UPDATE student SET name = ?, age = ?, gender = ? WHERE id = ?');
            $stmt->bind_param('sisi', $name, $age, $gender, $id);
            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    $message = 'Student updated successfully.';
                } else {
                    $message = 'No student found with that ID.';
                    $messageType = 'error';
                }
            } else {
                $message = 'Update failed: ' . $stmt->error;
                $messageType = 'error';
            }
            $stmt->close();
        }
    }

    if (isset($_POST['delete'])) {
        $id = intval($_POST['id'] ?? 0);

        if ($id <= 0) {
            $message = 'Please provide a valid student ID to delete.';
            $messageType = 'error';
        } else {
            $stmt = $conn->prepare('DELETE FROM student WHERE id = ?');
            $stmt->bind_param('i', $id);
            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    $message = 'Student deleted successfully.';
                } else {
                    $message = 'No student found with that ID.';
                    $messageType = 'error';
                }
            } else {
                $message = 'Delete failed: ' . $stmt->error;
                $messageType = 'error';
            }
            $stmt->close();
        }
    }
}

$result = $conn->query('SELECT * FROM student ORDER BY id ASC');
$students = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
    $result->free();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student CRUD</title>
    <style>
        :root {
            --bg: #f4f7fb;
            --card: #ffffff;
            --primary: #3f51b5;
            --primary-hover: #354499;
            --success: #2e7d32;
            --error: #c62828;
            --text: #1f2937;
            --border: #d3dbe8;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #edf2fb 0%, #f8fafc 100%);
            color: var(--text);
        }

        .page-wrapper {
            max-width: 1180px;
            margin: 0 auto;
            padding: 24px;
        }

        header {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        header h1 {
            margin: 0;
            font-size: 28px;
        }

        .top-note {
            color: #475569;
        }

        .grid {
            display: grid;
            gap: 20px;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        }

        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.06);
            padding: 22px;
        }

        .card h2 {
            margin-top: 0;
            margin-bottom: 16px;
            font-size: 20px;
        }

        .form-group {
            margin-bottom: 14px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
        }

        .form-group input[type='text'],
        .form-group input[type='number'] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: #f8fbff;
            outline: none;
            transition: border-color 0.2s ease;
        }

        .form-group input:focus {
            border-color: var(--primary);
        }

        .radio-group {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            align-items: center;
        }

        .radio-group label {
            font-weight: 500;
            color: #334155;
        }

        .radio-group input {
            margin-right: 6px;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 12px 16px;
            border: none;
            border-radius: 12px;
            color: #fff;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: filter 0.2s ease, transform 0.2s ease;
        }

        .button:hover {
            filter: brightness(0.95);
            transform: translateY(-1px);
        }

        .button.insert { background: #0f9d58; }
        .button.update { background: #f59e0b; }
        .button.delete { background: #dc2626; }

        .message {
            margin-top: 16px;
            padding: 14px 16px;
            border-radius: 12px;
            font-weight: 600;
        }

        .message.success {
            background: rgba(46, 125, 50, 0.12);
            color: var(--success);
            border: 1px solid rgba(46, 125, 50, 0.18);
        }

        .message.error {
            background: rgba(198, 40, 40, 0.12);
            color: var(--error);
            border: 1px solid rgba(198, 40, 40, 0.18);
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
            min-width: 640px;
            background: var(--card);
        }

        th, td {
            padding: 14px 16px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        th {
            background: #eef2ff;
            color: #1e293b;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.02em;
        }

        tr:nth-child(even) {
            background: #f8fafc;
        }

        tr:hover {
            background: #eff6ff;
        }

        .empty-state {
            padding: 20px;
            text-align: center;
            color: #475569;
        }

        @media (max-width: 720px) {
            header {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
<div class="page-wrapper">
    <header>
        <div>
            <h1>Student CRUD Application</h1>
            <p class="top-note">Create, read, update, and delete student records from a single page.</p>
        </div>
    </header>

    <?php if ($message !== ''): ?>
        <div class="message <?php echo $messageType === 'error' ? 'error' : 'success'; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <div class="grid">
        <div class="card">
            <h2>Add Student</h2>
            <form method="POST" novalidate>
                <div class="form-group">
                    <label for="insert-id">ID</label>
                    <input id="insert-id" type="number" name="id" required>
                </div>
                <div class="form-group">
                    <label for="insert-name">Name</label>
                    <input id="insert-name" type="text" name="name" required>
                </div>
                <div class="form-group">
                    <label for="insert-age">Age</label>
                    <input id="insert-age" type="number" name="age" required>
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <div class="radio-group">
                        <label><input type="radio" name="gender" value="MALE" required>Male</label>
                        <label><input type="radio" name="gender" value="FEMALE">Female</label>
                    </div>
                </div>
                <button class="button insert" type="submit" name="insert">Insert Student</button>
            </form>
        </div>

        <div class="card">
            <h2>Update Student</h2>
            <form method="POST" novalidate>
                <div class="form-group">
                    <label for="update-id">Student ID</label>
                    <input id="update-id" type="number" name="id" required>
                </div>
                <div class="form-group">
                    <label for="update-name">New Name</label>
                    <input id="update-name" type="text" name="name" required>
                </div>
                <div class="form-group">
                    <label for="update-age">New Age</label>
                    <input id="update-age" type="number" name="age" required>
                </div>
                <div class="form-group">
                    <label>New Gender</label>
                    <div class="radio-group">
                        <label><input type="radio" name="gender" value="MALE" required>Male</label>
                        <label><input type="radio" name="gender" value="FEMALE">Female</label>
                    </div>
                </div>
                <button class="button update" type="submit" name="update">Update Student</button>
            </form>
        </div>

        <div class="card">
            <h2>Delete Student</h2>
            <form method="POST" novalidate onsubmit="return confirm('Are you sure you want to delete this student?');">
                <div class="form-group">
                    <label for="delete-id">Student ID</label>
                    <input id="delete-id" type="number" name="id" required>
                </div>
                <button class="button delete" type="submit" name="delete">Delete Student</button>
            </form>
        </div>
    </div>

    <div class="card" style="margin-top: 24px;">
        <h2>Student Records</h2>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (count($students) === 0): ?>
                    <tr>
                        <td colspan="4" class="empty-state">No student records found.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($students as $student): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($student['id']); ?></td>
                            <td><?php echo htmlspecialchars($student['name']); ?></td>
                            <td><?php echo htmlspecialchars($student['age']); ?></td>
                            <td><?php echo htmlspecialchars($student['gender']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
