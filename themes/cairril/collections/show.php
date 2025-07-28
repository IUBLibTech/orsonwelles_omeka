<?php
$collectionTitle = metadata('collection', 'display_title');
?>

<?php echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show')); ?>
    <div class="featured-quote-and-image">
	<div class="section">
	  <div class="row">
	    <div class="grid">
	      <!-- use show-for-medium only if the one-quarter is empty. This prevents empty space on small viewports -->
	      <div class="grid-item one-quarter featured-quote show-for-medium">&nbsp;</div>
	      <div class="grid-item three-quarters">
	      <?php if ($collection_name = str_replace(' ', '_', strtolower(metadata('collection', array('Dublin Core', 'Title'))))) :?>
			<img src="<?php
				  try  {
					 $collection_name = str_replace('(', '', $collection_name );
					 $collection_name = str_replace(')', '', $collection_name );
					 echo img($collection_name . '_large.jpg', 'images/programs'); 
				  } catch (Exception $e) {
					 echo img('default_large.jpg', 'images/programs');
				  }
				  ?>">
     	<?php endif; ?>

      
	      </div> <!-- .grid-item -->
	    </div>   <!-- .grid -->
	  </div>   <!-- .row -->
	</div>     <!-- .section -->
    </div>	   <!-- .featured-quote-and-image -->
      
    <div id="content" role="main" tabindex="-1">
	<div id="primary">
	  <div class="section">
	    <div class="row">
	      <div class="grid">
		<!-- use show-for-medium only if the one-quarter is empty. This prevents empty space on small viewports -->
		<div class="grid-item one-quarter show-for-medium">&nbsp;</div>
		<div class="grid-item three-quarters">
			<hgroup class="">
				<h1><?php echo $collectionTitle; ?></h1>
		  	</hgroup>
		  	<div class="prose">
				<p><?php echo metadata('collection', array('Dublin Core', 'Description')); ?></p>

    <?php if (metadata('collection', 'total_items') > 0): ?>
        <?php foreach (loop('items') as $item): ?>
		    <div class="episode-info">

        	<?php $itemTitles = metadata('item', array('Dublin Core', 'Title'), array('all'=>true)); ?>
          <?php $count_array = count($itemTitles); ?>
           <?php if ($count_array > 1) {
					$itemTitle = $itemTitles[0];
				} else {
					$itemTitle = $itemTitles[0];
				} 
				?>
            <h2><?php echo link_to_item($itemTitle, array('class'=>'permalink', 'style'=>'display: inline;' )); ?>
<?php if (metadata('item', array('Dublin Core', 'Date'))): ?>
 -- <p style="font-size: 16px; display:inline"x"><?php echo metadata('item', array('Dublin Core', 'Date'));?></p></h2>
<?php endif; ?>
            <?php if ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>250))): ?>
				<p><?php echo $description; ?></p>
            <?php endif; ?>
 		  </div> <!-- .episode-info -->
      
        <?php endforeach; ?>
		  </div> <!-- .prose -->

   <?php else: ?>
        <p><?php echo __("There are currently no items within this collection."); ?></p>
    <?php endif; ?>

<?php fire_plugin_hook('public_collections_show', array('view' => $this, 'collection' => $collection)); ?>
		</div> <!-- .grid-item -->
	      </div>   <!-- .grid -->
	    </div>   <!-- .row -->
	  </div>     <!-- .section -->

<?php echo foot(); ?>
