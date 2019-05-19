      <section>
        <h2>Get flag</h2>
        <p>
          <?php
          if (is_admin()) {
            echo "Congratulations! The flag is: <code>" . getenv('FLAG') . "</code>";
          } else {
            echo "You are not an admin :(";
          }
          ?>
        </p>
      </section>