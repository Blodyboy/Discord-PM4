<?php

namespace Discord;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\utils\Config;

class Blody extends PluginBase {
    public function onLoad(): void
    {
        $this->saveResource("config.yml");
    }

    public function onEnable(): void {
      $this->getLogger()->info("Discord Plugin aktif - Blody");
    }
    public function onDisable(): void{ 
      $this->getLogger()->info("Discord Plugin De-aktif - Blody");
    }
    public function onCommand(CommandSender $player, Command $kmt, string $label, array $args): bool {
       if($kmt->getName() == "discord") {
           if ($player instanceof Player) {
            $config = new Config($this->getDataFolder(). "config.yml", 2);   
            $player->sendMessage($config->get("mesaj"));
        }else $player->sendMessage("Bu Komut Sadece Oyunda Kullanılabilir.");
       }
        return true;
    }
} 
