<?php

namespace Tests\Feature;

use App\Blog;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BlogTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    public function testHomeContent()
    {
        $this->get('/')
            ->assertSee('Login')
            ->assertSee('Register')
            ->assertSee('TheBlogger');
    }

    public function testLoginContent()
    {
        $this->get('/login')
            ->assertSee('Login')
            ->assertSee('E-Mail Address')
            ->assertSee('Password')
            ->assertSee('Remember Me')
            ->assertSee('Forgot Your Password?')
            ->assertSee('Blogs')
            ->assertSee('Register');
    }

    public function testRegisterContent()
    {
        $this->get('/register')
            ->assertSee('Register')
            ->assertSee('Name')
            ->assertSee('E-Mail Address')
            ->assertSee('Password')
            ->assertSee('Confirm Password')
            ->assertSee('Blogs')
            ->assertSee('Register');
    }

    public function testSavesBlogData()
    {
        $user = factory(User::class)->create();
        $blog = factory(Blog::class)->make();
        $user->blogs()->save($blog);
        $blogId = $blog->id;
        $blogSaved = Blog::find($blogId);

        $this->assertEquals($blog->title, $blogSaved->title);
        $this->assertEquals($blog->body, $blogSaved->body);
    }

}

