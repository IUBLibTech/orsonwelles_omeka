<?php
$pageTitle = __('Browse Collections');
echo head(array('title'=>$pageTitle,'bodyclass' => 'collections browse'));
?>
<div id="primary">
<div class="section">


<div class="row">
 <div class="grid"><!-- use show-for-medium only if the one-quarter is empty.-->
<h1>Orson Welles Radio Programs</h1>
<!-- .grid --></div>
<!-- .row --></div>

<?php
$sortLinks[__('Title')] = 'Dublin Core,Title';
$sortLinks[__('Date Added')] = 'added';
?>

<?php foreach (loop('collections') as $collection): ?>

<!--<div class="collection">-->
<div class="row">
 <div class="grid"><!-- use show-for-medium only if the one-quarter is empty. This prevents empty space on small viewports -->
   <div class="grid-item one-quarter show-for-medium">
  
  	<?php if ($collection_name = str_replace(' ', '_', strtolower(metadata('collection', array('Dublin Core', 'Title'))))) :?>
	<div class="collection_image">
		<img src="<?php
				  try  {
  					 $collection_name = str_replace('(', '', $collection_name );
					 $collection_name = str_replace(')', '', $collection_name );

					 echo img($collection_name . '.jpg', 'images/collection_images'); 
				  } catch (Exception $e) {
					 echo img('default.jpg', 'images/collection_images');
				  }
				  ?>">
	</div>	
     <?php endif; ?>
    </div> <!-- .grid-item -->
 
  	<div class="grid-item three-quarters">
	
		<div><h2><?php echo link_to_collection(); ?></h2></div>

    <?php if (metadata('collection', array('Dublin Core', 'Description'))): ?>
    <div class="collection-description">
	<?php $collection_description = metadata('collection', array('Dublin Core', 'Description')); ?>
        <?php echo text_to_paragraphs(mysnippet($collection_description,0,335,' ...')); ?>
    </div>
    <?php endif; ?>

    <?php if ($collection->hasContributor()): ?>
    <div class="collection-contributors">
        <p>
        <strong><?php echo __('Contributors'); ?>:</strong>
        <?php echo metadata('collection', array('Dublin Core', 'Contributor'), array('all'=>true, 'delimiter'=>', ')); ?>
        </p>
    </div>
    <?php endif; ?>
    


    <?php //fire_plugin_hook('public_collections_browse_each', array('view' => $this, 'collection' => $collection)); ?>

<!-- </div>end class="collection" -->
    </div> <!-- .grid-item -->
	<hr/>
<!-- .grid --></div>
<!-- .row --></div>

<?php endforeach; ?>


<?php //fire_plugin_hook('public_collections_browse', array('collections'=>$collections, 'view' => $this)); ?>
<!-- .section --></div>
<!-- #primary --></div>

<?php echo foot(); ?>
