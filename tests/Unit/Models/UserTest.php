<?php

namespace tests\Unit\Models;

use App\Models\Event;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testCanCreateNewUser(): void
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'password123'//bcrypt('password123')
        ]);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('John Doe', $user->name);
        $this->assertEquals('johndoe@example.com', $user->email);
    }

    public function testUserHasManyEventsRelationship()
    {
        // Create a user and associate some posts with it using Eloquent relationship methods
        $user = User::factory()->create();
        $event1 = Event::factory()->create(['creator_id' => $user->user_id]);
        dd($event1);
        $event2 = Event::factory()->create(['creator_id' => $user->user_id]);

        // Assert that the relationship exists
        $this->assertInstanceOf(User::class, $event1->user);
        $this->assertInstanceOf(User::class, $event2->user);

        // Assert that the relationship is correct
        $this->assertEquals($user->user_id, $event1->user->user_id);
        $this->assertEquals($user->user_id, $event2->user->user_id);

        // Assert that the user has the correct number of posts
        $this->assertCount(2, $user->createdEvents());
    }
}
