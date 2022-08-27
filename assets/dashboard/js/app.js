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


// Clipboard Article Content
$(function () {

    $(".form-group span.clipboard-icon").click(function(){
        

    });
});









// tinymce (Text Editior) to admin dashboard
tinymce.init({
    selector: '.text-editor',
    // directionality: '{{ get_option('language_direction', 'ltr') }}',
    // language: '{{ file_exists(public_path('assets/vendors/tinymce/langs/' . app()->getLocale() . '.js')) ? app()->getLocale() : 'en' }}',
    // content_css: '{{ asset('assets/css/editor.css') }}',
    height: '500px',
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    paste_preprocess: function (plugin, args) {
        // console.log("Attempted to paste: ", args.content);
        // // replace copied text with empty string
        
        swal({
            icon: 'error',
            title: "Oh.. Content can't be copy/paste",
            text: 'Article content must be uniqe for approved, So you should write an attractive content so can give you more view and make visitor stay long time reading your article. ',
            type: "error",
        });
        
        args.content = '';
    },
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});






// Check if exist reson for need_imporvment 
$(function () {
    $("button[type='submit'][value='5']").click(function (e) { 
        
        var review_messege = $("#select2-review_messege-container").attr('title');
        if ( review_messege == "Choose review messege" ){
            e.preventDefault();
            alert("Please Choose Review Messege.")
        }

    });
});