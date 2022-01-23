<?php


namespace MyProject\Controllers;


use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Exceptions\NotFoundException;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Models\Comments\Comment;

class CommentsController extends AbstractController
{
    public function edit(int $commentId)
    {
        $comment = Comment::getById($commentId);

        if ($comment === null) {
            throw new NotFoundException();
        }

        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if (!empty($_POST)) {
            try {
                $comment->updateFromArray($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('comment/edit.php', ['error' => $e->getMessage(), 'comment' => $comment]);
                return;
            }

            header('Location: /articles/'. $comment->getArticleId() . '#comment' . $comment->getId());
            exit();
        }

        $this->view->renderHtml('comment/edit.php', ['comment' => $comment]);
    }

    public function delete(int $commentId): void
    {
        $comment = Comment::getById($commentId);

        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if ($comment === null) {
            throw new NotFoundException();
        }

        $comment->delete();

        $this->view->renderHtml('comment/delete.php', [], 'Комментарий удален');
    }

}


