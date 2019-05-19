<?php
$notes = get_notes();
?>
      <section>
        <h2>View notes</h2>
        <?php if (count($notes) === 0) { ?>
        <p>There is no notes.</p>
        <?php } ?>
        <ul>
          <?php
          for ($index = 0; $index < count($notes); $index++) {
            $note = $notes[$index];
            echo "<li><a href=\"?page=note&id={$note['id']}\">" . e($note['title']) . "</a></li>";
          }
          ?>
        </ul>
        <a href="?page=add" class="btn btn-primary">Add note</a>
      </section>