<?php
    /**
     * Copyright © 2018 PJSoft All Rights Reserved.
     *
     * This program is free software: you can redistribute it and/or modify
     * it under the terms of the GNU General Public License as published by
     * the Free Software Foundation, either version 3 of the License, or
     * (at your option) any later version.
     *
     * This program is distributed in the hope that it will be useful,
     * but WITHOUT ANY WARRANTY; without even the implied warranty of
     * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     * GNU General Public License for more details.
     *
     * You should have received a copy of the GNU General Public License
     * along with this program.  If not, see <http://www.gnu.org/licenses/>.
     */
    
    declare(strict_types=1);
    
    namespace PJSoft\TicketSupport\Listener;
    
    use PJSoft\TicketSupport\Main;
    use pocketmine\event\Listener;
    
    class FormReceive implements Listener
    {
        /** @var Main  */
        private $owner;
    
        /**
         * FormReceive constructor.
         * @param Main $owner
         */
        public function __construct(Main $owner)
        {
            $this->owner = $owner;
        }
        
    }