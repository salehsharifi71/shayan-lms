/**
 * Created by MrFenj on 25/08/2020.
 */

function copyById(elmid){var textStr=document.getElementById(elmid).value;copyToClipboard(textStr);}
function copyToClipboard(text){var temp=$("<input>");$("body").append(temp);temp.val(text).select();document.execCommand("copy");temp.remove()}
function copyLink(link){
    copyToClipboard(link);
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
 toastr.success('copied');

}

