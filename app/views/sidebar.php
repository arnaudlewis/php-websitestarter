    <button type="button"  href="#nav-right" class="right-top-corner  navbar-switcher menu-burger"></button>
    <div id="nav-right" class="navbar navbar-right navbar-collapse navbar-dark">
        <div class="navbar-container">
            
            <input type="search" placeholder="Search" />
            
            <div class="navbar-section">
                <h3 class="blog-nav-item"><?= home_link('Home') ?></h3>
            </div>
            
            <div class="navbar-section">
                <h3 class="blog-nav-item"><?= bloghome_link('Blog\'s Home') ?></h3>
            </div>

             <?php foreach(get_pages() as $page) { ?>
             <div class="navbar-section">
                <h3><?= page_link($page) ?></h3>
                <ul>
                    <?php foreach($page['children'] as $subpage) { ?>
                    <li><?= page_link($subpage) ?></li>
                    <?php } ?>
                </ul>
            </div>
            <?php } ?>

            <div class="navbar-section">
                <h3>Archives</h3>
                <ul>
                    <?php foreach(get_calendar() as $entry) { ?>
                    <li><a href="<?= $entry['link'] ?>"><?= $entry['label'] ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
