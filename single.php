<body>
<article>
   
</article>
<div class="vote">
    <div class="vote_bar">
        <div class="vote_progress" style="width:<?= ($post->like_count + $post->dislike_count) == 0 ? 100 : round(100 * ($post->like_count / ($post->like_count + $post->dislike_count))); ?>%;"></div>
    </div>
    <div class="vote_btns">
        <form action="like.php?ref=articles&ref_id=9&vote=1" method="POST">
            <button type="submit" class="vote_btn vote_like"><i class="far fa-thumbs-up"></i><?= $post->like_count?></button>
        </form>
        <form action="like.php?ref=articles&ref_id=9&vote=-1" method="POST">
            <button type="submit" class="vote_btn vote_dislike"><i class="far fa-thumbs-down"></i><?= $post->dislike_count?></button>
        </form>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>