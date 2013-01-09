<?php
/*!
 * Traq
 * Copyright (C) 2009-2013 Traq.io
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

namespace traq\models;

use avalon\database\Model;

/**
 * User group model.
 *
 * @package Traq
 * @subpackage Models
 * @author Jack P.
 * @copyright (c) Jack P.
 */
class CustomField extends Model
{
    protected static $_name = 'custom_fields';
    protected static $_properties = array(
        'id',
        'name',
        'type',
        'values',
        'multiple',
        'default_value',
        'regex',
        'min_length',
        'max_length',
        'is_required'
    );

    public static function types()
    {
        return array(
            'text',
            'select',
            'integer'
        );
    }

    public static function types_select_options()
    {
        $options = array();

        foreach (static::types() as $type) {
            $options[] = array('label' => l($type), 'value' => $type);
        }

        return $options;
    }
}
