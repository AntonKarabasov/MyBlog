<?php


namespace MyProject\Models\Comments;


use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Users\User;
use MyProject\Models\Articles\Article;
use MyProject\Exceptions\InvalidArgumentException;

class Comment extends ActiveRecordEntity
{
    /** @var int */
    protected $authorId;

    /** @var int */
    protected $articleId;

    /** @var string */
    protected $commentText;

    /** @var string */
    protected $createdAt;


    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->commentText;
    }

    /**
     * @param string
     */
    public function setText(string $text): void
    {
        $this->commentText = $text;
    }

    /**
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    /**
     * @param string
     */
    public function setArticle(Article $article): void
    {
        $this->articleId= $article->getId();;
    }

    /**
     * @return int
     */
    public function getArticleId(): int
    {
        return $this->articleId;
    }


    /**
     * @return User
     */
    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

    /**
     * @param User $author
     */
    public function setAuthor(User $author): void
    {
        $this->authorId = $author->getId();
    }

    public static function createComment(array $fields, User $author, Article $article): Comment
    {

        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Не передан текст комментария');
        }

        $comment = new Comment();

        $comment->setAuthor($author);
        $comment->setArticle($article);
        $comment->setText($fields['text']);

        $comment->save();

        return $comment;
    }

    public function updateFromArray(array $fields): Comment
    {

        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Не передан текста комментария');
        }

        $this->setText($fields['text']);

        $this->save();

        return $this;
    }

    protected static function getTableName(): string
    {
        return 'comments';
    }

}