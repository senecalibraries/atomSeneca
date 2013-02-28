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

class sfInstallPluginCheckHtaccessAction extends sfAction
{
  public function execute($request)
  {
    $this->htaccess = sfInstall::checkHtaccess();
    $this->settingsYml = sfInstall::checkSettingsYml(count($this->htaccess) < 1);

    if (0 == count($this->htaccess) && 0 == count($this->settingsYml))
    {
      return sfView::NONE;
    }
  }
}
