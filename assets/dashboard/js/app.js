$(window).on('load', function () {
    var url = window.location.href;
    $('.nav-sidebar a').filter(function () {
        return this.href === url
    }).addClass('active').parents('.nav-sidebar li.has-treeview').addClass('menu-open').find('> a').addClass('active');
});

// https://labs.abeautifulsite.net/jquery-minicolors/index.html#instantiation
// https://github.com/claviska/jquery-minicolors
$('.color-select').minicolors({
    opacity: true,
    format: 'rgb',
    theme: 'bootstrap',
});

$('.conditional').conditionize();

$(function () {
    $('[data-toggle="tooltip"]').tooltip();

    $('.select2').select2();
});



$(function () {
    // clipboard-icon
    $(".form-group span.clipboard-icon").click(function(){
        
        var clipboardIcons = $(this)

        var content = clipboardIcons.siblings('div.clipboard-content');
        // alert(content);

        clipboardIcons.children('i').toggleClass('d-none');

        setTimeout( function() { 
            clipboardIcons.children('i').toggleClass('d-none');
        }, 3000);

        // clipboard Process
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(content).text()).select();
        document.execCommand("copy");
        $temp.remove();



        





    });
});


