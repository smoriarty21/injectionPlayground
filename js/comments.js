/**
 * Created by smoriarty on 7/4/14.
 */
$(function() {
    $.post('/getcomments.php', {}, function(data) {
        console.log(data[0].comment);

        for(i=0;i<data.length;i++) {
            $("#comment-tbody").append("<tr><td width='300'>"+data[i].comment+"</td><td>"+data[i].name+"</td></tr>");
            $("#comment-tbody").append("<tr><td colspan='2'><hr></td></tr>");
        }
    }, 'json');
});
