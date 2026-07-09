<?php
namespace OnePlayerSleep;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerBedEnterEvent;
use pocketmine\event\player\PlayerBedLeaveEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\scheduler\PluginTask;

class Main extends PluginBase implements Listener
{
    private $sleepingPlayers = [];

    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function onPlayerSleep(PlayerBedEnterEvent $event)
    {
        $player = $event->getPlayer();
        $level = $player->getLevel();
        $name = strtolower($player->getName());
        $this->sleepingPlayers[$name]=true;
        $onlineCount = count($this->getServer()->getOnlinePlayers());
        $msg = "§e" . $player->getName() . "§f is sleeping (§e1§f/§e" . $onlineCount . "§f players)";
        foreach($this->getServer()->getOnlinePlayers() as $p)
            {
            $p->sendMessage($msg);
        }

        $this->getServer()->getScheduler()->scheduleDelayedTask(new SleepTask($this, $level, $player), 200);
    }
    public function onPlayerLeaveBed(PlayerBedLeaveEvent $event)
    {
        $player = $event->getPlayer();
        $name = strtolower($player->getName());
        if(!isset($this->sleepingPlayers[$name]))
            {
            unset($this->sleepingPlayers[$name]);
            foreach($this->getServer()->getOnlinePlayers() as $p)
                {
     }
   }
    }
    public function isStillSleeping($player)
    {
        $name = strtolower($player->getName());
        return isset($this->sleepingPlayers[$name]);
    }
    public function removeSleepingPlayer($player)
    {
        $name = strtolower($player->getName());
        unset($this->sleepingPlayers[$name]);
    }
}
class SleepTask extends PluginTask
{
    private $level;
    private $player;
    public function __construct($plugin,$level,$player)
    {
        parent::__construct($plugin);
        $this->level = $level;
        $this->player = $player;
    }

    public function onRun($currentTick)
    {
        if($this->level===null) return;
        if(!$this->owner->isStillSleeping($this->player))
            {
            return;
        }
        $this->level->setTime(0);
        $this->level->stopTime();
        foreach($this->owner->getServer()->getOnlinePlayers()as $p)
            {
            $p->sendMessage("§a" . $this->player->getName() . "§fHas now made the time to Day by sleeping at Night!");
        }
        $this->owner->removeSleepingPlayer($this->player);
        $this->level->startTime();
 }
}
