<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Api\Business\Model;

use Spryker\Zed\Api\Business\Exception\ApiDispatchingException;

class ResourceHandler implements ResourceHandlerInterface
{

    /**
     * @var \Spryker\Zed\Api\Dependency\Plugin\ApiResourcePluginInterface[]
     */
    protected $pluginCollection;

    /**
     * @param \Spryker\Zed\Api\Dependency\Plugin\ApiResourcePluginInterface[] $pluginCollection
     */
    public function __construct(array $pluginCollection)
    {
        $this->pluginCollection = $pluginCollection;
    }

    /**
     * @param string $resource
     * @param string $method
     * @param mixed $params
     *
     * @throws \Spryker\Zed\Api\Business\Exception\ApiDispatchingException
     *
     * @return mixed
     */
    public function execute($resource, $method, $params)
    {
        foreach ($this->pluginCollection as $plugin) {
            if (mb_strtolower($plugin->getResourceName()) === mb_strtolower($resource)) {
                return call_user_func_array([$plugin, $method], $params);
            }
        }

        throw new ApiDispatchingException(sprintf(
            'Unsupported method "%s" for resource "%s"',
            $method,
            $resource
        ));
    }

}