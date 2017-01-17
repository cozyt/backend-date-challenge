<?php
use Vice\Challenge\Era;
use Vice\Challenge\EraDifference;

class EraTest extends \PHPUnit_Framework_TestCase
{
    public function testEraDiff()
    {
        $start = '2016-01-23';
        $end = '2017-12-22';

        $era = Era::diff($start, $end);

        $this->assertEquals(get_class($era), 'Vice\Challenge\EraDifference');

        return $era;
    }

    /**
     * @depends testEraDiff
     */    
    public function testDifferenceInYears(EraDifference $era)
    {
        $this->assertEquals(
            $this->getDateTimeInterval($era)->y,
            $era->getDifferenceInYears()
        );
    }

    /**
     * @depends testEraDiff
     */    
    public function testDifferenceInMonths(EraDifference $era)
    {
        $this->assertEquals(
            $this->getDateTimeInterval($era)->m,
            $era->getDifferenceInMonths()
        );
    }

    /**
     * @depends testEraDiff
     */    
    public function testDifferenceInDays(EraDifference $era)
    {
        $this->assertEquals(
            $this->getDateTimeInterval($era)->d,
            $era->getDifferenceInDays()
        );
    }


    private function getDateTimeInterval(EraDifference $era)
    {
        $datetime1 = new DateTime($era->startDate);
        $datetime2 = new DateTime($era->endDate);

        return $datetime1->diff($datetime2);
    }
}
