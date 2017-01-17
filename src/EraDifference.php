<?php 

namespace Vice\Challenge;

use Vice\Challenge\DateDifference;

class EraDifference implements DateDifference
{
    private $intervals = [
        'year',
        'month',
        'day',
    ];

    public $startDate;
    private $startTimestamp;

    public $endDate;
    private $endTimestamp;

    private $diffsInSecs;
    private $diffs;

    public function __construct($start, $end=null)
    {
        $this->startDate = $start;
        $this->endDate   = $end ? $end : date('Y-m-d');

        $this->startTimestamp = strtotime($this->startDate);
        $this->endTimestamp   = strtotime($this->endDate);

        $this->diffInSecs = $this->endTimestamp - $this->startTimestamp;

        $this->setDiff();
    }

    /**
     * [setDiff description]
     */
    public function setDiff() 
    {
        $startTime = $this->startTimestamp;
        $endTime = $this->endTimestamp;

        foreach ($this->intervals as $interval) {
            $add = 1;            
            $intervalDiff = 0;

            $ttime = strtotime("+" . $add . " " . $interval, $startTime);

            while ($endTime >= $ttime) {
                $add++;

                $ttime = strtotime("+" . $add . " " . $interval, $startTime);
                $intervalDiff++;
            }
 
            $startTime = strtotime("+" . $intervalDiff . " " . $interval, $startTime);
            $this->diffs[$interval] = $intervalDiff;
        }
    }

    /**
     * The distance between two dates in years, rounded down to the nearest whole year.
     *
     * I.e for a difference of 10 years and 9 months, the result of this call should be 10.
     *
     * @return int
     */
    public function getDifferenceInYears()
    {
        return $this->diffs['year'];
    }

    /**
     * The distance between two dates in months, rounded down to the nearest whole month, counted from the start of the year.
     *
     * I.e for a difference of 10 years, 9 months and 25 days, the result of this call should be 9.
     *
     * @return int
     */
    public function getDifferenceInMonths()
    {
        return $this->diffs['month'];
    }

    /**
     * The distance between two dates in days, counted from the start of the month
     *
     * I.e for a difference of 10 years, 9 months and 25 days, the result of this call should be 25.
     *
     * @return int
     */
    public function getDifferenceInDays()
    {
        return $this->diffs['day'];
    }

    /**
     * The total distance between two dates in days.
     *
     * I.e between 2015-12-12 and 2016-12-22 there are 376 days.
     *
     * @return int
     */
    public function getTotalDifferenceInDays()
    {
        return $this->diffInSecs / 60 / 60 / 24;
    }
}
