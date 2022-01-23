<?php

return [
    '~^articles/(\d+)$~' => [\MyProject\Controllers\ArticlesController::class, 'view'],
    '~^articles/(\d+)/edit$~'  => [\MyProject\Controllers\ArticlesController::class, 'edit'],
    '~^articles/(\d+)/comments$~'  => [\MyProject\Controllers\ArticlesController::class, 'comments'],
    '~^articles/add$~' => [\MyProject\Controllers\ArticlesController::class, 'add'],
    '~^articles/(\d+)/delete$~' => [\MyProject\Controllers\ArticlesController::class, 'delete'],
    '~^comments/(\d+)/edit$~'  => [\MyProject\Controllers\CommentsController::class, 'edit'],
    '~^comments/(\d+)/delete$~'  => [\MyProject\Controllers\CommentsController::class, 'delete'],
    '~^users/register$~' => [\MyProject\Controllers\UsersController::class, 'signUp'],
    '~^users/(\d+)/activate/(.+)$~' => [\MyProject\Controllers\UsersController::class, 'activate'],
    '~^users/login$~' => [\MyProject\Controllers\UsersController::class, 'login'],
    '~^users/exit$~' => [\MyProject\Controllers\UsersController::class, 'exit'],
    '~^admin/articles$~' => [\MyProject\Controllers\AdminController::class, 'viewArticles'],
    '~^admin/articles/(\d+)$~' => [\MyProject\Controllers\AdminController::class, 'pageArticles'],
    '~^admin/comments$~' => [\MyProject\Controllers\AdminController::class, 'viewComment'],
    '~^admin/comments/(\d+)$~' => [\MyProject\Controllers\AdminController::class, 'pageComments'],
    '~^$~' => [\MyProject\Controllers\MainController::class, 'main'],
    '~^(\d+)$~' => [\MyProject\Controllers\MainController::class, 'page'],
];