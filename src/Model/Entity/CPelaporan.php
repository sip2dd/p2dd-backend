<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CPelaporan Entity
 *
 * @property int $id
 * @property int|null $instansi_id
 * @property string|null $data_labels
 * @property string|null $dibuat_oleh
 * @property \Cake\I18n\FrozenDate|null $tgl_dibuat
 * @property string|null $diubah_oleh
 * @property \Cake\I18n\FrozenDate|null $tgl_diubah
 * @property int|null $periode_id
 * @property string|null $status
 * @property int|null $total_pendapatan
 * @property int|null $total_belanja
 * @property string|null $pegawai
 * @property string|null $barang_dan_jasa
 * @property string|null $modal
 * @property string|null $belanja_pegawai
 * @property string|null $belanja_bunga
 * @property string|null $belanja_subsidi
 * @property string|null $belanja_hibah
 * @property string|null $belanja_bantuan_sosial
 * @property string|null $belanja_bagi_hasil
 * @property string|null $belanja_bantuan_keuangan
 * @property string|null $belanja_tidak_terduga
 * @property string|null $teller_loket_bank
 * @property string|null $atm
 * @property string|null $mesin_edc
 * @property string|null $internet_mobile_sms_banking
 * @property string|null $agen
 * @property string|null $uereader
 * @property string|null $qris
 * @property string|null $ecommerce
 * @property int|null $total_penerimaan_qris
 * @property int|null $total_penerimaan_teller
 * @property int|null $total_penerimaan_nonqris
 * @property string|null $sp2d_online
 * @property string|null $aplikasi_cms
 * @property string|null $integrasi_cms
 * @property string|null $regulasi_elektronifikasi
 * @property string|null $sosialisasi_pembayaran_nontunai
 * @property string|null $pengembangan_etp
 * @property string|null $jaringan_2g
 * @property string|null $jaringan_3g
 * @property string|null $jaringan_4g
 * @property string|null $rencana_memperluas_layanan
 * @property string|null $email
 * @property int $del
 * @property string|null $kpwdn
 * @property string|null $kendaraan_bermotor
 * @property string|null $bea_balik_nama_kendaraan
 * @property string|null $bahan_bakar_kendaraan
 * @property string|null $air_permukaan
 * @property string|null $rokok
 * @property string|null $hotel
 * @property string|null $restoran
 * @property string|null $hiburan
 * @property string|null $reklame
 * @property string|null $penerangan_jalan
 * @property string|null $mineral_bukan_logam
 * @property string|null $parkir
 * @property string|null $air_tanah
 * @property string|null $sarang_burung_walet
 * @property string|null $pbb_desa_kota
 * @property string|null $bea_hak_tanah_bangunan
 * @property string|null $pelayanan_kesehatan
 * @property string|null $pelayanan_kebersihan
 * @property string|null $biaya_cetak_ktp_akta
 * @property string|null $pelayanan_pemakaman
 * @property string|null $parkir_jalan_umum
 * @property string|null $pelayanan_pasar
 * @property string|null $pengujian_kendaraan
 * @property string|null $pemeriksaan_alat_pemadam
 * @property string|null $biaya_cetak_peta
 * @property string|null $penyedotan_kakus
 * @property string|null $pengolahan_limbah_cair
 * @property string|null $pelayanan_tera
 * @property string|null $pelayanan_pendidikan
 * @property string|null $pengendalian_menara_telekomunikasi
 * @property string|null $pengendalian_lalu_lintas
 * @property string|null $pemakaian_kekayaan_daerah
 * @property string|null $pasar_grosir
 * @property string|null $tempat_pelelangan
 * @property string|null $terminal
 * @property string|null $tempat_khusus_parkir
 * @property string|null $tempat_penginapan
 * @property string|null $rumah_potong_hewan
 * @property string|null $pelayanan_pelabuhan
 * @property string|null $tempat_rekreasi
 * @property string|null $penyebrangan_diair
 * @property string|null $penjualan_produksi_usaha
 * @property string|null $izin_mendirikan_bangunan
 * @property string|null $izin_tempat_penjualan_minuman
 * @property string|null $izin_gangguan
 * @property string|null $izin_trayek
 * @property string|null $izin_usaha_perikanan
 * @property string|null $perpanjangan_imta
 * @property string|null $kerjasama_pemungutan_pajak
 * @property string|null $kendala_pelaksanaan_eptd
 * @property string|null $kendala_pengisian_eptd
 * @property string|null $kendala_pelaksanaan_eptd_lain
 * @property string|null $kendala_pengisian_eptd_lain
 *
 * @property \App\Model\Entity\Instansi $instansi
 * @property \App\Model\Entity\CPeriodePelaporan $c_periode_pelaporan
 */
