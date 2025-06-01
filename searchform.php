<form role="search" method="get" class="d-flex" action="<?php echo esc_url(home_url('/')); ?>">
  <input type="search" class="form-control" placeholder="Search…" value="<?php echo get_search_query(); ?>" name="s" />
  <button type="submit" class="btn btn-outline-dark ms-2">Search</button>
</form>
