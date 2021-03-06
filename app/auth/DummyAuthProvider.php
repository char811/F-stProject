<?php
namespace App\Auth;

use Illuminate\Auth\GenericUser;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserProviderInterface;
use \User;

class DummyAuthProvider implements UserProviderInterface
{
    /**
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed  $id
     * @return \Illuminate\Auth\UserInterface|null
     */
    public function retrieveById($id)
    {
        // 50% of the time return our dummy user
      /*  if (mt_rand(1, 100) <= 50)
        {
            return $this->dummyUser();
        }

        // 50% of the time, fail
        return null;*/
        $user=\User::find($id);
        return $user;
    }

    /**
     * Retrieve a user by the given credentials.
     * DO NOT TEST PASSWORD HERE!
     *
     * @param  array  $credentials
     * @return \Illuminate\Auth\UserInterface|null
     */
    public function retrieveByCredentials(array $credentials)
    {
      // $user=new User;
       $user=\User::where('username', '=', $credentials['username'])->get()->first();
       return new GenericUser([
            'id'       => $user->getAuthIdentifier(),
            'username' => $user['username']
        ]);
        // 50% of the time return our dummy user
       /* if (mt_rand(1, 100) <= 50)
        {
            return $this->dummyUser();
        }
        else
        {
            return $user;
        }*/
        // 50% of the time, fail
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Auth\UserInterface  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(UserInterface $user, array $credentials)
    {
        // we'll assume if a user was retrieved, it's good

        $user=\User::where('password', '===', (\Hash::make($credentials['password'])))->get()->first();
        return new GenericUser([
            'password' => $user['password']
        ]);
    }

    /**
     * Return a generic fake user
     */
    protected function dummyUser()
    {
        $attributes = array(
            'id' => 123,
            'username' => 'chuckles',
            'admin' => true,
            'password' => \Hash::make('SuperSecret'),
            'name' => 'Dummy User',
        );
        return new GenericUser($attributes);
    }

    /**
     * Needed by Laravel 4.1.26 and above
     */
    public function retrieveByToken($identifier, $token)
    {
        return new \Exception('not implemented');
    }

    /**
     * Needed by Laravel 4.1.26 and above
     */
    public function updateRememberToken(UserInterface $user, $token)
    {
        return new \Exception('not implemented');
    }
}
