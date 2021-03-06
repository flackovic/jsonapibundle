<?php

namespace Trikoder\JsonApiBundle\Controller\Traits\Polyfill;

use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Trikoder\JsonApiBundle\Contracts\ResponseFactoryInterface;
use Trikoder\JsonApiBundle\Services\ModelInput\ModelToolsFactory;
use Trikoder\JsonApiBundle\Services\Neomerx\EncoderService;

trait SymfonyAutowiredServicesTrait
{
    protected $router;

    protected $modelToolsFactory;

    protected $responseFactory;

    protected $jsonapiEncoder;

    protected $authorizationChecker;

    /**
     * @required
     */
    public function setRouter(RouterInterface $router)
    {
        $this->router = $router;
    }

    /**
     * @return RouterInterface
     */
    public function getRouter()
    {
        return $this->router;
    }

    /**
     * @required
     */
    public function setJsonApiModelToolsFactory(ModelToolsFactory $modelToolsFactory)
    {
        $this->modelToolsFactory = $modelToolsFactory;
    }

    public function getJsonApiModelToolsFactory()
    {
        return $this->modelToolsFactory;
    }

    /**
     * @required
     */
    public function setJsonApiResponseFactory(ResponseFactoryInterface $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    public function getJsonApiResponseFactory()
    {
        return $this->responseFactory;
    }

    /**
     * @required
     */
    public function setJsonApiEncoder(EncoderService $encoder)
    {
        $this->jsonapiEncoder = $encoder;
    }

    public function getJsonApiEncoder()
    {
        return $this->jsonapiEncoder;
    }

    /**
     * @required
     */
    public function setAuthorizationChecker(AuthorizationCheckerInterface $authorizationChecker)
    {
        $this->authorizationChecker = $authorizationChecker;
    }

    public function getAuthorizationChecker(): AuthorizationCheckerInterface
    {
        return $this->authorizationChecker;
    }
}
