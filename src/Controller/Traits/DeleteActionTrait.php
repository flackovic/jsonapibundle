<?php

namespace Trikoder\JsonApiBundle\Controller\Traits;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DeleteActionTrait
 */
trait DeleteActionTrait
{
    use Actions\DeleteTrait;

    /**
     * @param Request $request
     *
     * @Route("/{id}{trailingSlash}", requirements={"trailingSlash": "[/]{0,1}"}, defaults={"trailingSlash": ""})
     * @Method({"DELETE"})
     *
     * @return null
     */
    public function deleteAction(Request $request, $id)
    {
        $this->deleteModelById($id);

        return null;
    }
}
