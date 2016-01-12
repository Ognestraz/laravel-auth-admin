<?php

class AuthAdminTest extends TestCase 
{
    public function testGuestGetAdmin()
    {
        $this->visit('/admin')
            ->seePageIs('/login')    
            ->seeStatusCode(200)
            ->see('Login');
    }
    
    public function testGuestGetLogin()
    {
        $this->visit('/login')
            ->seeStatusCode(200)
            ->see('Login');
    }    

    public function testAdminAuthLogin()
    {
        $this->visit('/login')
            ->type('admin@mail.ru', 'email')
            ->type('admin', 'password')
            ->press('Login')
                ->seePageIs('/admin')
                ->seeStatusCode(200)
                ->click('Logout')
                    ->seePageIs('/login')
                    ->seeStatusCode(200)
                    ->see('Login')    
                        ->visit('/admin')
                        ->seePageIs('/login')
                        ->seeStatusCode(200)
                        ->see('Login');
    }
    
    public function testNotAdminAuthLoginFail()
    {
        $this->visit('/login')
            ->type('user1@mail.ru', 'email')
            ->type('user1', 'password')
            ->press('Login')
                ->seePageIs('/login')
                ->seeStatusCode(200)
                ->see('Login');
    }    
    
    public function testAuthLoginFail()
    {
        $this->visit('/login')
            ->type('admin2@mail.ru', 'email')
            ->type('admin', 'password')
            ->press('Login')
                ->seePageIs('/login')
                ->seeStatusCode(200)
                ->see('Login')
                ->see('These credentials do not match our records');
    }
    
    public function testAuthLoginEmpty()
    {
        $this->visit('/login')
            ->type('', 'email')
            ->type('admin', 'password')
            ->press('Login')
                ->seePageIs('/login')
                ->seeStatusCode(200)
                ->see('Login')
                ->see('The email field is required');
    }
    
    public function testAuthPasswordEmpty()
    {
        $this->visit('/login')
            ->type('admin@mail.ru', 'email')
            ->type('', 'password')
            ->press('Login')
                ->seePageIs('/login')
                ->seeStatusCode(200)
                ->see('Login')
                ->see('The password field is required');
    }    
    
    public function testAuthLoginAndPasswordEmpty()
    {
        $this->visit('/login')
            ->type('', 'email')
            ->type('', 'password')
            ->press('Login')
                ->seePageIs('/login')
                ->seeStatusCode(200)
                ->see('Login')
                ->see('The email field is required')
                ->see('The password field is required');
    }
    
    public function testAuthPasswordFail()
    {
        $this->visit('/login')
            ->type('admin@mail.ru', 'email')
            ->type('admin2', 'password')
            ->press('Login')
                ->seePageIs('/login')
                ->seeStatusCode(200)
                ->see('Login')
                ->see('These credentials do not match our records');
    }
    
    public function testAuthLoginAndPasswordFail()
    {
        $this->visit('/login')
            ->type('admin2@mail.ru', 'email')
            ->type('admin2', 'password')
            ->press('Login')
                ->seePageIs('/login')
                ->seeStatusCode(200)
                ->see('Login')
                ->see('These credentials do not match our records');    
    }    
    
}
