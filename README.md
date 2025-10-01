![plentymarkets Logo](http://www.plentymarkets.eu/layout/pm/images/logo/plentymarkets-logo.jpg)

# Hello World plugin

This is the **Hello World** plugin developed by plentymarkets.

The master branch of this repository contains a simple plugin that renders a template and registers a route under which the template is displayed. Check out the branch [further_options](https://github.com/plentymarkets/plugin-hello-world/tree/further_options) to see more possibilities.

## Requirements

This is a plugin for [plentymarkets 7](https://www.plentymarkets.com). No other plugins are required for running the plugin.

## Installing

For detailed information about plugin provisioning refer to [plentymarkets developers](https://developers.plentymarkets.com/dev-doc/basics#plugin-provisioning).


Install using [Composer](https://getcomposer.org/) and a `composer.json`.

```json
{
    "require": {
        "plentymarkets/plugin-hello-world": "dev-master"
    }
}
```

For available versions see the corresponding [Packagist page](https://packagist.org/packages/plentymarkets/plugin-hello-world).

For more basic information on package installation via Composer see this [introduction](https://getcomposer.org/doc/01-basic-usage.md).

## Plugin documentation

- Learn how to create your [first plentymarkets plugin](https://developers.plentymarkets.com/tutorials/helloworld)
- Overview of plentymarkets [plugin interfaces](https://developers.plentymarkets.com/dev-doc/basics#guide-interface)
- The plentymarkets [REST API](https://developers.plentymarkets.com/rest-doc/introduction)

---
# ⚙️ Plentymarkets Plugin Build (CI Example)

This repository includes a **CI pipeline example** showing how to integrate Plentymarkets plugin builds into **GitHub Actions**.

It is a **template** you can adapt to your own plugin repository.

---

## 🔄 What the pipeline does

On each run (push or manual trigger), the pipeline will:

* Request a fresh login token from Plentymarkets (credentials from GitHub Secrets).
* Trigger a **Dev Mode build** for the configured system and plugin set.
* Monitor the build until completion.
* Report success ✅ or detailed errors ❌.

---

## 🔑 Setup

### 1. Get system credentials
Use your Plenty credentials
* **username**
* **password**
* **system ID** (e.g., `pXXXXX`)

### 2. Add GitHub Secrets

In your repository, go to:
**Settings** → **Secrets and variables** → **Actions**

Add the following secrets:

* `PLENTY_USERNAME` → your API username
* `PLENTY_PASSWORD` → your API password

### 3. Configure system and set IDs in workflow

Create the workflow file: **`.github/workflows/build.yml`**

Add the **environment** section to match your system and plugin set IDs:

```yaml
env:
  PLENTY_ID: 70503   # your Plentymarkets system ID (from the email, e.g. p70503)
  SET_ID: 1          # the plugin set you want to build inside that system
```
Note: You need a GitHub Action for each plugin set.

## Join our community

Sign up today and become a member of our [forum](https://forum.plentymarkets.com/c/plugin-entwicklung). Discuss the latest trends in plugin development and share your ideas with our community.

## Versioning

Visit our forum and find the latest news and updates in our [Changelog](https://forum.plentymarkets.com/c/changelog?order=created).

## License

This project is licensed under the GNU AFFERO GENERAL PUBLIC LICENSE - see the [LICENSE.md](/LICENSE.md) file for details.

