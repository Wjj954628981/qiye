<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user1-128x128.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                
                <p>王佳颉</p>
                

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>  

        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => '生产相关', 'options' => ['class' => 'header']],
                    ['label' => 'Bom信息', 'icon' => 'file-code-o', 'url' => '#',
                    		'items' => [
                    				['label'=>'产品类别','icon'=>'circle-o','url'=>['/product-category'],],
                    				['label'=>'产品列表','icon'=>'circle-o','url'=>['/product'],],
                    				['label'=>'物料类别','icon'=>'circle-o','url'=>['/material-category'],],
                    				['label'=>'物料列表','icon'=>'circle-o','url'=>['/material'],],
                    				
                    		]
                    ],
                    ['label'=>'我要买','icon' => 'file-code-o', 'url'=>['/orderlist/create']],
                    ['label' => '订单列表','icon' => 'file-code-o',  'url' => ['/orderlist']],
                    ['label'=>'流水线领料单','icon' => 'file-code-o', 'url'=>['/process-getorder','id'=>'']],
                    ['label'=>'供货商','icon' => 'file-code-o', 'url'=>['/supplier']],
                    ['label' => '仓库',
                    'icon' => 'file-code-o', 
                    'items' => [
                                    [
                                        'label' => '仓库情况',
                                        'url' => ['/warehouse'],
                                    ],
                                    [
                                        'label' => '缺料单',
                                        'url' => ['/material-lack-order'],
                                    ],
                                    [
                                        'label' => '出库单',
                                        'url' => ['/material-warehouse-out-order'],
                                    ],
                                    [
                                        'label' => '入库单',
                                        'url' => ['/material-warehouse-in-order'],
                                    ]
                               ]
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
