<?php
?>

<aside class="shadow">
    <?php echo yii\bootstrap5\Nav::widget([

        'options' => [
            'class' => 'd-flex flex-column nav-pills'
        ],
        'items' => [
            [
                'label' => 'Dashboard',
                'url' => ['/site/index']
            ],
            [
                'label' => 'Department',
                'url' => ['/department/index']
            ],
            [
                'label'=>'Assets',
                'url'=>['/myassets/index']
            ],
            [
                'label'=>'Section',
                'url'=>['/section/index']
            ],
            [
                'label' => 'Staff',
                'url' => ['/staff/index']
            ],
            [
                'label' => 'Issue Asset',
                'url' => ['/issue-asset/index'],
                
            ],
            [
                'label' => 'Recall Asset',
                'url' => ['/asset-register/index']
            ],
            [
                'label' => 'Dispose Asset',
                'url' => ['/dispose/index']
            ],
            [
                'label' => 'Repair Asset',
                'url' => ['mylogs/repair']
            ],
            [
                'label' => 'Asset Regester',
                'url' => ['/asset-reg/index']
            ],
            [
                'label' => 'Reports',
                'url' => ['/report/index']
            ],
        ]

    ]) ?>

</aside>
