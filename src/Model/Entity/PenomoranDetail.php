<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PenomoranDetail Entity.
 *
 * @property int $id
 * @property int $penomoran_id
 * @property \App\Model\Entity\Penomoran $penomoran
 * @property int $unit_id
 * @property \App\Model\Entity\Unit $unit
 * @property int $no_terakhir
 */
class PenomoranDetail extends Entity
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
    ];
}
