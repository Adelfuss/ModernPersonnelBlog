<header class="clearfix">
    <div class="logo">
        <a href="<?=SITE_DOMAIN?>">
            <h1 class="logo-text"><span><?=META_PARAMS['index_title']?></span></h1>
        </a>
    </div>
    <div class="fa fa-reorder menu-toggle"></div>
    <nav>
        <ul>
            <?php foreach ($menu as $menu_item): ?>
            <li><a href="<?=$menu_item['url']?>"><?=$menu_item['name']?></a></li>
            <?php endforeach; ?>
            <?php if (isset($_SESSION['id'])): ?>
                <li>
                    <a href="#" class="userinfo">
                        <i class="fa fa-user"></i>
                        <?=$_SESSION['username']?>
                        <i class="fa fa-chevron-down"></i>
                    </a>
                    <ul class="dropdown">
                        <?php if ($_SESSION['admin']): ?>
                            <li><a href="<?= "admin/dashboard.php";?>">Dashboard</a></li>
                        <?php endif; ?>
                        <li><a href="<?="logout.php"?>" class="logout">logout</a></li>
                    </ul>
                </li>
            <?php else : ?>
                <li><a href="<?= "/register.php";?>">Sign up</a></li>
                <li><a href="<?= "/login.php";?>"><i class="fa fa-sign-in"></i>Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

