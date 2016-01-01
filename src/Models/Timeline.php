<?php
/*!
 * Traq
 * Copyright (C) 2009-2015 Jack P.
 * Copyright (C) 2012-2015 Traq.io
 * https://github.com/nirix
 * http://traq.io
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

namespace Traq\Models;

use Avalon\Database\Model;

/**
 * Timeline model.
 *
 * @package Traq\Models
 * @author Jack P.
 * @since 3.0.0
 */
class Timeline extends Model
{
    // protected static $_tableName = PREFIX . 'timeline';

    public static function tableName()
    {
        return PREFIX . 'timeline';
    }

    /**
     * Creates a new Timeline object relating to a milestone completion event.
     *
     * @return Timeline
     */
    public static function milestoneCompletedEvent($user, $milestone)
    {
        return new static([
            'project_id' => $milestone->project_id,
            'owner_id'   => $milestone->id,
            'user_id'    => $user->id,
            'action'     => "milestone_completed",
        ]);
    }

    /**
     * Creates a new Timeline object relating to a new wiki page event.
     *
     * @return Timeline
     */
    public static function wikiPageCreatedEvent($user, $page)
    {
        return new static([
            'project_id' => $page->project_id,
            'owner_id'   => $page->id,
            'user_id'    => $user->id,
            'action'     => "wiki_page_created",
        ]);
    }
}
