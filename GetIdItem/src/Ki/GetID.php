<?php

namespace Ki;

use pocketmine\player\Player;
use pocketmine\command\{Command, CommandSender};
use pocketmine\plugin\PluginBase as PB;
use pocketmine\event\Listener as L;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\Config;
use jojoe77777\FormAPI\{SimpleForm, CustomForm};
use pocketmine\item\StringToItemParser;
use pocketmine\block\VanillaBlocks;
use pocketmine\item\VanillaItems;
use onebone\economyapi\EconomyAPI;
use pocketmine\inventory\BaseInventory;

class GetID extends PB implements L {

    public function onEnable() : void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->eco = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {
        switch($cmd->getName()){
            case "getid":
                if(!$sender instanceof Player){
                    $sender->sendMessage("§l§c•§e Please Use In Game");
                    return true;
                }else{
                    if($item instanceof \pocketmine\item\ItemBlock){
                        $item = $sender->getInventory()->getItemInHand();
                        $id = $item->getBlock()->getTypeId();
                        $sender->sendMessage("§l§c• §eID: ". $id . "");

                    }
                    else{
                        $item = $sender->getInventory()->getItemInHand();
                        $id = $item->getTypeId();
                        $sender->sendMessage("§l§c• §eID: ". $id . "");
                    }
                }
            break;
        }
        return true;
    }
}