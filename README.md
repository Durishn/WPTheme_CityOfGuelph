# TwentyTwelve-CityOfGuelph
This repository holds all the code for the custom-built WordPress theme which runs the City of Guelph municipal website. The theme was initially built as a child theme of the popular Twenty Twelve Wordpress theme, however received it's emancipation in early 2020 - meaning it's now a stand-alone theme!

This README provides a general overview of the theme and it's basic functions. For more detailed descriptions on how to contribute or make edits to this theme please refer to the
For information on the usage of this theme as an author, designer, or front-end developer please refer to the [Contributing Documentation](https://github.com/Guelph-Digital-Service/TwentyTwelve-CityOfGuelph/blob/develop/doc/contributing.md).

## Installation and Deployment
The most up-to-date version of this theme will ALWAYS be available as the most recent Master branch of this repository. This will include ALL of the code for the theme, both what a developer would edit (pre-compilation) and what a web-server would read (post-compilation). This however does NOT add bloat to the website, as only necessary sections of the theme should be called on any given page.

There are two ways to get the most recent version of this theme onto your WordPress instance.

1. Ensure that the plugin `WP Pusher` is loaded onto your WordPress instance and has been configured with an API key to reach this repository. Ensure the current theme branch is set to `master` and then click `Update` within WP Pusher settings. This will automatically pull the most recent version into your WordPress instance (you may need to clear caches if it does not immediately populate)

2. You can also upload this theme manually by downloading the most recent Master branch and then dropping it in your 'Themes' directory of your WordPress Instance. This will make the theme available from your WPAdmin settings page, where you can activate it.

## Branches
The most significant thing to remember about how our branching is configured is that the most recent version of `master` is ALWAYS the current theme. It may even be setup to automatically push updates to our WordPress instance, so be careful whenever pushing changes into master! Changes should instead be made on a separate branch (such as `develop`) and then merged into our master branch. Please refer to the following document on [Github Branching Strategies](https://nvie.com/posts/a-successful-git-branching-model/) for more information.

## Contributing
Please read [CONTRIBUTING.md](https://github.com/Guelph-Digital-Service/TwentyTwelve-CityOfGuelph/blob/develop/doc/contributing.md) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning
We aim to use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/CityOfGuelph-Webservices/TwentyTwelve-CityOfGuelph/tags).

## Built With
* [WPEngine](wpengine.com) - Web Server + Media Library
* [Wordpress](wordpress.org) - Content Management System
* [Amazon Web Services S3 Bucket](aws.com) - Public Media Library
* [Thirdlight](thirdlight.com) - Private Multimedia Library
* []() - Domain Name System
* []() - Domain Registrar
* [SiteImprove]() - Auditing System
* [Lighthouse]() - Auditing System

## Packet Pathing
* User's version of site - guelph.ca
* User Browser Cache - (1 day: Cloudflare, )
* CDN Cache - Cloudflare
* Global Edge Security Cache - WPEngine
* Page Cache - WPEngine
* Object Cache - WPEngine
* Toolset Cache

## Authors
* **[Durish, Nic](https://github.com/Durishn)**
* **Hahn, Greg**
* **Lawrence, Kim**
* **[Robertson, Stuart](https://github.com/StuartRoberts0n)**

See also the list of [contributors](https://github.com/CityOfGuelph-Webservices/TwentyTwelve-CityOfGuelph/contributors) who have participated in the building of this theme.

## License
Along with WordPress, this project is licensed under the GNU V3 General License - see the [LICENSE](LICENSE) file for details.
