jQuery.ajax({type:"GET",url:viewsCacheL10n.admin_ajax_url,data:"postviews_id="+viewsCacheL10n.post_id+"&action=postviews",cache:!1,success: function (data) {
$('#j_post_views').text(data+'浏览');
}});