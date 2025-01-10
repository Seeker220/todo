<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seeker220 To-Do List</title>
    <!-- Ensure the correct path to the marked.js script -->
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
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
        .content {
            margin: 20px 0;
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

    <h1>To-Do List</h1>
    <div class="content">
        <div id="todoContent">Loading...</div>
    </div>

    <a href="edit.php" class="btn">Edit To-Do List</a>

    <script>
        async function loadTodoContent() {
            try {
                const response = await fetch('todo.md'); // Fetch the todo.md file
                if (!response.ok) {
                    throw new Error('Failed to load todo.md');
                }
                const markdownText = await response.text(); // Get text of the Markdown file
                const htmlContent = marked.marked(markdownText); // Use marked.marked to convert the markdown to HTML
                document.getElementById('todoContent').innerHTML = htmlContent; // Display rendered HTML
            } catch (error) {
                document.getElementById('todoContent').innerText = 'Error: ' + error.message;
            }
        }

        loadTodoContent();
    </script>

</body>
</html>
