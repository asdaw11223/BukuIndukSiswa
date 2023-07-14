<?php

namespace App\Controllers;

use App\Models\NilaiModel;
use App\Models\KelasModel;
use App\Models\SiswaModel;
use App\Models\JenisKelaminModel;
use App\Models\TahunAjaranModel;
use App\Models\JurusanModel;
use App\Models\TingkatModel;
use App\Models\MatapelajaranModel;
use App\Models\DaftarSiswaKelasModel;
use App\Models\KehadiranModel;

use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Style_NumberFormat;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Nilai extends BaseController
{
    protected $nilaiModel;
    protected $siswaModel;
    protected $kelasModel;
    protected $jenisKelaminModel;
    protected $tingkatModel;
    protected $tahunajaranModel;
    protected $jurusanModel;
    protected $matapelajaranModel;
    protected $daftarSiswaKelasModel;
    protected $kehadiranModel;
     
    public function __construct()
    {
        helper('form');
        $this->nilaiModel = new NilaiModel();
        $this->kelasModel = new KelasModel();
        $this->siswaModel = new SiswaModel();
        $this->jenisKelaminModel = new JenisKelaminModel();
        $this->tahunajaranModel = new TahunajaranModel();
        $this->tingkatModel = new TingkatModel();
        $this->jurusanModel = new JurusanModel();
        $this->matapelajaranModel = new MatapelajaranModel();
        $this->daftarSiswaKelasModel = new DaftarSiswaKelasModel();
        $this->kehadiranModel = new KehadiranModel();
    }

    public function index()
    {

		$id_tingkat = $this->request->getVar('tingkat');

        $tahunajaran = $this->tahunajaranModel->orderBy('nama_tahunajaran', 'DESC')->findAll();
        $jurusan = $this->jurusanModel->findAll();
        $tingkat = $this->tingkatModel->findAll();
        $kelas = $this->kelasModel->where('id_tingkat', $id_tingkat)->findAll();



        $data = [
            'title' => 'Pilih Kelas',
            'tingkat' => $tingkat,
            'kelas' => $kelas,
            'tahunajaran' => $tahunajaran,
            'jurusan' => $jurusan
        ];

        return view('nilai/nilai-filter', $data);
    }

    public function nilai($id_kelas, $semester)
    {
		$filter = $this->request->getVar('filter');
        
        $kelas = $this->kelasModel->where('id_kelas', $id_kelas)
        ->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_kelas.id_jurusan')
        ->join('tb_tahunajaran', 'tb_tahunajaran.id_tahunajaran = tb_kelas.id_tahunajaran')
        ->first();

        $siswa = $this->daftarSiswaKelasModel->where('id_kelas', $id_kelas)
        ->join('tb_siswa', 'tb_siswa.s_NISN = tb_daftarsiswakelas.s_NISN')
        ->findAll();
        
        $search_mapel = $this->nilaiModel->where('id_kelas', $id_kelas)
        ->join('tb_matapelajaran', 'tb_matapelajaran.id_matapelajaran = tb_nilai.id_matapelajaran')
        ->findAll();

        if($filter == null) {
            $nilai = $this->nilaiModel->where('id_kelas', $id_kelas)->where('semester', $semester)
            ->join('tb_matapelajaran', 'tb_matapelajaran.id_matapelajaran = tb_nilai.id_matapelajaran')
            ->join('tb_siswa', 'tb_siswa.s_NISN = tb_nilai.s_NISN')
            ->findAll();
        }else{
            $nilai = $this->nilaiModel->where(['tb_nilai.id_matapelajaran' => $filter])->where('id_kelas', $id_kelas)->where('semester', $semester)
            ->join('tb_matapelajaran', 'tb_matapelajaran.id_matapelajaran = tb_nilai.id_matapelajaran')
            ->findAll();
        }

        $kehadiran = $this->kehadiranModel->where('id_kelas', $id_kelas)->where('kh_semester', $semester)
        ->findAll();

		$id_siswa = $this->nilaiModel->where('id_kelas', $id_kelas)
        ->first();

        $tingkat = $this->tingkatModel->findAll();
        $matapelajaran = $this->matapelajaranModel->findAll(); 

        $array = [];
        foreach($nilai as $nm){
            if($id_siswa['s_NISN'] == $nm['s_NISN']){
                $array[] = $nm['nama_matapelajaran'];
            }
        }
        
        $nama_mapel = [];
        $id_mapel = [];
        foreach($search_mapel as $nm){
            if($id_siswa['s_NISN'] == $nm['s_NISN'] && $nm['semester'] == $semester){
                $nama_mapel[] = $nm['nama_matapelajaran'];
                $id_mapel[] = $nm['id_matapelajaran'];
            }
        }

        $data = [
            'title' => 'Nilai',
            'kelas' => $kelas,
            'siswa' => $siswa,
            'tingkat' => $tingkat,
            'array' => $array,
            'kehadiran' => $kehadiran,
            'id_mapel' => $id_mapel,
            'nama_mapel' => $nama_mapel,
            'semester' => $semester,
            'nilai' => $nilai,
            'matapelajaran' => $matapelajaran
        ];

        return view('nilai/nilai', $data);
    }
    
    public function jurusan()
	{
		if($this->request->isAJAX()){
			$jurusan = $this->request->getVar('id');
            $tingkat = $this->tingkatModel->where(['tb_tingkat.id_jurusan' => $jurusan])->get()->getResultArray();
			
			$isidata = '<option value="">Pilih Tingkat</option>';

            foreach($tingkat as $row ) :
                $isidata .= '<option value="' . $row['id_tingkat'] . '">' . $row['nama_tingkat'] . '</option>';
			endforeach;

			$msg = [
				'data' => $isidata
			];

			echo json_encode($msg);
				
		}
	}

	public function addMapel()
	{
		if($this->request->isAJAX()){
			
            $daftarSiswaKelas = $this->daftarSiswaKelasModel->where('id_kelas', $this->request->getVar('id_kelas'))->findAll();
            
            $mapel = $_POST['matapelajarans'];

            foreach($daftarSiswaKelas as $dsk){
                for ($i=0; $i < count($mapel); $i++) {
                    
                    $dmapel = $this->nilaiModel
                    ->where('semester', $this->request->getVar('semester'))
                    ->where('id_matapelajaran', $mapel[$i])
                    ->where('s_NISN', $dsk['s_NISN'])
                    ->where('id_kelas', $this->request->getVar('id_kelas'))
                    ->findAll();

                    if($dmapel == null){
                        $this->nilaiModel->save([
                            'np_kb' => 0,
                            'np_angka' => 0,
                            'np_predikat' => '',
                            'np_deskripsi' => '',
                            'nk_kb' => 0,
                            'nk_angka' => 0,
                            'nk_predikat' => '',
                            'nk_deskripsi' => '',
                            'semester' => $this->request->getVar('semester'),
                            'id_matapelajaran' => $mapel[$i],
                            's_NISN' => $dsk['s_NISN'],
                            'id_kelas' => $this->request->getVar('id_kelas')
                        ]);
                    }
                }
            }

            $msg = [
                'berhasil' => [
                    'succes' => "Berhasil"
                ]
            ];

			echo json_encode($msg);
        }
	}

	public function addNilai()
	{
		if($this->request->isAJAX()){
			
            $nilai = $this->nilaiModel->where('id_kelas', $this->request->getVar('id_kelas'))->where('semester', $this->request->getVar('semester'))
            ->findAll();

            foreach($nilai as $n) {
                $this->nilaiModel->save([
                    'id_nilai' => $this->request->getVar('id_nilai'. $n['id_nilai']),
                    'np_kb' => $this->request->getVar('np_kb'. $n['id_nilai']),
                    'np_angka' => $this->request->getVar('np_angka'. $n['id_nilai']),
                    'np_predikat' => $this->request->getVar('np_predikat'. $n['id_nilai']),
                    'np_deskripsi' => $this->request->getVar('np_deskripsi'. $n['id_nilai']),
                    'nk_kb' => $this->request->getVar('nk_kb'. $n['id_nilai']),
                    'nk_angka' => $this->request->getVar('nk_angka'. $n['id_nilai']),
                    'nk_predikat' => $this->request->getVar('nk_predikat'. $n['id_nilai']),
                    'nk_deskripsi' => $this->request->getVar('nk_deskripsi'. $n['id_nilai']),
                ]);
            }

            $msg = [
                'berhasil' => [
                    'succes' => "Berhasil"
                ]
            ];

			echo json_encode($msg);
        }
	}
	
	public function deleteMapel()
	{
		if($this->request->isAJAX()){

			if($this->request->getVar('d_id_mapel') != null && $this->request->getVar('d_id_kelas') != null && $this->request->getVar('d_semester') != null){
				
				$id_mapel = $this->request->getVar('d_id_mapel');
				$id_kelas = $this->request->getVar('d_id_kelas');
				$id_semester = $this->request->getVar('d_semester');
                
                $nilai = $this->nilaiModel->where('id_kelas', $id_kelas)->where('semester', $id_semester)->where('id_matapelajaran', $id_mapel)->findAll();


                foreach($nilai as $n){
				    $this->nilaiModel->delete(array('id_nilai' => $n['id_nilai']));
                }

				$msg = [
					'berhasil' => [
						'succes' => "Data berhasil dihapus",
					]
				];

			}else{ 
				
				$msg = [
					'error' => [
						'd_id_kelas' => 'Data gagal dihapus',
					]
				];
			}

			echo json_encode($msg);
		}
	}

    public function template($id_kelas, $semester){
        
        $kelas = $this->kelasModel->where('id_kelas', $id_kelas)
        ->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_kelas.id_jurusan')
        ->join('tb_tahunajaran', 'tb_tahunajaran.id_tahunajaran = tb_kelas.id_tahunajaran')
        ->first();

        $siswa = $this->daftarSiswaKelasModel->where('id_kelas', $id_kelas)
        ->join('tb_siswa', 'tb_siswa.s_NISN = tb_daftarsiswakelas.s_NISN')
        ->findAll();
        
        $nilai = $this->nilaiModel->where('id_kelas', $id_kelas)->where('semester', $semester)
        ->join('tb_matapelajaran', 'tb_matapelajaran.id_matapelajaran = tb_nilai.id_matapelajaran')
        ->join('tb_siswa', 'tb_siswa.s_NISN = tb_nilai.s_NISN')
        ->findAll();

		$id_siswa = $this->nilaiModel->where('id_kelas', $id_kelas)
        ->first();

        $array = [];
        foreach($nilai as $nm){
            if($id_siswa['s_NISN'] == $nm['s_NISN']){
                $array[] = $nm['nama_matapelajaran'];
            }
        }

        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'Template Nilai');
        $activeWorksheet->setCellValue('A2', 'Kelas');
        $activeWorksheet->setCellValue('A3', 'Semester');
        $activeWorksheet->setCellValue('A4', 'Paket Keahlian');
        $activeWorksheet->setCellValue('A5', 'Tahun Pelajaran');

        $activeWorksheet->setCellValue('B2', $kelas['nama_kelas']);
        $activeWorksheet->setCellValue('B3', $semester);
        $activeWorksheet->setCellValue('B4', $kelas['nama_jurusan']);
        $activeWorksheet->setCellValue('B5', $kelas['nama_tahunajaran']);
        
        $activeWorksheet->setCellValue('A6', 'No.');
        $activeWorksheet->setCellValue('B6', 'NISN');
        $activeWorksheet->setCellValue('C6', 'Nama Siswa');

        $column = 6;
        $cell = 'D';
        for($i=0; $i < count($array); $i++){
            $old_cell = $cell;
            $activeWorksheet->setCellValue($cell.$column , $array[$i]);
            $cell++;
            $cell++;
            $cell++;
            $cell++;
            $cell++;
            $cell++;
            $cell++;
            $spreadsheet->getActiveSheet()->mergeCells($old_cell.$column.':'.$cell++.$column);
        }
        
        $column2 = 7;
        $cell2 = 'D';
        for($i=0; $i < count($array); $i++){
            $old_cell2 = $cell2;
            $activeWorksheet->setCellValue($cell2.$column2 , 'Pengetahuan');
            $cell2++;
            $cell2++;
            $cell2++;
            $spreadsheet->getActiveSheet()->mergeCells($old_cell2.$column2.':'.$cell2++.$column2);
            
            $old_cell2 = $cell2;
            $activeWorksheet->setCellValue($cell2.$column2 , 'Keterampilan');
            $cell2++;
            $cell2++;
            $cell2++;
            $spreadsheet->getActiveSheet()->mergeCells($old_cell2.$column2.':'.$cell2++.$column2);
        }
        
        $column3 = 8;
        $cell3 = 'D';
        for($i=0; $i < count($array); $i++){
            $activeWorksheet->setCellValue($cell3.$column3 , 'KB');
            $cell3++;
            $activeWorksheet->setCellValue($cell3.$column3 , 'Angka');
            $cell3++;
            $activeWorksheet->setCellValue($cell3.$column3 , 'Predikat');
            $cell3++;
            $activeWorksheet->setCellValue($cell3.$column3 , 'Deskripsi Matapelajaran');
            $cell3++;
            $activeWorksheet->setCellValue($cell3.$column3 , 'KB');
            $cell3++;
            $activeWorksheet->setCellValue($cell3.$column3 , 'Angka');
            $cell3++;
            $activeWorksheet->setCellValue($cell3.$column3 , 'Predikat');
            $cell3++;
            $activeWorksheet->setCellValue($cell3.$column3 , 'Deskripsi Matapelajaran');
            $cell3++;
        }

        $column4 = 9;
        foreach($siswa as $key){
            $activeWorksheet->setCellValue('A'.$column4, ($column4-8));
            $activeWorksheet->setCellValue('B'.$column4, $key['s_NISN']);
            $activeWorksheet->setCellValue('C'.$column4, $key['s_namalengkap']);
            $column4++;
        }
        

        //Marge
        $spreadsheet->getActiveSheet()->mergeCells('A6:A8'); //No.
        $spreadsheet->getActiveSheet()->mergeCells('B6:B8'); //NISN
        $spreadsheet->getActiveSheet()->mergeCells('C6:C8'); //Nama

        //Auto Size
        for ($i = 'A'; $i !==  $cell; $i++) {
            $activeWorksheet->getColumnDimension($i)->setAutoSize(true);
        }
        
        //Bold
        $activeWorksheet->getStyle('A1')->getFont()->setBold(true);
        $activeWorksheet->getStyle('A2:B2')->getFont()->setBold(true);
        $activeWorksheet->getStyle('A3:B3')->getFont()->setBold(true);
        $activeWorksheet->getStyle('A4:B4')->getFont()->setBold(true);
        $activeWorksheet->getStyle('A5:B5')->getFont()->setBold(true);
        
        for ($i = 'A'; $i !== $cell; $i++) {
            $activeWorksheet->getStyle('A6:'.$i.'6')->getFont()->setBold(true);
            $activeWorksheet->getStyle('A7:'.$i.'7')->getFont()->setBold(true);
            $activeWorksheet->getStyle('A8:'.$i.'8')->getFont()->setBold(true);
        }


        $writer = new Xlsx($spreadsheet);
        header("Content-type:application/vnd.openxmlformat-officedocument.spreadsheetml.sheet");
        header("Content-Disposition: attachment; filename=Form Nilai Siswa.xlsx");
        header("Cache-Control: max-age=0");
        $writer->save('php://output');
        exit();       

    }
    
	public function import(){

		$file = $this->request->getFile('file_nilai');
		
		new PHPExcel;

		$fileLocation = $file->getTempName();

		$objPHPExcel = PHPExcel_IOFactory::load($fileLocation);

		$sheet = $objPHPExcel->getActiveSheet()->toArray();

		foreach($sheet as $x => $excel){
			// skip judul tabel
			if($x == 0){
				continue;
			}
			if($x == 1){
				continue;
			}
			if($x == 2){
				continue;
			}
			if($x == 3){
				continue;
			}
			if($x == 4){
				continue;
			}
			if($x == 5){
				continue;
			}
			if($x == 6){
				continue;
			}
			if($x == 7){
				continue;
			}

            $daftarSiswaKelas = $this->daftarSiswaKelasModel->where('id_kelas', $this->request->getVar('id_kelas'))->findAll();

            foreach($daftarSiswaKelas as $dsk){

                $nilai = $this->nilaiModel->where('s_NISN', $dsk['s_NISN'])->where('semester', $this->request->getVar('semester'))->findAll();
                $cell = 3;
                foreach($nilai as $n){
                    if($excel['1'] == $n['s_NISN']){
                        $this->nilaiModel->save([
                            'id_nilai' => $n['id_nilai'],
                            'np_kb' => $excel[$cell++],
                            'np_angka' => $excel[$cell++],
                            'np_predikat' => $excel[$cell++],
                            'np_deskripsi' => $excel[$cell++],
                            'nk_kb' => $excel[$cell++],
                            'nk_angka' => $excel[$cell++],
                            'nk_predikat' => $excel[$cell++],
                            'nk_deskripsi' => $excel[$cell++],
                            'semester' => $this->request->getVar('semester'),
                        ]);
                    }
                }

            }

		}

		return redirect()->to(base_url('/'.'nilai/'.$this->request->getVar('id_kelas').'/'.$this->request->getVar('semester')));
	}
}
