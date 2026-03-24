# Agent guidance – wp-module-activation

This file gives AI agents a quick orientation to the repo. For full detail, see the **docs/** directory.

## What this project is

- **wp-module-activation** – Handles WordPress brand plugin activation logic. Hooks into `newfold_container_set` and instantiates `Activation`, which wires up `Partners` (Akismet, CreativeMail, Jetpack, MonsterInsights, OptinMonster, WpForms, Yoast, WordPress) for partner integrations and fresh-install detection. Maintained by Newfold Labs.

- **Stack:** PHP 7.3+. No production Composer dependencies; expects the loader and container to be set by the host.

- **Architecture:** On `newfold_container_set`, creates `new Activation( $container )`, which creates `new Partners( $container )`. Each partner’s `init()` runs; Partners also adds a `plugins_loaded` filter for fresh install handling.

## Key paths

| Purpose | Location |
|---------|----------|
| Bootstrap | `bootstrap.php` – hooks `newfold_container_set` |
| Activation | `includes/Activation.php` |
| Partners | `includes/Partners.php` – partner integrations (Akismet, Jetpack, etc.) |
| Tests | `tests/` (Codeception wpunit) |

## Essential commands

```bash
composer install
composer run lint
composer run fix
composer run test
```

## Documentation

- **Full documentation** is in **docs/**. Start with **docs/index.md**.
- **CLAUDE.md** is a symlink to this file (AGENTS.md).

---

## Keeping documentation current

When you change code, features, or workflows, update the docs. Keep **docs/index.md** current: when you add, remove, or rename doc files, update the table of contents (and quick links if present). When cutting a release, update **docs/changelog.md**.
