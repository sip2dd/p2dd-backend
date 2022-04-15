<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * IndexEtpd Entity
 *
 * @property int $id
 * @property int|null $instansi_id
 * @property int|null $periode_id
 * @property string|null $status
 * @property string|null $email
 * @property string|null $nama_petugas
 * @property string|null $nip
 * @property string|null $nomor_kontak
 * @property string|null $total_target_pendapatan_asli_daerah
 * @property string|null $total_realisasi_pendapatan_asli_daerah
 * @property string|null $total_target_pajak_daerah
 * @property string|null $total_realisasi_pajak_daerah
 * @property string|null $total_target_retribusi_daerah
 * @property string|null $total_realisasi_retribusi_daerah
 * @property string|null $total_pagu_belanja_daerah
 * @property string|null $total_realisasi_belanja_daerah
 * @property string|null $total_pagu_belanja_operasi
 * @property string|null $total_realisasi_belanja_operasi
 * @property string|null $total_pagu_belanja_modal
 * @property string|null $total_realisasi_belanja_modal
 * @property string|null $total_pagu_belanja_tidak_terduga
 * @property string|null $total_realisasi_belanja_tidak_terduga
 * @property string|null $total_pagu_belanja_transfer
 * @property string|null $belanja_pegawai_langsung
 * @property string|null $belanja_barang_dan_jasa_langsung
 * @property string|null $belanja_modal_langsung
 * @property string|null $belanja_pegawai_tidak_langsung
 * @property string|null $belanja_bunga_tidak_langsung
 * @property string|null $belanja_subsidi_tidak_langsung
 * @property string|null $belanja_hibah_tidak_langsung
 * @property string|null $belanja_bantuan_sosial_tidak_langsung
 * @property string|null $belanja_bagi_hasil_tidak_langsung
 * @property string|null $belanja_bantuan_keuangan_tidak_langsung
 * @property string|null $belanja_tidak_terduga_tidak_langsung
 * @property string|null $kendaraan_bermotor
 * @property string|null $bea_balik_nama_kendaraan_bermotor
 * @property string|null $bahan_bakar_kendaraan_bermotor
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
 * @property string|null $pelayanan_pemakaman
 * @property string|null $parkir_jalan_umum
 * @property string|null $pelayanan_pasar
 * @property string|null $pengujian_kendaraan_bermotor
 * @property string|null $pemeriksaan_alat_pemadam
 * @property string|null $penggantian_biaya_cetak_peta
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
 * @property string|null $izin_persetujuan_bangunan
 * @property string|null $izin_tempat_penjualan_minuman
 * @property string|null $izin_trayek
 * @property string|null $izin_usaha_perikanan
 * @property string|null $perpanjangan_imta
 * @property string|null $teller_loket_bank
 * @property string|null $agen_bank
 * @property string|null $atm
 * @property string|null $edc
 * @property string|null $uereader
 * @property string|null $internet_mobile_sms_banking
 * @property string|null $qris
 * @property string|null $ecommerce
 * @property string|null $nama_bank_rkud
 * @property string|null $total_pajak_daerah_dari_qris
 * @property string|null $total_pajak_daerah_dari_non_digital
 * @property string|null $total_pajak_daerah_dari_atm
 * @property string|null $total_pajak_daerah_dari_edc
 * @property string|null $total_pajak_daerah_dari_internet
 * @property string|null $total_pajak_daerah_dari_agen_bank
 * @property string|null $total_pajak_daerah_dari_uereader
 * @property string|null $total_pajak_daerah_dari_ecommerce
 * @property string|null $total_retribusi_daerah_dari_qris
 * @property string|null $total_retribusi_daerah_dari_non_digital
 * @property string|null $total_retribusi_daerah_dari_atm
 * @property string|null $total_retribusi_daerah_dari_edc
 * @property string|null $total_retribusi_daerah_dari_internet
 * @property string|null $total_retribusi_daerah_dari_agen_bank
 * @property string|null $total_retribusi_daerah_dari_uereader
 * @property string|null $total_retribusi_daerah_dari_ecommerce
 * @property string|null $sistem_informasi_pendapatan_daerah
 * @property string|null $sistem_informasi_belanja_daerah
 * @property string|null $integrasi_sipd
 * @property string|null $sp2d_online
 * @property string|null $integrasi_cms
 * @property string|null $integrasi_cms_dengan_pemda
 * @property string|null $regulasi_elektronifikasi
 * @property string|null $regulasi_yang_dimiliki
 * @property string|null $sosialisasi_pembayaran_nontunai
 * @property string|null $rencana_pengembangan_etpd
 * @property string|null $blankspot
 * @property string|null $wilayah_blankspot
 * @property string|null $jaringan_2g
 * @property string|null $jaringan_3g
 * @property string|null $jaringan_4g
 * @property string|null $kerjasama_pemungutan_pajak
 * @property string|null $kendala_pelaksanaan_etpd
 * @property string|null $telah_membentuk_tp2dd
 * @property string|null $landasan_hukum_pembentukan_tp2dd
 * @property string|null $dibantu_oleh_bank
 * @property string|null $dibuat_oleh
 * @property \Cake\I18n\FrozenDate|null $tgl_dibuat
 * @property string|null $diubah_oleh
 * @property \Cake\I18n\FrozenDate|null $tgl_diubah
 *
 * @property \App\Model\Entity\Instansi $instansi
 * @property \App\Model\Entity\Periode $periode
 */
