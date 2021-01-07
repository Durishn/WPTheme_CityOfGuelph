# Contributing

When contributing to TwentyTwelve-CityofGuelph, please first discuss the change you wish to make via issue,
email, or any other method with the owners of this repository. PLEASE review the entirety of this document! In particular, if you want to change up stylings and are not used to SCSS then you'll need to do a bit of research before jumping right in.

Note: We have a code of conduct, please follow it in all your interactions with the project.

## Using Github
For the uninitiated, GitHub is our Revision Control System, that allows for modular branching, merging, development, and backups of code. If you are unfamiliar with Git or Github, I highly recommend spending some time reviewing a guide such as [this one produced by GitHub](https://guides.github.com/activities/hello-world/). In general, edits to branches can be made using a variety of methods, including:
 1. In the browser using GitHub.com
 2. Using the GitHub Desktop tool
 3. Using command line or terminal
 4. Using a text editor with Git functionality


## Pull Request Process
A pull request simply refers to the act of merging your code base with an active branch (In some services this is called a merge request). For example, if I pull the main code from `master` and make some changes then reupload, this is NOT a pull request, this is simply a commit and push. However, ideally we'd like to instead push to OTHER branches then pull them into `master`. Once you've created a branch, made some changes, pushed your edits. Pull Requests are generally used for adding features, this allows us to perform tests on other branches (such as uploading a development branch to our staging server to look for issues) prior to merging it into prod. However, if a quick hotfix is required, than simply committing and pushing to `master` may be most appropriate. Should you perform a pull request, please also consider the following:

1. Update any documentation if applicable with details of changes to the interface.
2. Increase the version numbers in any examples files and the README.md to the new version that this
   Pull Request would represent. The versioning scheme we use is [SemVer](http://semver.org/).
3. You may merge the Pull Request in once you have the sign-off of one other developer, or if you
   do not have permission to do that, you may request the second reviewer to merge it for you.

## Editing styles
Styles in this theme are written in Sass. Sass is an extension of CSS, adding nested rules, variables, mixins, selector inheritance, and more. It's translated to well-formatted, standard CSS using the command line tool or a plugin for your build system. Sass is incredibly powerful, and much faster than CSS - however comes at a slight cost: The styles you write are NOT what a computer reads, and first need to be compiled into CSS. This can confuse many uninitiated developers who are used to editing CSS files. CSS files in this project are generated from a set of SCSS files.

If you've never worked with Sass before, worry not, its not difficult at all! You can write plain CSS as Sass and it will be properly understood, however there are also lots of other features available. I recommend doing some reading of the [sass website](https://sass-lang.com/). Once you've made changes within the SCSS directory, you can compile the sass directory into css with minification by running: `sass scss/style.scss css/gds-design-system.min.css --style compressed`. 

## Code of Conduct

### Our Responsibilities

Project maintainers are responsible for clarifying the standards of acceptable
behaviour and are expected to take appropriate and fair corrective action in
response to any instances of unacceptable behaviour.

Project maintainers have the right and responsibility to remove, edit, or
reject comments, commits, code, wiki edits, issues, and other contributions
that are not aligned to this Code of Conduct, or to ban temporarily or
permanently any contributor for other behaviours that they deem inappropriate,
threatening, offensive, or harmful.

### Scope

This Code of Conduct applies both within project spaces and in public spaces
when an individual is representing the project or its community. Examples of
representing a project or community include using an official project e-mail
address, posting via an official social media account, or acting as an appointed
representative at an online or offline event. Representation of a project may be
further defined and clarified by project maintainers.

### Enforcement

Instances of abusive, harassing, or otherwise unacceptable behaviour may be
reported by contacting [WebServices](mailto:webservices@guelph.ca). All
complaints will be reviewed and investigated and will result in a response that
is deemed necessary and appropriate to the circumstances.

Project maintainers who do not follow or enforce the Code of Conduct in good
faith may face temporary or permanent repercussions as determined by other
members of the project's leadership.

### Attribution

This Code of Conduct is adapted from the [Contributor Covenant][homepage], version 1.4,
available at [http://contributor-covenant.org/version/1/4][version]

[webemail]: mailto:webservices@guelph.ca
[homepage]: http://contributor-covenant.org
[version]: http://contributor-covenant.org/version/1/4/
