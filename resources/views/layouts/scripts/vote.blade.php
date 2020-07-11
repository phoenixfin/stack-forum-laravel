<script>
    //     var span = upvote.getElementsByTagName('span')[0]
    //     var upvotenum = parseInt(span.innerHTML)
    //     span.innerHTML = upvotenum + 1

    function upvote(id, elem, type){
        var csrfToken='{{csrf_token()}}';
        var likesCount=parseInt($('#'+type+'-'+id+"-up").text());
        var user_id = 1; // sementara
        $.post("{{route('upvote')}}", {id: id, _token:csrfToken, type:type, user: user_id}, function (data) {
            if (data.message==='ok'){
                // $(elem).addClass('liked');
                $('#'+type+'-'+id+"-up").text(likesCount+1);
                $(elem).css({color:'blue'});
            } else {
                $(elem).css({color:'black'});
                $('#'+type+'-'+id+"-up").text(likesCount-1);
                // $(elem).removeClass('liked');
            }
        });
    }

    function downvote(id, elem, type) {
        var csrfToken='{{csrf_token()}}';
        var likesCount=parseInt($('#'+type+'-'+id+"-down").text());
        var user_id = 1; // sementara
        $.post("{{route('downvote')}}", {id: id, _token:csrfToken, type:type, user: user_id}, function (data) {
            if (data.message==='ok'){
                // $(elem).addClass('liked');
                $('#'+type+'-'+id+"-down").text(likesCount+1);
                $(elem).css({color:'red'});
            } else {
                $(elem).css({color:'black'});
                $('#'+type+'-'+id+"-down").text(likesCount-1);
                // $(elem).removeClass('liked');
            }
        });
    }

    // upvote.addEventListener("click", function(e) {
    //     e.preventDefault()
    //     var span = upvote.getElementsByTagName('span')[0]
    //     var upvotenum = parseInt(span.innerHTML)
    //     span.innerHTML = upvotenum + 1
    // })
    // downvote.addEventListener("click", function(e) {
    //     e.preventDefault()
    //     var span = downvote.getElementsByTagName('span')[0]
    //     var downvotenum = parseInt(span.innerHTML)
    //     span.innerHTML = downvotenum + 1

    // })

</script>