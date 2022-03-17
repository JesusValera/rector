<?php

declare (strict_types=1);
namespace RectorPrefix20220317;

use Rector\Core\Configuration\Option;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $containerConfigurator->import(\Rector\Set\ValueObject\LevelSetList::UP_TO_PHP_81);
    $containerConfigurator->import(\Rector\Set\ValueObject\SetList::CODE_QUALITY);
    $containerConfigurator->import(\Rector\Set\ValueObject\SetList::DEAD_CODE);
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Rector\Core\Configuration\Option::AUTO_IMPORT_NAMES, \true);
    $parameters->set(\Rector\Core\Configuration\Option::PATHS, [__DIR__ . '/src', __DIR__ . '/tests']);
    $parameters->set(\Rector\Core\Configuration\Option::PARALLEL, \true);
};
