
    <div class="posts-slider">
        <h1 class="slider-title">Trending Posts</h1>
        <i class="fa fa-chevron-right next"></i>
        <i class="fa fa-chevron-left prev"></i>
        <div class="posts-wrapper">
            <?php foreach ($trendingPosts as $trendingPost): ?>
                <div class="post">
                    <div class="inner-post">
                        <img src="<?=URL['images'] . $trendingPost['image']?>" alt="<?=$trendingPost['title']?>" style="height: 200px; width: 100%; border-top-left-radius: 5px; border-top-right-radius: 5px;">
                        <div class="post-info">
                            <h3><a href="<?=URL['postView']?>"><?=$trendingPost['title']?></a></h3>
                            <div>
                                <i class="fa fa-user-o"></i> <?=$trendingPost['username']?>
                                &nbsp;
                                <i class="fa fa-calendar"></i> <?=dateTransform($trendingPost['created_at'])?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="content clearfix">
        <div class="page-content">
            <h1 class="recent-posts-title">Recent Posts</h1>
            <?php foreach ($recentPosts as $recentPost): ?>
            <div class="post clearfix">
                <img src="<?=URL['images'] . $recentPost['image']?>" class="post-image" alt="<?=$recentPost['title']?>">
                <div class="post-content">
                    <h2 class="post-title"><a href="<?=URL['postView']?>?title=<?=$recentPost['title']?>"><?=$recentPost['title']?></a></h2>
                    <div class="post-info">
                        <i class="fa fa-user-o"></i> <?=$recentPost['username']?>
                        &nbsp;
                        <i class="fa fa-calendar"></i> <?=dateTransform($recentPost['created_at'])?>
                    </div>
                    <p class="post-body">
                      <?=contentPart($recentPost['body'])?>
                    </p>
                    <a href="<?=URL['postView']?>?title=<?=$recentPost['title']?>" class="read-more">Read More</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>


