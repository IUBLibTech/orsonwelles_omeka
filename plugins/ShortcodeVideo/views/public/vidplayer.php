<?php 
//echo '<pre>';
//var_dump($params);
$float = isset($params['float'])
	? html_escape($params['float'])
	: 'left';
$width = isset($params['width'])
	? html_escape($params['width'])
	: '100%';
$height = isset($params['height'])
	? html_escape($params['height'])
	: '50px';
$current = isset($params['current'])?html_escape($params['current']) : false;
$external = isset($params['ext'])?html_escape($params['ext']) : false;
?>
<?php 

?>

<div class="player">
<?php //$sources=metadata('item',array('Streaming Video', 'HTTP Video Filename'),array('all'=>true));
	//print_r($sources);
//exit;
	?>

	<audio id="player" preload="auto" controls style="max-width:100%;">
	
	<?php $sources=metadata('item',array('Streaming Video', 'HTTP Video Filename'),array('all'=>true));?>
<?php if ($sources):
	foreach ($sources as $source){ 
		$bitrate="Low";
		if (strstr($source, 'high')) {$bitrate = 'High';}
		if (strstr($source, 'medium')) {$bitrate = 'Medium';}
		if (strstr($source, 'low')) {$bitrate = 'Low';}
		?>
		<source src="<?php echo metadata('item',array('Streaming Video','HTTP Streaming Directory')).$source;?>" data-quality="Stream" title='<?php echo $bitrate; ?>'>
	<?php };?>
<?php endif; ?>

	</audio>
</div>

<br>

<script>
            document.addEventListener('DOMContentLoaded', function() {
                var mediaElements = document.querySelectorAll('video, audio'), total = mediaElements.length;

                for (var i = 0; i < total; i++) {
						var features = ['prevtrack', 'playpause', 'nexttrack', 'current', 'progress', 'duration', 'quality',  'speed', 'skipback', 'jumpforward','markers', 'volume', 'playlist', 'loop', 'shuffle', 'contextmenu'];
                        new MediaElementPlayer(mediaElements[i], {
                        pluginPath: 'https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.5/',
                        shimScriptAccess: 'always',
						features: features,	
                        success: function (mediaElement, originalNode, instance) {
			            }
		            });
                }
            });
</script>