class CPelaporan extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true
    /*  'instansi_id' => true,
        'data_labels' => true,
        'dibuat_oleh' => true,
        'tgl_dibuat' => true,
        'diubah_oleh' => true,
        'tgl_diubah' => true,
        'periode_id' => true,
        'status' => true,
        'total_pendapatan' => true,
        'total_belanja' => true,
        'pegawai' => true,
        'barang_dan_jasa' => true,
        'modal' => true,
        'belanja_pegawai' => true,
        'belanja_bunga' => true,
        'belanja_subsidi' => true,
        'belanja_hibah' => true,
        'belanja_bantuan_sosial' => true,
        'belanja_bagi_hasil' => true,
        'belanja_bantuan_keuangan' => true,
        'belanja_tidak_terduga' => true,
        'teller_loket_bank' => true,
        'atm' => true,
        'mesin_edc' => true,
        'internet_mobile_sms_banking' => true,
        'agen' => true,
        'uereader' => true,
        'qris' => true,
        'ecommerce' => true,
        'total_penerimaan_qris' => true,
        'total_penerimaan_teller' => true,
        'total_penerimaan_nonqris' => true,
        'sp2d_online' => true,
        'aplikasi_cms' => true,
        'integrasi_cms' => true,
        'regulasi_elektronifikasi' => true,
        'sosialisasi_pembayaran_nontunai' => true,
        'pengembangan_etp' => true,
        'jaringan_2g' => true,
        'jaringan_3g' => true,
        'jaringan_4g' => true,
        'rencana_memperluas_layanan' => true,
        'email' => true,
        'del' => true,
        'kpwdn' => true,
        'kendaraan_bermotor' => true,
        'bea_balik_nama_kendaraan' => true,
        'bahan_bakar_kendaraan' => true,
        'air_permukaan' => true,
        'rokok' => true,
        'hotel' => true,
        'restoran' => true,
        'hiburan' => true,
        'reklame' => true,
        'penerangan_jalan' => true,
        'mineral_bukan_logam' => true,
        'parkir' => true,
        'air_tanah' => true,
        'sarang_burung_walet' => true,
        'pbb_desa_kota' => true,
        'bea_hak_tanah_bangunan' => true,
        'pelayanan_kesehatan' => true,
        'pelayanan_kebersihan' => true,
        'biaya_cetak_ktp_akta' => true,
        'pelayanan_pemakaman' => true,
        'parkir_jalan_umum' => true,
        'pelayanan_pasar' => true,
        'pengujian_kendaraan' => true,
        'pemeriksaan_alat_pemadam' => true,
        'biaya_cetak_peta' => true,
        'penyedotan_kakus' => true,
        'pengolahan_limbah_cair' => true,
        'pelayanan_tera' => true,
        'pelayanan_pendidikan' => true,
        'pengendalian_menara_telekomunikasi' => true,
        'pengendalian_lalu_lintas' => true,
        'pemakaian_kekayaan_daerah' => true,
        'pasar_grosir' => true,
        'tempat_pelelangan' => true,
        'terminal' => true,
        'tempat_khusus_parkir' => true,
        'tempat_penginapan' => true,
        'rumah_potong_hewan' => true,
        'pelayanan_pelabuhan' => true,
        'tempat_rekreasi' => true,
        'penyebrangan_diair' => true,
        'penjualan_produksi_usaha' => true,
        'izin_mendirikan_bangunan' => true,
        'izin_tempat_penjualan_minuman' => true,
        'izin_gangguan' => true,
        'izin_trayek' => true,
        'izin_usaha_perikanan' => true,
        'perpanjangan_imta' => true,
        'kerjasama_pemungutan_pajak' => true,
        'kendala_pelaksanaan_eptd' => true,
        'kendala_pengisian_eptd' => true,
        'kendala_pelaksanaan_eptd_lain' => true,
        'kendala_pengisian_eptd_lain' => true,
        'instansi' => true,
        'c_periode_pelaporan' => true
    */
    ];
}
