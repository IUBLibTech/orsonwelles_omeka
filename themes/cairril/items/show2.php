
<!-- Output the site title. -->
<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'item show','bodyid' => 'item')); ?>

<?php $programs = array('First Person Singular', 'Mercury Theatre on the Air', 'Campbell Playhouse', 'Orson Welles Show', 'Ceiling Unlimited', 'Hello Americans', 'Orson Welles Almanac', 'This Is My Best', 'Orson Welles Commentaries', 'Mercury Summer Theatre', 'More');
?>

  <div id="content" role="main" tabindex="-1">
	
	<div id="primary">
	  <div class="section">
	    <div class="row">
	      <div class="grid">
		<!-- use show-for-medium only if the one-quarter is empty. This prevents empty space on small viewports -->
		<div class="grid-item one-quarter left-sidebar">
		  <div class="featured-image">
			<?php if (true): 
				$collection_name = str_replace(' ', '_', strtolower(metadata('item', 'Collection Name'))) ;
			    $collection_name = str_replace('(', '', $collection_name);
			    $collection_name = str_replace(')', '', $collection_name);
				?>
				<img src="<?php echo img($collection_name . '.jpg', 'images/collection_images'); ?>" />
			<?php endif; ?>
		  </div>
		  <nav>
		    <ul>
<!-- If the item belongs to a collection, the following creates a link to that collection. -->
<?php if (metadata('item', 'Collection Name')): ?>
				<li><?php echo link_to_collection_for_item($text='Browse Episodes'); ?></li>
<?php endif; ?>
		      <li><a href="/about">About</a></li>
		    </ul>
		  </nav>
		</div>
		<div class="grid-item three-quarters">
		  <hgroup class="episode-title">
		  
          <?php $itemTitles = metadata('item', array('Dublin Core', 'Title'), array('all'=>true)); ?>
          <?php $count_array = count($itemTitles); ?>
          <?php if ($count_array > 1) {
					if (metadata('item', 'Collection Name') == 'More') {
				     	echo '<h1>'.$itemTitles[1].'</h1>'; 
				     	echo '<h2>'.$itemTitles[0].'</h2>'; 
					} else {
				    	echo '<h1>'.metadata('item', 'Collection Name').'</h1>'; 
				     	echo '<h2>'.$itemTitles[0].'</h2>'; 
					}
				} else {
			     	echo '<h1>'.$itemTitles[0].'</h1>'; 
				} 
				?>
		  
	    

		    
	
		  </hgroup>
		  
		  <div class="player undone">
<!-- Output the Shortcode Video plugin -->
<?php if (metadata('item', array('Streaming Video', 'HTTP Streaming Directory'))):
	fire_plugin_hook('video_items_show', array('view' => $this, 'item' => $item)); ?>
<?php endif; ?>
		  </div>

		  <!--<h3 class="disclaimer">Disclaimer</h3>-->

<?php if (metadata('item', 'has files')): ?>
	  <div class="pageturner undone">
	<?php	fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>
	  </div>		  	
<?php endif;?>

    <div id="item-metadata">
        <?php echo all_element_texts('item'); ?>
    </div>

		</div> <!-- .grid-item -->
	      </div>   <!-- .grid -->
	    </div>   <!-- .row -->
	  </div>     <!-- .section -->




	

<?php echo foot(); ?>
<?php //endif; ?>
