var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var players = document.getElementsByClassName("youtube-video");

function onYouTubeIframeAPIReady() {
	player = [];
	for (var i = 0; i < players.length; i++) {
		player[players[i].id] = new YT.Player(players[i].id, {
			videoId: players[i].id,
			events: {
				'onReady': onPlayerReady,
				//'onStateChange': onPlayerStateChange
				playerVars: { controls: 0, modestbranding: 1, rel: 0 },
			}
		});
	}
}

function onPlayerReady() {
	for (var i = 0; i < players.length; i++) {
		//console.log(document.getElementById('video-container-' + players[i].id));
		if (document.getElementById('video-container-' + players[i].id)) {
			document.getElementById('video-container-' + players[i].id).style.opacity = "1";
		}
	}
}

window.onYouTubeIframeAPIReady = onYouTubeIframeAPIReady;
window.onPlayerReady = onPlayerReady;
