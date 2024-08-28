<?php

namespace App\Imports;

use App\Models\Voter;
use Maatwebsite\Excel\Concerns\ToModel;

class VotersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Voter([
            'student_id' => $row[0],
            'password'   => $row[1],
            'name'       => $row[2],
            'major'      => $row[3],
            'study'      => $row[4],
            'generation' => $row[5],
        ]);
    }
}
