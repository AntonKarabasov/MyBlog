<?php include __DIR__ . '/../header.php'; ?>
    <h1><?= $article->getName() ?></h1>
    <p><?= $article->getParsedText() ?></p>
    <p>Автор: <?= $article->getAuthor()->getNickname() ?></p>
<?php if(!empty($user) && $user->isAdmin()) : ?>
    <a href="/articles/<?= $article->getId() ?>/edit">Редактировать</a>
<?php endif; ?>
    <br><br>
    <p>Комментарии</p>
    <hr>
<?php if(!empty($error)): ?>
    <div style="color: red;"><?= $error ?></div>
<?php endif; ?>
<?php if(!empty($user)) : ?>
    <form action="/articles/<?= $article->getId() ?>/comments" method="post">
        <label for="text">Новый комментарий</label><br>
        <textarea name="text" id="text" rows="4" cols="60" value="<?= $_POST['text'] ?? '' ?>"></textarea><br>
        <input type="submit" value="Отправить">
    </form>
    <br><br>
<?php endif; ?>
<?php if(empty($user)) : ?>
    <p style="color: red;">Нужно зарегистрироваться для добавления комментария</p>
<?php endif; ?>
<?php if(!empty($comments)) : ?>
    <?php foreach ($comments as $comment): ?>
        <b><?= $comment->getAuthor()->getNickname() ?></b>
        <p><?= htmlentities($comment->getText()) ?></p>
        <?php if(!empty($user)) : ?>
            <?php if($user->getId() === $comment->getAuthorId() || $user->isAdmin()) : ?>
                <a href="/comments/<?= $comment->getId() ?>/edit">Редактировать</a>
            <?php endif; ?>
        <?php endif; ?>
        <br><br>
    <?php endforeach; ?>
<?php endif; ?>
<?php include __DIR__ . '/../footer.php'; ?>