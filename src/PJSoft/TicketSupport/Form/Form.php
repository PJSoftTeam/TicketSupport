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
    
    namespace PJSoft\TicketSupport\Form;
    
    use PJSoft\TicketSupport\Main;
    use PJSoft\TicketSupport\Utils\Json;
    use pocketmine\network\mcpe\protocol\ModalFormRequestPacket;
    use pocketmine\Player;
    
    class Form
    {
        /** @var int */
        public const FORM_ID_SELECT = 101150;
        
        /** @var int */
        public const FORM_ID_SEND = 101151;
        
        /** @var int */
        public const FORM_ID_TEST = 101152;
        
        /** @var Main */
        private $owner;
        
        /**
         * Form constructor.
         * @param Main $owner
         */
        public function __construct(Main $owner)
        {
            $this->owner = $owner;
        }
        
        /**
         * @param Player $player
         * @param int $formId
         * @param array $formData
         */
        public function sendUIForm(Player $player, int $formId, array $formData): void
        {
            $form = new ModalFormRequestPacket();
            $form->formId = $formId;
            $form->formData = Json::getEncodeJson($formData);
            $player->sendDataPacket($form);
        }
    
        /**
         * @return array
         */
        public function getSelectFormData(): array
        {
            $formData = array(
                "type" => "form",
                "title" => "Engg Choose",
            );
        }
        
    }