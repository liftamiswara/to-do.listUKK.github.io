<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'todolist_db');

// Ambil Data
$result = mysqli_query($koneksi, "SELECT * FROM tasks ORDER BY due_date ASC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>To-Do List</h2>
        <form method="POST">
            <input type="text" name="task" placeholder="Masukkan Task Baru" required>
            <select name="priority" required>
               <option value="" disabled selected>Pilih Priority</option>
               <option value="Biasa">Biasa</option>
               <option value="Penting">Penting</option>
               <option value="Penting Sekali">Penting Sekali</option>
        </select>

            <input type="date" name="due_date" required>
            <button type="submit" name="add_task">Tambah</button>
        </form>

        <table>
            <tr>
                <th>No</th>
                <th>Task</th>
                <th>Prioritas</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php $no = 1; while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['task']; ?></td>
                <td><?= $row['priority']; ?></td>
                <td><?= $row['due_date']; ?></td>
                <td><?= $row['status']; ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id']; ?>" class="edit">Edit</a>
                    <a href="index.php?done=<?= $row['id']; ?>" class="done">Selesai</a>
                    <a href="index.php?delete=<?= $row['id']; ?>" class="delete" onclick="return confirm('Hapus task ini?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
