# TwentyTwelve-CityOfGuelph
This repository holds all the code for the custom-built WordPress theme which runs the City of Guelph municipal website. The theme was built as a child theme of the popular Twenty Twelve Wordpress theme.

For information on the usage of this theme as an author, designer, or front-end developer please refer to the [Template and Pattern Library](https://github.com/Guelph-Digital-Service/TwentyTwelve-CityOfGuelph/blob/develop/doc/templateandpattern.md).

## Installation
Download this theme via WP Pusher or by pulling the repository and dropping it in the themes folder of your Wordpress instance along with the twenty twelve theme.

## Development
While changes can indeed be made by editing files directly within this window on the `master` branch, it should be done with extreme caution and only for emergency hotfixes. Significant changes should be performed within the `develop` branch before being merged into `master` (prod).

## Testing
We don't currently have any tests or lints, but in the future merges into master may require passing automated tests for content, errors, warnings, and code style. Each test will be explained in more detail as it is added.

## Deployment
Once changes are pushed to master, they are automatically populated on Guelphs Wordpress installations via WPPusher.

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

## Authors
* **[Durish, Nic](https://github.com/Durishn)**
* **Hahn, Greg**
* **Lawrence, Kim**
* **[Robertson, Stuart](https://github.com/StuartRoberts0n)**

See also the list of [contributors](https://github.com/CityOfGuelph-Webservices/TwentyTwelve-CityOfGuelph/contributors) who have participated in the building of this theme.

## License
Along with WordPress, this project is licensed under the GNU V3 General License - see the [LICENSE](LICENSE) file for details.
