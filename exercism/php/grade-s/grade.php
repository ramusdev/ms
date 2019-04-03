<?php
/**
 * Grade school
 * 
 */
 
class School
{
    public $students;

    public function add(string $student, int $grade) : void
    {
        $this->students[$grade][] = $student;
    }

    public function grade(int $grade)
    {
        if (! $this->students[$grade])
        {
            return null;
        }

        if (count($this->students[$grade]) == 1) {
            return implode($this->students[$grade]);
        }

        asort($this->students[$grade]);

        return $this->students[$grade];
    }

    public function studentsByGradeAlphabetical() : ?array
    {
        if (! $this->students)
        {
            return null;
        }

        ksort($this->students);

        foreach ($this->students as $key => &$value) {
            sort($value);
        }   

        return $this->students;
    }
}

$school = new School();
$school->add('Virginie', 5);
//$school->add('Claire', 5);
//$school->add('Mendi', 4);

print_r($school->grade(5));
//print_r($school->studentsByGradeAlphabetical());