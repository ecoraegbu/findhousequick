<?php
class Authorization {
    /**
     * Check if user is authorized based on role and payment status
     *
     * @param int $userId The ID of the user to check authorization for
     * @param array $role The required role for authorization
     * @return bool Returns true if user is authorized, false otherwise
     */
    public static function isAuthorized( $user_role,  $role, $userId): bool {
        // Check if user has required role
        if (!self::ispermitted($user_role, $role)) {
            return false;
        }

        // Check if user has made payment
        if (!self::hasPaid($userId)) {
            return false;
        }

        // User is authorized
        return true;
    }

    /**
     * Check if user has required role
     *
     * @param int $userId The ID of the user to check role for
     * @param array $role The required role
     * @return bool Returns true if user has required role, false otherwise
     */
    private static function ispermitted( $user_role,  $role): bool {
        // Get user role from database the user role can also be gotten from the session
        //$user_role = Database::getInstance()->get('users', array('id', '=', $userId))->first()->role;

        // Check if user has required role
        if (in_array($user_role , $role)) {
            return true;
        }

        return false;
    }

    /**
     * Check if user has made payment
     *
     * @param int $userId The ID of the user to check payment status for
     * @return bool Returns true if user has made payment, false otherwise
     */
    private static function hasPaid($userId): bool {
        // Get payment information from database
        $paymentInfo = Database::getInstance()->get('payments', array('user_id', '=', $userId))->first();

        // Check if payment information exists and payment has been made
        if ($paymentInfo && $paymentInfo->status === 'paid') {
            return true;
        }

        return false;
    }
}
