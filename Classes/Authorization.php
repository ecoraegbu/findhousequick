<?php
class Authorization {
    /**
     * Check if user is authorized based on role and payment status
     *
     * @param int $userId The ID of the user to check authorization for
     * @param int $role The required role for authorization
     * @return bool Returns true if user is authorized, false otherwise
     */
    public static function isAuthorized(int $userId, int $role): bool {
        // Check if user has required role
        if (!self::hasRole($userId, $role)) {
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
     * @param int $role The required role
     * @return bool Returns true if user has required role, false otherwise
     */
    private static function hasRole(int $userId, int $role): bool {
        // Get user role from database
        $userRole = Database::getInstance()->get('users', array('id', '=', $userId))->first()->role;

        // Check if user has required role
        if ($userRole === $role) {
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
    private static function hasPaid(int $userId): bool {
        // Get payment information from database
        $paymentInfo = Database::getInstance()->get('payments', array('user_id', '=', $userId))->first();

        // Check if payment information exists and payment has been made
        if ($paymentInfo && $paymentInfo->status === 'paid') {
            return true;
        }

        return false;
    }
}
