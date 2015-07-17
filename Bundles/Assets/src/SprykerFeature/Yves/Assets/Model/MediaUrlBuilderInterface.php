<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace SprykerFeature\Yves\Assets\Model;

interface MediaUrlBuilderInterface
{

    /**
     * @param string $mediaPath
     *
     * @throws \Exception
     *
     * @return string
     */
    public function buildUrl($mediaPath);

}
