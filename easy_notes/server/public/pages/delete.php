<?php
$notes = get_notes();

if (!isset($_GET['id']) || empty($_GET['id'])) {
  redirect('/?page=home');
}
$id = $_GET['id'];

$index = find_note($notes, $id);
if ($index === FALSE) {
  redirect('/?page=home');
}

$note = $notes[$index];
?>
      <section>
        <h2>Delete note</h2>
        <p>Do you really want to delete this note? Once you press the "Delete" button, the note will be permanently deleted.</p>
        <form>
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= e($note['title']); ?>" disabled>
          </div>
          <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" id="body" name="body" disabled><?= e($note['body']); ?></textarea>
          </div>
          <a href="delete.php?id=<?= $note['id'] ?>" class="btn btn-danger">Delete</a>
        </form>
      </section>