<?php

namespace App\Policies;

use App\Type_article;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TypeArticlesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    // public function viewAny(User $user)
    // {
    //     //
    //     return $user->name==="root";

    // }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Type_article  $typeArticle
     * @return mixed
     */
    // public function view(User $user, Type_article $typeArticle)
    // {
        
    //     return $user->name==="root1";

    // }
    public function index(User $user)
    {
        
        return $user->role_id===2;

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return $user->role_id==="root";
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Type_article  $typeArticle
     * @return mixed
     */
    public function update(User $user, Type_article $typeArticle)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Type_article  $typeArticle
     * @return mixed
     */
    public function delete(User $user, Type_article $typeArticle)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Type_article  $typeArticle
     * @return mixed
     */
    public function restore(User $user, Type_article $typeArticle)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Type_article  $typeArticle
     * @return mixed
     */
    public function forceDelete(User $user, Type_article $typeArticle)
    {
        //
    }
}
