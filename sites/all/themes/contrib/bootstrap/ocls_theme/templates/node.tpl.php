<?php
/**
 * @file
 * Returns the HTML for a node.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */
?>
<article class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php if ($title_prefix || $title_suffix || $display_submitted || $unpublished || !$page && $title): ?>
    <header>
      <?php if ($display_submitted): ?>	  
		  <?php if ($teaser):?>
			<p class="submitted teaser-submitted">
		  <?php endif; ?>
		  <?php if ($page):?>
			<p class="submitted node-submitted">
		  <?php endif; ?>			  
          <?php print $user_picture; ?>
		  <?php print t('Posted by') . ' ' . $name; ?> <?php print t('on') . ' ' . $date; ?>
        </p>
      <?php endif; ?>	
      <?php print render($title_prefix); ?>
      <?php if (!$page && $title): ?>
        <h2<?php print $title_attributes; ?> ><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
    </header>
  <?php endif; ?>
  
  <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);   	
  ?>
    <?php if ($teaser): ?>
  <div class="teaser-content">
    <?php print render($content); ?>
  </div>
<?php endif; ?>
  <?php if ($page): ?>
  <div class="page-content">
    <?php print render($content); ?>
  </div>
<?php endif; ?>
  

  <?php print render($content['links']); ?>
  <?php print render($content['comments']); ?>

</article>
