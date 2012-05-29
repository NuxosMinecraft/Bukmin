<?php

namespace Bukmin\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BukminUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}