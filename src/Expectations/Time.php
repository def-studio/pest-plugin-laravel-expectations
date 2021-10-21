<?php

/** @noinspection PhpDocMissingThrowsInspection */

declare(strict_types=1);

use DefStudio\PestLaravelExpectations\Helpers\ValueProcessor;
use Pest\Expectation;
use function PHPUnit\Framework\assertTrue;

expect()->extend(
    'toBeSameDayAs',
    /**
     * Assert the date is the same day as the given one.
     *
     * @param DateTimeInterface|string $date
     */
    function ($date): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);
        $expected = ValueProcessor::getCarbonDate($date);

        assertTrue($value->isSameDay($expected), sprintf('Failed to assert that [%s] is same day as %s', $value, $expected));

        return $this;
    }
);

expect()->extend(
    'toBeSameHourAs',
    /**
     * Assert the date is the same hour as the given one.
     *
     * @param DateTimeInterface|string $date
     */
    function ($date): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);
        $expected = ValueProcessor::getCarbonDate($date);

        assertTrue($value->isSameHour($expected), sprintf('Failed to assert that [%s] is same hour as %s', $value, $expected));

        return $this;
    }
);

expect()->extend(
    'toBeSameMonthAs',
    /**
     * Assert the date is the same month as the given one.
     *
     * @param DateTimeInterface|string $date
     */
    function ($date): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);
        $expected = ValueProcessor::getCarbonDate($date);

        assertTrue($value->isSameMonth($expected), sprintf('Failed to assert that [%s] is same month as %s', $value, $expected));

        return $this;
    }
);

expect()->extend(
    'toBeSameYearAs',
    /**
     * Assert the date is the same year as the given one.
     *
     * @param DateTimeInterface|string $date
     */
    function ($date): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);
        $expected = ValueProcessor::getCarbonDate($date);

        assertTrue($value->isSameYear($expected), sprintf('Failed to assert that [%s] is same year as %s', $value, $expected));

        return $this;
    }
);