<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**
 * IndexEtpd Controller
 *
 * @property \App\Model\Table\IndexEtpdTable $IndexEtpd
 *
 * @method \App\Model\Entity\IndexEtpd[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IndexEtpdController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Instansi', 'CPeriodePelaporan']
        ];
        $indexEtpd = $this->paginate($this->IndexEtpd);

        $this->set(compact('indexEtpd'));
    }

    /**
     * View method
     *
     * @param string|null $id Index Etpd id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $indexEtpd = $this->IndexEtpd->get($id, [
            'contain' => ['Instansi', 'CPeriodePelaporan']
        ]);

        $this->set('indexEtpd', $indexEtpd);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $indexEtpd = $this->IndexEtpd->newEntity();
        if ($this->request->is('post')) {
            $indexEtpd = $this->IndexEtpd->patchEntity($indexEtpd, $this->request->getData());
            if ($this->IndexEtpd->save($indexEtpd)) {
                $this->Flash->success(__('The index etpd has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The index etpd could not be saved. Please, try again.'));
        }
        $instansi = $this->IndexEtpd->Instansi->find('list', ['limit' => 200]);
        $cPeriodePelaporan = $this->IndexEtpd->CPeriodePelaporan->find('list', ['limit' => 200]);
        $this->set(compact('indexEtpd', 'instansi', 'cPeriodePelaporan'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Index Etpd id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $indexEtpd = $this->IndexEtpd->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $indexEtpd = $this->IndexEtpd->patchEntity($indexEtpd, $this->request->getData());
            if ($this->IndexEtpd->save($indexEtpd)) {
                $this->Flash->success(__('The index etpd has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The index etpd could not be saved. Please, try again.'));
        }
        $instansi = $this->IndexEtpd->Instansi->find('list', ['limit' => 200]);
        $cPeriodePelaporan = $this->IndexEtpd->CPeriodePelaporan->find('list', ['limit' => 200]);
        $this->set(compact('indexEtpd', 'instansi', 'cPeriodePelaporan'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Index Etpd id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $indexEtpd = $this->IndexEtpd->get($id);
        if ($this->IndexEtpd->delete($indexEtpd)) {
            $this->Flash->success(__('The index etpd has been deleted.'));
        } else {
            $this->Flash->error(__('The index etpd could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Export .xlsx method
     *
     * @param string|null $id Index Etpd id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function exportXlsx($id = null)
    {
        $spreadsheet = new Spreadsheet();
        $writer = new Xlsx($spreadsheet);
        
        $spreadsheet->setActiveSheetIndex(0);
        $activeSheet = $spreadsheet->getActiveSheet();
        
        $activeSheet->setCellValue('A1', 'Email');
        $activeSheet->setCellValue('B1', 'Tingkat Pemerintahan');
        $activeSheet->setCellValue('C1', 'Nama Provinsi/Kota/Kabupaten');
        $activeSheet->setCellValue('D1', 'KPwDN');
        $activeSheet->setCellValue('E1', 'Nama Petugas Pengisi');
        $activeSheet->setCellValue('F1', 'Nomor Induk Pegawai');
        $activeSheet->setCellValue('G1', 'Nomor kontak responden yang dapat dihubungi');
        $activeSheet->setCellValue('H1', 'Tanggal Pengisian');
        $activeSheet->setCellValue('I1', 'Total Target Pendapatan Asli Daerah (Rp)');
        $activeSheet->setCellValue('J1', 'Total Realisasi Pendapatan Asli Daerah (Rp)');
        $activeSheet->setCellValue('K1', 'Total Target Pajak Daerah (Rp)');
        $activeSheet->setCellValue('L1', 'Total Realisasi Pajak Daerah (Rp)');
        $activeSheet->setCellValue('M1', 'Total Target Retribusi Daerah (Rp)');
        $activeSheet->setCellValue('N1', 'Total Realisasi Retribusi Daerah (Rp)');
        $activeSheet->setCellValue('O1', 'Total Pagu Belanja Daerah (Rp)');
        $activeSheet->setCellValue('P1', 'Total Realisasi Belanja Daerah (Rp)');
        $activeSheet->setCellValue('Q1', 'Total Pagu Belanja Operasi (Rp)');
        $activeSheet->setCellValue('R1', 'Total Realisasi Belanja Operasi (Rp)');
        $activeSheet->setCellValue('S1', 'Total Pagu Belanja Modal (Rp)');
        $activeSheet->setCellValue('T1', 'Total Realisasi Belanja Modal (Rp)');
        $activeSheet->setCellValue('U1', 'Total Pagu Belanja Tidak Terduga (Rp)');
        $activeSheet->setCellValue('V1', 'Total Realisasi Belanja Tidak Terduga (Rp)');
        $activeSheet->setCellValue('W1', 'Total Pagu Belanja Transfer (Rp)');
        $activeSheet->setCellValue('X1', 'Total Realisasi Belanja Transfer (Rp)');
        $activeSheet->setCellValue('Y1', 'Berikut adalah transaksi belanja langsung yang telah dapat dilakukan secara elektronifikasi [Belanja Pegawai]');
        $activeSheet->setCellValue('Z1', 'Berikut adalah transaksi belanja langsung yang telah dapat dilakukan secara elektronifikasi [Belanja Barang Dan Jasa]');
        $activeSheet->setCellValue('AA1', 'Berikut adalah transaksi belanja langsung yang telah dapat dilakukan secara elektronifikasi [Belanja Modal]');
        $activeSheet->setCellValue('AB1', 'Berikut adalah transaksi belanja tidak langsung yang telah dapat dilakukan secara elektronifikasi [Belanja Pegawai]');
        $activeSheet->setCellValue('AC1', 'Berikut adalah transaksi belanja tidak langsung yang telah dapat dilakukan secara elektronifikasi [Belanja Bunga]');
        $activeSheet->setCellValue('AD1', 'Berikut adalah transaksi belanja tidak langsung yang telah dapat dilakukan secara elektronifikasi [Belanja Subsidi]');
        $activeSheet->setCellValue('AE1', 'Berikut adalah transaksi belanja tidak langsung yang telah dapat dilakukan secara elektronifikasi [Belanja Hibah]');
        $activeSheet->setCellValue('AF1', 'Berikut adalah transaksi belanja tidak langsung yang telah dapat dilakukan secara elektronifikasi [Belanja Bantuan Sosial]');
        $activeSheet->setCellValue('AG1', 'Berikut adalah transaksi belanja tidak langsung yang telah dapat dilakukan secara elektronifikasi [Belanja Bagi Hasil]');
        $activeSheet->setCellValue('AH1', 'Berikut adalah transaksi belanja tidak langsung yang telah dapat dilakukan secara elektronifikasi [Belanja Bantuan Keuangan]');
        $activeSheet->setCellValue('AI1', 'Berikut adalah transaksi belanja tidak langsung yang telah dapat dilakukan secara elektronifikasi [Belanja Tidak Terduga]');
        $activeSheet->setCellValue('AJ1', '<Khusus Pemda Tingkat Provinsi> Berikut kanal pembayaran yang telah digunakan untuk pajak provinsi [Kendaraan Bermotor]');
        $activeSheet->setCellValue('AK1', '<Khusus Pemda Tingkat Provinsi> Berikut kanal pembayaran yang telah digunakan untuk pajak provinsi [Bea Balik Nama Kendaraan Bermotor]');
        $activeSheet->setCellValue('AL1', '<Khusus Pemda Tingkat Provinsi> Berikut kanal pembayaran yang telah digunakan untuk pajak provinsi [Bahan Bakar Kendaraan Bermotor]');
        $activeSheet->setCellValue('AM1', '<Khusus Pemda Tingkat Provinsi> Berikut kanal pembayaran yang telah digunakan untuk pajak provinsi [Air Permukaan]');
        $activeSheet->setCellValue('AN1', '<Khusus Pemda Tingkat Provinsi> Berikut kanal pembayaran yang telah digunakan untuk pajak provinsi [Rokok]');
        $activeSheet->setCellValue('AO1', '<Khusus Responden Kabupaten/Kota> Berikut kanal pembayaran yang telah digunakan untuk pajak kota/kabupaten [Hotel]');
        $activeSheet->setCellValue('AP1', '<Khusus Responden Kabupaten/Kota> Berikut kanal pembayaran yang telah digunakan untuk pajak kota/kabupaten [Restoran]');
        $activeSheet->setCellValue('AQ1', '<Khusus Responden Kabupaten/Kota> Berikut kanal pembayaran yang telah digunakan untuk pajak kota/kabupaten [Hiburan]');
        $activeSheet->setCellValue('AR1', '<Khusus Responden Kabupaten/Kota> Berikut kanal pembayaran yang telah digunakan untuk pajak kota/kabupaten [Reklame]');
        $activeSheet->setCellValue('AS1', '<Khusus Responden Kabupaten/Kota> Berikut kanal pembayaran yang telah digunakan untuk pajak kota/kabupaten [Penerangan Jalan]');
        $activeSheet->setCellValue('AT1', '<Khusus Responden Kabupaten/Kota> Berikut kanal pembayaran yang telah digunakan untuk pajak kota/kabupaten [Mineral Bukan Logam dan Batuan]');
        $activeSheet->setCellValue('AU1', '<Khusus Responden Kabupaten/Kota> Berikut kanal pembayaran yang telah digunakan untuk pajak kota/kabupaten [Parkir]');
        $activeSheet->setCellValue('AV1', '<Khusus Responden Kabupaten/Kota> Berikut kanal pembayaran yang telah digunakan untuk pajak kota/kabupaten [Air Tanah]');
        $activeSheet->setCellValue('AW1', '<Khusus Responden Kabupaten/Kota> Berikut kanal pembayaran yang telah digunakan untuk pajak kota/kabupaten [Sarang Burung Walet]');
        $activeSheet->setCellValue('AX1', '<Khusus Responden Kabupaten/Kota> Berikut kanal pembayaran yang telah digunakan untuk pajak kota/kabupaten [Pajak Bumi dan Bangunan Perdesaan dan Perkotaan]');
        $activeSheet->setCellValue('AY1', '<Khusus Responden Kabupaten/Kota> Berikut kanal pembayaran yang telah digunakan untuk pajak kota/kabupaten [Bea Perolehan Hak atas Tanah dan Bangunan]');
        $activeSheet->setCellValue('AZ1', 'Kanal pembayaran yang telah digunakan untuk retribusi [Pelayanan Kesehatan]');
        $activeSheet->setCellValue('BA1', 'Kanal pembayaran yang telah digunakan untuk retribusi [Pelayanan Persampahan / Kebersihan]');
        $activeSheet->setCellValue('BB1', 'Kanal pembayaran yang telah digunakan untuk retribusi [Pelayanan Pemakaman]');
        $activeSheet->setCellValue('BC1', 'Kanal pembayaran yang telah digunakan untuk retribusi [Parkir di Tepi Jalan Umum]');
        $activeSheet->setCellValue('BD1', 'Kanal pembayaran yang telah digunakan untuk retribusi [Pelayanan Pasar]');
        $activeSheet->setCellValue('BE1', 'Kanal pembayaran yang telah digunakan untuk retribusi [Pengujian Kendaraan Bermotor]');
        $activeSheet->setCellValue('BF1', 'Kanal pembayaran yang telah digunakan untuk retribusi [Pemeriksaan Alat Pemadam Kebakaran]');
        $activeSheet->setCellValue('BG1', 'Kanal pembayaran yang telah digunakan untuk retribusi [Penggantian Biaya Cetak Peta Penyediaan]');
        $activeSheet->setCellValue('BH1', 'Kanal pembayaran yang telah digunakan untuk retribusi [Penyedotan Kakus]');
        $activeSheet->setCellValue('BI1', 'Kanal pembayaran yang telah digunakan untuk retribusi [Pengolahan Limbah Cair]');
        $activeSheet->setCellValue('BJ1', 'Kanal pembayaran yang telah digunakan untuk retribusi [Pelayanan Tera / Tera Ulang]');
        $activeSheet->setCellValue('BK1', 'Kanal pembayaran yang telah digunakan untuk retribusi [Pelayanan Pendidikan]');
        $activeSheet->setCellValue('BL1', 'Kanal pembayaran yang telah digunakan untuk retribusi [Pengendalian Menara Telekomunikasi]');
        $activeSheet->setCellValue('BM1', 'Kanal pembayaran yang telah digunakan untuk retribusi [Pengendalian Lalu-lintas]');
        $activeSheet->setCellValue('BN1', 'Kanal pembayaran yang telah digunakan untuk retribusi [Pemakaian Kekayaan Daerah]');
        $activeSheet->setCellValue('BO1', 'Kanal pembayaran yang telah digunakan untuk retribusi [Pasar Grosir dan / atau Pertokoan]');
        $activeSheet->setCellValue('BP1', 'Kanal pembayaran yang telah digunakan untuk retribusi [Tempat Pelelangan]');
        $activeSheet->setCellValue('BQ1', 'Kanal pembayaran yang telah digunakan untuk retribusi [Terminal]');
        $activeSheet->setCellValue('BR1', 'Kanal pembayaran yang telah digunakan untuk retribusi [Tempat Khusus Parkir]');
        $activeSheet->setCellValue('BS1', 'Kanal pembayaran yang telah digunakan untuk retribusi [Tempat Penginapan/Pesanggrahan/Villa]');
        $activeSheet->setCellValue('BT1', 'Kanal pembayaran yang telah digunakan untuk retribusi [Rumah Potong Hewan]');
        $activeSheet->setCellValue('BU1', 'Kanal pembayaran yang telah digunakan untuk retribusi [Pelayanan Pelabuhan]');
        $activeSheet->setCellValue('BV1', 'Kanal pembayaran yang telah digunakan untuk retribusi [Tempat Rekreasi dan Olahraga]');
        $activeSheet->setCellValue('BW1', 'Kanal pembayaran yang telah digunakan untuk retribusi [Penyeberangan di Air]');
        $activeSheet->setCellValue('BX1', 'Kanal pembayaran yang telah digunakan untuk retribusi [Rekreasi Penjualan Produksi Usaha Daerah]');
        $activeSheet->setCellValue('BY1', 'Kanal pembayaran yang telah digunakan untuk retribusi [Izin Persetujuan Bangunan Gedung]');
        $activeSheet->setCellValue('BZ1', 'Kanal pembayaran yang telah digunakan untuk retribusi [Izin Tempat Penjualan Minuman Beralkohol]');
        $activeSheet->setCellValue('CA1', 'Kanal pembayaran yang telah digunakan untuk retribusi [Izin Trayek]');
        $activeSheet->setCellValue('CB1', 'Kanal pembayaran yang telah digunakan untuk retribusi [Izin Usaha Perikanan]');
        $activeSheet->setCellValue('CC1', 'Kanal pembayaran yang telah digunakan untuk retribusi [Perpanjangan IMTA]');
        $activeSheet->setCellValue('CD1', 'Berikut alat/kanal pembayaran yang telah tersedia bagi masyarakat untuk pembayaran pajak dan retribusi [Teller/Loket Bank]');
        $activeSheet->setCellValue('CE1', 'Berikut alat/kanal pembayaran yang telah tersedia bagi masyarakat untuk pembayaran pajak dan retribusi [Agen Bank/Point-of-sales]');
        $activeSheet->setCellValue('CF1', 'Berikut alat/kanal pembayaran yang telah tersedia bagi masyarakat untuk pembayaran pajak dan retribusi [ATM]');
        $activeSheet->setCellValue('CG1', 'Berikut alat/kanal pembayaran yang telah tersedia bagi masyarakat untuk pembayaran pajak dan retribusi [EDC]');
        $activeSheet->setCellValue('CH1', 'Berikut alat/kanal pembayaran yang telah tersedia bagi masyarakat untuk pembayaran pajak dan retribusi [UE Reader]');
        $activeSheet->setCellValue('CI1', 'Berikut alat/kanal pembayaran yang telah tersedia bagi masyarakat untuk pembayaran pajak dan retribusi [Internet/Mobile/SMS Banking]');
        $activeSheet->setCellValue('CJ1', 'Berikut alat/kanal pembayaran yang telah tersedia bagi masyarakat untuk pembayaran pajak dan retribusi [QRIS]');
        $activeSheet->setCellValue('CK1', 'Berikut alat/kanal pembayaran yang telah tersedia bagi masyarakat untuk pembayaran pajak dan retribusi [E-Commerce/ Marketplace/Toko Online]');
        $activeSheet->setCellValue('CL1', 'Nama Bank RKUD');
        $activeSheet->setCellValue('CM1', 'Total Pajak Daerah Dari Kanal QRIS (Rp)');
        $activeSheet->setCellValue('CN1', 'Total Retribusi Daerah Dari Kanal QRIS (Rp)');
        $activeSheet->setCellValue('CO1', 'Total Pajak Daerah Dari Kanal Non Digital (Teller & Loket Bank) (Rp)');
        $activeSheet->setCellValue('CP1', 'Total Retribusi Daerah Dari Kanal Non Digital (Teller & Loket Bank) (Rp)');
        $activeSheet->setCellValue('CQ1', 'Total Pajak Daerah Dari Kanal ATM (Rp)
        ');
        $activeSheet->setCellValue('CR1', 'Total Pajak Daerah Dari Kanal EDC (Rp)');
        $activeSheet->setCellValue('CS1', 'Total Pajak Daerah Dari Kanal Internet/Mobile/SMS Banking (Rp)
        ');
        $activeSheet->setCellValue('CT1', 'Total Pajak Daerah Dari Kanal Agen Bank/Minimarket (Rp)');
        $activeSheet->setCellValue('CU1', 'Total Pajak Daerah Dari Kanal UE Reader (Rp)');
        $activeSheet->setCellValue('CV1', 'Total Pajak Daerah Dari Kanal E-Commerce (Rp)');
        $activeSheet->setCellValue('CW1', 'Total Retribusi Daerah Dari Kanal ATM (Rp)
        ');
        $activeSheet->setCellValue('CX1', 'Total Retribusi Daerah Dari Kanal EDC (Rp)');
        $activeSheet->setCellValue('CY1', 'Total Retribusi Daerah Dari Kanal Internet/Mobile/SMS Banking (Rp)');
        $activeSheet->setCellValue('CZ1', 'Total Retribusi Daerah Dari Kanal Agen Bank (Rp)');
        $activeSheet->setCellValue('DA1', 'Total Retribusi Daerah Dari Kanal UE Reader (Rp)');
        $activeSheet->setCellValue('DB1', 'Total Retribusi Daerah Dari Kanal E-Commerce (Rp)');
        $activeSheet->setCellValue('DC1', 'Sebutkan sistem informasi keuangan daerah berbasis elektronik (Pendapatan/Penerimaan Daerah) yang saat ini digunakan');
        $activeSheet->setCellValue('DD1', 'Sebutkan sistem informasi keuangan daerah berbasis elektronik (Pendapatan/Penerimaan Daerah) yang saat ini digunakan [Lainnya]');
        $activeSheet->setCellValue('DE1', 'Sebutkan sistem informasi keuangan daerah berbasis elektronik (Belanja Daerah) yang saat ini digunakan');
        $activeSheet->setCellValue('DF1', 'Sebutkan sistem informasi keuangan daerah berbasis elektronik (Belanja Daerah) yang saat ini digunakan [Lainnya]');
        $activeSheet->setCellValue('DG1', '<Khusus Pemda Yang Belum Menggunakan SIPD> Apakah sistem informasi yang Saudara gunakan telah terintegrasi dengan SIPD?');
        $activeSheet->setCellValue('DH1', 'Apakah Pemda Saudara sudah mengimplementasikan sistem Surat Perintah Pencairan Dana (SP2D) secara daring / online?');
        $activeSheet->setCellValue('DI1', 'Apakah Pemda Saudara sudah menggunakan aplikasi Cash Management System (CMS) yang disediakan oleh Bank RKUD?');
        $activeSheet->setCellValue('DJ1', 'Apakah Pemda Saudara sudah mengintegrasikan aplikasi Cash Management System (CMS) dengan sistem keuangan Pemda?');
        $activeSheet->setCellValue('DK1', 'Apakah Pemda Saudara sudah memiliki regulasi terkait elektronifikasi transaksi pemerintah daerah?');
        $activeSheet->setCellValue('DL1', 'Jika Ya, sebutkan regulasi yang sudah dimiliki');
        $activeSheet->setCellValue('DM1', 'Apakah Pemda Saudara sudah melakukan sosialisasi mengenai pembayaran pajak dan/atau retribusi secara nontunai kepada masyarakat?');
        $activeSheet->setCellValue('DN1', 'Apakah Pemda Saudara telah memiliki Rencana Aksi implementasi ETPD di daerah Saudara?');
        $activeSheet->setCellValue('DO1', 'Apakah di wilayah Saudara terdapat daerah/kecamatan yang belum terlayani oleh jaringan internet (blankspot)?');
        $activeSheet->setCellValue('DP1', 'Jika Ya, sebutkan wilayah blankspot dimaksud');
        $activeSheet->setCellValue('DQ1', 'Berikan ceklis persentase Kecamatan / Desa di wilayah saudara yang telah tercakup jaringan komunikasi [Jaringan 2G]');
        $activeSheet->setCellValue('DR1', 'Berikan ceklis persentase Kecamatan / Desa di wilayah saudara yang telah tercakup jaringan komunikasi [Jaringan 3G]');
        $activeSheet->setCellValue('DS1', 'Berikan ceklis persentase Kecamatan / Desa di wilayah saudara yang telah tercakup jaringan komunikasi [Jaringan 4G]');
        $activeSheet->setCellValue('DT1', 'Berikan ceklis pada instansi yang telah menjalin kerja sama dalam memudahkan pemungutan pajak dan retribusi ');
        $activeSheet->setCellValue('DU1', 'Berikan ceklis pada kendala dan/atau permasalahan dalam pelaksanaan ETPD di daerah Saudara');
        $activeSheet->setCellValue('DV1', 'Berikan ceklis pada kendala dan/atau permasalahan dalam pelaksanaan ETPD di daerah Saudara [Lainnya]');
        $activeSheet->setCellValue('DW1', 'Apakah wilayah Saudara telah membentuk TP2DD');
        $activeSheet->setCellValue('DX1', 'Jika Ya, sebutkan landasan hukum pembentukan TP2DD');
        $activeSheet->setCellValue('DY1', 'Apakah dalam pengisian ini Saudara dibantu oleh Bank RKUD dan KPw Bank Indonesia setempat?');

        $connection = ConnectionManager::get('default');
        $results = $connection
            ->execute("SELECT * FROM index_etpd WHERE periode_id = :id", ['id' => $id])->fetchAll('assoc');
        // debug($results);exit;
        // $indexEtpd = TableRegistry::getTableLocator()->get('IndexEtpd');
        // $query = $indexEtpd
        //     ->find()
        //     ->contain(['Instansi', 'CPeriodePelaporan'])
        //     ->where(['periode_id' => $id])
        //     ->order(['tgl_dibuat' => 'DESC'])
        //     ->all();
        // debug($query);
        // exit;
        if(count($results) > 0) {
            $i = 2;
            foreach ($results as $row) {
                // $tingkat_pemerintah = strlen($row['kode_daerah']) == 2 ? 'Provinsi':'Kota/Kabupaten';
                $activeSheet->setCellValue('A'.$i , $row['email']);
                $activeSheet->setCellValue('B'.$i , $row['tingkat_pemerintah_daerah']);
                $activeSheet->setCellValue('C'.$i , $row['nama_daerah']);
                $activeSheet->setCellValue('D'.$i , $row['kpwdn']);
                $activeSheet->setCellValue('E'.$i , $row['nama_petugas']);
                $activeSheet->setCellValue('F'.$i , $row['nip']);
                $activeSheet->setCellValue('G'.$i , $row['nomor_kontak']);
                $activeSheet->setCellValue('H'.$i , $row['tgl_dibuat']);
                $activeSheet->setCellValue('I'.$i , $row['total_target_pendapatan_asli_daerah']);
                $activeSheet->setCellValue('J'.$i , $row['total_realisasi_pendapatan_asli_daerah']);
                $activeSheet->setCellValue('K'.$i , $row['total_target_pajak_daerah']);
                $activeSheet->setCellValue('L'.$i , $row['total_realisasi_pajak_daerah']);
                $activeSheet->setCellValue('M'.$i , $row['total_target_retribusi_daerah']);
                $activeSheet->setCellValue('N'.$i , $row['total_realisasi_retribusi_daerah']);
                $activeSheet->setCellValue('O'.$i , $row['total_pagu_belanja_daerah']);
                $activeSheet->setCellValue('P'.$i , $row['total_realisasi_belanja_daerah']);
                $activeSheet->setCellValue('Q'.$i , $row['total_pagu_belanja_operasi']);
                $activeSheet->setCellValue('R'.$i , $row['total_realisasi_belanja_operasi']);
                $activeSheet->setCellValue('S'.$i , $row['total_pagu_belanja_modal']);
                $activeSheet->setCellValue('T'.$i , $row['total_realisasi_belanja_modal']);
                $activeSheet->setCellValue('U'.$i , $row['total_pagu_belanja_tidak_terduga']);
                $activeSheet->setCellValue('V'.$i , $row['total_realisasi_belanja_tidak_terduga']);
                $activeSheet->setCellValue('W'.$i , $row['total_pagu_belanja_transfer']);
                $activeSheet->setCellValue('X'.$i , $row['total_realisasi_belanja_transfer']);
                $activeSheet->setCellValue('Y'.$i , $row['belanja_pegawai_langsung']);
                $activeSheet->setCellValue('Z'.$i , $row['belanja_barang_dan_jasa_langsung']);
                $activeSheet->setCellValue('AA'.$i , $row['belanja_modal_langsung']);
                $activeSheet->setCellValue('AB'.$i , $row['belanja_pegawai_tidak_langsung']);
                $activeSheet->setCellValue('AC'.$i , $row['belanja_bunga_tidak_langsung']);
                $activeSheet->setCellValue('AD'.$i , $row['belanja_subsidi_tidak_langsung']);
                $activeSheet->setCellValue('AE'.$i , $row['belanja_hibah_tidak_langsung']);
                $activeSheet->setCellValue('AF'.$i , $row['belanja_bantuan_sosial_tidak_langsung']);
                $activeSheet->setCellValue('AG'.$i , $row['belanja_bagi_hasil_tidak_langsung']);
                $activeSheet->setCellValue('AH'.$i , $row['belanja_bantuan_keuangan_tidak_langsung']);
                $activeSheet->setCellValue('AI'.$i , $row['belanja_tidak_terduga_tidak_langsung']);
                $activeSheet->setCellValue('AJ'.$i , $row['kendaraan_bermotor']);
                $activeSheet->setCellValue('AK'.$i , $row['bea_balik_nama_kendaraan_bermotor']);
                $activeSheet->setCellValue('AL'.$i , $row['bahan_bakar_kendaraan_bermotor']);
                $activeSheet->setCellValue('AM'.$i , $row['air_permukaan']);
                $activeSheet->setCellValue('AN'.$i , $row['rokok']);
                $activeSheet->setCellValue('AO'.$i , $row['hotel']);
                $activeSheet->setCellValue('AP'.$i , $row['restoran']);
                $activeSheet->setCellValue('AQ'.$i , $row['hiburan']);
                $activeSheet->setCellValue('AR'.$i , $row['reklame']);
                $activeSheet->setCellValue('AS'.$i , $row['penerangan_jalan']);
                $activeSheet->setCellValue('AT'.$i , $row['mineral_bukan_logam']);
                $activeSheet->setCellValue('AU'.$i , $row['parkir']);
                $activeSheet->setCellValue('AV'.$i , $row['air_tanah']);
                $activeSheet->setCellValue('AW'.$i , $row['sarang_burung_walet']);
                $activeSheet->setCellValue('AX'.$i , $row['pbb_desa_kota']);
                $activeSheet->setCellValue('AY'.$i , $row['bea_hak_tanah_bangunan']);
                $activeSheet->setCellValue('AZ'.$i , $row['pelayanan_kesehatan']);
                $activeSheet->setCellValue('BA'.$i , $row['pelayanan_kebersihan']);
                $activeSheet->setCellValue('BB'.$i , $row['pelayanan_pemakaman']);
                $activeSheet->setCellValue('BC'.$i , $row['parkir_jalan_umum']);
                $activeSheet->setCellValue('BD'.$i , $row['pelayanan_pasar']);
                $activeSheet->setCellValue('BE'.$i , $row['pengujian_kendaraan_bermotor']);
                $activeSheet->setCellValue('BF'.$i , $row['pemeriksaan_alat_pemadam']);
                $activeSheet->setCellValue('BG'.$i , $row['penggantian_biaya_cetak_peta']);
                $activeSheet->setCellValue('BH'.$i , $row['penyedotan_kakus']);
                $activeSheet->setCellValue('BI'.$i , $row['pengolahan_limbah_cair']);
                $activeSheet->setCellValue('BJ'.$i , $row['pelayanan_tera']);
                $activeSheet->setCellValue('BK'.$i , $row['pelayanan_pendidikan']);
                $activeSheet->setCellValue('BL'.$i , $row['pengendalian_menara_telekomunikasi']);
                $activeSheet->setCellValue('BM'.$i , $row['pengendalian_lalu_lintas']);
                $activeSheet->setCellValue('BN'.$i , $row['pemakaian_kekayaan_daerah']);
                $activeSheet->setCellValue('BO'.$i , $row['pasar_grosir']);
                $activeSheet->setCellValue('BP'.$i , $row['tempat_pelelangan']);
                $activeSheet->setCellValue('BQ'.$i , $row['terminal']);
                $activeSheet->setCellValue('BR'.$i , $row['tempat_khusus_parkir']);
                $activeSheet->setCellValue('BS'.$i , $row['tempat_penginapan']);
                $activeSheet->setCellValue('BT'.$i , $row['rumah_potong_hewan']);
                $activeSheet->setCellValue('BU'.$i , $row['pelayanan_pelabuhan']);
                $activeSheet->setCellValue('BV'.$i , $row['tempat_rekreasi']);
                $activeSheet->setCellValue('BW'.$i , $row['penyebrangan_diair']);
                $activeSheet->setCellValue('BX'.$i , $row['penjualan_produksi_usaha']);
                $activeSheet->setCellValue('BY'.$i , $row['izin_persetujuan_bangunan']);
                $activeSheet->setCellValue('BZ'.$i , $row['izin_tempat_penjualan_minuman']);
                $activeSheet->setCellValue('CA'.$i , $row['izin_trayek']);
                $activeSheet->setCellValue('CB'.$i , $row['izin_usaha_perikanan']);
                $activeSheet->setCellValue('CC'.$i , $row['perpanjangan_imta']);
                $activeSheet->setCellValue('CD'.$i , $row['teller_loket_bank']);
                $activeSheet->setCellValue('CE'.$i , $row['agen_bank']);
                $activeSheet->setCellValue('CF'.$i , $row['atm']);
                $activeSheet->setCellValue('CG'.$i , $row['edc']);
                $activeSheet->setCellValue('CH'.$i , $row['uereader']);
                $activeSheet->setCellValue('CI'.$i , $row['internet_mobile_sms_banking']);
                $activeSheet->setCellValue('CJ'.$i , $row['qris']);
                $activeSheet->setCellValue('CK'.$i , $row['ecommerce']);
                $activeSheet->setCellValue('CL'.$i , $row['nama_bank_rkud']);
                $activeSheet->setCellValue('CM'.$i , $row['total_pajak_daerah_dari_qris']);
                $activeSheet->setCellValue('CN'.$i , $row['total_retribusi_daerah_dari_qris']);
                $activeSheet->setCellValue('CO'.$i , $row['total_pajak_daerah_dari_non_digital']);
                $activeSheet->setCellValue('CP'.$i , $row['total_retribusi_daerah_dari_non_digital']);
                $activeSheet->setCellValue('CQ'.$i , $row['total_pajak_daerah_dari_atm']);
                $activeSheet->setCellValue('CR'.$i , $row['total_pajak_daerah_dari_edc']);
                $activeSheet->setCellValue('CS'.$i , $row['total_pajak_daerah_dari_internet']);
                $activeSheet->setCellValue('CT'.$i , $row['total_pajak_daerah_dari_agen_bank']);
                $activeSheet->setCellValue('CU'.$i , $row['total_pajak_daerah_dari_uereader']);
                $activeSheet->setCellValue('CV'.$i , $row['total_pajak_daerah_dari_ecommerce']);
                $activeSheet->setCellValue('CW'.$i , $row['total_retribusi_daerah_dari_atm']);
                $activeSheet->setCellValue('CX'.$i , $row['total_retribusi_daerah_dari_edc']);
                $activeSheet->setCellValue('CY'.$i , $row['total_retribusi_daerah_dari_internet']);
                $activeSheet->setCellValue('CZ'.$i , $row['total_retribusi_daerah_dari_agen_bank']);
                $activeSheet->setCellValue('DA'.$i , $row['total_retribusi_daerah_dari_uereader']);
                $activeSheet->setCellValue('DB'.$i , $row['total_retribusi_daerah_dari_ecommerce']);
                $activeSheet->setCellValue('DC'.$i , $row['sistem_informasi_pendapatan_daerah']);
                $activeSheet->setCellValue('DD'.$i , $row['sistem_informasi_pendapatan_daerah_other']);
                $activeSheet->setCellValue('DE'.$i , $row['sistem_informasi_belanja_daerah']);
                $activeSheet->setCellValue('DF'.$i , $row['sistem_informasi_belanja_daerah_other']);
                $activeSheet->setCellValue('DG'.$i , $row['integrasi_sipd']);
                $activeSheet->setCellValue('DH'.$i , $row['sp2d_online']);
                $activeSheet->setCellValue('DI'.$i , $row['integrasi_cms']);
                $activeSheet->setCellValue('DJ'.$i , $row['integrasi_cms_dengan_pemda']);
                $activeSheet->setCellValue('DK'.$i , $row['regulasi_elektronifikasi']);
                $activeSheet->setCellValue('DL'.$i , $row['regulasi_yang_dimiliki']);
                $activeSheet->setCellValue('DM'.$i , $row['sosialisasi_pembayaran_nontunai']);
                $activeSheet->setCellValue('DN'.$i , $row['rencana_pengembangan_etpd']);
                $activeSheet->setCellValue('DO'.$i , $row['blankspot']);
                $activeSheet->setCellValue('DP'.$i , $row['wilayah_blankspot']);
                $activeSheet->setCellValue('DQ'.$i , $row['jaringan_2g']);
                $activeSheet->setCellValue('DR'.$i , $row['jaringan_3g']);
                $activeSheet->setCellValue('DS'.$i , $row['jaringan_4g']);
                $activeSheet->setCellValue('DT'.$i , $row['kerjasama_pemungutan_pajak']);
                $activeSheet->setCellValue('DU'.$i , $row['kendala_pelaksanaan_etpd']);
                $activeSheet->setCellValue('DV'.$i , $row['kendala_pelaksanaan_etpd_other']);
                $activeSheet->setCellValue('DW'.$i , $row['telah_membentuk_tp2dd']);
                $activeSheet->setCellValue('DX'.$i , $row['landasan_hukum_pembentukan_tp2dd']);
                $activeSheet->setCellValue('DY'.$i , $row['dibantu_oleh_bank']);
                $i++;
            }
        }

        $dt = date("d-m-Y_His");
        $filename = $dt."_report_index_etpd.xlsx";

        // Redirect output to a client’s web browser (Xls)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename='.$filename);
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer->save('php://output');
        exit;
        
    }
}
