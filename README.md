# WordPress Plugin Activation Module
A module for handling WordPress brand plugins activations.

## Module Responsibilities

- The intention of this module is to perform a set of actions when the brand plugin is activated or when the site is a fresh installation.
- Simplify the default WordPress installation's dashboard by blocking default plugins activation redirects and default admin notices and banners.

## Critical Paths

- None of the default plugins or plugins in `includes/Partners` directory should be allowed to display default admin notices or perform activation redirects.

## Installation

### 1. Add the Newfold Satis to your `composer.json`.

```bash
composer config repositories.newfold composer https://newfold-labs.github.io/satis
```

### 2. Require the `newfold-labs/wp-module-activation` package.

```bash
composer require newfold-labs/wp-module-activation
```
