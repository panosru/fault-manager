# Contributing

Thanks for being interested! Here's our guidelines to contributing to that project.


- [Bug Reports](#bug-reports)
- [Core Development Discussion](#core-development-discussion)
- [Which Branch?](#which-branch?)
- [Security Vulnerabilities](#security-vulnerabilities)
- [Coding Style](#coding-style)
  - [PHPDoc](#phpdoc)


## Bug Reports
- Check the issues to see if your problem has already been brought up.
- Submit a ticket if it hasn't. Be sure to be clear and give instructions on how to reproduce the issue you're having.
- You should also include as much relevant information as possible and a code sample that demonstrates the issue.
- Bug reports may also be sent in the form of a pull request containing a failing test.

## Core Development Discussion
- You may propose new features or improvements of existing behavior.
- If you propose a new feature, please provide some use case. 
- Be willing to implement at least some of the code that would be needed to complete the feature.

## Which Branch?
- *All* pull requests should be send to the `develop` branch
- Fork the repository.
- Pull `develop` branch and create a new branch named after your issue and its number:

  - `git checkout -b issue/number-brief-issue-description`
- Pull request must refer the correspondent issue.
- We will review your changes and try to respond in a timely manner.

## Security Vulnerabilities
If you discover a security vulnerability within the project, please do not make it public via issues board, instead send an email to Omega Business Development at info@omegad.biz. All security vulnerabilities will be promptly addressed.

## Coding Style
We follow the [PSR-2](https://www.php-fig.org/psr/psr-2/) coding standard and the [PSR-4](https://www.php-fig.org/psr/psr-4/) autoloading standard.

### PHPDoc
Refer to existing code for PHPDoc usage. We follow [phpDocumentor guides](https://docs.phpdoc.org/guides/index.html)

*Please note we have a [code of conduct](CODE_OF_CONDUCT.md), please follow it in all your interactions with the project.*