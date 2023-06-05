<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
 

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Universitybureau</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">

                     
            <?php

                
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    ['label' => 'Users', 'url' => ['users/index'], 'icon' => 'users'],       
                    [
                        'label' => 'CMS',
                        'icon' => 'fa-gear',     
                        'items' => [
                            ['label' => 'Posts/Blogs', 'url' => ['posts/index'], 'icon' => 'file-signature'],
                            ['label' => 'Pages', 'url' => ['pages/index'], 'icon' => 'file'],
                            ['label' => 'Setting', 'url' => ['setting/update','id'=>1], 'icon' => 'gear'],
                        ]
                    ],
                    [
                        'label' => 'Regions',
                        'icon' => 'globe',     
                        'items' => [
                            ['label' => 'Country', 'url' => ['country/index'], 'icon' => 'flag'],
                            ['label' => 'States', 'url' => ['state/index'], 'icon' => 'fort'],
                            ['label' => 'Cities', 'url' => ['cities/index'], 'icon' => 'building'],
                        ]
                    ],
                    ['label' => 'Recruiters', 'url' => ['recruiters/index'], 'icon' => 'users'],
                    ['label' => 'School', 'url' => ['school/index'], 'icon' => 'users'],
                    ['label' => 'Marketing Methods', 'url' => ['marketing-methods/index'], 'icon' => 'users'],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>