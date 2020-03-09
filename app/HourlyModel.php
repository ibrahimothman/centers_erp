<?php


namespace App;


class HourlyModel implements SalaryModel
{
    private $hours = 30;
    private $hourRate = 100;
    public function countSalary()
    {
        return $this->getHours() * $this->getHourRate();
    }


    /**
     * @return mixed
     */
    public function getHours()
    {
        return $this->hours;
    }

    /**
     * @param mixed $hours
     */
    public function setHours($hours): void
    {
        $this->hours = $hours;
    }

    /**
     * @return mixed
     */
    public function getHourRate()
    {
        return $this->hourRate;
    }

    /**
     * @param mixed $hourRate
     */
    public function setHourRate($hourRate): void
    {
        $this->hourRate = $hourRate;
    }

}
