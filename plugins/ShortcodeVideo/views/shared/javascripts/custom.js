
            document.addEventListener('DOMContentLoaded', function() {
                var mediaElements = document.querySelectorAll('video, audio'), total = mediaElements.length;

                for (var i = 0; i < total; i++) {
                        new MediaElementPlayer(mediaElements[i], {
                        pluginPath: 'https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.5/',
                        shimScriptAccess: 'always',
                        success: function (mediaElement, originalNode, instance) {
			            }
		            });
                }
            });
