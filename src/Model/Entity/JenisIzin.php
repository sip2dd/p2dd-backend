<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * JenisIzin Entity.
 *
 * @property int $id
 * @property string $jenis_izin
 * @property string $dibuat_oleh
 * @property \Cake\I18n\Time $tgl_dibuat
 * @property string $diubah_oleh
 * @property \Cake\I18n\Time $tgl_diubah
 * @property int $unit_id
 * @property \App\Model\Entity\Unit $unit
 * @property \App\Model\Entity\Pengguna[] $pengguna
 */
class JenisIzin extends Entity
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
        '*' => true,
        'id' => false,
        'tgl_dibuat' => false,
        'diubat_oleh' => false,
        'tgl_diubah' => false,
        'diubah_oleh' => false
    ];

    protected function _setUnitId($value)
    {
        if (is_string($value) && empty($value)) {
            $value = null;
        }
        return $value;
    }
}
