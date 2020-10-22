<?php
/**
 * Copyright © Experius B.V. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);


namespace Experius\MissingTranslations\Module\I18n\Dictionary\Options;

use Magento\Framework\Component\ComponentRegistrar;

/**
 * Options resolver factory
 */
class ResolverFactory
{
    /**
     * Default option resolver class
     */
    const DEFAULT_RESOLVER = 'Experius\MissingTranslations\Module\I18n\Dictionary\Options\Resolver';

    /**
     * @var string
     */
    protected $resolverClass;

    /**
     * @param string $resolverClass
     */
    public function __construct($resolverClass = self::DEFAULT_RESOLVER)
    {
        $this->resolverClass = $resolverClass;
    }

    /**
     * @param string $directory
     * @param bool $withContext
     * @return ResolverInterface
     * @throws \InvalidArgumentException
     */
    public function create($directory, $withContext)
    {
        $resolver = new $this->resolverClass(new ComponentRegistrar(), $directory, $withContext);
        if (!$resolver instanceof ResolverInterface) {
            throw new \InvalidArgumentException($this->resolverClass . ' doesn\'t implement ResolverInterface');
        }
        return $resolver;
    }
}
