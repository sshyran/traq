<?php
/*!
 * Traq
 * Copyright (C) 2009-2015 Jack P.
 * Copyright (C) 2012-2015 Traq.io
 * https://github.com/nirix
 * https://traq.io
 *
 * This file is part of Traq.
 *
 * Traq is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; version 3 only.
 *
 * Traq is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Traq. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Traq\Controllers\ProjectSettings;

/**
 * Project settings controller
 *
 * @package Traq\Controllers\ProjectSettings
 * @author Jack P.
 * @since 3.0.0
 */
class AppController extends \Traq\Controllers\AppController
{
    protected $layout = "project_settings.phtml";

    public function __construct()
    {
        parent::__construct();

        // Add 'Settings' to the page title
        $this->title($this->translate('settings'));

        // Make sure this is a project and the user has the correct permission to access the area.
        $this->before('*', function () {
            if (!$this->currentProject
            || (!$this->hasPermission('project_settings')
                && !$this->currentUser['is_admin'])
            ) {
                $this->layout = 'default.phtml';
                return $this->show403();
            }
        });
    }
}
