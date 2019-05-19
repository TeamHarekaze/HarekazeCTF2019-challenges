      <section class="jumbotron">
        <h1>Easy Notes</h1>
        <p class="lead">Easy Notes is a note-taking service. You can write notes and export them as a .zip or .tar! </p>
        <p class="lead">Since this is an experimental service, there might be a lot of bugs… If you find bugs, please do not abuse them!</p>
        <?php if (!is_logged_in()) { ?>
        <a href="?page=login" class="btn btn-primary">Log in</a>
        <?php }; ?>
      </section>