<?php

declare(strict_types=1);

namespace inotflying\Freedom;

use pocketmine\event\Listener;
use pocketmine\event\server\DataPacketSendEvent;
use pocketmine\network\mcpe\protocol\PlayerListPacket;
use pocketmine\plugin\PluginBase;

final class Main extends PluginBase implements Listener
{
    protected function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function handleDataPacketSend(DataPacketSendEvent $event): void
    {
        $packets = $event->getPackets();
        foreach ($packets as $packet) {
            if ($packet instanceof PlayerListPacket) {
                foreach ($packet->entries as $entry) {
                    $entry->xboxUserId = "";
                }
            }
        }
    }
}