class IndexEtpd extends Entity
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
        'instansi_id' => true,
        'periode_id' => true,
        'status' => true,
        'email' => true,
        'nama_petugas' => true,
        'nip' => true,
        'nomor_kontak' => true,
        'total_target_pendapatan_asli_daerah' => true,
        'total_realisasi_pendapatan_asli_daerah' => true,
        'total_target_pajak_daerah' => true,
        'total_realisasi_pajak_daerah' => true,
        'total_target_retribusi_daerah' => true,
        'total_realisasi_retribusi_daerah' => true,
        'total_pagu_belanja_daerah' => true,
        'total_realisasi_belanja_daerah' => true,
        'total_pagu_belanja_operasi' => true,
        'total_realisasi_belanja_operasi' => true,
        'total_pagu_belanja_modal' => true,
        'total_realisasi_belanja_modal' => true,
        'total_pagu_belanja_tidak_terduga' => true,
        'total_realisasi_belanja_tidak_terduga' => true,
        'total_pagu_belanja_transfer' => true,
        'belanja_pegawai_langsung' => true,
        'belanja_barang_dan_jasa_langsung' => true,
        'belanja_modal_langsung' => true,
        'belanja_pegawai_tidak_langsung' => true,
        'belanja_bunga_tidak_langsung' => true,
        'belanja_subsidi_tidak_langsung' => true,
        'belanja_hibah_tidak_langsung' => true,
        'belanja_bantuan_sosial_tidak_langsung' => true,
        'belanja_bagi_hasil_tidak_langsung' => true,
        'belanja_bantuan_keuangan_tidak_langsung' => true,
        'belanja_tidak_terduga_tidak_langsung' => true,
        'kendaraan_bermotor' => true,
        'bea_balik_nama_kendaraan_bermotor' => true,
        'bahan_bakar_kendaraan_bermotor' => true,
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
        'pelayanan_pemakaman' => true,
        'parkir_jalan_umum' => true,
        'pelayanan_pasar' => true,
        'pengujian_kendaraan_bermotor' => true,
        'pemeriksaan_alat_pemadam' => true,
        'penggantian_biaya_cetak_peta' => true,
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
        'izin_persetujuan_bangunan' => true,
        'izin_tempat_penjualan_minuman' => true,
        'izin_trayek' => true,
        'izin_usaha_perikanan' => true,
        'perpanjangan_imta' => true,
        'teller_loket_bank' => true,
        'agen_bank' => true,
        'atm' => true,
        'edc' => true,
        'uereader' => true,
        'internet_mobile_sms_banking' => true,
        'qris' => true,
        'ecommerce' => true,
        'nama_bank_rkud' => true,
        'total_pajak_daerah_dari_qris' => true,
        'total_pajak_daerah_dari_non_digital' => true,
        'total_pajak_daerah_dari_atm' => true,
        'total_pajak_daerah_dari_edc' => true,
        'total_pajak_daerah_dari_internet' => true,
        'total_pajak_daerah_dari_agen_bank' => true,
        'total_pajak_daerah_dari_uereader' => true,
        'total_pajak_daerah_dari_ecommerce' => true,
        'total_retribusi_daerah_dari_qris' => true,
        'total_retribusi_daerah_dari_non_digital' => true,
        'total_retribusi_daerah_dari_atm' => true,
        'total_retribusi_daerah_dari_edc' => true,
        'total_retribusi_daerah_dari_internet' => true,
        'total_retribusi_daerah_dari_agen_bank' => true,
        'total_retribusi_daerah_dari_uereader' => true,
        'total_retribusi_daerah_dari_ecommerce' => true,
        'sistem_informasi_pendapatan_daerah' => true,
        'sistem_informasi_belanja_daerah' => true,
        'integrasi_sipd' => true,
        'sp2d_online' => true,
        'integrasi_cms' => true,
        'integrasi_cms_dengan_pemda' => true,
        'regulasi_elektronifikasi' => true,
        'regulasi_yang_dimiliki' => true,
        'sosialisasi_pembayaran_nontunai' => true,
        'rencana_pengembangan_etpd' => true,
        'blankspot' => true,
        'wilayah_blankspot' => true,
        'jaringan_2g' => true,
        'jaringan_3g' => true,
        'jaringan_4g' => true,
        'kerjasama_pemungutan_pajak' => true,
        'kendala_pelaksanaan_etpd' => true,
        'telah_membentuk_tp2dd' => true,
        'landasan_hukum_pembentukan_tp2dd' => true,
        'dibantu_oleh_bank' => true,
        'dibuat_oleh' => true,
        'tgl_dibuat' => true,
        'diubah_oleh' => true,
        'tgl_diubah' => true,
        'total_realisasi_belanja_transfer' => true,
        'sistem_informasi_pendapatan_daerah_other' => true,
        'sistem_informasi_belanja_daerah_other' => true,
        'kendala_pelaksanaan_etpd_other' => true,
        'kerjasama_pemungutan_pajak_other' => true,
        'tingkat_pemerintah_daerah' => true,
        'nama_daerah' => true,
        'kpwdn' => true,
        'instansi' => true,
        'c_periode_pelaporan' => true
    ];
}
