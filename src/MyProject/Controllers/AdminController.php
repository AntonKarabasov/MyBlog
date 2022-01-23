<?php


namespace MyProject\Controllers;


use MyProject\Exceptions\ForbiddenException;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Models\Articles\Article;
use MyProject\Models\Comments\Comment;


class AdminController extends AbstractController
{
    public function viewArticles()
    {
        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if(!$this->user->isAdmin()) {
            throw new ForbiddenException('Для доступа нужно обладать правами администратора');
        }

        $this->pageArticles(1);
    }

    public function pageArticles(int $pageNum)
    {
        $this->view->renderHtml('admin/view.php', [
            'articles' => Article::getPage($pageNum, 5),
            'pagesCount' => Article::getPagesCount(5),
            'currentPageNum' => $pageNum,
        ], 'Админка статьи');
    }

    public function viewComment()
    {
        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if(!$this->user->isAdmin()) {
            throw new ForbiddenException('Для доступа нужно обладать правами администратора');
        }

        $this->pageComments(1);
    }

    public function pageComments(int $pageNum)
    {
        $this->view->renderHtml('admin/view.php', [
            'comments' => Comment::getPage($pageNum, 5),
            'pagesCount' => Comment::getPagesCount(5),
            'currentPageNum' => $pageNum,
        ], 'Админка комментарии');
    }
}