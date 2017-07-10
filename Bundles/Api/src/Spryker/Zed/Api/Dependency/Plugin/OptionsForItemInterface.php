<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Api\Dependency\Plugin;

/**
 * Implement this for your ApiResourcePlugin if you want to overwrite the default methods.
 */
interface OptionsForItemInterface
{

    /**
     * @api
     *
     * @param array $params
     *
     * @return array
     */
    public function getHttpMethodsForItem(array $params);

}