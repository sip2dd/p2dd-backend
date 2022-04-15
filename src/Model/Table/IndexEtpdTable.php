<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * IndexEtpd Model
 *
 * @property \App\Model\Table\InstansisTable|\Cake\ORM\Association\BelongsTo $Instansis
 * @property \App\Model\Table\PeriodesTable|\Cake\ORM\Association\BelongsTo $Periodes
 *
 * @method \App\Model\Entity\IndexEtpd get($primaryKey, $options = [])
 * @method \App\Model\Entity\IndexEtpd newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\IndexEtpd[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\IndexEtpd|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\IndexEtpd|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\IndexEtpd patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\IndexEtpd[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\IndexEtpd findOrCreate($search, callable $callback = null, $options = [])
 */
class IndexEtpdTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('index_etpd');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Instansi', [
            'foreignKey' => 'instansi_id'
        ]);
        $this->belongsTo('CPeriodePelaporan', [
            'foreignKey' => 'periode_id'
        ]);
        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'tgl_dibuat' => 'new',
                    'tgl_diubah' => 'existing',
                ]
            ]
        ]);

        $this->addBehavior('Muffin/Footprint.Footprint', [
            'events' => [
                'Model.beforeSave' => [
                    'dibuat_oleh' => 'new',
                    'diubah_oleh' => 'existing',
                ]
            ],
            'propertiesMap' => [
                'dibuat_oleh' => '_footprint.username',
                'diubah_oleh' => '_footprint.username',
            ],
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('status')
            ->maxLength('status', 20)
            ->allowEmpty('status');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->scalar('nama_petugas')
            ->allowEmpty('nama_petugas');

        $validator
            ->scalar('nip')
            ->allowEmpty('nip');

        $validator
            ->scalar('nomor_kontak')
            ->allowEmpty('nomor_kontak');

        $validator
            ->scalar('total_target_pendapatan_asli_daerah')
            ->allowEmpty('total_target_pendapatan_asli_daerah');

        $validator
            ->scalar('total_realisasi_pendapatan_asli_daerah')
            ->allowEmpty('total_realisasi_pendapatan_asli_daerah');

        $validator
            ->scalar('total_target_pajak_daerah')
            ->allowEmpty('total_target_pajak_daerah');

        $validator
            ->scalar('total_realisasi_pajak_daerah')
            ->allowEmpty('total_realisasi_pajak_daerah');

        $validator
            ->scalar('total_target_retribusi_daerah')
            ->allowEmpty('total_target_retribusi_daerah');

        $validator
            ->scalar('total_realisasi_retribusi_daerah')
            ->allowEmpty('total_realisasi_retribusi_daerah');

        $validator
            ->scalar('total_pagu_belanja_daerah')
            ->allowEmpty('total_pagu_belanja_daerah');

        $validator
            ->scalar('total_realisasi_belanja_daerah')
            ->allowEmpty('total_realisasi_belanja_daerah');

        $validator
            ->scalar('total_pagu_belanja_operasi')
            ->allowEmpty('total_pagu_belanja_operasi');

        $validator
            ->scalar('total_realisasi_belanja_operasi')
            ->allowEmpty('total_realisasi_belanja_operasi');

        $validator
            ->scalar('total_pagu_belanja_modal')
            ->allowEmpty('total_pagu_belanja_modal');

        $validator
            ->scalar('total_realisasi_belanja_modal')
            ->allowEmpty('total_realisasi_belanja_modal');

        $validator
            ->scalar('total_pagu_belanja_tidak_terduga')
            ->allowEmpty('total_pagu_belanja_tidak_terduga');

        $validator
            ->scalar('total_realisasi_belanja_tidak_terduga')
            ->allowEmpty('total_realisasi_belanja_tidak_terduga');

        $validator
            ->scalar('total_pagu_belanja_transfer')
            ->allowEmpty('total_pagu_belanja_transfer');

        $validator
            ->scalar('belanja_pegawai_langsung')
            ->allowEmpty('belanja_pegawai_langsung');

        $validator
            ->scalar('belanja_barang_dan_jasa_langsung')
            ->allowEmpty('belanja_barang_dan_jasa_langsung');

        $validator
            ->scalar('belanja_modal_langsung')
            ->allowEmpty('belanja_modal_langsung');

        $validator
            ->scalar('belanja_pegawai_tidak_langsung')
            ->allowEmpty('belanja_pegawai_tidak_langsung');

        $validator
            ->scalar('belanja_bunga_tidak_langsung')
            ->allowEmpty('belanja_bunga_tidak_langsung');

        $validator
            ->scalar('belanja_subsidi_tidak_langsung')
            ->allowEmpty('belanja_subsidi_tidak_langsung');

        $validator
            ->scalar('belanja_hibah_tidak_langsung')
            ->allowEmpty('belanja_hibah_tidak_langsung');

        $validator
            ->scalar('belanja_bantuan_sosial_tidak_langsung')
            ->allowEmpty('belanja_bantuan_sosial_tidak_langsung');

        $validator
            ->scalar('belanja_bagi_hasil_tidak_langsung')
            ->allowEmpty('belanja_bagi_hasil_tidak_langsung');

        $validator
            ->scalar('belanja_bantuan_keuangan_tidak_langsung')
            ->allowEmpty('belanja_bantuan_keuangan_tidak_langsung');

        $validator
            ->scalar('belanja_tidak_terduga_tidak_langsung')
            ->allowEmpty('belanja_tidak_terduga_tidak_langsung');

        $validator
            ->scalar('kendaraan_bermotor')
            ->allowEmpty('kendaraan_bermotor');

        $validator
            ->scalar('bea_balik_nama_kendaraan_bermotor')
            ->allowEmpty('bea_balik_nama_kendaraan_bermotor');

        $validator
            ->scalar('bahan_bakar_kendaraan_bermotor')
            ->allowEmpty('bahan_bakar_kendaraan_bermotor');

        $validator
            ->scalar('air_permukaan')
            ->allowEmpty('air_permukaan');

        $validator
            ->scalar('rokok')
            ->allowEmpty('rokok');

        $validator
            ->scalar('hotel')
            ->allowEmpty('hotel');

        $validator
            ->scalar('restoran')
            ->allowEmpty('restoran');

        $validator
            ->scalar('hiburan')
            ->allowEmpty('hiburan');

        $validator
            ->scalar('reklame')
            ->allowEmpty('reklame');

        $validator
            ->scalar('penerangan_jalan')
            ->allowEmpty('penerangan_jalan');

        $validator
            ->scalar('mineral_bukan_logam')
            ->allowEmpty('mineral_bukan_logam');

        $validator
            ->scalar('parkir')
            ->allowEmpty('parkir');

        $validator
            ->scalar('air_tanah')
            ->allowEmpty('air_tanah');

        $validator
            ->scalar('sarang_burung_walet')
            ->allowEmpty('sarang_burung_walet');

        $validator
            ->scalar('pbb_desa_kota')
            ->allowEmpty('pbb_desa_kota');

        $validator
            ->scalar('bea_hak_tanah_bangunan')
            ->allowEmpty('bea_hak_tanah_bangunan');

        $validator
            ->scalar('pelayanan_kesehatan')
            ->allowEmpty('pelayanan_kesehatan');

        $validator
            ->scalar('pelayanan_kebersihan')
            ->allowEmpty('pelayanan_kebersihan');

        $validator
            ->scalar('pelayanan_pemakaman')
            ->allowEmpty('pelayanan_pemakaman');

        $validator
            ->scalar('parkir_jalan_umum')
            ->allowEmpty('parkir_jalan_umum');

        $validator
            ->scalar('pelayanan_pasar')
            ->allowEmpty('pelayanan_pasar');

        $validator
            ->scalar('pengujian_kendaraan_bermotor')
            ->allowEmpty('pengujian_kendaraan_bermotor');

        $validator
            ->scalar('pemeriksaan_alat_pemadam')
            ->allowEmpty('pemeriksaan_alat_pemadam');

        $validator
            ->scalar('penggantian_biaya_cetak_peta')
            ->allowEmpty('penggantian_biaya_cetak_peta');

        $validator
            ->scalar('penyedotan_kakus')
            ->allowEmpty('penyedotan_kakus');

        $validator
            ->scalar('pengolahan_limbah_cair')
            ->allowEmpty('pengolahan_limbah_cair');

        $validator
            ->scalar('pelayanan_tera')
            ->allowEmpty('pelayanan_tera');

        $validator
            ->scalar('pelayanan_pendidikan')
            ->allowEmpty('pelayanan_pendidikan');

        $validator
            ->scalar('pengendalian_menara_telekomunikasi')
            ->allowEmpty('pengendalian_menara_telekomunikasi');

        $validator
            ->scalar('pengendalian_lalu_lintas')
            ->allowEmpty('pengendalian_lalu_lintas');

        $validator
            ->scalar('pemakaian_kekayaan_daerah')
            ->allowEmpty('pemakaian_kekayaan_daerah');

        $validator
            ->scalar('pasar_grosir')
            ->allowEmpty('pasar_grosir');

        $validator
            ->scalar('tempat_pelelangan')
            ->allowEmpty('tempat_pelelangan');

        $validator
            ->scalar('terminal')
            ->allowEmpty('terminal');

        $validator
            ->scalar('tempat_khusus_parkir')
            ->allowEmpty('tempat_khusus_parkir');

        $validator
            ->scalar('tempat_penginapan')
            ->allowEmpty('tempat_penginapan');

        $validator
            ->scalar('rumah_potong_hewan')
            ->allowEmpty('rumah_potong_hewan');

        $validator
            ->scalar('pelayanan_pelabuhan')
            ->allowEmpty('pelayanan_pelabuhan');

        $validator
            ->scalar('tempat_rekreasi')
            ->allowEmpty('tempat_rekreasi');

        $validator
            ->scalar('penyebrangan_diair')
            ->allowEmpty('penyebrangan_diair');

        $validator
            ->scalar('penjualan_produksi_usaha')
            ->allowEmpty('penjualan_produksi_usaha');

        $validator
            ->scalar('izin_persetujuan_bangunan')
            ->allowEmpty('izin_persetujuan_bangunan');

        $validator
            ->scalar('izin_tempat_penjualan_minuman')
            ->allowEmpty('izin_tempat_penjualan_minuman');

        $validator
            ->scalar('izin_trayek')
            ->allowEmpty('izin_trayek');

        $validator
            ->scalar('izin_usaha_perikanan')
            ->allowEmpty('izin_usaha_perikanan');

        $validator
            ->scalar('perpanjangan_imta')
            ->allowEmpty('perpanjangan_imta');

        $validator
            ->scalar('teller_loket_bank')
            ->allowEmpty('teller_loket_bank');

        $validator
            ->scalar('agen_bank')
            ->allowEmpty('agen_bank');

        $validator
            ->scalar('atm')
            ->allowEmpty('atm');

        $validator
            ->scalar('edc')
            ->allowEmpty('edc');

        $validator
            ->scalar('uereader')
            ->allowEmpty('uereader');

        $validator
            ->scalar('internet_mobile_sms_banking')
            ->allowEmpty('internet_mobile_sms_banking');

        $validator
            ->scalar('qris')
            ->allowEmpty('qris');

        $validator
            ->scalar('ecommerce')
            ->allowEmpty('ecommerce');

        $validator
            ->scalar('nama_bank_rkud')
            ->allowEmpty('nama_bank_rkud');

        $validator
            ->scalar('total_pajak_daerah_dari_qris')
            ->allowEmpty('total_pajak_daerah_dari_qris');

        $validator
            ->scalar('total_pajak_daerah_dari_non_digital')
            ->allowEmpty('total_pajak_daerah_dari_non_digital');

        $validator
            ->scalar('total_pajak_daerah_dari_atm')
            ->allowEmpty('total_pajak_daerah_dari_atm');

        $validator
            ->scalar('total_pajak_daerah_dari_edc')
            ->allowEmpty('total_pajak_daerah_dari_edc');

        $validator
            ->scalar('total_pajak_daerah_dari_internet')
            ->allowEmpty('total_pajak_daerah_dari_internet');

        $validator
            ->scalar('total_pajak_daerah_dari_agen_bank')
            ->allowEmpty('total_pajak_daerah_dari_agen_bank');

        $validator
            ->scalar('total_pajak_daerah_dari_uereader')
            ->allowEmpty('total_pajak_daerah_dari_uereader');

        $validator
            ->scalar('total_pajak_daerah_dari_ecommerce')
            ->allowEmpty('total_pajak_daerah_dari_ecommerce');

        $validator
            ->scalar('total_retribusi_daerah_dari_qris')
            ->allowEmpty('total_retribusi_daerah_dari_qris');

        $validator
            ->scalar('total_retribusi_daerah_dari_non_digital')
            ->allowEmpty('total_retribusi_daerah_dari_non_digital');

        $validator
            ->scalar('total_retribusi_daerah_dari_atm')
            ->allowEmpty('total_retribusi_daerah_dari_atm');

        $validator
            ->scalar('total_retribusi_daerah_dari_edc')
            ->allowEmpty('total_retribusi_daerah_dari_edc');

        $validator
            ->scalar('total_retribusi_daerah_dari_internet')
            ->allowEmpty('total_retribusi_daerah_dari_internet');

        $validator
            ->scalar('total_retribusi_daerah_dari_agen_bank')
            ->allowEmpty('total_retribusi_daerah_dari_agen_bank');

        $validator
            ->scalar('total_retribusi_daerah_dari_uereader')
            ->allowEmpty('total_retribusi_daerah_dari_uereader');

        $validator
            ->scalar('total_retribusi_daerah_dari_ecommerce')
            ->allowEmpty('total_retribusi_daerah_dari_ecommerce');

        $validator
            ->scalar('sistem_informasi_pendapatan_daerah')
            ->allowEmpty('sistem_informasi_pendapatan_daerah');

        $validator
            ->scalar('sistem_informasi_belanja_daerah')
            ->allowEmpty('sistem_informasi_belanja_daerah');

        $validator
            ->scalar('integrasi_sipd')
            ->allowEmpty('integrasi_sipd');

        $validator
            ->scalar('sp2d_online')
            ->allowEmpty('sp2d_online');

        $validator
            ->scalar('integrasi_cms')
            ->allowEmpty('integrasi_cms');

        $validator
            ->scalar('integrasi_cms_dengan_pemda')
            ->allowEmpty('integrasi_cms_dengan_pemda');

        $validator
            ->scalar('regulasi_elektronifikasi')
            ->allowEmpty('regulasi_elektronifikasi');

        $validator
            ->scalar('regulasi_yang_dimiliki')
            ->allowEmpty('regulasi_yang_dimiliki');

        $validator
            ->scalar('sosialisasi_pembayaran_nontunai')
            ->allowEmpty('sosialisasi_pembayaran_nontunai');

        $validator
            ->scalar('rencana_pengembangan_etpd')
            ->allowEmpty('rencana_pengembangan_etpd');

        $validator
            ->scalar('blankspot')
            ->allowEmpty('blankspot');

        $validator
            ->scalar('wilayah_blankspot')
            ->allowEmpty('wilayah_blankspot');

        $validator
            ->scalar('jaringan_2g')
            ->allowEmpty('jaringan_2g');

        $validator
            ->scalar('jaringan_3g')
            ->allowEmpty('jaringan_3g');

        $validator
            ->scalar('jaringan_4g')
            ->allowEmpty('jaringan_4g');

        $validator
            ->scalar('kerjasama_pemungutan_pajak')
            ->allowEmpty('kerjasama_pemungutan_pajak');

        $validator
            ->scalar('kendala_pelaksanaan_etpd')
            ->allowEmpty('kendala_pelaksanaan_etpd');

        $validator
            ->scalar('telah_membentuk_tp2dd')
            ->allowEmpty('telah_membentuk_tp2dd');

        $validator
            ->scalar('landasan_hukum_pembentukan_tp2dd')
            ->allowEmpty('landasan_hukum_pembentukan_tp2dd');

        $validator
            ->scalar('dibantu_oleh_bank')
            ->allowEmpty('dibantu_oleh_bank');

        $validator
            ->scalar('dibuat_oleh')
            ->maxLength('dibuat_oleh', 25)
            ->allowEmpty('dibuat_oleh');

        $validator
            ->date('tgl_dibuat')
            ->allowEmpty('tgl_dibuat');

        $validator
            ->scalar('diubah_oleh')
            ->maxLength('diubah_oleh', 25)
            ->allowEmpty('diubah_oleh');

        $validator
            ->date('tgl_diubah')
            ->allowEmpty('tgl_diubah');

        $validator
            ->scalar('total_realisasi_belanja_transfer')
            ->allowEmpty('total_realisasi_belanja_transfer');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        // $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['instansi_id'], 'Instansi'));
        $rules->add($rules->existsIn(['periode_id'], 'CPeriodePelaporan'));

        return $rules;
    }
}
