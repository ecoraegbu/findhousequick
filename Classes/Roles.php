<?php
/**
 * Class UserRolesPermissions
 * Manages user roles and permissions for a property web application.
 */
class UserRolesPermissions {
    // Define constants for each role, with higher numbers indicating higher privileges
    const ROLE_ADMIN = USER_ROLE_ADMIN;
    const ROLE_AGENT = USER_ROLE_AGENT;
    const ROLE_LANDLORD = USER_ROLE_LANDLORD;
    const ROLE_TENANT = USER_ROLE_TENANT;
    const ROLE_ORDINARY = USER_ROLE_ORDINARY;
    const ROLE_GUEST = USER_ROLE_GUEST;

    /**
     * @var array Stores the roles assigned to the user
     */
    private $roles = [];

    /**
     * Constructor initializes a user with a given role (default is ROLE_GUEST)
     * @param int $initialRole The initial role to assign to the user
     */
    public function __construct($initialRole = self::ROLE_GUEST) {
        $this->addRole($initialRole);
    }

    /**
     * Adds a new role to the user if it's valid and not already assigned
     * @param int $role The role to add
     * @return bool True if the role was added successfully, false otherwise
     */
    public function addRole($role) {
        // Check if the role is within valid range and not already assigned
        if ($role >= self::ROLE_GUEST && $role <= self::ROLE_ADMIN && !in_array($role, $this->roles)) {
            $this->roles[] = $role;
            sort($this->roles); // Keep roles sorted for easier management
            return true;
        }
        return false;
    }

    /**
     * Removes a role from the user if it exists
     * @param int $role The role to remove
     * @return bool True if the role was removed successfully, false otherwise
     */
    public function removeRole($role) {
        $key = array_search($role, $this->roles);
        if ($key !== false) {
            unset($this->roles[$key]);
            $this->roles = array_values($this->roles); // Re-index the array
            return true;
        }
        return false;
    }

    /**
     * Gets all roles assigned to the user
     * @return array An array of all assigned roles
     */
    public function getRoles() {
        return $this->roles;
    }

    /**
     * Gets the highest role assigned to the user
     * @return int The highest role value, or ROLE_GUEST if no roles are assigned
     */
    public function getHighestRole() {
        return empty($this->roles) ? self::ROLE_GUEST : max($this->roles);
    }

    /**
     * Checks if the user has a specific role
     * @param int $role The role to check for
     * @return bool True if the user has the role, false otherwise
     */
    public function hasRole($role) {
        return in_array($role, $this->roles);
    }

    /**
     * Checks if the user can access the admin panel
     * @return bool True if the user has admin role, false otherwise
     */
    public function canAccessAdminPanel() {
        return $this->hasRole(self::ROLE_ADMIN);
    }

    /**
     * Checks if the user can manage properties
     * @return bool True if the user is an agent or admin, false otherwise
     */
    public function canManageProperties() {
        return $this->hasRole(self::ROLE_AGENT) || $this->hasRole(self::ROLE_ADMIN);
    }

    /**
     * Checks if the user can post a property
     * @return bool True if the user is a landlord, agent, or admin, false otherwise
     */
    public function canPostProperty() {
        return $this->hasRole(self::ROLE_LANDLORD) || $this->canManageProperties();
    }

    /**
     * Checks if the user can rent a property
     * @return bool True if the user is a tenant or higher role, false otherwise
     */
    public function canRentProperty() {
        return $this->getHighestRole() >= self::ROLE_TENANT;
    }

    /**
     * Checks if the user can view property listings
     * @return bool Always returns true as all users (including guests) can view listings
     */
    public function canViewListings() {
        return true;
    }

    /**
     * Checks if the user can interact with listings (e.g., contact landlords, save favorites)
     * @return bool True if the user is registered (ROLE_ORDINARY or higher), false for guests
     */
    public function canInteractWithListings() {
        return $this->getHighestRole() >= self::ROLE_ORDINARY;
    }

    /**
     * Checks if the user can register (only guests can register)
     * @return bool True if the user is a guest, false otherwise
     */
    public function canRegister() {
        return $this->getHighestRole() === self::ROLE_GUEST;
    }

    /**
     * Checks if the user is registered (has any role higher than guest)
     * @return bool True if the user has any role higher than ROLE_GUEST, false otherwise
     */
    public function isRegistered() {
        return $this->getHighestRole() > self::ROLE_GUEST;
    }
}

/**
 * Class User
 * Represents a user in the system with associated roles and permissions
 */
class User {
    private $id;
    private $username;
    private $rolesPermissions;

    /**
     * Constructor initializes a user with given id, username, and initial role
     * @param int|null $id The user's ID (null for guests)
     * @param string $username The user's username
     * @param int $initialRole The initial role to assign to the user (default is ROLE_ORDINARY)
     */
    public function __construct($id, $username, $initialRole = UserRolesPermissions::ROLE_ORDINARY) {
        $this->id = $id;
        $this->username = $username;
        $this->rolesPermissions = new UserRolesPermissions($initialRole);
    }

    /**
     * Gets the user's ID
     * @return int|null The user's ID, or null for guests
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Gets the user's username
     * @return string The user's username
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * Gets the user's roles and permissions object
     * @return UserRolesPermissions The user's roles and permissions object
     */
    public function getRolesPermissions() {
        return $this->rolesPermissions;
    }

    /**
     * Adds a role to the user
     * @param int $role The role to add
     * @return bool True if the role was added successfully, false otherwise
     */
    public function addRole($role) {
        return $this->rolesPermissions->addRole($role);
    }

    /**
     * Removes a role from the user
     * @param int $role The role to remove
     * @return bool True if the role was removed successfully, false otherwise
     */
    public function removeRole($role) {
        return $this->rolesPermissions->removeRole($role);
    }
}

// Usage examples

// Create a guest user
$guestUser = new User(null, "guest", UserRolesPermissions::ROLE_GUEST);
echo $guestUser->getRolesPermissions()->canViewListings(); // Output: true (guests can view listings)
echo $guestUser->getRolesPermissions()->canInteractWithListings(); // Output: false (guests can't interact)
echo $guestUser->getRolesPermissions()->canRegister(); // Output: true (guests can register)

// Create an ordinary user (registered user with basic permissions)
$ordinaryUser = new User(1, "john_doe", UserRolesPermissions::ROLE_ORDINARY);
echo $ordinaryUser->getRolesPermissions()->canViewListings(); // Output: true
echo $ordinaryUser->getRolesPermissions()->canInteractWithListings(); // Output: true
echo $ordinaryUser->getRolesPermissions()->isRegistered(); // Output: true

// Create a user with multiple roles (tenant and landlord)
$user = new User(2, "jane_smith", UserRolesPermissions::ROLE_TENANT);
$user->addRole(UserRolesPermissions::ROLE_LANDLORD);
echo $user->getRolesPermissions()->canRentProperty(); // Output: true (tenants can rent)
echo $user->getRolesPermissions()->canPostProperty(); // Output: true (landlords can post)

// Demonstrate removing a role
$user->removeRole(UserRolesPermissions::ROLE_LANDLORD);
echo $user->getRolesPermissions()->canPostProperty(); // Output: false (no longer a landlord)

// Demonstrate admin capabilities
$adminUser = new User(3, "admin_user", UserRolesPermissions::ROLE_ADMIN);
echo $adminUser->getRolesPermissions()->canAccessAdminPanel(); // Output: true
echo $adminUser->getRolesPermissions()->canManageProperties(); // Output: true (admins can do everything)