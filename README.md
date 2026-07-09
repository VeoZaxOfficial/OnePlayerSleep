# OnePlayerSleep

A lightweight PocketMine-MP plugin that lets a **single player** skip the night without needing anyone to sleep with them.

## Features

- 🛌 One player sleeping is enough to skip to day, even on servers with many online players.
- 💬 Broadcasts a sleep status message to everyone (`PlayerName is sleeping (1/N players)`).
- ⏱️ Waits a short delay after a player gets into bed before triggering the time skip, so it feels natural rather than instant.
- ☀️ Announces to the whole server when night has been skipped and who caused it.
- 🚪 Cancels the pending skip if the sleeping player gets back out of bed before it triggers.

## Requirements

- PocketMine-MP API 2.0.0
- API version: `0.14.x - 0.15.10`

## Installation

1. Download the plugin from here [OnePlayerSleep](link)
2. Drop the `OnePlayerSleep` folder into your server's `plugins/` directory.
3. Restart or reload your server.

That's it. no configuration needed. As soon as one player goes to bed, the plugin takes care of the rest.

## How It Works

- When a player taps on a bed, `OnePlayerSleep` starts check on that player and let the time turn into day time.

## Author

**VeoZax**
[github.com/VeoZaxOfficial](https://github.com/VeoZaxOfficial)

## License

Feel free to use, modify, and share, attribution appreciated!
