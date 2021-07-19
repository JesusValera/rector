<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\FileProcessor\TypoScript\Conditions;

use RectorPrefix20210719\Nette\Utils\Strings;
use Ssch\TYPO3Rector\Contract\FileProcessor\TypoScript\Conditions\TyposcriptConditionMatcher;
use Ssch\TYPO3Rector\Helper\ArrayUtility;
final class HostnameConditionMatcher implements \Ssch\TYPO3Rector\Contract\FileProcessor\TypoScript\Conditions\TyposcriptConditionMatcher
{
    /**
     * @var string
     */
    private const TYPE = 'hostname';
    /**
     * @param string $condition
     */
    public function change($condition) : ?string
    {
        \preg_match('#' . self::TYPE . self::ZERO_ONE_OR_MORE_WHITESPACES . '=' . self::ZERO_ONE_OR_MORE_WHITESPACES . '(.*)#', $condition, $matches);
        if (!\is_array($matches)) {
            return $condition;
        }
        $values = \Ssch\TYPO3Rector\Helper\ArrayUtility::trimExplode(',', $matches[1], \true);
        $newConditions = [];
        foreach ($values as $value) {
            if (\RectorPrefix20210719\Nette\Utils\Strings::contains($value, '*')) {
                $newConditions[] = \sprintf('like(request.getNormalizedParams().getHttpHost(), "%s")', $value);
            } else {
                $newConditions[] = \sprintf('request.getNormalizedParams().getHttpHost() == "%s"', $value);
            }
        }
        return \implode(' || ', $newConditions);
    }
    /**
     * @param string $condition
     */
    public function shouldApply($condition) : bool
    {
        if (\RectorPrefix20210719\Nette\Utils\Strings::contains($condition, self::CONTAINS_CONSTANT)) {
            return \false;
        }
        return 1 === \preg_match('#^' . self::TYPE . self::ZERO_ONE_OR_MORE_WHITESPACES . '=[^=]#', $condition);
    }
}
