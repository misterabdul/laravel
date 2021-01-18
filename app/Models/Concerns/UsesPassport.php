<?php

namespace App\Models\Concerns;

use Illuminate\Support\Facades\Hash;

trait UsesPassport
{
    /**
     * Find the user instance for the given email.
     * 
     * @param   string $email
     * @return  \App\Models\UserModel
     */
    public function findForPassport($email)
    {
        return $this->where('email', $email)->first();
    }

    /**
     * Validate the password of the user for the Passport password grant.
     *
     * @param  string  $password
     * @return bool
     */
    public function validateForPassportPasswordGrant($password)
    {
        return Hash::check($password, $this->password);
    }
}
