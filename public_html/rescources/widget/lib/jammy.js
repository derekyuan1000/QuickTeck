$(document).ready(function() {
    var pagesUrl = $('#pagesUrl').val();
    var width = parseInt($('#carouselWidth').val());
    var height = parseInt($('#carouselHeight').val());
    function generatePages() {
        var _total, i, _link;

        _total = $("#carousel").rcarousel("getTotalPages");

        for (i = 0; i < _total; i++) {
            _link = $("<a href='#'></a>");

            $(_link)
				.bind("click", { page: i },
					function(event) {
					    $("#carousel").rcarousel("goToPage", event.data.page);
					    event.preventDefault();
					}
				)
				.addClass("bullet off")
				.appendTo("#pages");
        }

        // mark first page as active
        $("a:eq(0)", "#pages")
			.removeClass("off")
			.addClass("on")
			.css("background-image", "url(" + pagesUrl + "page-on.png)");

    }

    function pageLoaded(event, data) {
        $("a.on", "#pages")
			.removeClass("on")
			.css("background-image", "url(" + pagesUrl + "page-off.png)");

        $("a", "#pages")
			.eq(data.page)
			.addClass("on")
			.css("background-image", "url(" + pagesUrl + "page-on.png)");
    }

    $("#carousel").rcarousel(
		{
		    visible: 1,
		    step: 1,
		    speed: 700,
		    auto: {
		        enabled: true,
		        interval: 4000
		    },
		    width: width,
		    height: height,
		    start: generatePages,
		    pageLoaded: pageLoaded
		}
	);

    $("#carousel").show();

    $("#ui-carousel-next")
		.add("#ui-carousel-prev")
		.add(".bullet")
		.hover(
			function() {
			    $(this).css("opacity", 0.7);
			},
			function() {
			    $(this).css("opacity", 1.0);
			}
		);
});