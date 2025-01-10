<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit To-Do List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
            color: #333;
        }
        h1 {
            color: #4CAF50;
        }
        textarea {
            width: 100%;
            height: 300px;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h1>Edit</h1>

    <form method="POST" action="edit.php">
        <textarea name="todoContent"><?php echo file_get_contents('todo.md'); ?></textarea><br>
        <button type="submit" class="btn">Save Changes</button>
    </form>

    <a href="index.php" class="btn">Back to View</a>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Save the updated content to todo.md
        $todoContent = $_POST['todoContent'];
        file_put_contents('todo.md', $todoContent); // Save changes to todo.md
        header('Location: index.php'); // Redirect back to the view page
        exit;
    }
    ?>

</body>
</html>
