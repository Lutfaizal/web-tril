<?php if ($pager): ?>
    <div class="pagenavi">
        <?php if ($pager->hasPreviousPage()): ?>
            <a href="<?= $pager->getFirst() ?>" class="page"><i class="fa fa-angle-double-left"></i></a>
            <a href="<?= $pager->getPreviousPage() ?>" class="page"><i class="fa fa-angle-left"></i></a>
        <?php endif; ?>

        <?php foreach ($pager->links() as $link): ?>
            <a href="<?= $link['uri'] ?>" class="page <?= $link['active'] ? 'current' : '' ?>">
                <?= $link['title'] ?>
            </a>
        <?php endforeach; ?>

        <?php if ($pager->hasNextPage()): ?>
            <a href="<?= $pager->getNextPage() ?>" class="page"><i class="fa fa-angle-right"></i></a>
            <a href="<?= $pager->getLast() ?>" class="page"><i class="fa fa-angle-double-right"></i></a>
        <?php endif; ?>
    </div>
<?php endif; ?>