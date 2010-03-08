
<div class="sf_admin_pagination">
  <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=1">
    <span class="rreview">&laquo;&laquo;</span>
  </a>

  <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getPreviousPage() ?]">
    <span class="review">&laquo;</span>
  </a>

  [?php foreach ($pager->getLinks() as $page): ?]
    [?php if ($page == $pager->getPage()): ?]
    <span class="page">[?php echo $page ?]</span>
    [?php else: ?]
      <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $page ?]">[?php echo $page ?]</a>
    [?php endif; ?]
  [?php endforeach; ?]

  <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getNextPage() ?]">
    <span class="forward">&raquo;</span>
  </a>

  <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getLastPage() ?]">
    <span class="fforward">&raquo;&raquo;</span>
  </a>
</div>
