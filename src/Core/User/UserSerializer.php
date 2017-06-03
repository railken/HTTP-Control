<?php

namespace Core\User;

use Core\User\User;
use League\OAuth2\Server\CryptKey;

use Core\Project\ProjectManager;
use Core\Company\CompanyManager;

class UserSerializer
{
    public function serialize(User $user)
    {
        return [
            'id' => $user->id,
            'username' => $user->username,
            'email' => $user->email,
            'projects' => $this->projects($user->projects),
            'companies' => $this->companies($user->companies)
        ];
    }

    public function projects($projects)
    {
        $serializer = (new ProjectManager)->serializer;

        return $projects->map(function ($project) use ($serializer) {
            return $serializer->serialize($project);
        });
    }

    public function companies($projects)
    {
        $serializer = (new CompanyManager)->serializer;

        return $projects->map(function ($company) use ($serializer) {
            return $serializer->serialize($company);
        });

    }

    public function token($token)
    {
        return [
            'access_token' => (string)$token->convertToJWT(new CryptKey('file://'.\Laravel\Passport\Passport::keyPath('oauth-private.key'))),
            'token_type' => 'bearer',
            'expire_in' => $token->expires_at->getTimestamp() - time()
        ];
    }
}
