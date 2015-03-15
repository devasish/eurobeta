/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function _ajax(url) {
    $.ajax({
        url : url,
        success: function (response) {
            $("#main-content").html(response);
            //console.log(response);
        },
        error: function (jqXHR, txtStatus, errorThrown) {
            console.log(errorThrown);
        }
    })

}

function _router(hash) {
    var maps = [
        
    ];
    var staticPart = "";
    var spltd = has.split("/");
    
    $.each(spltd.indexOf(":"))
}

$(function () {
    $(window).on('hashchange', function () {
        var hash = location.hash;
//        document.title = "The hash is " + (hash.replace(/^#/, "") || "blank") + ".";
        hash = (hash.replace(/^#/, "") || "blank");
        
        _ajax(hash);
        
        console.log(hash);

        // Iterate over all nav links, setting the "selected" class as-appropriate.
        $(".side-nav a").each(function () {
            var that = $(this);
            that.parent('li').removeClass('active');
            if (that.attr("href") === hash) {
                that.parent('li').addClass('active');
            }
        });
    }).trigger('hashchange')
});
