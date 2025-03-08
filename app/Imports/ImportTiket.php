<?php

namespace App\Imports;

use App\Models\Tiket;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportTiket implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $diff = (int) $row[11] - (int) $row[10];

        if ($row[23] != null) {
            return null;
        }

        if ($row[3] != 'Incident') {
            return null;
        }

        $statusSite = ($row[16] !== 'ESCALATED TO INSERA') ? 'Power' : 'ESCALATED TO INSERA';

        return new Tiket([
            'site_id' => $row[4] . '_' . $row[5],
            'saverity' => $row[2],
            'suspect_problem' => $statusSite,
            'time_down' => $row[10],
            'waktu_saat_ini' => $row[11],
            'status_site' => 'Down',
            'tim_fop' => $row[17],
            'remark' => '',
            'ticket_swfm' => $row[0],
            'nop' => $row[18],
            'cluster_to' => $row[7],
        ]);
    }
}
