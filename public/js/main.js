jQuery.fn.slideLeftHide = function( speed, callback ) { this.animate( { width: "hide", paddingLeft: "hide", paddingRight: "hide", marginLeft: "hide", marginRight: "hide" }, speed, callback ); }
jQuery.fn.slideLeftShow = function( speed, callback ) { this.animate( { width: "show", paddingLeft: "show", paddingRight: "show", marginLeft: "show", marginRight: "show" }, speed, callback ); }


$(document).ready(function () {
    if($.support.pjax) {
        $(document).pjax('a', '#pjax-container', {timeout: 5000});
        $(document).on('submit', 'form', function(event) {
            event.preventDefault();
            $.pjax.submit(event, '#pjax-container');
        });
    }

    $(document).on('pjax:send', function() {
        $('#pjax-loading').slideLeftShow(300);
    });
    $(document).on('pjax:success', function() {
        $('#pjax-loading').fadeOut(500);
    });

    $(document).on('pjax:popstate', function() {
        $.pjax.reload('#pjax-container', {});
    });

    $(document).trigger('pjax:success');
    $(document).trigger('pjax:end');
});

var timeout_flash;

$(document).on('pjax:end' , function() {
    twemoji.parse(
        document.body,
        {
            callback: function(icon, options) {
            return '//cdn.bootcss.com/twemoji/1.4.1/' + options.size + '/' + icon + '.png';
            },
            size: 16
        }
    );
    $('[data-toggle="tooltip"]').tooltip();
    clearTimeout(timeout_flash);
    timeout_flash = setTimeout(function() {
        $("#flashcontainer").slideUp(500);
    }, 5000);
    var $gird = $('.grid').masonry({
        columnWidth: '.grid-sizer',
        gutter: '.gutter-sizer',
        itemSelector: '.grid-item',
        percentPosition: true,
        isResizeBound: true
    });
    $grid.imagesLoaded().progress(function() {
        $grid.masonry('layout');
    });
});
