<script>
    const upvote = document.getElementsByClassName("upvote")[0];
    const downvote = document.getElementsByClassName("downvote")[0];


    upvote.addEventListener("click", function(e) {
        e.preventDefault()
        var span = upvote.getElementsByTagName('span')[0]
        var upvotenum = parseInt(span.innerHTML)
        span.innerHTML = upvotenum + 1
    })
    downvote.addEventListener("click", function(e) {
        e.preventDefault()
        var span = downvote.getElementsByTagName('span')[0]
        var downvotenum = parseInt(span.innerHTML)
        span.innerHTML = downvotenum + 1

    })

</script>