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
    
    namespace PJSoft\TicketSupport\Command;
    
    use PJSoft\TicketSupport\Form\Form;
    use PJSoft\TicketSupport\Main;
    use pocketmine\command\Command;
    use pocketmine\command\CommandSender;
    use pocketmine\Player;

    class TicketCommand extends Command
    {
        /** @var Main */
        private $owner;
        
        /**
         * TicketCommand constructor.
         * @param Main $owner
         */
        public function __construct(Main $owner)
        {
            $this->owner = $owner;
            $name = "ticket";
            $description = $this->owner->lang->translateString("command.ticket.description");
            $usageMessage = $this->owner->lang->translateString("command.ticket.usage");
            $aliases = array();
            parent::__construct($name, $description, $usageMessage, $aliases);
        }
        
        /**
         * @param CommandSender $sender
         * @param string $commandLabel
         * @param array $args
         * @return bool
         */
        public function execute(CommandSender $sender, string $commandLabel, array $args): bool
        {
            if (!$sender instanceof Player) {
                return true;
            }
            $this->owner->form->sendUIForm($sender, Form::FORM_ID_SELECT, $this->owner->form->getSelectFormData());
            return true;
        }
        
    }