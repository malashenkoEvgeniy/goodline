"use strict";



    function getImages() {
        let lazy = document.getElementsByClassName('lazy');

        for (var i = 0; i < lazy.length; i++) {
            lazy[i].src = lazy[i].getAttribute('data-src');

        }
    }
    $(document).ready(function(){
        getImages();
    });


document.addEventListener("DOMContentLoaded", function() {
    var lazyLoadVideos = [].slice.call(document.querySelectorAll("video.lazy-video"));
    if ("IntersectionObserver" in window) {
        var lazyVideoObserver = new IntersectionObserver(function(entries, observer) {
            entries.forEach(function(video) {
                if (video.isIntersecting) {
                    for (var source in video.target.children) {
                        var videoSource = video.target.children[source];
                        if (typeof videoSource.tagName === "string" && videoSource.tagName === "SOURCE") {
                            videoSource.src = videoSource.dataset.src;
                        }
                    }
                    video.target.load();
                    video.target.classList.remove("lazy-video");
                    lazyVideoObserver.unobserve(video.target);
                }
            });
        });
        lazyLoadVideos.forEach(function(lazyVideo) {
            lazyVideoObserver.observe(lazyVideo);
        });
    }
});
