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
    
    namespace PJSoft\TicketSupport\Lang;
    
    use PJSoft\TicketSupport\Main;
    use pocketmine\utils\Config;
    
    class Language
    {
        /** @var array */
        private const DEFAULT_LANGUAGE_DATA = array(
            "form.title.select" => "Select",
        );
        
        /** @var string */
        private const LANGUAGE_FILE_NAME = "language.json";
        
        /** @var Main */
        private $owner;
        
        /** @var Config */
        private $language;
        
        /**
         * Language constructor.
         * @param Main $owner
         */
        public function __construct(Main $owner)
        {
            $this->owner = $owner;
            $languageFilePath = $this->owner->getDataFolder() . self::LANGUAGE_FILE_NAME;
            $this->loadLanguage($languageFilePath);
        }
        
        /**
         * @param string $languageFilePath
         */
        private function loadLanguage(string $languageFilePath): void
        {
            $this->language = new Config($languageFilePath, Config::JSON, self::DEFAULT_LANGUAGE_DATA);
        }
        
        /**
         * @param string $key
         * @param array $params
         * @return string
         */
        public function translateString(string $key, array $params = array()): string
        {
            if ( !$this->language->exists($key) ) {
                $this->owner->getLogger()->error("language key \"" . $key . "\" not found!");
                return $key;
            }
            $string = $this->language->get($key);
            foreach ( $params as $index => $param ) {
                $string = str_replace("%{$index}", $param, $string);
            }
            return (string)$string;
        }
        
    }