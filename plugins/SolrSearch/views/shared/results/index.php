<?php

/**
 * @package     omeka
 * @subpackage  solr-search
 * @copyright   2012 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */

?>


<?php queue_css_file('results'); ?>
<?php echo head(array('title' => __('Solr Search')));?>
   <div id="content" role="main" tabindex="-1">
	
	<div id="primary">


	  <div class="section main-heading">
	    <div class="row">
	      <div class="grid">
		<!-- use show-for-medium only if the one-quarter is empty. This prevents empty space on small viewports -->
		<div class="grid-item one-quarter left-sidebar show-for-medium">
		  <div class="">&nbsp;</div>
		</div>
		<div class="grid-item three-quarters">
		  <hgroup class="episode-title">
		    <h1><?php echo __('Search Orson Welles'); ?></h1>
		  </hgroup>
		</div> <!-- .grid-item -->
	      </div>   <!-- .grid -->
	    </div>   <!-- .row -->
	  </div>     <!-- .section -->




<!-- Search form. -->
	  <div class="section main-heading">
	    <div class="row">
	      <div class="grid">
		<!-- use show-for-medium only if the one-quarter is empty. This prevents empty space on small viewports -->
		<div class="grid-item one-quarter left-sidebar show-for-medium">
		  <div class="">&nbsp;</div>
		</div>
		<div class="grid-item three-quarters">
	  <div class="solr">
	  <form id="solr-search-form">
		<input type="submit" value="Search" />
		<span class="float-wrap">
		  <input type="text" title="<?php echo __('Search keywords') ?>" name="q" value="<?php
			echo array_key_exists('q', $_GET) ? $_GET['q'] : '';
		  ?>" />
		</span>
	  </form>
	</div> <!-- .solr -->
		</div> <!-- .grid-item -->
	      </div>   <!-- .grid -->
	    </div>   <!-- .row -->
	  </div>     <!-- .section -->
	  
	  


<!-- Applied facets. -->
<div id="solr-applied-facets">

  <ul>

    <!-- Get the applied facets. -->
    <?php foreach (SolrSearch_Helpers_Facet::parseFacets() as $f): ?>
      <li>

        <!-- Facet label. -->
        <?php $label = SolrSearch_Helpers_Facet::keyToLabel($f[0]); ?>
        <span class="applied-facet-label"><?php echo $label; ?></span> >
        <span class="applied-facet-value"><?php echo $f[1]; ?></span>

        <!-- Remove link. -->
        <?php $url = SolrSearch_Helpers_Facet::removeFacet($f[0], $f[1]); ?>
        (<a href="<?php echo $url; ?>">remove</a>)

      </li>
    <?php endforeach; ?>

  </ul>

</div>


<!-- Facets. -->
	  <div class="section main-heading">
	    <div class="row">
	      <div class="grid">
		<!-- use show-for-medium only if the one-quarter is empty. This prevents empty space on small viewports -->
		<div class="grid-item one-quarter left-sidebar show-for-medium">

  <div id="solr-facets">

  <h2><?php echo __('Limit your search'); ?></h2>

  <?php foreach ($results->facet_counts->facet_fields as $name => $facets): ?>

    <!-- Does the facet have any hits? -->
    <?php if (count(get_object_vars($facets))): ?>

      <!-- Facet label. -->
      <?php $label = SolrSearch_Helpers_Facet::keyToLabel($name); ?>
      <strong><?php echo $label; ?></strong>

      <ul>
        <!-- Facets. -->
        <?php foreach ($facets as $value => $count): ?>
          <li class="<?php echo $value; ?>">

            <!-- Facet URL. -->
            <?php $url = SolrSearch_Helpers_Facet::addFacet($name, $value); ?>

            <!-- Facet link. -->
            <a href="<?php echo $url; ?>" class="facet-value">
              <?php echo $value; ?>
            </a>

            <!-- Facet count. -->
            (<span class="facet-count"><?php echo $count; ?></span>)

          </li>
        <?php endforeach; ?>
      </ul>

    <?php endif; ?>

  <?php endforeach; ?>

</div>
		</div> <!-- .grid-item -->



<!-- Results. -->
		<div class="grid-item three-quarters">
<div id="solr-results">

  <!-- Number found. -->
  <h2 id="num-found">
    <?php echo $results->response->numFound; ?> results
  </h2>

  <?php foreach ($results->response->docs as $doc): ?>

    <!-- Document. -->
    <div class="result">

      <!-- Header. -->
      <div class="result-header">

        <!-- Record URL. -->
        <?php $url = SolrSearch_Helpers_View::getDocumentUrl($doc); ?>

        <!-- Title. -->
        <a href="<?php echo $url; ?>" class="result-title"><?php
                $title = is_array($doc->title) ? $doc->title[1] : $doc->title;
                if (empty($title)) {
                    $title = '<i>' . __('Untitled') . '</i>';
                }
                echo $title;
            ?></a>

        <!-- Result type. -->
        <!-- <span class="result-type">(<?php echo $doc->resulttype; ?>)</span> -->

      </div> <!-- .result-header -->

      <!-- Highlighting. -->
      <?php if (get_option('solr_search_hl')): ?>
        <ul class="hl">
          <?php foreach($results->highlighting->{$doc->id} as $field): ?>
            <?php foreach($field as $hl): ?>
              <li class="snippet"><?php echo strip_tags($hl, '<em>'); ?></li>
            <?php endforeach; ?>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>


    </div>  <!-- .result -->
  <?php endforeach; ?>
		</div> <!-- .grid-item -->
<?php echo pagination_links(); ?>
	      </div>   <!-- .grid -->
	    </div>   <!-- .row -->
	  </div>     <!-- .section -->

</div>



<?php echo foot();
