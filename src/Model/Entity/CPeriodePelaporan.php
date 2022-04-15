<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CPeriodePelaporan Entity
 *
 * @property int $id
 * @property int $instansi_id
 * @property string|null $data_labels
 * @property int $del
 * @property string|null $dibuat_oleh
 * @property \Cake\I18n\FrozenDate|null $tgl_dibuat
 * @property string|null $diubah_oleh
 * @property \Cake\I18n\FrozenDate|null $tgl_diubah
 * @property \Cake\I18n\FrozenDate|null $tgl_mulai
 * @property \Cake\I18n\FrozenDate|null $tgl_akhir
 * @property string|null $status
 * @property string|null $keterangan
 *
 * @property \App\Model\Entity\Instansi $instansi
 */
class CPeriodePelaporan extends Entity
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
        'data_labels' => true,
        'del' => true,
        'dibuat_oleh' => true,
        'tgl_dibuat' => true,
        'diubah_oleh' => true,
        'tgl_diubah' => true,
        'tgl_mulai' => true,
        'tgl_akhir' => true,
        'status' => true,
        'keterangan' => true,
        'instansi' => true,
        'laporan_hasil' => true
    ];
}
