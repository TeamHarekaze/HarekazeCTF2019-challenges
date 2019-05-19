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
        <h2><?= e($note['title']); ?></h2>
        <form>
          <div class="form-group">
            <textarea class="form-control" disabled><?= e($note['body']); ?></textarea>
          </div>
          <div class="form-group">
            <a href="?page=delete&id=<?= $note['id'] ?>" class="btn btn-danger">Delete</a>
          </div>
        </div>
        </form>
      </section>