<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Performance Entity
 *
 * @property int $performance_id
 * @property int $general_grades
 * @property int $course_grades
 * @property string $course_names
 * @property int $course_avgs
 * @property int $institution_id
 *
 * @property \App\Model\Entity\Institution $institution
 */
class Performance extends Entity
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
        'general_grades' => true,
        'course_grades' => true,
        'course_names' => true,
        'course_avgs' => true,
        'institution_id' => true,
        'institution' => true
    ];
}
