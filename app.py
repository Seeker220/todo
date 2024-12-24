from flask import Flask, render_template, request, redirect, url_for

app = Flask(__name__)

@app.route("/")
def preview():
    """Render the preview page."""
    return render_template("preview.html")

@app.route("/edit", methods=["GET", "POST"])
def edit():
    """Allow editing of the Markdown file."""
    todo_file = "static/todo.md"
    if request.method == "POST":
        new_content = request.form.get("content", "")
        with open(todo_file, "w", encoding="utf-8") as file:
            try:
                file.write(new_content)
            except exception as e:
                return e
        return redirect(url_for("preview"))
    else:
        try:
            with open(todo_file, "r", encoding="utf-8") as file:
                content = file.read()
        except FileNotFoundError:
            content = ""
            with open(todo_file, "w", encoding="utf-8") as file:
                file.write("")  # Create an empty file
        return render_template("edit.html", content=content)

if __name__ == "__main__":
    app.run(debug=True)
