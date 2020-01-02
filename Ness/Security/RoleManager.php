<?php

/**
 * Ness PHP Framework.
 * A solid php framework for fast and secure web applications.
 *
 * @author Sinan SALIH
 * @license MIT License
 * @copyright Copyright (C) 2018-2020 Sinan SALIH
 */

namespace Ness\Security {

    use Ness\Security\RoleProvider;

    /**
     * A basic role mananer class for Ness PHP Framework.
     * You can get available roles from database and set them in application register function,
     * to manage user accesses to specific controllers.
     * You can read Ness PHP - Tutorials Book for using and examples.
     */
    class RoleManager
    {
        /**
         * If user is Authorized.
         *
         * @return bool
         */
        public static function isAuthorized()
        {
            $roles_provided = RoleProvider::get_provided_roles();
            $required_roles = RoleProvider::get_required_roles();
            foreach ($required_roles as $key => $value) {
                $auth_man_id[] = $key;
            }

            foreach ($roles_provided as $key => $value) {
                if (in_array($key, $auth_man_id)) {
                    return true;
                } else {
                    return false;
                }
            }
        }

        /**
         * Clear required roles.
         */
        public static function ClearRequired()
        {
            RoleProvider::RequiredRoles(null);
        }
    }
}
