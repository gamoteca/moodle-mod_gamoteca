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
 * The task that provides all the steps to perform a complete backup is defined here.
 *
 * For more information about the backup and restore process, please visit:
 * https://docs.moodle.org/dev/Backup_2.0_for_developers
 * https://docs.moodle.org/dev/Restore_2.0_for_developers
 *
 * @package     mod_gamoteca
 * @category    backup
 * @copyright   2024 Gamoteca <info@gamoteca.com>
 * @copyright   based on work by 2020 Catalyst IT Europe (http://www.catalyst-eu.net/)
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'//mod/gamoteca/backup/moodle2/backup_gamoteca_stepslib.php');

/**
 * The class provides all the settings and steps to perform one complete backup of mod_gamoteca.
 */
class backup_gamoteca_activity_task extends backup_activity_task {

    /**
     * Defines particular settings for the plugin.
     */
    protected function define_my_settings() {
        // No particular settings for this activity.
    }

    /**
     * Defines particular steps for the backup process.
     */
    protected function define_my_steps() {
        $this->add_step(new backup_gamoteca_activity_structure_step('gamoteca_structure', 'gamoteca.xml'));
    }

    /**
     * Codes the transformations to perform in the activity in order to get transportable (encoded) links.
     *
     * @param string $content some HTML text that eventually contains URLs to the activity instance scripts
     * @return string the content with the URLs encoded
     */
    public static function encode_content_links($content) {
        global $CFG;

        $base = preg_quote($CFG->wwwroot, "/");

        // Link to the list of choices.
        $search = "/(".$base."\/mod\/gamoteca\/index.php\?id\=)([0-9]+)/";
        $content = preg_replace($search, '$@GAMOTECAINDEX*$2@$', $content);

        // Link to choice view by moduleid.
        $search = "/(".$base."\/mod\/gamoteca\/view.php\?id\=)([0-9]+)/";
        $content = preg_replace($search, '$@GAMOTECAVIEWBYID*$2@$', $content);

        return $content;
    }
}
