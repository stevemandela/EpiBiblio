<?php

namespace EPI\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class EPIUserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
