<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 11/11/2018
 * Time: 03:10
 */

namespace App\Service;


use App\Entity\Trick;

class SlugCreator
{
    /**
     * @param Trick $trick
     * @return mixed
     */
    public function createSlug(Trick $trick)
    {
        $slug = str_replace(' ','-', $trick->getName());

        return  $slug;
    }
}