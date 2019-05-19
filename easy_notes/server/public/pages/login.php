      <section>
        <h2>Log in</h2>
        <form action="login.php" method="POST">
          <div class="form-group">
            <label for="title">Username</label>
            <input type="text" class="form-control" id="user" name="user" placeholder="e.g. irizaki_mei" pattern="^[0-9A-Za-z_-]{4,64}$">
            <small class="form-text text-muted">format: <code>/^[0-9A-Za-z_-]{4,64}$/</code></small>
          </div>
          <button type="submit" class="btn btn-primary">Log in</button>
        </form>
      </section>