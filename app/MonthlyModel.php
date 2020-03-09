<?php


namespace App;


class MonthlyModel implements SalaryModel
{
    private $salary;

    public function countSalary()
    {
        return 2000;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }


}
