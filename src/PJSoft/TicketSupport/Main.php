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
    
    namespace PJSoft\TicketSupport;
    
    use PJSoft\TicketSupport\Command\TicketCommand;
    use PJSoft\TicketSupport\Form\Form;
    use PJSoft\TicketSupport\Lang\Language;
    use PJSoft\TicketSupport\Listener\FormReceive;
    use pocketmine\plugin\PluginBase;
    use pocketmine\utils\Config;
    
    class Main extends PluginBase
    {
        /** @var Form */
        public $form;
        
        /** @var Language */
        public $lang;
        
        /** @var Config */
        public $setting;
        
        /** @var Config */
        public $tickets;
        
        public function onEnable(): void
        {
            $this->getLogger()->info("§l§e{$this->getDescription()->getName()}§is Loaded！");
            $this->getLogger()->info("§rPlugin Version: §l§e{$this->getDescription()->getVersion()}§r.");
            $compatible_apis = implode($this->getDescription()->getCompatibleApis(), ", ");
            $this->getLogger()->info("§rThis Plugin is Compatible PocketMine API§l§e{$compatible_apis}§r.");
            $this->getLogger()->info("This Program License is GNU General Lesser License.");
            $this->getLogger()->info("You should have received a copy of the GNU General Public License");
            $this->getLogger()->info("along with this program.  If not, see <http://www.gnu.org/licenses/>.");
            $this->pluginInit();
        }
        
        public function onDisable(): void
        {
            $this->getLogger()->info("§l§e{$this->getDescription()->getName()}§rを終了しました！");
        }
        
        private function pluginInit(): void
        {
            //Register Event
            $this->getServer()->getPluginManager()->registerEvents(new FormReceive($this), $this);
            //Register Command
            $this->getServer()->getCommandMap()->register("ticket", new TicketCommand($this));
            //Config Init
            //$this->setting = new Config($this->getDataFolder() . "setting.yml", Config::YAML);
            $this->tickets = new Config($this->getDataFolder() . "tickets.yml", Config::YAML);
            //Instance Init
            $this->form = new Form($this);
            $this->lang = new Language($this);
        }
        
    }