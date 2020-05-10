<?php

namespace App\Imports;

use App\Recipient;
use Maatwebsite\Excel\Concerns\ToModel;

class RecipientsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $exists = Recipient::where('name', $row[0])->first();
    
        if($exists){
            $exists->update([
            'phone_number'    => $row[1],
            'last_contacted' => date("Y-m-d", strtotime($row[2]))
            ]);
            return;
        }

        return new Recipient([
            'name'     => $row[0],
            'phone_number'    => $row[1],
            'last_contacted' => date("Y-m-d", strtotime($row[2]))
        ]);
    }
}
