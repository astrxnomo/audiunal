<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use League\Csv\Reader;

class StudentsTableSeeder extends Seeder
{
    public function run()
    {
        $file = database_path('seeders/students.csv');

        if (!file_exists($file) || !is_readable($file)) {
            $this->command->error('File does not exist or is not readable.');
            return;
        }

        $csv = Reader::createFromPath($file, 'r');
        $csv->setHeaderOffset(0);

        foreach ($csv as $record) {
            Student::create([
                'birth_city' => $record['birth_city'],
                'birth_department' => $record['birth_department'],
                'nationality' => $record['nationality'],
                'age' => $record['age'],
                'gender' => $record['gender'],
                'stratum' => $record['stratum'],
                'pbm' => $record['pbm'],
                'admission_type' => $record['admission_type'],
                'faculty' => $record['faculty'],
                'program' => $record['program'],
            ]);
        }

        $this->command->info('Students imported successfully.');
    }
}
