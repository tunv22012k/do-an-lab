import axios from 'axios';
import $ from 'jquery';
import moment from 'moment';

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.$ = window.jQuery = $;

window.moment = moment;

$.popup = {
    confirm : function(message,callback) {
        setTimeout(() => {
            // console.log($('meta[name="refresh"]').attr('content'));
            if($('meta[name="refresh"]').attr('content') == "yes"){
                removeLoading();
            }
        }, 5000);

        $("body").addClass("opacityBtn");
        setTimeout(() => {
            if (confirm(message) == true) {
                $("body").removeClass("opacityBtn");
                addLoading();
                callback(true)
            } else {
                $("body").removeClass("opacityBtn");
                removeLoading();
                callback(false)
            }
        }, 0);
    },
    confirmNoLoading : function(message, callback) {
        callback(confirm(message));
    },
    info: function(message){
        alert(message);
    },
    warning : function(message){
        alert(message);
    },
    error : function(message){
        alert(message);
    },
}
