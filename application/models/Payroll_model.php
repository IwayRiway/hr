<?php

class Payroll_model extends CI_model
{

    public function getPayroll()
    {
        $periode = date('m');
        return $this->db->query("SELECT a.id as pk, a.nama, b.potongan, c.nama as divisi, d.* FROM karyawan a LEFT JOIN penggajian b ON a.id = b.karyawan_id JOIN department c ON a.department_id = c.id LEFT JOIN gaji d ON a.id = d.karyawan_id WHERE (b.periode = '$periode' OR b.periode IS NULL) GROUP BY a.id")->result_array();
    }

    public function update()
    {
        $id = $this->input->post('id');
        $pinjaman = $this->input->post('potongan_pinjaman');
        $absen = $this->input->post('potongan_absen');
        $lain = $this->input->post('potongan_lain');
        $periode = date('m');


        // TABLE POTONGAN
        $cek = $this->db->get_where('potongan', ['karyawan_id'=>$id, 'periode' => $periode])->row_array();
        $data = [
            'potongan_pinjaman' => $pinjaman,
            'potongan_absen' => $absen,
            'potongan_lain' => $lain,
        ];

        if($cek){
            $this->db->update('potongan', $data, ['karyawan_id'=>$id, 'periode' => $periode]);
        } else {
            $data['karyawan_id'] = $id;
            $data['periode'] = $periode;
            $this->db->insert('potongan', $data);
        }
        // AKHIR

        // TABLE PENGGAJIAN
        $cek = $this->db->get_where('penggajian', ['karyawan_id'=>$id, 'periode' => $periode])->row_array();
        $penggajian = [
            'potongan' => $pinjaman + $absen + $lain,
        ];

        if($cek){
            $this->db->update('penggajian', $penggajian, ['karyawan_id'=>$id, 'periode' => $periode]);
        } else {
            $penggajian['karyawan_id'] = $id;
            $penggajian['periode'] = $periode;
            $this->db->insert('penggajian', $penggajian);
        }
        // AKHIR

    }

    public function getGaji($id)
    {
        return $this->db->get_where('gaji', ['karyawan_id' => $id])->row_array();
    }

    public function getPotongan($id)
    {
        return $this->db->get_where('potongan', ['karyawan_id' => $id])->row_array();
    }

    public function print($data, $karyawan)
    {
        $periode = date('m');
        $id = $data['karyawan_id']??$karyawan['karyawan_id'];
        $gaji_pokok = $data['gaji_pokok']??0;
        $tunjangan_jabatan = $data['tunjangan_jabatan']??0;
        $tunjangan_transport = $data['tunjangan_transport']??0;
        $tunjangan_lain = $data['tunjangan_lain']??0;

        $cek = $this->db->get_where('penggajian', ['karyawan_id'=>$id, 'periode' => $periode])->row_array();
        $penggajian = [
            'gaji' => $gaji_pokok + $tunjangan_jabatan + $tunjangan_transport + $tunjangan_lain
        ];

        if($cek){
            $this->db->update('penggajian', $penggajian, ['karyawan_id'=>$id, 'periode' => $periode]);
        } else {
            $penggajian['karyawan_id'] = $id;
            $penggajian['periode'] = $periode;
            $this->db->insert('penggajian', $penggajian);
        }
    }

    public function save()
    {
        $check = $this->_checkName($this->input->post('nama'));

        if($check){
            return 0;
        }

        $data = [
            'nama' => $this->input->post('nama'),
        ];

        $this->db->insert('penggajian', $data);
        return 1;
    }

    public function getPayrollById($id)
    {
        return $this->db->get_where('penggajian', ['id'=>$id])->row_array();
    }

    public function delete($id)
    {
        $Payroll = $this->db->get_where('penggajian', ['id'=>$id])->row_array();
        $this->db->delete('penggajian',['id'=>$id]);
    }
}