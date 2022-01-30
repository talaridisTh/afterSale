<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Voucher;
use Illuminate\Auth\Access\HandlesAuthorization;

class VoucherPolicy {

    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Voucher $voucher)
    {
        //
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, Voucher $voucher)
    {
        //
    }

    public function delete(User $user, Voucher $voucher)
    {
        //
    }

    public function restore(User $user, Voucher $voucher)
    {
        //
    }

    public function forceDelete(User $user, Voucher $voucher)
    {
        //
    }

}