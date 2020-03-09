<?php


namespace App\instructor;


use App\SalaryModel;

class InstructorDetails
{
    /**
     * @var SalaryModel
     */
    private $salaryModel;

    public function __construct(SalaryModel $salaryModel)
    {
        $this->salaryModel = $salaryModel;
    }

    public function getDetails()
    {
        $salary = $this->salaryModel->countSalary();
        return [
            'name' => 'ahmed',
            'age' => '30',
            'salary' => $salary

        ];

    }
}
