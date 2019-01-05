<form action="<?php echo esc_url(home_url()); ?>" method="get">
  <div class="form-group">
    <label for="search-field" class="sr-only"><?php esc_html_e('Search', 'usaidralf'); ?></label>
    <div class="input-group">
      <input type="text" id="search-field" name="s" class="form-control" />
      <div class="input-group-btn">
        <input type="submit" class="btn-search" value="" />
      </div>
    </div>
  </div>
</form>
