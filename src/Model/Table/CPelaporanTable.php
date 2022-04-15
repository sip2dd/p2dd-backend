<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CPelaporan Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Instansis
 * @property |\Cake\ORM\Association\BelongsTo $Periodes
 *
 * @method \App\Model\Entity\CPelaporan get($primaryKey, $options = [])
 * @method \App\Model\Entity\CPelaporan newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CPelaporan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CPelaporan|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CPelaporan|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CPelaporan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CPelaporan[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CPelaporan findOrCreate($search, callable $callback = null, $options = [])
 */
class CPelaporanTable extends Table
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

        $this->setTable('c_pelaporan');
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
            ->scalar('data_labels')
            ->allowEmpty('data_labels');

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
            ->scalar('status')
            ->maxLength('status', 20)
            ->allowEmpty('status');

        $validator
            ->allowEmpty('total_pendapatan');

        $validator
            ->allowEmpty('total_belanja');

        $validator
            ->scalar('pegawai')
            ->allowEmpty('pegawai');

        $validator
            ->scalar('barang_dan_jasa')
            ->allowEmpty('barang_dan_jasa');

        $validator
            ->scalar('modal')
            ->allowEmpty('modal');

        $validator
            ->scalar('belanja_pegawai')
            ->allowEmpty('belanja_pegawai');

        $validator
            ->scalar('belanja_bunga')
            ->allowEmpty('belanja_bunga');

        $validator
            ->scalar('belanja_subsidi')
            ->allowEmpty('belanja_subsidi');

        $validator
            ->scalar('belanja_hibah')
            ->allowEmpty('belanja_hibah');

        $validator
            ->scalar('belanja_bantuan_sosial')
            ->allowEmpty('belanja_bantuan_sosial');

        $validator
            ->scalar('belanja_bagi_hasil')
            ->allowEmpty('belanja_bagi_hasil');

        $validator
            ->scalar('belanja_bantuan_keuangan')
            ->allowEmpty('belanja_bantuan_keuangan');

        $validator
            ->scalar('belanja_tidak_terduga')
            ->allowEmpty('belanja_tidak_terduga');

        $validator
            ->scalar('teller_loket_bank')
            ->allowEmpty('teller_loket_bank');

        $validator
            ->scalar('atm')
            ->allowEmpty('atm');

        $validator
            ->scalar('mesin_edc')
            ->allowEmpty('mesin_edc');

        $validator
            ->scalar('internet_mobile_sms_banking')
            ->allowEmpty('internet_mobile_sms_banking');

        $validator
            ->scalar('agen')
            ->allowEmpty('agen');

        $validator
            ->scalar('uereader')
            ->allowEmpty('uereader');

        $validator
            ->scalar('qris')
            ->allowEmpty('qris');

        $validator
            ->scalar('ecommerce')
            ->allowEmpty('ecommerce');

        $validator
            ->allowEmpty('total_penerimaan_qris');

        $validator
            ->allowEmpty('total_penerimaan_teller');

        $validator
            ->allowEmpty('total_penerimaan_nonqris');

        $validator
            ->scalar('sp2d_online')
            ->allowEmpty('sp2d_online');

        $validator
            ->scalar('aplikasi_cms')
            ->allowEmpty('aplikasi_cms');

        $validator
            ->scalar('integrasi_cms')
            ->allowEmpty('integrasi_cms');

        $validator
            ->scalar('regulasi_elektronifikasi')
            ->allowEmpty('regulasi_elektronifikasi');

        $validator
            ->scalar('sosialisasi_pembayaran_nontunai')
            ->allowEmpty('sosialisasi_pembayaran_nontunai');

        $validator
            ->scalar('pengembangan_etp')
            ->allowEmpty('pengembangan_etp');

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
            ->scalar('rencana_memperluas_layanan')
            ->allowEmpty('rencana_memperluas_layanan');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->scalar('kpwdn')
            ->allowEmpty('kpwdn');

        $validator
            ->scalar('kendaraan_bermotor')
            ->allowEmpty('kendaraan_bermotor');

        $validator
            ->scalar('bea_balik_nama_kendaraan')
            ->allowEmpty('bea_balik_nama_kendaraan');

        $validator
            ->scalar('bahan_bakar_kendaraan')
            ->allowEmpty('bahan_bakar_kendaraan');

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
            ->scalar('biaya_cetak_ktp_akta')
            ->allowEmpty('biaya_cetak_ktp_akta');

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
            ->scalar('pengujian_kendaraan')
            ->allowEmpty('pengujian_kendaraan');

        $validator
            ->scalar('pemeriksaan_alat_pemadam')
            ->allowEmpty('pemeriksaan_alat_pemadam');

        $validator
            ->scalar('biaya_cetak_peta')
            ->allowEmpty('biaya_cetak_peta');

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
            ->scalar('izin_mendirikan_bangunan')
            ->allowEmpty('izin_mendirikan_bangunan');

        $validator
            ->scalar('izin_tempat_penjualan_minuman')
            ->allowEmpty('izin_tempat_penjualan_minuman');

        $validator
            ->scalar('izin_gangguan')
            ->allowEmpty('izin_gangguan');

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
            ->scalar('kerjasama_pemungutan_pajak')
            ->allowEmpty('kerjasama_pemungutan_pajak');

        $validator
            ->scalar('kendala_pelaksanaan_eptd')
            ->allowEmpty('kendala_pelaksanaan_eptd');

        $validator
            ->scalar('kendala_pengisian_eptd')
            ->allowEmpty('kendala_pengisian_eptd');

        $validator
            ->scalar('kendala_pelaksanaan_eptd_lain')
            ->allowEmpty('kendala_pelaksanaan_eptd_lain');

        $validator
            ->scalar('kendala_pengisian_eptd_lain')
            ->allowEmpty('kendala_pengisian_eptd_lain');

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
        // $rules->add($rules->existsIn(['instansi_id'], 'Instansi'));
        $rules->add($rules->existsIn(['periode_id'], 'CPeriodePelaporan'));

        return $rules;
    }
}
