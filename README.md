<!--
*** Thanks for checking out the Ender-README-Template. This repository was forked
*** from othneildrew's Best-README-Template available at
*** https://github.com/othneildrew/Best-README-Template
***
***
***
*** To avoid retyping too much info. Do a search and replace for the following:
*** Durishn, WPTheme_CityOfGuelph, City Of Guelph Wordpress Theme, project_description, https://guelph.ca
-->
<!-- To change the stability level, replace 'stable' with 'stable', 'unstable', 'experimental', or 'deprecated'-->
![Project State][stable-shield]
[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]



<!-- PROJECT LOGO -->
<br />
<p align="center">
  <h3 align="center">City Of Guelph Wordpress Theme</h3>

  <p align="center">
    This repository holds all the code for the custom-built WordPress theme which runs the City of Guelph municipal website.
    <br />
    <a href="https://github.com/Durishn/WPTheme_CityOfGuelph/wiki"><strong>Explore the docs »</strong></a>
    <br />
    <br/ >
    <a href="https://guelph.ca">View Site</a>
    ·
    <a href="https://github.com/Durishn/WPTheme_CityOfGuelph/issues">Report Bug</a>
    ·
    <a href="https://github.com/Durishn/WPTheme_CityOfGuelph/issues">Request Feature</a>
  </p>
</p>



<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary><h2 style="display: inline-block">Table of Contents</h2></summary>
  <ol>
    <li><a href="#about-the-project">About The Project</a></li>
    <li><a href="#getting-started">Getting Started</a></li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#authors">Authors</a></li>
    <li><a href="#license">License</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

[![Product Name Screen Shot][product-screenshot]](https://guelph.ca)

Initially the City of Guelph utilized a child theme of the popular TwentyTwelve WordPress Theme. However, in mid 2020 the theme was formally emancipated, and now exists as a customized City Of Guelph WordPress Theme. This emancipation allowed for the removal of backend bloat, and a full reconfiguration of page templates, scripts, and style sheets. The most significant upgrade from the TwentyTwelve Theme is the introduction of Structured Stylesheets (SCSS) which are separated into small files for easy maintenance and modular usage. This theme can be automatically pulled from this Repository using the plugin WPPusher.


For information on the usage of this theme as an author, designer, or front-end developer please refer to the [Documentation](https://github.com/Durishn/WPTheme_CityOfGuelph/wiki).


### Built With

This project was built with the use of the following frameworks.
* [Bootstrap](https://getbootstrap.com)
* [JQuery](https://jquery.com)
* [WordPress](https://wordpress.org) - Content Management System
* [WPEngine](wpengine.com) - Web Server + Media Library
* [Wordpress](wordpress.org) - Content Management System
* [Amazon Web Services S3 Bucket](aws.com) - Public Media Library
* [CloudFlare](https://cloudflare.com/) - CDN and Firewall
* [SiteImprove](https://siteimprove.com/) - Auditing System
* [Lighthouse](https://developers.google.com/web/tools/lighthouse) - Auditing System


<!-- GETTING STARTED -->
## Getting Started

### Prerequisites

Before using this software, ensure you have the necessary prerequisites by running the following commands:
* npm
  ```sh
  npm install npm@latest -g
  ```

### Installation

Download this theme via WP Pusher or by pulling the repository and dropping it in the themes folder of your Wordpress instance along with the twenty twelve theme.

### Building

* Use the following command to compile the SCSS stylesheets into CSS
 ```sh
sass scss/style.scss css/gds-design-system.min.css --style compressed
 ```



<!-- USAGE EXAMPLES -->
## Usage

Once changes are pushed to master, they are automatically populated on Guelphs Wordpress installations via WPPusher. If WPPusher is not currently setup for automatic updates, it can still be used to pull updates manually. If WPPusher is not loaded on the remote site, then the files will need to be uploaded using the WordPress admin portal or via SFTP




<!-- ROADMAP -->
## Roadmap

See the [open issues](https://github.com/Durishn/WPTheme_CityOfGuelph/issues) for a list of proposed features (and known issues).



<!-- CONTRIBUTING -->
## Contributing

Please read our [Documentation](https://github.com/Durishn/WPTheme_CityOfGuelph/wiki) for details on our code of conduct, and the process for submitting pull requests to us.

<!-- Authors -->
## Authors
* **[Durish, Nic](https://twitter.com/Durishn)** - [mail@nicdurish.ca](mailto:mail@nicdurish.ca)
* **Hahn, Greg**
* **Lawrence, Kim**
* **Robertson, Stuart**

See the [contributors](https://github.com/Durishn/WPTheme_CityOfGuelph/contributors) page for an updated list of contributors to this project



<!-- LICENSE -->
## License
Along with WordPress, this project is licensed under the GNU V3 General License - see the [LICENSE](LICENSE) file for details.



<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->


[stable-shield]: https://img.shields.io/badge/stability-stable-green.svg
[unstable-shield]: https://img.shields.io/badge/stability-unstable-yellow.svg
[deprecated-shield]: https://img.shields.io/badge/stability-deprecated-orange.svg
[experimental-shield]: https://img.shields.io/badge/stability-experimental-red.svg

[contributors-shield]: https://img.shields.io/github/contributors/Durishn/WPTheme_CityOfGuelph.svg
[contributors-url]: https://github.com/Durishn/WPTheme_CityOfGuelph/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/Durishn/WPTheme_CityOfGuelph.svg
[forks-url]: https://github.com/Durishn/WPTheme_CityOfGuelph/network/members
[stars-shield]: https://img.shields.io/github/stars/Durishn/WPTheme_CityOfGuelph.svg
[stars-url]: https://github.com/Durishn/WPTheme_CityOfGuelph/stargazers
[issues-shield]: https://img.shields.io/github/issues/Durishn/WPTheme_CityOfGuelph.svg
[issues-url]: https://github.com/Durishn/WPTheme_CityOfGuelph/issues
[license-shield]: https://img.shields.io/github/license/Durishn/WPTheme_CityOfGuelph.svg
[license-url]: https://github.com/Durishn/WPTheme_CityOfGuelph/blob/master/LICENSE
[linkedin-shield]: https://img.shields.io/badge/-Github-black.svg?logo=github&colorB=555
[linkedin-url]: https://github.com/Durishn
[product-screenshot]: screenshot.png
