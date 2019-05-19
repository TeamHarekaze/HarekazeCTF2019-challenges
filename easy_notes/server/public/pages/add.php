      <section>
        <h2>Add note</h2>
        <form action="add.php" method="POST">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="e.g. What is Haifuri?">
          </div>
          <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" id="body" name="body" placeholder="e.g. Haifuri (High School Fleet) is an anime."></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </section>