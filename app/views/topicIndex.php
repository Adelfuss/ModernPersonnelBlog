<div class="content clearfix">
    <div class="page-content">
        <h1 class="recent-posts-title">Recent Posts</h1>
        <?php foreach ($posts as $post): ?>
            <div class="post clearfix">
                <img src="<?=URL['images'] . $post['image']?>" class="post-image" alt="<?=$post['title']?>">
                <div class="post-content">
                    <h2 class="post-title"><a href="<?=URL['postView']?>?title=<?=$post['title']?>"><?=$post['title']?></a></h2>
                    <div class="post-info">
                        <i class="fa fa-user-o"></i> <?=$post['username']?>
                        &nbsp;
                        <i class="fa fa-calendar"></i> <?=dateTransform($post['created_at'])?>
                    </div>
                    <p class="post-body">
                        <?=contentPart($post['body'])?>
                    </p>
                    <a href="<?=URL['postView']?>?title=<?=$post['title']?>" class="read-more">Read More</a>
                </div>
            </div>
        <?php endforeach; ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php if ($pageCount > 1): ?>
                <li class="page-item"><a class="page-link" href="<?=URL['topicView']?>?topic=<?=$topicName?>&page=<?=$isActive-1?>">Previous</a></li>
                <?php endif; ?>
                <?php for($i = 1; $i <= $pageCount ; $i++): ?>
                <?php if ($i == $isActive) :?>
                        <li class="page-item active"><a class="page-link" href="<?=URL['topicView']?>?topic=<?=$topicName?>&page=<?=$i?>"><?=$i?></a></li>
                <?php else : ?>
                <li class="page-item"><a class="page-link" href="<?=URL['topicView']?>?topic=<?=$topicName?>&page=<?=$i?>"><?=$i?></a></li>
                    <?php endif; ?>
                <?php endfor; ?>
                <?php if ($pageCount < ($i-1)): ?>
                <li class="page-item"><a class="page-link" href="<?=URL['topicView']?>?topic=<?=$topicName?>&page=<?=$isActive+1?>">Next</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>


