<?php

/*
 * This file is part of the Access to Memory (AtoM) software.
 *
 * Access to Memory (AtoM) is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Access to Memory (AtoM) is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Access to Memory (AtoM).  If not, see <http://www.gnu.org/licenses/>.
 */

/*
 * Add job table & job management menu link
 *
 * @package    AccesstoMemory
 * @subpackage migration
 */
class arMigration0109
{
  const
    VERSION = 109, // The new database version
    MIN_MILESTONE = 2; // The minimum milestone required

  /**
   * Upgrade
   *
   * @return bool True if the upgrade succeeded, False otherwise
   */
  public function up($configuration)
  {
    // Create AIP table
    $sql = <<<sql
CREATE TABLE `job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `completed_at` datetime DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_job_1` (`id`),
  KEY `fk_job_2` (`status_id`),
  KEY `fk_job_3` (`user_id`),
  CONSTRAINT `fk_job_1` FOREIGN KEY (`id`) REFERENCES `object` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_job_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_job_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB;
sql;

    return true;
  }
}