<?php include __DIR__ . '/../header.php'; ?>

<?php if(!empty($articles)): ?>
    <a href="/admin/comments">К комментариям</a>
    <hr>
    <?php foreach ($articles as $article): ?>
        <h2><a href="/articles/<?= $article->getId() ?>/edit"><?= $article->getName() ?></a></h2>
        <p><?= $article->getText() ?></p>
        <hr>
    <?php endforeach; ?>
    <div style="text-align: center">
        <?php for ($pageNum = 1; $pageNum <= $pagesCount; $pageNum++): ?>
            <?php if ($currentPageNum === $pageNum): ?>
                <b><?= $pageNum ?></b>
            <?php else: ?>
                <a href="/admin/articles<?= $pageNum === 1 ? '' : '/' . $pageNum ?>"><?= $pageNum ?></a>
            <?php endif; ?>
        <?php endfor; ?>
    </div>
<?php endif; ?>

<?php if(!empty($comments)): ?>
    <a href="/admin/articles">К статьям</a>
    <hr>
    <?php foreach ($comments as $comment): ?>
        <b><?= $comment->getAuthor()->getNickname()?></b>
        <p><a href="/comments/<?= $comment->getId() ?>/edit"><?= $comment->getText() ?></a></p>
        <hr>
    <?php endforeach; ?>
    <div style="text-align: center">
        <?php for ($pageNum = 1; $pageNum <= $pagesCount; $pageNum++): ?>
            <?php if ($currentPageNum === $pageNum): ?>
                <b><?= $pageNum ?></b>
            <?php else: ?>
                <a href="/admin/comments<?= $pageNum === 1 ? '' : '/' . $pageNum ?>"><?= $pageNum ?></a>
            <?php endif; ?>
        <?php endfor; ?>
    </div>
<?php endif; ?>

<?php include __DIR__ . '/../footer.php'; ?>
