import fs from 'fs';
import path from 'path';

export default function handler(req, res) {
  if (req.method === 'POST') {
    const filePath = path.resolve('./public/todo.md');
    const { content } = req.body;

    // Save the content to `todo.md`
    fs.writeFile(filePath, content, err => {
      if (err) {
        res.status(500).json({ error: 'Failed to save file' });
      } else {
        res.status(200).json({ message: 'File saved successfully!' });
      }
    });
  } else {
    res.status(405).json({ error: 'Method not allowed' });
  }
}
