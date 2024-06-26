<?php
// This file is part of Moodle - http://moodle.org/
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
 * gamoteca_deleted
 *
 * Class for event to be triggered when a gamoteca is updated.
 *
 * @package    mod_gamoteca
 * @author     Jackson D'souza <jackson.dsouza@catalyst-eu.net>
 * @copyright  2024 Gamoteca <info@gamoteca.com>
 * @copyright  based on work by 2020 Catalyst IT Europe (http://www.catalyst-eu.net/)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace mod_gamoteca\event;

/**
 * gamoteca_deleted
 *
 * Class for event to be triggered when a gamoteca is updated.
 *
 * @package    mod_gamoteca
 * @author     Jackson D'souza <jackson.dsouza@catalyst-eu.net>
 * @copyright  2024 Gamoteca <info@gamoteca.com>
 * @copyright  based on work by 2020 Catalyst IT Europe (http://www.catalyst-eu.net/)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class gamoteca_deleted extends \core\event\base {

    /**
     * Initialise required event data properties.
     */
    protected function init() {
        $this->data['crud'] = 'd';
        $this->data['edulevel'] = self::LEVEL_TEACHING;
        $this->data['objecttable'] = 'gamoteca';
    }

    /**
     * Returns localised event name.
     *
     * @return string
     */
    public static function get_name() {
        return get_string('event:gamoteca_deleted', 'mod_gamoteca');
    }

    /**
     * Returns non-localised description of what happened.
     *
     * @return string
     */
    public function get_description() {
        $values = [
            'courseid' => $this->courseid,
            'coursemoduleid' => $this->objectid,
        ];
        return get_string('event:gamoteca_deleted_desc', 'mod_gamoteca', $values);
    }
}
