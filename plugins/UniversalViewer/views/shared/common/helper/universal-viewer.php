<?php
/**
 * @var Omeka_View $this
 * @var string $urlManifest
 * @var string $class
 * @var string $style
 * @var string $locale
 * @var string $config
 */

if (empty($style)) $style = 'height: 600px;';
if (!empty($style)) $style = ' style="' . $style . '"';
if (!empty($locale)) $locale = ' data-locale="' . $locale . '"';
?>
# Get Title from IIIF Manifest for use as an iframe title
 $iiif_title = 'IIIF Viewer'; # set a default value in case there is no Title or the manifest is unreachable (in which case we have a bigger issue)
 $iiif_manifest = json_decode(file_get_contents($urlManifest));
 if($iiif_manifest){ 
 		foreach($iiif_manifest->metadata as $m){
 				if($m->label == "Title"){
 						$iiif_title = htmlentities($m->value);
 				}
 		}
 }
<div class="uv <?= $class ?>" data-config="<?= $config ?>" data-uri="<?= $urlManifest ?>" data-title="<?= $iiif_title ?>"<?= $locale ?><?= $style ?>></div>
