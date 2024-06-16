<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

require_once 'controllers/UserController.php';
require_once 'models/User.php';

class UserControllerTest extends TestCase 
{
    /** @var UserController */
    private $userController;

    /** @var User|MockObject */
    private $userModel;

    protected function setUp(): void
    {
        // Create a mock for the User model
        $this->userModel = $this->createMock(User::class);
        // Create an instance of UserController, passing the mock to its constructor
        $this->userController = new UserController(); 
        // Inject the mock User model into the UserController
        $this->userController->userModel = $this->userModel;
    }

    public function testGetAllUsers()
    {
        // Mock data
        $users = [
            ['id' => 1, 'email' => 'john.doe@example.com', 'created_at' => '2023-10-26 10:00:00'],
            ['id' => 2, 'email' => 'jane.doe@example.com', 'created_at' => '2023-10-27 12:00:00'],
        ];

        // Expect the User model's getAll() method to be called once and return the mock data
        $this->userModel->expects($this->once())
            ->method('getAll')
            ->willReturn($users);

        $response = $this->userController->getAllUsers();

        $this->assertEquals(200, $response->status);
        $this->assertEquals($users, $response->data);
    }

    public function testGetUserById()
    {
        $userId = 1;
        $mockUser = ['id' => 1, 'email' => 'john.doe@example.com', 'created_at' => '2023-10-26 10:00:00'];

        // Expect the User model's findById() method to be called once with the userId and return the mock user
        $this->userModel->expects($this->once())
            ->method('findById')
            ->with($userId)
            ->willReturn($mockUser);

        $response = $this->userController->getUserById($userId);

        $this->assertEquals(200, $response->status);
        $this->assertEquals($mockUser, $response->data);
    }

    // Similar test structure for testCreateUser, testUpdateUser, and testDeleteUser
}