<?php
// This file is part of the Gamoteca plugin for Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * The mod_gamoteca course module viewed event.
 *
 * @package    mod_gamoteca
 * @author     Jackson D'souza <jackson.dsouza@catalyst-eu.net>
 * @copyright  2024 Gamoteca <info@gamoteca.com>
 * @copyright  based on work by 2020 Catalyst IT Europe (http://www.catalyst-eu.net/)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_gamoteca\event;

/**
 * The mod_gamoteca course module viewed event class.
 *
 * @package    mod_gamoteca
 * @since      Moodle 3.3
 * @author     Jackson D'souza <jackson.dsouza@catalyst-eu.net>
 * @copyright  2024 Gamoteca <info@gamoteca.com>
 * @copyright  based on work by 2020 Catalyst IT Europe (http://www.catalyst-eu.net/)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class course_module_viewed extends \core\event\course_module_viewed {

    /**
     * Init method.
     *
     * @return void
     */
    protected function init() {
        $this->data['crud'] = 'r';
        $this->data['edulevel'] = self::LEVEL_PARTICIPATING;
        $this->data['objecttable'] = 'gamoteca';
    }


    /**
     * Map the objectid to it's new value in the new course.
     *
     * @return array
     */
    public static function get_objectid_mapping() {
        return ['db' => 'gamoteca', 'restore' => 'gamoteca'];
    }
}
