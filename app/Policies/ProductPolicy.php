<?php

namespace App\Policies;

use App\Models\User;
use App\Models\product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy extends ModelPolicy
{
//    use HandlesAuthorization;
//
//    public function before($user, $ability){
//        if($user->super_admin){
//        }
//    }
//
//    /**
//     * Determine whether the user can view any models.
//     *
//     */
//    public function viewAny($user)
//    {
//        return $user->hasAbility('products.view');
//    }
//
//    /**
//     * Determine whether the user can view the model.
//     *
//
//     */
//    public function view(User $user, product $product)
//    {
//        return $user->hasAbility('products.view') && $user->store_id == $product->store_id;
//    }
//
//    /**
//     * Determine whether the user can create models.
//     *
// \
//     */
//    public function create($user)
//    {
//        return $user->hasAbility('products.create');
//    }
//
//    /**
//     * Determine whether the user can update the model.
//     *
//
//     */
//    public function update( $user, product $product)
//    {
//        return $user->hasAbility('products.update') && $user->store_id == $product->store_id;
//    }
//
//    /**
//     * Determine whether the user can delete the model.
//     *
//
//     */
//    public function delete( $user, product $product)
//    {
//        return $user->hasAbility('products.delete') && $user->store_id == $product->store_id;
//    }
//
//    /**
//     * Determine whether the user can restore the model.
//     *
//
//
//     */
//    public function restore( $user, product $product)
//    {
//        return $user->hasAbility('products.restore') && $user->store_id == $product->store_id;
//    }
//
//    /**
//     * Determine whether the user can permanently delete the model.
//     *
//
//     */
//    public function forceDelete( $user, product $product)
//    {
//        return $user->hasAbility('products.force') && $user->store_id == $product->store_id;
//    }
}
