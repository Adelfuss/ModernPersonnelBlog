<div class="sidebar">
    <div class="search-div">
        <form action="<?=URL['search']?>" method="post">
            <input type="text" name="search-term" class="text-input" placeholder="Search...">
        </form>
    </div>
    <div class="section topics">
        <h2>Topics</h2>
        <ul>
            <?php foreach ($topics as $key=>$topic): ?>
                <a href="<?=URL['topicView']?>?topic=<?=$topic['name']?>"><li><?=$topic['name']?></li></a>
            <?php endforeach; ?>
        </ul>
    </div>
</div>