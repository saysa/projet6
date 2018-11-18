<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 17/11/2018
 * Time: 16:08
 */

namespace App\Factory;


use App\Entity\Comment;
use App\Entity\Trick;
use App\Entity\User;

class CommentFactory
{

    public function createAndSaveComment(Comment $comment,Trick $trick, User $user)
    {
        $comment->setUser($user);
        $comment->setTrick($trick);

        return $comment;
    }
}
